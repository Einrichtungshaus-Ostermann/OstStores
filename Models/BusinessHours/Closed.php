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
 * @ORM\Table(name="ost_stores_businesshours_closed")
 */
class Closed extends ModelEntity
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
     * ...
     *
     * @var \DateTime
     *
     * @ORM\Column(name="`date`", type="date", nullable=false)
     */
    private $date;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     */
    private $description;

    /**
     * OWNING SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var Store
     *
     * @ORM\ManyToOne(targetEntity="OstStores\Models\Store", inversedBy="businesshoursClosed")
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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Setter method for the property.
     *
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Setter method for the property.
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
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
