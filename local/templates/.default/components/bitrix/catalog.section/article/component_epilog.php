<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Loader;

global $APPLICATION, $USER;

$environment = \YT\Environment\EnvironmentManager::getInstance();

$APPLICATION->AddChainItem($arResult['NAME'],$APPLICATION->GetCurDir());
?>