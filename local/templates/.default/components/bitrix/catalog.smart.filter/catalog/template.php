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

<div class="range-wrapper clearfix">
	<div class="re-block floatleft">
		<div class="re-col" for="range-data1"><span>Сумма:</span> <input type="text" id="range-data1" /> <span>руб.</span></div>
		<div class="range" id="range1"></div>
	</div>
	<div class="re-block floatleft">
		<div class="re-col" for="range-data2"><span>Срок:</span> <input type="text" id="range-data2" /> <span>дней</span></div>
		<div class="range" id="range2"></div>
	</div>
	<div class="re-block-select floatleft">
		<select>
			<option selected="selected">Способ получения</option>
			<option>На карту</option>
			<option>На счет в банке</option>
			<option>Доставка на дом</option>
		</select>
	</div>
	<div class="re-block floatleft">
		<button class="btn-site grey">Показать</button>
	</div>
</div>

<?/*?>
<div class="catalog__show">
	<?if($arResult["SHOW_HIT"]){?>
		<span class="catalog__sort-text">Показать  —  </span>
	<?}?>
	<?foreach($arResult["ITEMS"] as $arItem){
		if($arItem["PROPERTY_TYPE"] == "L"){
			if(
				$arItem["CODE"] == "NOVINKA" ||
				$arItem["CODE"] == "AKTSII"  ||
				$arItem["CODE"] == "KHIT"
			) {
				?>
				<?foreach($arItem["VALUES"] as $val => $ar) {?>
					<a href="<?=$ar['FILTER_LINK']?>" class="catalog__sort-text <?=$ar['LINK_CLASS']?> _link"><?=$arItem["NAME"];?></a>
					<?
				}
			}
		}
	}?>
</div>
<?*/?>
