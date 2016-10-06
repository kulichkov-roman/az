<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$CMenuHelper = new \AZ\Helper\MenuHelper();
$environment = \YT\Environment\EnvironmentManager::getInstance();

$arSort = array(
    'ID' => 'DESC'
);
$arFilter = array(
    'IBLOCK_ID' => $environment->get('catalogIBlockId'),
    '!UF_SHOW_MENU' => false
);
$arSelect = array(
    'ID',
    'NAME',
    'CODE',
    'UF_SHOW_MENU',
);

$rsSection = \CIBlockSection::GetList(
    $arSort,
    $arFilter,
    false,
    $arSelect,
    false
);

$arSections = array();
while ($arItem = $rsSection->GetNext())
{
    $arSections[$arItem['CODE']] = $arItem;
}

$arParentIds = array();
foreach($arResult as $key => $arItem){

    $arParseUrl = array_unique(explode("/", $arItem['LINK']));
    $arParseUrl = array_diff($arParseUrl, array(''));

    $code = array_pop($arParseUrl);

    if(!(array_key_exists($code, $arSections) || $arItem['PARAMS']['UF_SHOW_MENU'] == 'Y'))
    {
        unset($arResult[$key]);
    }
    else
    {
        $arItem["ID"] = $key;
        if($arItem["IS_PARENT"]){
            $arParentIds[$arItem["DEPTH_LEVEL"]] = $key;
        }
        if($arItem["DEPTH_LEVEL"]>1){
            $arItem["PARENT_ID"] = $arParentIds[$arItem["DEPTH_LEVEL"] - 1];
        }
        $arResult[$key] = $arItem;
    }
}

$arResult = $CMenuHelper->buildTree($arResult);
?>
