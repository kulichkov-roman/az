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

<?$this->SetViewTarget('newsDate');?>
	<div class="sr-news-date sigle-date"><?=ToLower($arResult['DISPLAY_ACTIVE_FROM'])?></div>
<?$this->EndViewTarget();?>

<?if(strlen($arResult['DETAIL_TEXT'])>0){?>
	<?=$arResult['DETAIL_TEXT'];?>
<?} else {?>
	<?=$arResult['PREVIEW_TEXT'];?>
<?}?>

<?$this->SetViewTarget('moreNews');?>
	<?if(is_array($arResult['PROPERTIES']['MORE']['VALUE']) && count($arResult['PROPERTIES']['MORE']['VALUE']) > 0) {?>
		<div class="navigation-link">
			<div class="nl-title">Смотрите также</div>
			<ul>
				<?foreach ($arResult['PROPERTIES']['MORE']['VALUE'] as &$arItem) {?>
					<li>
						<i class="fa fa-angle-right" aria-hidden="true"></i>
						<a target="_blank" href="<?=$arItem['LINK']?>"><?=$arItem['NAME']?></a>
					</li>
				<?}?>
			</ul>
		</div>
	<?} ?>
<?$this->EndViewTarget();?>


