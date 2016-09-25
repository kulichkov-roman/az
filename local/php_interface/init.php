<?php
require_once 'vendor/YourTools/bootstrap.php';
require_once 'classes/AutoLoader.php';

\spl_autoload_register('\AZ\AutoLoader::autoLoad');

$environment = \YT\Environment\EnvironmentManager::getInstance();

foreach ($environment->getConfigFileNames() as $fileName) {
	$fileName = sprintf('%s/config/%s.php', __DIR__, $fileName);

	if (file_exists($fileName)) {
		include_once $fileName;
	}
}

ini_set('display_errors',1);
error_reporting(E_ERROR);

// Выполнить все тесты контроля качества
//$CQualityControl = new YT\Tools\Tests\QualityControl();
//$CQualityControl->check();

AddEventHandler('main', 'OnEpilog', array('RequestHandler', 'Show404IfNeeded'));
AddEventHandler('iblock', 'OnAfterIBlockElementAdd', array('SendingEmailHandler', 'SendFeedbackForm'));