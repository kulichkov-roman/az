<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)){?>
	<ul class="company__menu">
		<?foreach($arResult as $arItem){?>
			<?if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
				continue;
			if($arItem["SELECTED"]){?>
				<li class="company__menu-item _selected"><span class="company__menu-link"><?=$arItem["TEXT"]?></span></li>
			<?} else {
				$id = '';
				if($arItem["PARAMS"]["LOGOUT"] == "YES"){
					$id = "id='logout_link'";
				}?>
				<li <?=$id?> class="company__menu-item"><a href="<?=$arItem["LINK"]?>" class="company__menu-link"><?=$arItem["TEXT"]?></a></li>
			<?}?>
		<?}?>
	</ul>
<?}?>
<script>
	$(document).ready(function(){
		$('#logout_link').click(function(){
			window.location.href = location.protocol + '//' + location.host + location.pathname + '?logout=yes';
		})
	})
</script>