<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$CMenuHelper = new \AZ\Helper\MenuHelper();

$arParentIds = array();
foreach($arResult as $key => $arItem){
    $arItem["ID"] = $key;
    if($arItem["IS_PARENT"]){
        $arParentIds[$arItem["DEPTH_LEVEL"]] = $key;
    }
    if($arItem["DEPTH_LEVEL"]>1){
        $arItem["PARENT_ID"] = $arParentIds[$arItem["DEPTH_LEVEL"] - 1];
    }
    $arResult[$key] = $arItem;
}
$arResult = $CMenuHelper->buildTree($arResult);
?>
