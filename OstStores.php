<?php declare(strict_types=1);

/**
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * Holds every available physical and non-physical store and provides functions like
 * Store Locator, Store Business Hours, Store Stock and Click & Collect.
 *
 * 1.0.0
 * - initial release
 *
 * 1.0.1
 * - fixed type comparisons
 * - fixed saving of pickup store without selecting pick dispatch method
 *
 * 1.1.0
 * - added backend app
 * - fixed default store for click & collect
 * - fixed invalid stores for click & collect
 *
 * 1.1.1
 * - changed stores in checkout for lower viewports
 *
 * 1.1.2
 * - fixed faulty config parameter name
 * - added seo url for locator
 *
 * 1.2.0
 * - added seo-url and seo-url-redirect to store model
 *
 * 1.2.1
 * - changed mandatory stock configuration
 *
 * 1.3.0
 * - added order attributes to save the store id when using click&collect
 * - added listener to ost-order-csv-writer plugin to set the store id
 *
 * 1.4.0
 * - added open hours to store modal
 * - added OstStores\Holiday model
 * - added business hours to backend app
 *
 * 1.5.0
 * - added dropshipping attribute configuration to drop click&collect shipping method
 * - added flags for every store where they should be visible
 *
 * @todo: locator - google maps integration
 * @todo: business hours - nächsten feiertag anzeigen
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

namespace OstStores;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OstStores extends Plugin
{
    /**
     * ...
     *
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        // set plugin parameters
        $container->setParameter('ost_stores.plugin_dir', $this->getPath() . '/');
        $container->setParameter('ost_stores.view_dir', $this->getPath() . '/Resources/views/');

        // call parent builder
        parent::build($container);
    }

    /**
     * Activate the plugin.
     *
     * @param Context\ActivateContext $context
     */
    public function activate(Context\ActivateContext $context)
    {
        // clear complete cache after we activated the plugin
        $context->scheduleClearCache($context::CACHE_LIST_ALL);
    }

    /**
     * Install the plugin.
     *
     * @param Context\InstallContext $context
     *
     * @throws \Exception
     */
    public function install(Context\InstallContext $context)
    {
        // install the plugin
        $installer = new Setup\Install(
            $this,
            $context,
            $this->container->get('models'),
            $this->container->get('shopware_attribute.crud_service')
        );
        $installer->install();

        // update it to current version
        $updater = new Setup\Update(
            $this,
            $context,
            $this->container->get('models'),
            $this->container->get('shopware_attribute.crud_service'),
            $this->getPath() . '/'
        );
        $updater->install();

        // call default installer
        parent::install($context);
    }

    /**
     * Update the plugin.
     *
     * @param Context\UpdateContext $context
     */
    public function update(Context\UpdateContext $context)
    {
        // update the plugin
        $updater = new Setup\Update(
            $this,
            $context,
            $this->container->get('models'),
            $this->container->get('shopware_attribute.crud_service'),
            $this->getPath() . '/'
        );
        $updater->update($context->getCurrentVersion());

        // call default updater
        parent::update($context);
    }

    /**
     * Uninstall the plugin.
     *
     * @param Context\UninstallContext $context
     *
     * @throws \Exception
     */
    public function uninstall(Context\UninstallContext $context)
    {
        // uninstall the plugin
        $uninstaller = new Setup\Uninstall(
            $this,
            $context,
            $this->container->get('models'),
            $this->container->get('shopware_attribute.crud_service')
        );
        $uninstaller->uninstall();

        // clear complete cache
        $context->scheduleClearCache($context::CACHE_LIST_ALL);

        // call default uninstaller
        parent::uninstall($context);
    }
}
