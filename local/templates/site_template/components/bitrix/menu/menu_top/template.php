<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)){?>
	<ul class="header__menu-list">
		<?foreach($arResult as $arItem){?>
			<?if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
				continue;
			if($arItem["SELECTED"] && !$bShowLink){
				?>
				<li class="header__menu-item _selected">
					<?$bShowLink = $APPLICATION -> GetCurPage() != $arItem["LINK"];
					if(!$bShowLink){
						$arItem["LINK"] = "javascript:void(0);";
					}?>
					<a href="<?=$arItem["LINK"]?>" class="header__menu-item-link"><?=$arItem["TEXT"]?></a>
				</li>
			<?} else {?>
				<li class="header__menu-item"><a href="<?=$arItem["LINK"]?>" class="header__menu-item-link"><?=$arItem["TEXT"]?></a></li>
			<?}?>
		<?}?>
	</ul>
<?}?>