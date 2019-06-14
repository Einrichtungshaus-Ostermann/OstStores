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

use OstStores\Services\HolidayService;
use OstStores\Services\QueryBuilderService;
use OstStores\Services\ValidationService;
use Shopware\Bundle\StoreFrontBundle\Service\ContextServiceInterface;
use Shopware\Bundle\StoreFrontBundle\Service\ListProductServiceInterface;
use Shopware\Components\CSRFWhitelistAware;

class Shopware_Controllers_Widgets_OstStores extends Enlight_Controller_Action implements CSRFWhitelistAware
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
    public function getStockModalAction()
    {
        /* @var $queryBuilderService QueryBuilderService */
        $queryBuilderService = Shopware()->Container()->get('ost_stores.query_builder_service');

        // get them
        $stores = $queryBuilderService->getPickupStoreListQueryBuilder()->getQuery()->getArrayResult();

        /** @var ListProductServiceInterface $listProductService */
        $listProductService = Shopware()->Container()->get('shopware_storefront.list_product_service');

        /** @var ContextServiceInterface $contextService */
        $contextService = Shopware()->Container()->get('shopware_storefront.context_service');

        // get the product to get the attributes
        $product = $listProductService->get($this->Request()->get('number'), $contextService->getShopContext());

        // get the attributes
        $attributes = $product->getAttribute('core')->toArray();

        // complete stock data
        $stock = [];

        // ...
        foreach ($stores as $store) {
            // add it
            $stock[] = [
                'store'   => $store,
                'stock'   => (int) $attributes[$store['attributeStock']],
                'exhibit' => (bool) $attributes[$store['attributeExhibition']]
            ];
        }

        // assign to template
        $this->get('template')->assign('ostStoresStock', $stock);
    }

    /**
     * ...
     *
     * @throws Exception
     */
    public function getBusinessHoursModalAction()
    {
        /* @var $queryBuilderService QueryBuilderService */
        $queryBuilderService = Shopware()->Container()->get('ost_stores.query_builder_service');

        /* @var $holidayService HolidayService */
        $holidayService = Shopware()->Container()->get('ost_stores.holiday_service');

        // ...
        $holidays = $holidayService->getHolidays((int) date('Y'));

        // get the builder
        $builder = $queryBuilderService->getStoreListQueryBuilder();

        // add it
        $builder->andWhere('store.id = :id')
            ->setParameter('id', $this->Request()->getParam('id'));

        // get the store
        $store = array_shift($builder->getQuery()->getArrayResult());

        // weekdays set with their weekday key as index
        $store['businesshoursWeekdaysByWeekday'] = [];
        $store['businesshoursHolidaysByHoliday'] = [];

        // loop every available weekday
        foreach ($store['businesshoursWeekdays'] as $weekday) {
            // and set it with key
            $store['businesshoursWeekdaysByWeekday'][$weekday['weekday']] = $weekday;
        }

        // loop every available weekday
        foreach ($store['businesshoursHolidays'] as $holiday) {
            // and set it with key
            $store['businesshoursHolidaysByHoliday'][$holiday['key']] = $holiday;
        }

        // assign to template
        $this->get('template')->assign('ostStore', $store);
        $this->get('template')->assign('ostStoresHolidays', $holidays);
    }

    /**
     * ...
     *
     * @throws Exception
     */
    public function getPickupStoreSelectionModalAction()
    {
        /* @var $queryBuilderService QueryBuilderService */
        $queryBuilderService = Shopware()->Container()->get('ost_stores.query_builder_service');

        /* @var $validationService ValidationService */
        $validationService = Shopware()->Container()->get('ost_stores.validation_service');

        // get them
        $stores = $queryBuilderService->getPickupStoreListQueryBuilder()->getQuery()->getArrayResult();

        // validate them
        $stores = array_map(
            function( array $store ) use ( $validationService ) {
                return array_merge(
                    $store,
                    array('isValid' => $validationService->isValidStore($store))
                );
            },
            $stores
        );

        // assign to template
        $this->get('template')->assign('ostStores', $stores);
    }
}
