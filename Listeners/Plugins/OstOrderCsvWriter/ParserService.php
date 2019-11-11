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

namespace OstStores\Listeners\Plugins\OstOrderCsvWriter;

use Enlight_Event_EventArgs as EventArgs;


class ParserService
{
    /**
     * ...
     *
     * @var array
     */
    private $configuration;

    /**
     * ...
     *
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        // set params
        $this->configuration = $configuration;
    }

    /**
     * ...
     *
     * @param EventArgs $arguments
     *
     * @return array
     */
    public function filterOrder(EventArgs $arguments)
    {
        // get the order
        $csv = $arguments->getReturn();

        /** @var \Shopware\Models\Order\Order $order */
        $order = $arguments->get('order');

        // valid?
        if (!$order->getAttribute() instanceof \Shopware\Models\Attribute\Order || (boolean) $order->getAttribute()->getOstStoresPickupStatus() === false) {
            // nothing to change
            return $csv;
        }

        // set the key
        $csv['Standort'] = (integer) $order->getAttribute()->getOstStoresPickupStoreId();

        // and return it
        return $csv;
    }
}
