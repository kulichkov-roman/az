<?php
/**
 * Создает инфоблок «SEO описания: разделов»
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
 * Создает инфоблок «SEO описания: разделов»
 *
 * Class CreateSeoIBlockMigration
 */
class CreateSeoIBlockMigration extends AbstractIBlockMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $logger = new \YT\Tools\Logger\EchoLogger();

        try {
            $this->createIBlock(
                array(
                    'ACTIVE'           => 'Y',
                    'NAME'             => 'Описание разделов',
                    'CODE'             => 'seo_section_descriptions',
                    'IBLOCK_TYPE_ID'   => 'seo_content',
                    'SITE_ID'          => array('s1'),
                    'SORT'             => 500,
                    'DESCRIPTION_TYPE' => 'text',
                    'GROUP_ID'         => array('2' => 'R'),
                    'VERSION'          => 2,
                )
            );

            $logger->log(
                sprintf('IBlock has been created. Id: "%s". Add to "seoSecIBlockId"', $this->iblockId)
            );
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

        $environment = \YT\Environment\EnvironmentManager::getInstance();

        $this->deleteIBlock($environment->get('seoSecIBlockId'));

        $logger->log(sprintf('IBlock rewards has been removed. Id: "%s"', $this->iblockId));
    }
}

$migration = new CreateSeoIBlockMigration();
$migration->up();
?>
