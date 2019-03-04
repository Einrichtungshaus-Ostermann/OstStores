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
use Exception;
use OstStores\Models;
use Shopware\Bundle\AttributeBundle\Service\CrudService;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\UninstallContext;

class Uninstall
{
    /**
     * Main bootstrap object.
     *
     * @var Plugin
     */
    protected $plugin;

    /**
     * ...
     *
     * @var UninstallContext
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
     * @param Plugin           $plugin
     * @param UninstallContext $context
     * @param ModelManager     $modelManager
     * @param CrudService      $crudService
     */
    public function __construct(Plugin $plugin, UninstallContext $context, ModelManager $modelManager, CrudService $crudService)
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
    public function uninstall()
    {
        // ...
        $this->uninstallModels();
        $this->uninstallAttributes();
    }

    /**
     * ...
     *
     * @throws \Exception
     */
    public function uninstallAttributes()
    {
        // ...
        foreach (Install::$attributes as $table => $attributes) {
            foreach ($attributes as $attribute) {
                try {
                    $this->crudService->delete(
                        $table,
                        $attribute['column']
                    );
                } catch (Exception $exception) {
                }
            }
        }

        // ...
        $this->modelManager->generateAttributeModels(array_keys(Install::$attributes));
    }

    /**
     * ...
     */
    private function uninstallModels()
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
        $tool->dropSchema($classes);
    }
}
