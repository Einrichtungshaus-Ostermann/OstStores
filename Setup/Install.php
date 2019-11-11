<?php declare(strict_types=1);

/**
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

namespace OstStores\Setup;

use Doctrine\ORM\Tools\SchemaTool;
use OstStores\Models;
use Shopware\Bundle\AttributeBundle\Service\CrudService;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;

class Install
{
    /**
     * ...
     *
     * @var array
     */
    public static $attributes = [
        's_premium_dispatch_attributes' => [
            [
                'column' => 'ost_stores_pickup_status',
                'type'   => 'boolean',
                'data'   => [
                    'label'            => 'Click & Collect Versandart',
                    'helpText'         => 'Ist dies eine Click&Collect Versandart? In diesem Fall wird im checkout automatisch die Filiale abgefragt und als Lieferadresse gesetzt.',
                    'translatable'     => false,
                    'displayInBackend' => true,
                    'custom'           => false,
                    'position'         => 420
                ]
            ],
        ],
        's_order_attributes' => [
            [
                'column' => 'ost_stores_pickup_status',
                'type'   => 'boolean',
                'data'   => [
                    'label'            => 'Click & Collect Status',
                    'helpText'         => 'Wird diese Bestellung in einer Filiale abgeholt?',
                    'translatable'     => false,
                    'displayInBackend' => true,
                    'custom'           => false,
                    'position'         => 400
                ]
            ],
            [
                'column' => 'ost_stores_pickup_store_id',
                'type'   => 'integer',
                'data'   => [
                    'label'            => 'Click & Collect Filiale',
                    'helpText'         => 'Die ID der Filiale.',
                    'translatable'     => false,
                    'displayInBackend' => true,
                    'custom'           => false,
                    'position'         => 410
                ]
            ],
        ]

    ];
    
    /**
     * Main bootstrap object.
     *
     * @var Plugin
     */
    protected $plugin;

    /**
     * ...
     *
     * @var InstallContext
     */
    protected $context;

    /**
     * ...
     *
     * @var ModelManager
     */
    protected $modelManager;

    /**
     * ...
     *
     * @var CrudService
     */
    protected $crudService;

    /**
     * ...
     *
     * @var array
     */
    protected $models = [
        Models\Store::class,
        Models\BusinessHours\Closed::class,
        Models\BusinessHours\Holiday::class,
        Models\BusinessHours\Open::class,
        Models\BusinessHours\Weekday::class
    ];

    /**
     * ...
     *
     * @param Plugin         $plugin
     * @param InstallContext $context
     * @param ModelManager   $modelManager
     * @param CrudService    $crudService
     */
    public function __construct(Plugin $plugin, InstallContext $context, ModelManager $modelManager, CrudService $crudService)
    {
        // set params
        $this->plugin = $plugin;
        $this->context = $context;
        $this->modelManager = $modelManager;
        $this->crudService = $crudService;
    }

    /**
     * ...
     *
     * @throws \Exception
     */
    public function install()
    {
        // ...
        $this->installModels();
        $this->installData();
    }

    /**
     * ...
     *
     * @throws \Exception
     */
    private function installModels()
    {
        // get entity manager
        $em = $this->modelManager;

        // get our schema tool
        $tool = new SchemaTool($em);

        // ...
        $classes = array_map(
            function ($model) use ($em) {
                return $em->getClassMetadata($model);
            },
            $this->models
        );

        // remove them
        $tool->createSchema($classes);
    }

    /**
     * ...
     *
     * @throws \Exception
     */
    private function installData()
    {
        // get the sql
        $sql = @file_get_contents(rtrim($this->plugin->getPath(), '/') . '/Setup/Install/install.sql');

        // execute the query and catch any db exception and ignore it
        try {
            Shopware()->Db()->exec($sql);
        } catch (\Exception $exception) {
        }
    }
}
