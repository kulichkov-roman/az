<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html class="no-js" lang="<?=LANGUAGE_ID?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="cmsmagazine" content="f3a6695dfcc9f3ed1b584c8b48702bc0" />
	<link rel="manifest" href="/manifest.json">
	<title><?$APPLICATION->ShowTitle()?></title>
	<?if(strpos($APPLICATION->GetCurDir(), 'catalog')):?>
	<link rel="canonical" href="https://allzaims.ru<?=$APPLICATION->GetCurDir();?>">
 	<?endif;?>
	<?
	CJSCore::Init();

	$environment = \YT\Environment\EnvironmentManager::getInstance();
	$defaultSiteTemplateUrl = $environment->get('defaultSiteTemplateUrl');

	$arPageClassesTemplates = $environment->get('pageClassesTemplates');
	$arBodyClassesTemplates = $environment->get('bodyClassesTemplates');

	$APPLICATION->SetAdditionalCSS($defaultSiteTemplateUrl . '/css/style.css');
	$APPLICATION->SetAdditionalCSS($defaultSiteTemplateUrl . '/css/developers.css');

	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery-2.2.0.min.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery.form.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery.validate.min.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery-ui.min.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/ui.punch.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery.fs.selecter.min.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/custom.js');
	$APPLICATION->AddHeadScript($defaultSiteTemplateUrl . '/js/jquery.simplemodal.js');

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
		<link rel="shortcut icon" href="/favicon.ico" />
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
				<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
					Array(
						'AREA_FILE_SHOW' => 'file',
						'PATH' => '/local/include/site_templates/hd_logo.php',
						'EDIT_TEMPLATE' => ''
					),
					false
				);?>
			</div>
			<div class="banner floatleft">
				<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
					Array(
						'AREA_FILE_SHOW' => 'file',
						'PATH' => '/local/include/site_templates/hd_banner.php',
						'EDIT_TEMPLATE' => ''
					),
					false
				);?>
			</div>
			<button class="toggle-nav"><span></span></button>
		</div>
		<!-- Menu -->
		<div class="menu">
			<div class="nav-close"></div>
			<?$APPLICATION->IncludeComponent('bitrix:main.include', '',
				Array(
					'AREA_FILE_SHOW' => 'file',
					'PATH' => '/local/include/site_templates/hd_main_menu.php',
					'EDIT_TEMPLATE' => ''
				),
				false,
				Array('HIDE_ICONS' => 'Y')
			);?>
		</div>
		<!-- Content -->
		<div class="content clearfix">
			<div class="content-side floatleft">
				<?if(!$isMain){?>

					<?
					$APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"breadcrumb",
						Array(
							"START_FROM"    => "0",     // Номер пункта, начиная с которого будет построена навигационная цепочка
							"PATH"          => "",      // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
							"SITE_ID"       => "s1",     // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
						)
					);
					?>
				<?}?>
				<h1><?$APPLICATION->ShowTitle(false)?></h1>
<?
$APPLICATION->IncludeComponent(
					"bitrix:main.include", 
					"", 
					array(
						"AREA_FILE_SHOW" => "page",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"COMPONENT_TEMPLATE" => "catalog_top"
					),
					false
				);
?>
