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
// echo '<pre>'; var_dump($arResult); echo '</pre>';
if($arResult["ITEMS"]){?>
<div class="promolist">
    <ul class="promolist__list">
    	<?foreach($arResult["ITEMS"] as $arItem){
    		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    		$ended = $arItem["PROPERTIES"]["ENDED"]["VALUE"];
    		$activeClass = "_active";
    		$finishedClass = "";
    		if($ended){
    			$activeClass = "";
    			$finishedClass = "promolist__finished";
    			$arItem["PREVIEW_TEXT"] = "АКЦИЯ ЗАВЕРШЕНА";
    		}?>
	        <li id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="promolist__item <?=$activeClass?>">
	        	<?
	        	$pictId = $arItem["PREVIEW_PICTURE"]["ID"];
	        	if(!$pictId){
	        		$pictId = NO_PHOTO_ID;
	        	}
	        	?>
	        	<a href="javascript:void(0);" class="promolist__link" data-id="<?=$arItem["ID"]?>"><img src="<?=itc\Resizer::get($pictId, getPresetName("promoList", $pictId))?>" class="promolist__pic">
	                <div class="promolist__bottom">
	                	<?if($ended){?>
	                	<div class="promolist__unactive-pic"></div>
	                	<?}?>
	                    <div class="promolist__name"><?=$arItem["NAME"]?></div>
	                    <div class="promolist__desc <?=$finishedClass?>">
	                    	<?=$arItem["PREVIEW_TEXT"]?>
	                    </div>
	                </div>
	            </a>
	            <div class="promolist__description">
	                <?=$arItem["DETAIL_TEXT"]?>
	            </div>
	        </li>
    	<?}?>
    </ul>
    <?=$arResult["NAV_STRING"]?>
</div>
<?}?>