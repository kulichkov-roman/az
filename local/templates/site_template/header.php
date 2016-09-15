<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html class="no-js" lang="<?=LANGUAGE_ID?>">
<head>
	<meta name="viewport" content="width=1200">
	<title><?$APPLICATION->ShowTitle()?></title>
	<?
	CJSCore::Init();

	$environment = \YT\Environment\EnvironmentManager::getInstance();
	$defaultSiteTemplateUrl = $environment->get('defaultSiteTemplateUrl');

	$arPageClassesTemplates   = $environment->get('pageClassesTemplates');
	$arBodyClassesTemplates   = $environment->get('bodyClassesTemplates');

	$APPLICATION->SetAdditionalCSS($defaultSiteTemplateUrl . '/css/style.css');
	$APPLICATION->SetAdditionalCSS($defaultSiteTemplateUrl . '/css/developers.css');

	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery-2.2.0.min.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery.form.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery.validate.min.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery-ui.min.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/ui.punch.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery.fs.selecter.min.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/custom.js');

	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/developers.js');

	// is main page
	$isMain = false;
	if ($APPLICATION->GetCurPage(true)==SITE_DIR.'index.php') {
		$isMain = true;
	}
	// is gallery page
	$isGallery = false;
	if (strpos($APPLICATION->GetCurPage(true), SITE_DIR.'gallery/') !== false) {
		$isGallery = true;
	}

	$APPLICATION->AddHeadString('
		<link rel="shortcut icon" href="/local/images/favicon.png" />
	');
	?>
	<!--[if lt IE 9]>
	<script src="../.default/js/html5shiv.min.js"></script>
	<![endif]-->
	<?$APPLICATION->ShowHead()?>
	<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
		Array(
			'AREA_FILE_SHOW' => 'file',
			'PATH' => '/local/include/site_templates/hd_ga.php',
			'EDIT_TEMPLATE' => ''
		),
		false
	);?>
</head>
<body>
	<?$APPLICATION->ShowPanel();?>
	<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
		Array(
			'AREA_FILE_SHOW' => 'file',
			'PATH' => '/local/include/site_templates/hd_ya.php',
			'EDIT_TEMPLATE' => ''
		),
		false
	);?>
	<div class="wrapper">

		<!-- Header -->
		<div class="header clearfix">
			<div class="logo floatleft">
				<a href="#0">
					<img src="/local/images/logo.png" alt="" />
				</a>
			</div>
			<div class="banner floatleft">
				<img src="/local/images/banner.png" alt="" />
			</div>
			<button class="toggle-nav"><span></span></button>
		</div>

		<!-- Menu -->
		<div class="menu">
			<div class="nav-close"></div>
			<ul class="clearfix">
				<li>
					<a href="#0">Займы онлайн <i class="fa fa-angle-down" aria-hidden="true"></i></a>
					<ul class="sub-menu">
						<li>
							<a href="#0">Займы онлайн на банковский счет</a>
						</li>
						<li>
							<a href="#0">Займы онлайн с плохой кредитной историей</a>
						</li>
						<li>
							<a href="#0">Займы онлайн без паспорта</a>
						</li>
						<li>
							<a href="#0">Займы онлайн наличными</a>
						</li>
						<li>
							<a href="#0">Займы онлайн на карту</a>
						</li>
						<li>
							<a href="#0">Займы онлайн с просрочками</a>
						</li>
						<li>
							<a href="#0">Займы онлайн без кредитной истории</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#0">Экспресс займы <i class="fa fa-angle-down" aria-hidden="true"></i></a>
					<ul class="sub-menu">
						<li>
							<a href="#0">Займы онлайн на банковский счет</a>
						</li>
						<li>
							<a href="#0">Займы онлайн с плохой кредитной историей</a>
						</li>
						<li>
							<a href="#0">Займы онлайн без паспорта</a>
						</li>
						<li>
							<a href="#0">Займы онлайн наличными</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#0">Займы без отказа <i class="fa fa-angle-down" aria-hidden="true"></i></a>
					<ul class="sub-menu">
						<li>
							<a href="#0">Займы онлайн на банковский счет</a>
						</li>
						<li>
							<a href="#0">Займы онлайн с плохой кредитной историей</a>
						</li>
						<li>
							<a href="#0">Займы онлайн без паспорта</a>
						</li>
						<li>
							<a href="#0">Займы онлайн наличными</a>
						</li>
						<li>
							<a href="#0">Займы онлайн на карту</a>
						</li>
						<li>
							<a href="#0">Займы онлайн с просрочками</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#0">Под 0% <i class="fa fa-angle-down" aria-hidden="true"></i></a>
					<ul class="sub-menu">
						<li>
							<a href="#0">Займы онлайн на банковский счет</a>
						</li>
						<li>
							<a href="#0">Займы онлайн с плохой кредитной историей</a>
						</li>
						<li>
							<a href="#0">Займы онлайн без паспорта</a>
						</li>
						<li>
							<a href="#0">Займы онлайн наличными</a>
						</li>
						<li>
							<a href="#0">Займы онлайн на карту</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#0">Рейтинг займов <i class="fa fa-angle-down" aria-hidden="true"></i></a>
					<ul class="sub-menu">
						<li>
							<a href="#0">Займы онлайн на банковский счет</a>
						</li>
						<li>
							<a href="#0">Займы онлайн с плохой кредитной историей</a>
						</li>
						<li>
							<a href="#0">Займы онлайн без паспорта</a>
						</li>
						<li>
							<a href="#0">Займы онлайн наличными</a>
						</li>
						<li>
							<a href="#0">Займы онлайн на карту</a>
						</li>
						<li>
							<a href="#0">Займы онлайн с просрочками</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>

		<!-- Content -->
		<div class="content clearfix">
			<div class="content-side floatleft">
				<h1>Подбери лучший вариант</h1>
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
				<div class="result-wrapper">
					<div class="result-name-col clearfix">
						<div class="rn-col floatleft">Компания</div>
						<div class="rn-col floatleft">Ставка</div>
						<div class="rn-col floatleft">Сумма</div>
						<div class="rn-col floatleft">Срок</div>
						<div class="rn-col floatleft">Решение</div>
					</div>
					<div class="result-item clearfix">
						<div class="co-logo floatleft">
							<div class="img-logo">
								<a href="#0">
									<img src="/local/images/comp1.png" alt="" />
								</a>
							</div>
						</div>
						<div class="co-data-wr clearfix floatleft">
							<div class="co-data floatleft">
								<div class="mb-data-rn">Ставка</div>
								<div class="co-data-cond">0.63%</div>
								<div class="co-data-name">в день</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Сумма</div>
								<div class="co-data-cond">30 000</div>
								<div class="co-data-name">руб.</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Срок</div>
								<div class="co-data-cond">125</div>
								<div class="co-data-name">дней</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Решение</div>
								<div class="co-data-cond">30</div>
								<div class="co-data-name">минут</div>
							</div>
						</div>
						<div class="co-data mbt-btn floatleft">
							<a href="#0" class="btn-site orange">Оформить</a>
						</div>
					</div>
					<div class="result-item clearfix">
						<div class="co-logo floatleft">
							<div class="img-logo">
								<a href="#0">
									<img src="/local/images/comp2.png" alt="" />
								</a>
							</div>
						</div>
						<div class="co-data-wr clearfix floatleft">
							<div class="co-data floatleft">
								<div class="mb-data-rn">Ставка</div>
								<div class="co-data-cond">0.63%</div>
								<div class="co-data-name">в день</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Сумма</div>
								<div class="co-data-cond">30 000</div>
								<div class="co-data-name">руб.</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Срок</div>
								<div class="co-data-cond">125</div>
								<div class="co-data-name">дней</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Решение</div>
								<div class="co-data-cond">30</div>
								<div class="co-data-name">минут</div>
							</div>
						</div>
						<div class="co-data mbt-btn floatleft">
							<a href="#0" class="btn-site orange">Оформить</a>
						</div>
					</div>
					<div class="result-item clearfix">
						<div class="co-logo floatleft">
							<div class="img-logo">
								<a href="#0">
									<img src="/local/images/comp3.png" alt="" />
								</a>
							</div>
						</div>
						<div class="co-data-wr clearfix floatleft">
							<div class="co-data floatleft">
								<div class="mb-data-rn">Ставка</div>
								<div class="co-data-cond">0.63%</div>
								<div class="co-data-name">в день</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Сумма</div>
								<div class="co-data-cond">30 000</div>
								<div class="co-data-name">руб.</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Срок</div>
								<div class="co-data-cond">125</div>
								<div class="co-data-name">дней</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Решение</div>
								<div class="co-data-cond">30</div>
								<div class="co-data-name">минут</div>
							</div>
						</div>
						<div class="co-data mbt-btn floatleft">
							<a href="#0" class="btn-site orange">Оформить</a>
						</div>
					</div>
					<div class="result-item clearfix">
						<div class="co-logo floatleft">
							<div class="img-logo">
								<a href="#0">
									<img src="/local/images/comp4.png" alt="" />
								</a>
							</div>
						</div>
						<div class="co-data-wr clearfix floatleft">
							<div class="co-data floatleft">
								<div class="mb-data-rn">Ставка</div>
								<div class="co-data-cond">0.63%</div>
								<div class="co-data-name">в день</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Сумма</div>
								<div class="co-data-cond">30 000</div>
								<div class="co-data-name">руб.</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Срок</div>
								<div class="co-data-cond">125</div>
								<div class="co-data-name">дней</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Решение</div>
								<div class="co-data-cond">30</div>
								<div class="co-data-name">минут</div>
							</div>
						</div>
						<div class="co-data mbt-btn floatleft">
							<a href="#0" class="btn-site orange">Оформить</a>
						</div>
					</div>
					<div class="result-item clearfix">
						<div class="co-logo floatleft">
							<div class="img-logo">
								<a href="#0">
									<img src="/local/images/comp5.png" alt="" />
								</a>
							</div>
						</div>
						<div class="co-data-wr clearfix floatleft">
							<div class="co-data floatleft">
								<div class="mb-data-rn">Ставка</div>
								<div class="co-data-cond">0.63%</div>
								<div class="co-data-name">в день</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Сумма</div>
								<div class="co-data-cond">30 000</div>
								<div class="co-data-name">руб.</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Срок</div>
								<div class="co-data-cond">125</div>
								<div class="co-data-name">дней</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Решение</div>
								<div class="co-data-cond">30</div>
								<div class="co-data-name">минут</div>
							</div>
						</div>
						<div class="co-data mbt-btn floatleft">
							<a href="#0" class="btn-site orange">Оформить</a>
						</div>
					</div>
					<div class="result-item clearfix">
						<div class="co-logo floatleft">
							<div class="img-logo">
								<a href="#0">
									<img src="/local/images/comp1.png" alt="" />
								</a>
							</div>
						</div>
						<div class="co-data-wr clearfix floatleft">
							<div class="co-data floatleft">
								<div class="mb-data-rn">Ставка</div>
								<div class="co-data-cond">0.63%</div>
								<div class="co-data-name">в день</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Сумма</div>
								<div class="co-data-cond">30 000</div>
								<div class="co-data-name">руб.</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Срок</div>
								<div class="co-data-cond">125</div>
								<div class="co-data-name">дней</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Решение</div>
								<div class="co-data-cond">30</div>
								<div class="co-data-name">минут</div>
							</div>
						</div>
						<div class="co-data mbt-btn floatleft">
							<a href="#0" class="btn-site orange">Оформить</a>
						</div>
					</div>
					<div class="result-item clearfix">
						<div class="co-logo floatleft">
							<div class="img-logo">
								<a href="#0">
									<img src="/local/images/comp2.png" alt="" />
								</a>
							</div>
						</div>
						<div class="co-data-wr clearfix floatleft">
							<div class="co-data floatleft">
								<div class="mb-data-rn">Ставка</div>
								<div class="co-data-cond">0.63%</div>
								<div class="co-data-name">в день</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Сумма</div>
								<div class="co-data-cond">30 000</div>
								<div class="co-data-name">руб.</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Срок</div>
								<div class="co-data-cond">125</div>
								<div class="co-data-name">дней</div>
							</div>
							<div class="co-data floatleft">
								<div class="mb-data-rn">Решение</div>
								<div class="co-data-cond">30</div>
								<div class="co-data-name">минут</div>
							</div>
						</div>
						<div class="co-data mbt-btn floatleft">
							<a href="#0" class="btn-site orange">Оформить</a>
						</div>
					</div>
				</div>
				<div class="content-text">
					<h2>Нужны деньги? Возьми займ до зарплаты</h2>
					<p>Как ни старались люди, собравшись в одно небольшое место несколько сот тысяч, изуродовать ту землю, на которой они жались, как ни забивали камнями землю, чтобы ничего не росло на ней, как ни счищали всякую пробивающуюся травку, как ни дымили каменным углем и нефтью, как ни обрезывали деревья и ни выгоняли всех животных и птиц, - весна была весною даже и в городе.</p>
					<p>Солнце грело, трава, оживая, росла и зеленела везде, где только не соскребли ее, не только на газонах бульваров, но и между плитами камней, и березы, тополи, черемуха распускали свои клейкие и пахучие листья, липы надували лопавшиеся почки; галки, воробьи и голуби по-весеннему радостно готовили уже гнезда, и мухи жужжали у стен, пригретые солнцем. Веселы были и растения, и птицы, и насекомые, и дети.</p>
					<p>Но люди - большие, взрослые люди - не переставали обманывать и мучать себя и друг друга. Люди считали, что священно и важно не это весеннее утро, не эта красота мира божия, данная для блага всех существ, - красота, располагающая к миру, согласию и любви, а священно и важно то, что они сами выдумали, чтобы властвовать друг над другом. Так, в конторе губернской тюрьмы считалось священным и важным не то, что всем животным и людям даны умиление и радость весны, а считалось священным и важным то, что накануне получена была за номером с печатью и заголовком бумага о том, чтобы к девяти часам утра были доставлены в нынешний день, 28-го апреля, три содержащиеся в тюрьме подследственные арестанта - две женщины и один мужчина. Одна из этих женщин, как самая важная преступница, должна была быть доставлена отдельно.</p>
					<p>Как ни старались люди, собравшись в одно небольшое место несколько сот тысяч, изуродовать ту землю, на которой они жались, как ни забивали камнями землю, чтобы ничего не росло на ней, как ни счищали всякую пробивающуюся травку, как ни дымили каменным углем и нефтью, как ни обрезывали деревья и ни выгоняли всех животных и птиц, - весна была весною даже и в городе.</p>
					<p>Солнце грело, трава, оживая, росла и зеленела везде, где только не соскребли ее, не только на газонах бульваров, но и между плитами камней, и березы, тополи, черемуха распускали свои клейкие и пахучие листья, липы надували лопавшиеся почки; галки, воробьи и голуби по-весеннему радостно готовили уже гнезда, и мухи жужжали у стен, пригретые солнцем. Веселы были и растения, и птицы, и насекомые, и дети.</p>
					<p>Но люди - большие, взрослые люди - не переставали обманывать и мучать себя и друг друга. Люди считали, что священно и важно не это весеннее утро, не эта красота мира божия, данная для блага всех существ, - красота, располагающая к миру, согласию и любви, а священно и важно то, что они сами выдумали, чтобы властвовать друг над другом. Так, в конторе губернской тюрьмы считалось священным и важным не то, что всем животным и людям даны умиление и радость весны, а считалось священным и важным то, что накануне получена была за номером с печатью и заголовком бумага о том, чтобы к девяти часам утра были доставлены в нынешний день, 28-го апреля, три содержащиеся в тюрьме подследственные арестанта - две женщины и один мужчина. Одна из этих женщин, как самая важная преступница, должна была быть доставлена отдельно.</p>
				</div>
			</div>
			<div class="sidebar floatright">
				<div class="sidebar-item">
					<div class="sr-title"><i class="fa-card-icon"></i>Как получить</div>
					<ul>
						<li>
							<a href="#0">на QIWI кошелек</a>
						</li>
						<li>
							<a href="#0">на Яндекс.Деньги</a>
						</li>
						<li>
							<a href="#0">на банковскую карту</a>
						</li>
						<li>
							<a href="#0">на расчетный счет</a>
						</li>
						<li>
							<a href="#0">через Unistream</a>
						</li>
						<li>
							<a href="#0">через Contact</a>
						</li>
					</ul>
				</div>
				<div class="sidebar-item">
					<div class="sr-title"><i class="fa fa-star-o" aria-hidden="true"></i>Рейтинг МФО</div>
					<ul class="dechimal-list">
						<li>
							<a href="#0">Zaimo.ru/Kredito24</a>
						</li>
						<li>
							<a href="#0">Moneyman (Манимен)</a>
						</li>
						<li>
							<a href="#0">еКапуста (ekapusta)</a>
						</li>
						<li>
							<a href="#0">Займер (Zaymer)</a>
						</li>
						<li>
							<a href="#0">GreenMoney (Грин Мани)</a>
						</li>
					</ul>
				</div>
				<div class="sidebar-item">
					<div class="sr-title"><i class="fa fa-comments-o" aria-hidden="true"></i>Вопрос-ответ</div>
					<ul>
						<li>
							<a href="#0">Чему равна предельная стоимость микрозайма?</a>
						</li>
						<li>
							<a href="#0">Чему равна предельная стоимость микрозайма?</a>
						</li>
						<li>
							<a href="#0">Чему равна предельная стоимость микрозайма?</a>
						</li>
					</ul>
				</div>
				<div class="sidebar-item">
					<div class="sr-title"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Новости</div>
					<div class="sr-news-art-item">
						<div class="sr-news-title">
							<a href="#0">Корпорация МСП уменьшила требования к банкам по программе 6,5</a>
						</div>
					</div>
					<div class="sr-news-art-item">
						<div class="sr-news-date">10.07.2016</div>
						<div class="sr-news-title">
							<a href="#0">В Deutsche Bank считают, что финансовая система ЕС требует срочного вливания $150 миллиардов</a>
						</div>
					</div>
					<div class="sr-news-art-item">
						<div class="sr-news-date">10 июля 2016</div>
						<div class="sr-news-title">
							<a href="#0">Капитализация Сбербанка превысила 3 триллиона рублей.</a>
						</div>
					</div>
				</div>
				<div class="sidebar-item">
					<div class="sr-banner">
						<a href="#0">
							<img src="/local/images/banner2.png" alt="" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
