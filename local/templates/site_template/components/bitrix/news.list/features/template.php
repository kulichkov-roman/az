<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
if($arResult["ITEMS"]){?>
	<div class="features">
		<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
		<?foreach($arResult["ITEMS"] as $arItem){?>
			<a href="javascript:void(0);" class="features__item">
				<div class="features__item-hint">
					<?=$arItem["PREVIEW_TEXT"]?>
				<div class="features__item-hint-arrow"></div>
				</div>
				<span class="<?=$arItem["PROPERTIES"]["CLASS"]["VALUE"]?>"></span><span class="features__text"><?=$arItem["~NAME"]?></span>
			</a>
		<?}?>
	</div>
<?}?>