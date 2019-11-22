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

use OstStores\Models\BusinessHours\Holiday;
use OstStores\Models\Store;

class Shopware_Controllers_Backend_OstStoresBusinesshoursholiday extends Shopware_Controllers_Backend_Application
{
    /**
     * ...
     *
     * @var string
     */
    protected $model = Holiday::class;

    /**
     * ...
     *
     * @var string
     */
    protected $alias = 'businesshoursholiday';

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
     * {@inheritdoc}
     */
    public function listAction()
    {
        // get the temporary list
        $arr = $this->getList(
            $this->Request()->getParam('start', 0),
            $this->Request()->getParam('limit', 20),
            $this->Request()->getParam('sort', []),
            $this->Request()->getParam('filter', []),
            $this->Request()->getParams()
        );

        // enrich it
        foreach ($arr['data'] as $key => $holiday) {
            // add data
            $arr['data'][$key]['storeId'] = $holiday['store']['id'];
            $arr['data'][$key]['storeName'] = $holiday['store']['name'];
            $arr['data'][$key]['keyName'] = Shopware()->Db()->fetchOne('SELECT name FROM ost_stores_holidays WHERE id = ' . (integer) $holiday['key']);
            $arr['data'][$key]['startTimeString'] = $holiday['startTime']->format('H:i');
            $arr['data'][$key]['endTimeString'] = $holiday['endTime']->format('H:i');
        }

        // and set it
        $this->View()->assign(
            $arr
        );
    }

    /**
     * {@inheritdoc}
     */
    public function save($data)
    {
        /* @var $model Holiday */
        if (!empty($data['id'])) {
            $model = $this->getRepository()->find($data['id']);
        } else {
            $model = new $this->model();
            $this->getManager()->persist($model);
        }

        $store = Shopware()->Models()->find(Store::class, (integer) $data['storeId']);

        $model->setActive(((string) $data['active'] === '1'));
        $model->setKey((integer) $data['key']);
        $model->setStartTime(new \DateTime((string) $data['startTimeString'] . ':00'));
        $model->setEndTime(new \DateTime((string) $data['endTimeString'] . ':00'));
        $model->setStore($store);

        $this->getManager()->flush();

        $detail = $this->getDetail($model->getId());

        return ['success' => true, 'data' => $detail['data']];
    }

    /**
     * {@inheritdoc}
     */
    protected function getListQuery()
    {
        $builder = parent::getListQuery();
        $builder->leftJoin('businesshoursholiday.store', 'store');
        $builder->addSelect(array('PARTIAL store.{id,name}'));
        return $builder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getDetailQuery($id)
    {
        $builder = parent::getDetailQuery($id);
        $builder->leftJoin('businesshoursholiday.store', 'store');
        $builder->addSelect(array('PARTIAL store.{id,name}'));
        return $builder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getAdditionalDetailData(array $data)
    {
        $data['storeId'] = $data['store']['id'];
        $data['startTimeString'] = $data['startTime']->format('H:i');
        $data['endTimeString'] = $data['endTime']->format('H:i');
        return $data;
    }
}
