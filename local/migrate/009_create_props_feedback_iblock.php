<?php
/**
 * Миграция добавляет свойства к инфоблоку «Обратная связь»
 */
ignore_user_abort(true);
set_time_limit(0);

define('BX_BUFFER_USED', true);
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('NO_AGENT_STATISTIC', true);
define('STOP_STATISTICS', true);

if (!defined('SITE_ID')) {
    define('SITE_ID', 's1');
}

if (empty($_SERVER['DOCUMENT_ROOT'])) {
    $_SERVER['HTTP_HOST'] = 'ksk.kulichkov.pro';
    $_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../../');
}

error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
ini_set('display_errors', 1);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

if (!CModule::IncludeModule('iblock')) {
    echo 'Unable to include iblock module';
    exit;
}

use YT\Tools\Data\Migration\Bitrix\AbstractIBlockPropertyMigration;

/**
 * Class AddPropertiesFeedbackIBlockMigration
 */
class AddPropertiesFeedbackIBlockMigration extends AbstractIBlockPropertyMigration
{
    /**
     * @var array
     */
    protected $properties;

    public function __construct()
    {
        $iBlockId = \YT\Environment\EnvironmentManager::getInstance()->get('feedbackIBlockId');

        parent::__construct($iBlockId);
    }

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $logger = new \YT\Tools\Logger\EchoLogger();

        try {
            $this->createStringProperty(
                'Телефон',
                'PHONE'
            );

            $this->createStringProperty(
                'E-Mail',
                'EMAIL'
            );

            $logger->log('Properties have been created successfully');
        } catch (\YT\Exception\Data\Migration\MigrationException $exception) {
            $logger->log(sprintf('ERROR: %s', $exception->getMessage()));
        }
    }

    /**
     * @throws \YT\Exception\Common\NotImplementedException
     */
    public function down()
    {
        throw new \YT\Exception\Common\NotImplementedException('Method down was not implemented');
    }
}

$iBlockMigrations = new AddPropertiesFeedbackIBlockMigration(
    $environment->get('feedbackIBlockId')
);

$iBlockMigrations->up();
