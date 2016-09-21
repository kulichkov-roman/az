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
?>

<?foreach($arResult["ITEMS"] as $arItem){
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-art-item clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="news-art-img floatleft">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
				<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" title="<?=$arItem['NAME']?>" alt="<?=$arItem['NAME']?>" />
			</a>
		</div>
		<div class="news-art-content">
			<div class="news-art-title">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
					<?=$arItem['NAME']?>
				</a>
			</div>
			<div class="sr-news-date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></div>
			<?if($arItem['PREVIEW_TEXT'] <> ''){?>
				<div class="news-art-text">
					<?=$arItem['PREVIEW_TEXT']?>
				</div>
			<?}?>
		</div>
	</div>
<?}?>
<?=$arResult["NAV_STRING"]?>

