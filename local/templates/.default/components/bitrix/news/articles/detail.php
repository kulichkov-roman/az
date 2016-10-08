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

$environment = \YT\Environment\EnvironmentManager::getInstance();

global $arrArticleFilter;
?>

<?$APPLICATION->ShowViewContent('newsDate');?>
<div class="content-text">
	<div class="single-news-art-wrapper">
		<?$ElementID = $APPLICATION->IncludeComponent(
			"bitrix:news.detail",
			"articles",
			Array(
				"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
				"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
				"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
				"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
				"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
				"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
				"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"META_KEYWORDS" => $arParams["META_KEYWORDS"],
				"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
				"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
				"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
				"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
				"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
				"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
				"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
				"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
				"CHECK_DATES" => $arParams["CHECK_DATES"],
				"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
				"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
				"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
				"USE_SHARE" 			=> $arParams["USE_SHARE"],
				"SHARE_HIDE" 			=> $arParams["SHARE_HIDE"],
				"SHARE_TEMPLATE" 		=> $arParams["SHARE_TEMPLATE"],
				"SHARE_HANDLERS" 		=> $arParams["SHARE_HANDLERS"],
				"SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
				"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
				"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : '')
			),
			$component
		);?>
		<div class="navigation-row">
			<i class="fa fa-long-arrow-left" aria-hidden="true"></i> <a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"]?>">К списку статей</a>
		</div>
		<?
		$arSort = array(
			"SORT"=>"ASC"
		);
		$arSelect = array(
			"ID",
			"NAME",
		    "PROPERTY_LINK_MFO"
		);
		$arFilter = array(
			"IBLOCK_ID" => $environment->get('articlesIBlockId'),
			"ID" => $ElementID
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
			if(!empty($arItem['PROPERTY_LINK_MFO_VALUE']))
			{
				$arElementIds = $arItem['PROPERTY_LINK_MFO_VALUE'];
			}
		}

		if(!empty($arElementIds))
		{
			$arrArticleFilter = array('ID' => $arElementIds);
			$intSectionID = $APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"article",
				array(
					"COMPONENT_TEMPLATE" => "article",
					"IBLOCK_TYPE" => "dynamic_content",
					"IBLOCK_ID" => "4",
					"SECTION_ID" => $_REQUEST["SECTION_ID"],
					"SECTION_CODE" => "",
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER2" => "desc",
					"FILTER_NAME" => "arrArticleFilter",
					"USE_FILTER" => "Y",
					"INCLUDE_SUBSECTIONS" => "Y",
					"SHOW_ALL_WO_SECTION" => "Y",
					"PAGE_ELEMENT_COUNT" => "30",
					"LINE_ELEMENT_COUNT" => "3",
					"PROPERTY_CODE" => array(
						0 => "SHOW_MAIN_PAGE",
						1 => "SHOW_RATING_PAGE",
						2 => "SOLVE",
						3 => "SORT_RATING",
						4 => "PROCESS_PREPARING",
						5 => "TIME",
						6 => "LINK",
						7 => "RATE",
						8 => "SUM",
						9 => "",
					),
					"OFFERS_LIMIT" => "5",
					"BACKGROUND_IMAGE" => "-",
					"SECTION_URL" => "",
					"DETAIL_URL" => "",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SEF_MODE" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"SET_TITLE" => "N",
					"SET_BROWSER_TITLE" => "N",
					"BROWSER_TITLE" => "-",
					"SET_META_KEYWORDS" => "Y",
					"META_KEYWORDS" => "-",
					"SET_META_DESCRIPTION" => "N",
					"META_DESCRIPTION" => "-",
					"SET_LAST_MODIFIED" => "N",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"CACHE_FILTER" => "N",
					"ACTION_VARIABLE" => "action",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRICE_CODE" => array(
					),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"PRICE_VAT_INCLUDE" => "Y",
					"BASKET_URL" => "/personal/basket.php",
					"USE_PRODUCT_QUANTITY" => "N",
					"PRODUCT_QUANTITY_VARIABLE" => "",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRODUCT_PROPERTIES" => array(
					),
					"PAGER_TEMPLATE" => ".default",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => "Товары",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"SET_STATUS_404" => "N",
					"SHOW_404" => "N",
					"MESSAGE_404" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"TEMPLATE_THEME" => "blue",
					"ADD_PICT_PROP" => "",
					"LABEL_PROP" => "SHOW_MAIN_PAGE",
					"MESS_BTN_BUY" => "",
					"MESS_BTN_ADD_TO_BASKET" => "",
					"MESS_BTN_SUBSCRIBE" => "",
					"MESS_BTN_DETAIL" => "",
					"MESS_NOT_AVAILABLE" => ""
				),
				false
			);
		}
		?>
	</div>
</div>
<?$APPLICATION->ShowViewContent('moreNews');?>
