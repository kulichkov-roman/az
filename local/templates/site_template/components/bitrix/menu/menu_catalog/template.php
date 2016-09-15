<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)){?>
	<ul class="main-menu__list">
		<?foreach($arResult as $arItem){?>
			<?if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
				continue;
			if($arItem["SELECTED"]){?>
				<li class="main-menu__item _selected">
					<a href="<?=$arItem["LINK"]?>" class="main-menu__item-link">
						<p class="main-menu__item-name"><span class="main-menu__item-line"><?=$arItem["TEXT"]?></span></p>
					</a>
				</li>
			<?} else {?>
				<li class="main-menu__item">
					<a href="<?=$arItem["LINK"]?>" class="main-menu__item-link">
						<p class="main-menu__item-name"><span class="main-menu__item-line"><?=$arItem["TEXT"]?></span></p>
					</a>
				</li>
			<?}?>
		<?}?>
	</ul>
<?}?>