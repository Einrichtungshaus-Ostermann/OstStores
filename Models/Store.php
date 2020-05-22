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

namespace OstStores\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(name="ost_stores")
 */
class Store extends ModelEntity
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
     * The full name of the store.
     *
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="street", type="string", nullable=false)
     */
    private $street;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=16, nullable=false)
     */
    private $zip;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=64, nullable=false)
     */
    private $city;

    /**
     * ...
     *
     * @var int
     *
     * @ORM\Column(name="countryId", type="integer", nullable=false)
     */
    private $countryId;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=32, nullable=true)
     */
    private $phone;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=32, nullable=true)
     */
    private $fax;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    private $email;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="url", type="string", nullable=true)
     */
    private $url;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="seoUrl", type="string", nullable=true)
     */
    private $seoUrl;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="seoUrlRedirect", type="string", nullable=true)
     */
    private $seoUrlRedirect;

    /**
     * ...
     *
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", nullable=true)
     */
    private $latitude;

    /**
     * ...
     *
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", nullable=true)
     */
    private $longitude;

    /**
     * ...
     *
     * @var int
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;

    /**
     * The internal key - e.g. "01" for ostermann witten.
     *
     * @var string
     *
     * @ORM\Column(name="`key`", type="string", length=16, nullable=true)
     */
    private $key;

    /**
     * Is this an actual physical store?
     *
     * @deprecated not used anymore
     *
     * @var bool
     *
     * @ORM\Column(name="physical", type="boolean", nullable=false)
     */
    private $physical;

    /**
     * Do we support pickup for customers?
     *
     * @deprecated not used anymore
     *
     * @var bool
     *
     * @ORM\Column(name="pickup", type="boolean", nullable=false)
     */
    private $pickup;

    /**
     * Do we support pickup for customers?
     * No matter what "hasStock" says, we always read the stock if this store
     * has sufficient stock.
     *
     * @var bool
     *
     * @ORM\Column(name="hasPickup", type="boolean", nullable=false)
     */
    private $hasPickup;

    /**
     * Do we show this store in our article store stock?
     *
     * @var bool
     *
     * @ORM\Column(name="hasStock", type="boolean", nullable=false)
     */
    private $hasStock;

    /**
     * Do we list this store in our store overview?
     *
     * @var bool
     *
     * @ORM\Column(name="isListed", type="boolean", nullable=false)
     */
    private $isListed;

    /**
     * The name of the article attribute where we save the stock
     * for this store.
     *
     * @var string
     *
     * @ORM\Column(name="attributeStock", type="string", length=64, nullable=true)
     */
    private $attributeStock;

    /**
     * The internal key - e.g. "01" for ostermann witten.
     *
     * @var string
     *
     * @ORM\Column(name="attributeExhibition", type="string", length=64, nullable=true)
     */
    private $attributeExhibition;

    /**
     * If this is not null and has a text, we will not show the weekday
     * business hours from the 1:n relationship and we will ONLY
     * show this text information.
     *
     * @var string
     *
     * @ORM\Column(name="businessHours", type="text", nullable=true)
     */
    private $businessHours;

    /**
     * INVERSE SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OstStores\Models\BusinessHours\Weekday", mappedBy="store")
     */
    private $businesshoursWeekdays;

    /**
     * INVERSE SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OstStores\Models\BusinessHours\Closed", mappedBy="store")
     */
    private $businesshoursClosed;

    /**
     * INVERSE SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OstStores\Models\BusinessHours\Holiday", mappedBy="store")
     */
    private $businesshoursHolidays;

    /**
     * INVERSE SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OstStores\Models\BusinessHours\Open", mappedBy="store")
     */
    private $businesshoursOpen;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter method for the property.
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
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
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Setter method for the property.
     *
     * @param string $street
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Setter method for the property.
     *
     * @param string $zip
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Setter method for the property.
     *
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * Getter method for the property.
     *
     * @return int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * Setter method for the property.
     *
     * @param int $countryId
     */
    public function setCountryId(int $countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Setter method for the property.
     *
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Setter method for the property.
     *
     * @param string $fax
     */
    public function setFax(string $fax)
    {
        $this->fax = $fax;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Setter method for the property.
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Setter method for the property.
     *
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getSeoUrl()
    {
        return $this->seoUrl;
    }

    /**
     * Setter method for the property.
     *
     * @param string $seoUrl
     *
     * @return void
     */
    public function setSeoUrl(string $seoUrl)
    {
        $this->seoUrl = $seoUrl;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getSeoUrlRedirect()
    {
        return $this->seoUrlRedirect;
    }

    /**
     * Setter method for the property.
     *
     * @param string $seoUrlRedirect
     *
     * @return void
     */
    public function setSeoUrlRedirect(string $seoUrlRedirect)
    {
        $this->seoUrlRedirect = $seoUrlRedirect;
    }

    /**
     * Getter method for the property.
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Setter method for the property.
     *
     * @param float $latitude
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Getter method for the property.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Setter method for the property.
     *
     * @param float $longitude
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Getter method for the property.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Setter method for the property.
     *
     * @param int $position
     */
    public function setPosition(int $position)
    {
        $this->position = $position;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Setter method for the property.
     *
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->key = $key;
    }

    /**
     * Getter method for the property.
     *
     * @return bool
     */
    public function getPhysical()
    {
        return $this->physical;
    }

    /**
     * Setter method for the property.
     *
     * @param bool $physical
     */
    public function setPhysical(bool $physical)
    {
        $this->physical = $physical;
    }

    /**
     * Getter method for the property.
     *
     * @return bool
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * Setter method for the property.
     *
     * @param bool $pickup
     */
    public function setPickup(bool $pickup)
    {
        $this->pickup = $pickup;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getAttributeStock()
    {
        return $this->attributeStock;
    }

    /**
     * Setter method for the property.
     *
     * @param string $attributeStock
     */
    public function setAttributeStock(string $attributeStock)
    {
        $this->attributeStock = $attributeStock;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getAttributeExhibition()
    {
        return $this->attributeExhibition;
    }

    /**
     * Setter method for the property.
     *
     * @param string $attributeExhibition
     */
    public function setAttributeExhibition(string $attributeExhibition)
    {
        $this->attributeExhibition = $attributeExhibition;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getBusinessHours()
    {
        return $this->businessHours;
    }

    /**
     * Setter method for the property.
     *
     * @param string $businessHours
     */
    public function setBusinessHours(string $businessHours)
    {
        $this->businessHours = $businessHours;
    }

    /**
     * Getter method for the property.
     *
     * @return ArrayCollection
     */
    public function getBusinesshoursWeekdays()
    {
        return $this->businesshoursWeekdays;
    }

    /**
     * Setter method for the property.
     *
     * @param ArrayCollection $businesshoursWeekdays
     */
    public function setBusinesshoursWeekdays(ArrayCollection $businesshoursWeekdays)
    {
        $this->businesshoursWeekdays = $businesshoursWeekdays;
    }

    /**
     * Getter method for the property.
     *
     * @return ArrayCollection
     */
    public function getBusinesshoursClosed()
    {
        return $this->businesshoursClosed;
    }

    /**
     * Setter method for the property.
     *
     * @param ArrayCollection $businesshoursClosed
     */
    public function setBusinesshoursClosed(ArrayCollection $businesshoursClosed)
    {
        $this->businesshoursClosed = $businesshoursClosed;
    }

    /**
     * Getter method for the property.
     *
     * @return ArrayCollection
     */
    public function getBusinesshoursHolidays()
    {
        return $this->businesshoursHolidays;
    }

    /**
     * Setter method for the property.
     *
     * @param ArrayCollection $businesshoursHolidays
     */
    public function setBusinesshoursHolidays(ArrayCollection $businesshoursHolidays)
    {
        $this->businesshoursHolidays = $businesshoursHolidays;
    }

    /**
     * Getter method for the property.
     *
     * @return ArrayCollection
     */
    public function getBusinesshoursOpen()
    {
        return $this->businesshoursOpen;
    }

    /**
     * Setter method for the property.
     *
     * @param ArrayCollection $businesshoursOpen
     */
    public function setBusinesshoursOpen(ArrayCollection $businesshoursOpen)
    {
        $this->businesshoursOpen = $businesshoursOpen;
    }
}
