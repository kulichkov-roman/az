<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) {
	$class = '';
	if($arParams["PARAM"] <> "") {
		$class = $arParams["PARAM"];
	}
	?>
	<ul class="footer__<?=$class?>-menu">
		<?foreach($arResult as $arItem){?>
			<?if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
				continue;?>
			<li class="footer__menu-item"><a href="<?=$arItem["LINK"]?>" class="footer__menu-item-link"><?=$arItem["TEXT"]?></a></li>
		<?}?>
	</ul>
<?}?>