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

namespace OstStores\Models\BusinessHours;

use Doctrine\ORM\Mapping as ORM;
use OstStores\Models\Store;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(name="ost_stores_businesshours_weekdays")
 */
class Weekday extends ModelEntity
{
    /**
     * Auto-generated id.
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * ...
     *
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * The equivalent of date("N") with 1 for monday, 2 for tuesday...
     *
     * @var int
     *
     * @ORM\Column(name="weekday", type="integer", nullable=false)
     */
    private $weekday;

    /**
     * ...
     *
     * @var \DateTime
     *
     * @ORM\Column(name="startTime", type="time", nullable=false)
     */
    private $startTime;

    /**
     * ...
     *
     * @var \DateTime
     *
     * @ORM\Column(name="endTime", type="time", nullable=false)
     */
    private $endTime;

    /**
     * OWNING SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var Store
     *
     * @ORM\ManyToOne(targetEntity="OstStores\Models\Store", inversedBy="businesshoursWeekdays")
     * @ORM\JoinColumn(name="storeId", referencedColumnName="id")
     */
    private $store;

    /**
     * Getter method for the property.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Getter method for the property.
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Setter method for the property.
     *
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * Getter method for the property.
     *
     * @return int
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * Setter method for the property.
     *
     * @param int $weekday
     */
    public function setWeekday(int $weekday)
    {
        $this->weekday = $weekday;
    }

    /**
     * Getter method for the property.
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Setter method for the property.
     *
     * @param \DateTime $startTime
     */
    public function setStartTime(\DateTime $startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * Getter method for the property.
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Setter method for the property.
     *
     * @param \DateTime $endTime
     */
    public function setEndTime(\DateTime $endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * Getter method for the property.
     *
     * @return Store
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Setter method for the property.
     *
     * @param Store $store
     */
    public function setStore(Store $store)
    {
        $this->store = $store;
    }
}
