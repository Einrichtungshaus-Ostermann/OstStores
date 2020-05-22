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

namespace OstStores\Listeners\Core;

use Enlight_Components_Session_Namespace as Session;
use Enlight_Event_EventArgs as EventArgs;
use Enlight_Hook_HookArgs as HookArgs;
use OstStores\Services\QueryBuilderService;
use Shopware\Bundle\StoreFrontBundle\Struct\Attribute;
use sAdmin as CoreClass;
use Shopware\Models\Dispatch\Dispatch;

class sAdmin
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
     * @param HookArgs $arguments
     */
    public function afterDispatches(HookArgs $arguments)
    {
        // get available shipping methods
        $methods = $arguments->getReturn();

        // get the attribute
        $attribute = (string) $this->configuration['attributeDropshipping'];

        // get the dropshipping flag
        $query = '
            SELECT COUNT(*)
            FROM s_order_basket AS basket
                LEFT JOIN s_articles_details AS article
                    ON basket.ordernumber = article.ordernumber
                LEFT JOIN s_articles_attributes AS attribute
                    ON article.id = attribute.articledetailsID
            WHERE basket.sessionID = ?
                AND basket.modus = 0
                AND basket.articleID > 0
                AND attribute.' . str_replace(array('"', "'"), '', $attribute) . ' = 1
        ';
        $dropshipping = (integer) Shopware()->Db()->fetchOne($query, array(Shopware()->Session()->offsetGet('sessionId')));

        // none at all?
        if ($dropshipping === 0) {
            // nothing to do
            return;
        }

        // remove click&collect
        foreach ($methods as $key => $method) {
            // is it?
            if ((integer) $method['attribute']['ost_stores_pickup_status'] === 1) {
                // ignore it
                unset($methods[$key]);
            }
        }

        // set it
        $arguments->setReturn($methods);
    }
}
