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

$environment = \YT\Environment\EnvironmentManager::getInstance();

echo "<pre>"; var_dump(); echo "</pre>";

?>
<?if (!empty($arResult['ITEMS'])){?>
	<div class="result-wrapper">
		<div class="result-name-col clearfix">
			<div class="rn-col floatleft">Компания</div>
			<div class="rn-col floatleft">Ставка</div>
			<div class="rn-col floatleft">Сумма</div>
			<div class="rn-col floatleft">Срок</div>
			<div class="rn-col floatleft">Решение</div>
		</div>
		<?foreach($arResult['ITEMS'] as $arItem){
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT'));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM'))); ?>
			<div class="result-item clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="co-logo floatleft">
					<div class="img-logo">
						<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"] ? $arItem["PROPERTIES"]["LINK"]["VALUE"] : '';?>">
							<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" title="<?=$arItem['NAME']?>" alt="<?=$arItem['NAME']?>" />
						</a>
					</div>
				</div>
				<div class="co-data-wr clearfix floatleft">
					<div class="co-data floatleft">
						<div class="mb-data-rn">Ставка</div>
						<div class="co-data-cond"><?=$arItem["PROPERTIES"]["RATE"]["VALUE"] ? $arItem["PROPERTIES"]["RATE"]["VALUE"].'%' : '-'?></div>
						<div class="co-data-name">в день</div>
					</div>
					<div class="co-data floatleft">
						<div class="mb-data-rn">Сумма</div>
						<div class="co-data-cond"><?=$arItem["PROPERTIES"]["SUM"]["VALUE"] ? $arItem["PROPERTIES"]["SUM"]["VALUE"] : '-'?></div>
						<div class="co-data-name">руб.</div>
					</div>
					<div class="co-data floatleft">
						<div class="mb-data-rn">Срок</div>
						<div class="co-data-cond"><?=$arItem["PROPERTIES"]["TIME"]["VALUE"] ? $arItem["PROPERTIES"]["TIME"]["VALUE"] : '-'?></div>
						<div class="co-data-name">дней</div>
					</div>
					<div class="co-data floatleft">
						<div class="mb-data-rn">Решение</div>
						<div class="co-data-cond">
							<?=$arItem["PROPERTIES"]["SOLVE"]["VALUE"] ? $arItem["PROPERTIES"]["SOLVE"]["VALUE"] : '-'?>
						</div>
						<div class="co-data-name">минут</div>
					</div>
				</div>
				<?if($arItem["PROPERTIES"]["LINK"]["VALUE"] <> ''){?>
					<div class="co-data mbt-btn floatleft">
						<a target="_blank" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="btn-site orange">Оформить</a>
					</div>
				<?}?>
			</div>
		<?}?>
	</div>
<?}?>
