<?
global $arrMainElemFilter;
$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter",
	"catalog",
	array(
		"IBLOCK_TYPE" => "dynamic_content",
		"IBLOCK_ID" => "4",
		"SECTION_ID" => '',
		"FILTER_NAME" => 'arrMainElemFilter',
		"PRICE_CODE" => '',
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => 3600000,
		"CACHE_GROUPS" => "N",
		"SAVE_IN_SESSION" => "N",
		"XML_EXPORT" => "Y",
		"SECTION_TITLE" => "NAME",
		"SECTION_DESCRIPTION" => "DESCRIPTION",
		"TEMPLATE_THEME" => 'blue',
		"COMPONENT_TEMPLATE" => "visual_horizontal",
		"SECTION_CODE" => "",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"SEF_MODE" => "N",
		"PAGER_PARAMS_NAME" => "arrPager"
	),
	false
);

$arrShowMainElemFilter = array('PROPERTY_SHOW_MAIN_PAGE_VALUE' => 'Y');
$arrMainElemFilter = array_merge($arrShowMainElemFilter, $arrMainElemFilter);

$APPLICATION->IncludeComponent(
	"bitrix:catalog.top", 
	"main", 
	array(
		"IBLOCK_TYPE" => "dynamic_content",
		"IBLOCK_ID" => "4",
		"ELEMENT_SORT_FIELD" => "shows",
		"ELEMENT_SORT_ORDER" => "asc",
		"SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
		"DETAIL_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "20",
		"LINE_ELEMENT_COUNT" => "1",
		"PROPERTY_CODE" => array(
			0 => "SOLVE",
			1 => "TIME",
			2 => "LINK",
			3 => "RATE",
			4 => "SUM",
			5 => "",
		),
		"OFFERS_LIMIT" => "5",
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"USE_PRODUCT_QUANTITY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"CONVERT_CURRENCY" => "N",
		"COMPONENT_TEMPLATE" => "main",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => 'arrMainElemFilter',
		"VIEW_MODE" => "SECTION",
		"TEMPLATE_THEME" => "",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"SEF_MODE" => "N",
		"CACHE_FILTER" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PARTIAL_PRODUCT_PROPERTIES" => "N"
	),
	false
);
?>
