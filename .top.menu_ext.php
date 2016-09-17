<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

$environment = \YT\Environment\EnvironmentManager::getInstance();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    'bitrix:menu.sections',
    '',
    Array(
        'IS_SEF' => 'Y',
        'SEF_BASE_URL' => $environment->get('catalogPageUrl'),
        'SECTION_PAGE_URL' => '#SECTION_CODE#/',
        'IBLOCK_TYPE' => $environment->get('dynamicContentIBlockType'),
        'IBLOCK_ID' => $environment->get('catalogIBlockId'),
        'DEPTH_LEVEL' => '4',
        'CACHE_TYPE' => 'A',
        'CACHE_TIME' => '3600'
    )
);

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
?>
