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
<div class="legal"> 
    <div class="legal__list">
    	<?foreach($arResult["ITEMS"] as $arItem){?>
    	    <?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
	        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="legal__item legal_item_load" data-legal_item_id="<?=$arItem["ID"]?>"><a href="javascript:void(0);" class="legal__link click_legal_link"><span class="legal__link-text"><?=$arItem["NAME"]?></span></a>
	            <div class="legal__description">
	               <?=$arItem["DETAIL_TEXT"]?> 
	            </div>
	        </div>
    	<?}?>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var pageHash = window.location.hash;
		if(pageHash != ''){
			var arHashParts = pageHash.split("=");
			if(arHashParts[0] == '#legal_item_id'){
				var legalItemId = arHashParts[1];

				$('.legal_item_load[data-legal_item_id="' + legalItemId + '"]').find('.click_legal_link').click();
			}
		}
	});
</script>
<?}?>