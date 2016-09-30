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
	echo ShowNote('Спасибо за заявку! С Вами свяжется наш менеджер в ближайшее время!');
} else {
	?>
	<form id="subscribe-form" name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
		<?=bitrix_sessid_post()?>
		<?if ($arParams["MAX_FILE_SIZE"] > 0){?>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" />
		<?}?>
		<div class="sb-title">Подписаться на рассылку:</div>
		<div class="sub-field">
			<input type="text" name="PROPERTY[NAME][0]" placeholder="ваш e-mail" />
			<button type="submit" class="sub-btn" name="<?=$arParams['PREFIX_FORM']?>_iblock_submit" value="1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
		</div>
	</form>
	<?
}
?>
