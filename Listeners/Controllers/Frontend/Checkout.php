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

namespace OstStores\Listeners\Controllers\Frontend;

use Enlight_Components_Session_Namespace as Session;
use Enlight_Event_EventArgs as EventArgs;
use OstStores\Services\QueryBuilderService;
use OstStores\Services\ValidationService;
use Shopware\Bundle\StoreFrontBundle\Struct\Attribute;
use Shopware\Models\Dispatch\Dispatch;
use Shopware_Controllers_Frontend_Checkout as Controller;

class Checkout
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
     */
    public function onPostDispatch(EventArgs $arguments)
    {
        // get the controller
        /* @var $controller Controller */
        $controller = $arguments->get('subject');

        // get parameters
        $request = $controller->Request();
        $view = $controller->View();

        // only order action
        if (strtolower($request->getActionName()) !== 'confirm') {
            // nothing to do
            return;
        }

        /** @var Session $session */
        $session = Shopware()->Container()->get('session');

        /** @var $dispatch Dispatch */
        $dispatch = Shopware()->Models()->find(Dispatch::class, $session->get('sDispatch'));

        // is this click&collect?
        if ((boolean) $dispatch->getAttribute()->getOstStoresPickupStatus() === false) {
            // stop
            return;
        }

        // pickup store
        $view->assign('ostStoresPickupStatus', true);

        // get the session data
        $data = (array) $session->get('ost-stores');

        // get the current pickup store id
        $storeId = (int) $data['pickup-store'];

        // not store set yet?
        if ($storeId === 0) {
            // get default
            $storeId = $this->getDefaultStore();

            // save back to session
            $data['pickup-store'] = $storeId;
            $session->offsetSet('ost-stores', $data);
        }

        /* @var $queryBuilderService QueryBuilderService */
        $queryBuilderService = Shopware()->Container()->get('ost_stores.query_builder_service');

        // query builder
        $builder = $queryBuilderService->getStoreListQueryBuilder();

        // only current actice
        $builder->andWhere('store.id = :id')
            ->setParameter('id', $storeId);

        // get the store
        $store = array_shift($builder->getQuery()->getArrayResult());

        // assign everything
        $view->assign('ostStoresPickupStore', $store);
        $view->assign('ostStoresPickupValidStore', $this->isValidStore($store));
    }

    /**
     * ...
     *
     * @return int
     */
    private function getDefaultStore()
    {
        /* @var $queryBuilderService QueryBuilderService */
        $queryBuilderService = Shopware()->Container()->get('ost_stores.query_builder_service');

        // query builder
        $builder = $queryBuilderService->getPickupStoreListQueryBuilder();

        // only the first. its already sorted by position
        $store = array_shift($builder->getQuery()->getArrayResult());

        // return the id
        return (integer) $store['id'];
    }

    /**
     * ...
     *
     * @param array $store
     *
     * @return bool
     */
    private function isValidStore($store)
    {
        /* @var $validationService ValidationService */
        $validationService = Shopware()->Container()->get('ost_stores.validation_service');

        // ...
        return $validationService->isValidStore($store);
    }
}
