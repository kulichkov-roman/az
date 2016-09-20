<div class="range-wrapper clearfix">
    <div class="re-block floatleft">
        <div class="re-col" for="range-data1"><span>Сумма:</span> <input type="text" id="range-data1" /> <span>руб.</span></div>
        <div class="range" id="range1"></div>
    </div>
    <div class="re-block floatleft">
        <div class="re-col" for="range-data2"><span>Срок:</span> <input type="text" id="range-data2" /> <span>дней</span></div>
        <div class="range" id="range2"></div>
    </div>
    <div class="re-block-select floatleft">
        <select>
            <option selected="selected">Способ получения</option>
            <option>На карту</option>
            <option>На счет в банке</option>
            <option>Доставка на дом</option>
        </select>
    </div>
    <div class="re-block floatleft">
        <button class="btn-site grey">Показать</button>
    </div>
</div>
<?
global $arrMainElemFilter;
$arrMainElemFilter = array('PROPERTY_SHOW_MAIN_PAGE_VALUE' => 'Y');
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
<div class="content-text">
    <h2>Нужны деньги? Возьми займ до зарплаты</h2>
    <p>Как ни старались люди, собравшись в одно небольшое место несколько сот тысяч, изуродовать ту землю, на которой они жались, как ни забивали камнями землю, чтобы ничего не росло на ней, как ни счищали всякую пробивающуюся травку, как ни дымили каменным углем и нефтью, как ни обрезывали деревья и ни выгоняли всех животных и птиц, - весна была весною даже и в городе.</p>
    <p>Солнце грело, трава, оживая, росла и зеленела везде, где только не соскребли ее, не только на газонах бульваров, но и между плитами камней, и березы, тополи, черемуха распускали свои клейкие и пахучие листья, липы надували лопавшиеся почки; галки, воробьи и голуби по-весеннему радостно готовили уже гнезда, и мухи жужжали у стен, пригретые солнцем. Веселы были и растения, и птицы, и насекомые, и дети.</p>
    <p>Но люди - большие, взрослые люди - не переставали обманывать и мучать себя и друг друга. Люди считали, что священно и важно не это весеннее утро, не эта красота мира божия, данная для блага всех существ, - красота, располагающая к миру, согласию и любви, а священно и важно то, что они сами выдумали, чтобы властвовать друг над другом. Так, в конторе губернской тюрьмы считалось священным и важным не то, что всем животным и людям даны умиление и радость весны, а считалось священным и важным то, что накануне получена была за номером с печатью и заголовком бумага о том, чтобы к девяти часам утра были доставлены в нынешний день, 28-го апреля, три содержащиеся в тюрьме подследственные арестанта - две женщины и один мужчина. Одна из этих женщин, как самая важная преступница, должна была быть доставлена отдельно.</p>
    <p>Как ни старались люди, собравшись в одно небольшое место несколько сот тысяч, изуродовать ту землю, на которой они жались, как ни забивали камнями землю, чтобы ничего не росло на ней, как ни счищали всякую пробивающуюся травку, как ни дымили каменным углем и нефтью, как ни обрезывали деревья и ни выгоняли всех животных и птиц, - весна была весною даже и в городе.</p>
    <p>Солнце грело, трава, оживая, росла и зеленела везде, где только не соскребли ее, не только на газонах бульваров, но и между плитами камней, и березы, тополи, черемуха распускали свои клейкие и пахучие листья, липы надували лопавшиеся почки; галки, воробьи и голуби по-весеннему радостно готовили уже гнезда, и мухи жужжали у стен, пригретые солнцем. Веселы были и растения, и птицы, и насекомые, и дети.</p>
    <p>Но люди - большие, взрослые люди - не переставали обманывать и мучать себя и друг друга. Люди считали, что священно и важно не это весеннее утро, не эта красота мира божия, данная для блага всех существ, - красота, располагающая к миру, согласию и любви, а священно и важно то, что они сами выдумали, чтобы властвовать друг над другом. Так, в конторе губернской тюрьмы считалось священным и важным не то, что всем животным и людям даны умиление и радость весны, а считалось священным и важным то, что накануне получена была за номером с печатью и заголовком бумага о том, чтобы к девяти часам утра были доставлены в нынешний день, 28-го апреля, три содержащиеся в тюрьме подследственные арестанта - две женщины и один мужчина. Одна из этих женщин, как самая важная преступница, должна была быть доставлена отдельно.</p>
</div>
