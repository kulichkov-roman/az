<?php
/**
 * Создает тип инфоблока "SEO контент"
 *
 * @global $APPLICATION CMain
 */
use YT\Tools\Data\Migration\Bitrix\AbstractIBlockMigration;

define('BX_BUFFER_USED', true);
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('NO_AGENT_STATISTIC', true);
define('STOP_STATISTICS', true);
define('SITE_ID', 's1');

if (empty($_SERVER['DOCUMENT_ROOT'])) {
	$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../../');
}

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

while (ob_get_level()) {
	ob_end_flush();
}

if (!CModule::IncludeModule('iblock')) {
	echo 'Unable to include iblock module';
	exit;
}

/**
 * Создает тип инфоблока "SEO контент""
 *
 * Class CreateSeoIBlockTypeMigration
 */
class CreateSeoIBlockTypeMigration extends AbstractIBlockMigration
{
	/**
	 * {@inheritdoc}
	 */
	public function up()
	{
		$logger = new \YT\Tools\Logger\EchoLogger();

		try {
			$this->createIBlockType(
				array(
					'ID' => 'seo_content',
					'SECTIONS' => 'Y',
					'IN_RSS' => 'N',
					'SORT' => 100,
					'LANG' => array(
						'en' => array(
							'NAME' => 'SEO content',
						),
						'ru' => array(
							'NAME' => 'SEO контент',
						),
					)
				)
			);

			$logger->log('IBlock type "SEO content" has been created');
		} catch (\YT\Exception\Data\Migration\MigrationException $exception) {
			$logger->log(sprintf('ERROR: %s', $exception->getMessage()));
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function down()
	{
		$logger = new \YT\Tools\Logger\EchoLogger();

		try {
			$this->deleteIBlockType('info');

			$logger->log('IBlock type "SEO content" has been deleted');
		} catch (\YT\Exception\Data\Migration\MigrationException $exception) {
			$logger->log(sprintf('ERROR: %s', $exception->getMessage()));
		}
	}
}

$migration = new CreateSeoIBlockTypeMigration();
$migration->up();
