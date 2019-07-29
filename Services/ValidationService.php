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

namespace OstStores\Services;

use Shopware\Bundle\StoreFrontBundle\Struct\Attribute;

class ValidationService
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
     * @param array $store
     *
     * @return bool
     */
    public function isValidStore($store)
    {
        // even found?!
        if (!is_array($store)) {
            // wroooong
            return false;
        }

        // active and valid?
        if ($store['active'] === false) {
            // invalid
            return false;
        }

        // do we need to check the stock?
        if ($this->configuration['pickupMandatoryStockStatus'] === false) {
            // nothing more to check
            return true;
        }

        // get the basket
        $basket = Shopware()->Modules()->Basket()->sGetBasket();

        // loop every article
        foreach ($basket['content'] as $article) {
            // only for real articles
            if ((int) $article['modus'] !== 0) {
                // next
                continue;
            }

            // get the core attribute
            $attributes = $article['additional_details']['attributes']['core'];

            // we need attribute or this might be a pseudo article
            if (!$attributes instanceof Attribute) {
                // stop
                continue;
            }

            // get the stock
            $stock = $attributes->get($store['attributeStock']);

            // do we have enought?
            if ($stock < (int) $article['quantity']) {
                // invalid
                return false;
            }
        }

        // all good
        return true;
    }
}
