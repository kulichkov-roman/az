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
    $arResult['DETAIL_PICTURE']['SRC'] = itc\Resizer::get($environment->get('w120р70crPlugId'), 'w120р70cr');
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
        $urlDetailPicture = itc\Resizer::get($arItem['ID'], 'w120р70cr');

        $arResult['DETAIL_PICTURE']['SRC'] = $urlDetailPicture;
    }
}
?>
