<?php declare(strict_types=1);

/*
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

use Enlight_Components_Session_Namespace as Session;
use OstStores\Services\QueryBuilderService;
use Shopware\Components\CSRFWhitelistAware;

class Shopware_Controllers_Frontend_OstStores extends Enlight_Controller_Action implements CSRFWhitelistAware
{
    /**
     * ...
     *
     * @return array
     */
    public function getWhitelistedCSRFActions()
    {
        // return all actions
        return array_values(array_filter(
            array_map(
                function ($method) { return (substr($method, -6) === 'Action') ? substr($method, 0, -6) : null; },
                get_class_methods($this)
            ),
            function ($method) { return  !in_array((string) $method, ['', 'index', 'load', 'extends'], true); }
        ));
    }

    /**
     * ...
     *
     * @throws Exception
     */
    public function preDispatch()
    {
        // ...
        $viewDir = $this->container->getParameter('ost_stores.view_dir');
        $this->get('template')->addTemplateDir($viewDir);
        parent::preDispatch();
    }

    /**
     * ...
     *
     * @throws Exception
     */
    public function locatorAction()
    {
        /* @var $queryBuilderService QueryBuilderService */
        $queryBuilderService = Shopware()->Container()->get('ost_stores.query_builder_service');

        // get them
        $stores = $queryBuilderService->getStoreListQueryBuilder()->getQuery()->getArrayResult();

        // assign to template
        $this->get('template')->assign('ostStores', $stores);
    }

    /**
     * ...
     *
     * @throws Exception
     */
    public function setPickupStoreSelectionAction()
    {
        // get the new store id
        $store = (int) $this->Request()->getParam('store');

        /** @var Session $session */
        $session = Shopware()->Container()->get('session');

        // get the session data
        $data = (array) $session->get('ost-stores');

        // get the current pickup store id
        $data['pickup-store'] = $store;

        // save it
        $session->offsetSet('ost-stores', $data);

        // redirect to confirm again
        $redirect = [
            'module'     => 'frontend',
            'controller' => 'checkout',
            'action'     => 'confirm'
        ];

        // and redirect to shopping cart
        $this->redirect($redirect);
    }
}
