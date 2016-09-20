<?// Навигационная цепочка - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/breadcrumb.php
$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	".default",
	Array(
		"START_FROM"    => "0",     // Номер пункта, начиная с которого будет построена навигационная цепочка
		"PATH"          => "",      // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID"       => "-",     // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	)
);?>