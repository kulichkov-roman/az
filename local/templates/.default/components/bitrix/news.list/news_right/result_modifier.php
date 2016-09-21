<?
$environment = \YT\Environment\EnvironmentManager::getInstance();

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */

$arPictureIds = array();
$arElementIds = array();
foreach($arResult["ITEMS"] as &$arItem)
{
    if(is_array($arItem["PREVIEW_PICTURE"]))
    {
        $arPictureIds[] = $arItem["PREVIEW_PICTURE"]["ID"];
    }
    $arElementIds[] = $arItem['ID'];

}
unset($arItem);

if(sizeof($arPictureIds) > 0)
{
    $strIds = implode(",", $arPictureIds);

    $fl = new CFile;

    $arOrder = array();
    $arFilter = array(
        "MODULE_ID" => "iblock",
        "@ID" => $strIds
    );

    $arPreviewPicture = array();

    $rsFile = $fl->GetList($arOrder, $arFilter);
    while($arItem = $rsFile->GetNext())
    {
        $arPreviewPicture[$arItem["ID"]] = $arItem;
        $urlPreviewPicture = itc\Resizer::get($arItem["ID"], 'w220h159cr');

        $arPreviewPicture[$arItem["ID"]]["SRC"] = $urlPreviewPicture;
    }

    foreach($arResult["ITEMS"] as &$arItem)
    {
        if(!$arItem["PREVIEW_PICTURE"]["SRC"] == "")
        {
            $arItem["PREVIEW_PICTURE"]["SRC"] = $arPreviewPicture[$arItem["PREVIEW_PICTURE"]["ID"]]["SRC"];
        }
        else
        {
            $arItem["PREVIEW_PICTURE"]["SRC"] = itc\Resizer::get($environment->get('w220h159crPlugId'), 'w220h159cr');
        }
    }
    unset($arItem);
}
else
{
    foreach($arResult["ITEMS"] as &$arItem)
    {
        $arItem["PREVIEW_PICTURE"]["SRC"] = itc\Resizer::get('w220h159crPlugId', 'w220h159cr');
    }
    unset($arItem);
}
?>
