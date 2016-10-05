<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);

$environment = \YT\Environment\EnvironmentManager::getInstance();

if (!empty($arResult["ERRORS"])) {
	ShowError(implode("<br />", $arResult["ERRORS"]));
}
if (strlen($arResult["MESSAGE"]) > 0) {
	?>
	<div>
		Спасибо за заявку! С Вами свяжется наш менеджер в ближайшее время!
	</div>
	<?
} else {
	?>

	<form id="contact-form" name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
		<?=bitrix_sessid_post()?>
		<?if ($arParams["MAX_FILE_SIZE"] > 0){?>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" />
		<?}?>
		<div class="row-field">
			<label>Имя<span class="red-color">*</span></label>
			<input type="text" name="PROPERTY[NAME][0]" class="form-input" />
		</div>
		<div class="row-field">
			<label>E-mail<span class="red-color">*</span></label>
			<input type="text" name="PROPERTY[24][0]"  class="form-input" />
		</div>
		<div class="row-field">
			<label>Телефон</label>
			<input type="text" name="PROPERTY[23][0]" class="form-input" />
		</div>
		<div class="row-field">
			<label>Тема обращения</label>
			<div class="re-block-select floatleft">
				<select name="PROPERTY[29][0]">
					<?
					$propertyID = 29;

					if (intval($propertyID) > 0) $sKey = "ELEMENT_PROPERTIES";
					else $sKey = "ELEMENT";

					foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
					{
						$checked = false;
						if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
						{
							foreach ($arResult[$sKey][$propertyID] as $elKey => $arElEnum)
							{
								if ($key == $arElEnum["VALUE"])
								{
									$checked = true;
									break;
								}
							}
						}
						else
						{
							if ($arEnum["DEF"] == "Y") $checked = true;
						}
						?><option value="<?=$key?>" <?=$checked ? " selected=\"selected\"" : ""?>><?=$arEnum["VALUE"]?></option><?
					}
					?>
				</select>
			</div>
		</div>
		<div class="row-field">
			<label>Сообщение</label>
			<textarea name="PROPERTY[PREVIEW_TEXT][0]"></textarea>
		</div>
		<div class="row-field last-field clearfix">
			<div class="captcha-row clearfix">
				<div class="cap-col floatleft">
					<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="140" height="30" alt="CAPTCHA">
					<input type="text" name="captcha_word" size="30" maxlength="50" value="" >
				</div>
				<div class="floatright mb-sb-btn">
					<input type="submit" name="<?=$arParams['PREFIX_FORM']?>_iblock_submit" class="btn-site orange" value="Отправить">
				</div>
			</div>
		</div>
	</form>
	<?
}
?>
