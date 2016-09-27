<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();?>
<?
$environment = \YT\Environment\EnvironmentManager::getInstance();

$id = '';
if(is_array($arResult['DETAIL_PICTURE']))
{
    $id = $arResult['DETAIL_PICTURE']['ID'];
}
else
{
    $arResult['DETAIL_PICTURE']['SRC'] = itc\Resizer::get($environment->get('w640h480atPlugId'), 'w640h480at');
}

if($id <> '')
{
    $fl = new CFile;

    $arOrder = array();
    $arFilter = array(
        'MODULE_ID' => 'iblock',
        '@ID' => $id
    );

    $arDetailPicture = array();

    $rsFile = $fl->GetList($arOrder, $arFilter);

    if($arItem = $rsFile->GetNext())
    {
        $arDetailPicture[$arItem['ID']] = $arItem;
        $urlDetailPicture = itc\Resizer::get($arItem['ID'], 'w640h480at');

        $arResult['DETAIL_PICTURE']['SRC'] = $urlDetailPicture;
    }
}

/**
 * Получить названия для блока смотреть также
 */
$arIds = array();

if(is_array($arResult['PROPERTIES']['MORE']['VALUE']) && count($arResult['PROPERTIES']['MORE']['VALUE']) > 0)
{
    foreach ($arResult['PROPERTIES']['MORE']['VALUE'] as $id)
    {
        $arIds[] = $id;
    }

    $arSort = array(
        'SORT'=>'ASC'
    );
    $arSelect = array(
        'ID',
        'NAME',
        'CODE'
    );
    $arFilter = array(
        'IBLOCK_ID' => $environment->get('newsIBlockId'),
        'ID' => $arIds
    );

    $rsElements = CIBlockElement::GetList(
        $arSort,
        $arFilter,
        false,
        false,
        $arSelect
    );

    $arMoreNews = array();
    while ($arItem = $rsElements->Fetch())
    {
        $arMoreNews[$arItem['ID']] = $arItem;
    }

    foreach ($arResult['PROPERTIES']['MORE']['VALUE'] as &$item)
    {
        $item = array(
            'NAME' => $arMoreNews[$item]['NAME'],
            'LINK' => $environment->get('newsPageUrl').$arMoreNews[$item]['CODE'].'/'
        );
    }
}
?>
