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
<div class="news-list" id="inform-block-popup" style="display: none">
<div class="inform-block">
<?
foreach($arResult["ITEMS"] as $arItem):
	if($arItem["DISPLAY_PROPERTIES"]["FORMAT_POKAZA"] && $arItem["DISPLAY_PROPERTIES"]["FORMAT_POKAZA"]["VALUE_XML_ID"] == "main"){
		if(!isset($_COOKIE['ShowInfoBlock'])){
			setcookie("ShowInfoBlock", "Y");
		}
	}else{
		if(!isset($_COOKIE['ShowInfoBlock'])){
			setcookie ("ShowInfoBlock", "", time() - 3600);
		}
	}
	?>
	<?echo $arItem["PREVIEW_TEXT"];?>
<?endforeach;?>
</div>
</div>
<?if($arResult["ITEMS"]){?>
	<?if(!isset($_COOKIE['ShowInfoBlock'])){?>
		<script>
		$( document ).ready(function() {
			console.log( "ready!" );
			var dialog = new Project.Blocks.Dialog(
				$('<div>').append($('#inform-block-popup').children().clone()),
				{
					title: 'Информационное сообщение',
				}
			);
			dialog.open();
		});
		</script>
	<?}?>
<?}?>