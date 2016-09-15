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
	<div class="index-page__slider">
		<div data-interval="<?=COption::GetOptionString("askaron.settings", "UF_MAIN_TIME_STEP");?>" class="index-page__slider-inner _raw">
			<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
			<?foreach($arResult["ITEMS"] as $arItem){?>
				<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"><img src="<?=itc\Resizer::get($arItem["PREVIEW_PICTURE"]["ID"], 'sliderOnMain')?>" alt="<?=$arItem["NAME"]?>"></a>
				</div>
			<?}?>
		</div>
	</div>
<?}?>