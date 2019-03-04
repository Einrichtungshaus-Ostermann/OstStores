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
use Enlight_Hook_HookArgs as HookArgs;
use OstStores\Services\QueryBuilderService;
use sOrder as CoreClass;

class sOrder
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
    public function beforeSaveOrder(HookArgs $arguments)
    {
        /* @var $sOrder CoreClass */
        $sOrder = $arguments->getSubject();

        $userData = $sOrder->sUserData;

        /** @var Session $session */
        $session = Shopware()->Container()->get('session');

        // get the session data
        $data = (array) $session->get('ost-stores');

        // get the current pickup store id
        $storeId = (int) $data['pickup-store'];

        /* @var $queryBuilderService QueryBuilderService */
        $queryBuilderService = Shopware()->Container()->get('ost_stores.query_builder_service');

        // query builder
        $builder = $queryBuilderService->getStoreListQueryBuilder();

        // only current actice
        $builder->andWhere('store.id = :id')
            ->setParameter('id', $storeId);

        // get the store
        $store = array_shift($builder->getQuery()->getArrayResult());

        $userData['additional']['countryShipping'] = Shopware()->Db()->fetchRow('SELECT * FROM s_core_countries WHERE id = :id', ['id' => $store['countryId']]);

        $address = [
            'id'                       => null,
            'company'                  => $store['name'],
            'salutation'               => $userData['additional']['user']['salutation'],
            'firstname'                => $userData['additional']['user']['firstname'],
            'lastname'                 => $userData['additional']['user']['lastname'],
            'title'                    => null,
            'street'                   => $store['street'],
            'zipcode'                  => $store['zip'],
            'city'                     => $store['city'],
            'phone'                    => null,
            'vatId'                    => null,
            'additionalAddressLine1'   => null,
            'additionalAddressLine2'   => null,
            'countryId'                => $store['countryId'],
            'stateId'                  => null,
            'customer'                 => ['id' => $userData['additional']['user']['id']],
            'country'                  => ['id' => $store['countryId']],
            'state'                    => null,
            'userID'                   => $userData['additional']['user']['id'],
            'countryID'                => $store['countryId'],
            'ustid'                    => null,
            'additional_address_line1' => null,
            'additional_address_line2' => null,
            'attributes'               => []
        ];

        $userData['shippingaddress'] = $address;

        $sOrder->sUserData = $userData;
    }
}