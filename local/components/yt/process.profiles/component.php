<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$userId = $GLOBALS["USER"] -> GetID();
$personTypeId = 1;

if($userId && $_POST["save_profiles"] == "Y" && check_bitrix_sessid()){
	CModule::IncludeModule("sale");


	$arPropsInfo = array();
	$dbOrderProps = CSaleOrderProps::GetList(
        array(),
        array(
                "PERSON_TYPE_ID" => $personTypeId,
                "USER_PROPS" => "Y", "ACTIVE" => "Y", "UTIL" => "N"
            ),
        false,
        false,
        array("ID", "PERSON_TYPE_ID", "NAME", "TYPE", "REQUIED", "DEFAULT_VALUE", "SORT", "USER_PROPS", "IS_LOCATION", "PROPS_GROUP_ID", "SIZE1", "SIZE2", "DESCRIPTION", "IS_EMAIL", "IS_PROFILE_NAME", "IS_PAYER", "IS_LOCATION4TAX", "CODE", "SORT")
    );

    while($arProp = $dbOrderProps -> GetNext()){
    	$arPropsInfo[$arProp["CODE"]] = $arProp;
    }

    $arUser = CUser::GetByID($GLOBALS["USER"] -> GetId()) -> GetNext();

	foreach($_POST["PROFILE_PROPS"] as $arProfileProps){
		$profileId = $arProfileProps["PROFILE_ID"];
		$defaultProfileId = $arProfileProps["DEFAULT"] ? true : false;

		if($defaultProfileId){
			setDefaultProfileId($profileId);
		}

		unset($arProfileProps["PROFILE_ID"]);
		unset($arProfileProps["DEFAULT"]);
		
		if(!$arProfileProps["STREET"]){
			continue;
		}

		//id-адресных полей
		$arProfilePropsCodes = array_keys($arProfileProps);
		$arProfilePropsIds = array();
		foreach($arProfilePropsCodes as $propCode){
			$arProfilePropsIds[] = $arPropsInfo[$propCode]["ID"];
		}

		//неадресные поля
		$arNonAddressProfileProps = array();
		foreach($arPropsInfo as $propCode => $arInfo){
			if(!in_array($propCode, $arProfilePropsCodes)){
				$arNonAddressProfileProps[] = $propCode;
			}
		}
		$arMapping = array(
			"PERSONAL_EMAIL" => "EMAIL",
			"PERSONAL_PHONE" => "PERSONAL_PHONE",
			"NAME" => "NAME",
			"LAST_NAME" => "LAST_NAME"
		);

		//это новый профиль
		if(!$profileId){
			$profileId = CSaleOrderUserProps::Add(
			    array(
			        'NAME' => $arProfileProps["STREET"],
			        'USER_ID' => $userId,
			        'PERSON_TYPE_ID' => $personTypeId
			    )
			);

			//добавляем неадресные поля от пользователя
			foreach($arNonAddressProfileProps as $propCode){
				$arFields = array(
					"USER_PROPS_ID" => $profileId,
					"ORDER_PROPS_ID" => $arPropsInfo[$propCode]["ID"],
					"NAME" => $arPropsInfo[$propCode]["NAME"],
					"VALUE" => $arUser[$arMapping[$propCode]]
				);

				CSaleOrderUserPropsValue::Add($arFields);
			}
		} else {
			//ищем заполненные "адресные" поля и очищаем
			if($arProfilePropsIds){			
				$rsUserPropsValue = CSaleOrderUserPropsValue::GetList(array(),array("USER_PROPS_ID" => $profileId, "@ORDER_PROPS_ID" => $arProfilePropsIds));
				while($arUserPropsValue = $rsUserPropsValue -> GetNext()){
					CSaleOrderUserPropsValue::Delete($arUserPropsValue["ID"]);
				}
			}
		}
		
		foreach($arProfileProps as $propCode => $propValue){
			$arFields = array(
				"USER_PROPS_ID" => $profileId,
				"ORDER_PROPS_ID" => $arPropsInfo[$propCode]["ID"],
				"NAME" => $arPropsInfo[$propCode]["NAME"],
				"VALUE" => $propValue
			);

			CSaleOrderUserPropsValue::Add($arFields);
		}

		// Изменим название профиля покупателя
		$arProfileName = array();
		if($arProfileProps["STREET"]){
			$arProfileName[] = $arProfileProps["STREET"];
		}
		if($arProfileProps["HOUSE"]){
			$arProfileName[] = $arProfileProps["HOUSE"];
		}
		if($arProfileProps["FLAT"]){
			$arProfileName[] = $arProfileProps["FLAT"];
		}
		$strProfileName = implode(", ", $arProfileName);

		$arProfileFields = array(
		   "NAME" => $strProfileName/*$arProfileProps["STREET"]*/
		);
		CSaleOrderUserProps::Update($profileId, $arProfileFields);
	}

	$arResult["SHOW_SUCCESS"] = true;
}

$this->IncludeComponentTemplate();
?>