<?
/**
 * Получить SEO описание раздела
 */
$environment = \YT\Environment\EnvironmentManager::getInstance();

$curDir = $APPLICATION->GetCurDir();
$arSort = array(
    'SORT'=>'ASC'
);
$arSelect = array(
    'ID',
    'NAME',
    'PREVIEW_TEXT'
);
$arFilter = array(
    'IBLOCK_ID' => $environment->get('seoSecIBlockId'),
    'NAME' => $curDir
);

$rsElements = CIBlockElement::GetList(
    $arSort,
    $arFilter,
    false,
    false,
    $arSelect
);

if ($arItem = $rsElements->GetNext())
{
    ?>
    <div class="content-text">
        <?=$arItem['PREVIEW_TEXT'];?>
    </div>
    <?
}
?>