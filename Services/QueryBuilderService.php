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

use Doctrine\ORM\QueryBuilder;
use OstStores\Models\Store;
use Shopware\Components\Model\ModelManager;

class QueryBuilderService
{
    /**
     * ...
     *
     * @var ModelManager
     */
    protected $modelManager;

    /**
     * ...
     *
     * @var array
     */
    protected $configuration;

    /**
     * ...
     *
     * @param ModelManager $modelManager
     * @param array        $configuration
     */
    public function __construct(ModelManager $modelManager, array $configuration)
    {
        // set params
        $this->modelManager = $modelManager;
        $this->configuration = $configuration;
    }

    /**
     * ...
     *
     * @return QueryBuilder
     */
    public function getPickupStoreListQueryBuilder()
    {
        // create a query builder
        $builder = $this->getStoreListQueryBuilder();

        // set it up with default values
        $builder->andWhere('store.physical = 1')
            ->andWhere('store.pickup = 1');

        // and return it
        return $builder;
    }

    /**
     * ...
     *
     * @return QueryBuilder
     */
    public function getStoreListQueryBuilder()
    {
        // create a query builder
        $builder = $this->getStoreQueryBuilder();

        // set it up with default values
        $builder->where('store.active = 1')
            ->orderBy('store.position', 'ASC');

        // and return it
        return $builder;
    }

    /**
     * ...
     *
     * @return QueryBuilder
     */
    public function getStoreQueryBuilder()
    {
        // create a query builder
        $builder = $this->modelManager->createQueryBuilder();

        // set it up with default values
        $builder->select(['store'])
            ->from(Store::class, 'store');

        // join 1:n
        $builder->addSelect(['businesshoursWeekday', 'businesshoursClosed', 'businesshoursHoliday', 'businesshoursOpen'])
            ->leftJoin('store.businesshoursWeekdays', 'businesshoursWeekday')
            ->leftJoin('store.businesshoursClosed', 'businesshoursClosed')
            ->leftJoin('store.businesshoursHolidays', 'businesshoursHoliday')
            ->leftJoin('store.businesshoursOpen', 'businesshoursOpen');

        // and return it
        return $builder;
    }
}
