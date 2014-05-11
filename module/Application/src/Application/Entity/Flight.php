<?php
/**
 * User.php
 *
 * @date        28/04/2014
 * @file        User.php
 */

namespace Application\Entity;

use Core\Entity\EntityAbstract;
use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Entity
 * @ORM\Table
 * @ORM\HasLifecycleCallbacks
 */
class Flight extends EntityAbstract
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $reference;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Airline")
     * @ORM\JoinColumn(name="airline", referencedColumnName="id")
     **/
    protected $airline;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Airport")
     * @ORM\JoinColumn(name="departure", referencedColumnName="id")
     **/
    protected $departure;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Airport")
     * @ORM\JoinColumn(name="arrival", referencedColumnName="id")
     **/
    protected $arrival;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    protected $datetime;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    protected $createdDate;

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $airline
     */
    public function setAirline($airline)
    {
        $this->airline = $airline;
    }

    /**
     * @return mixed
     */
    public function getAirline()
    {
        return $this->airline;
    }

    /**
     * @param mixed $arrival
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
    }

    /**
     * @return mixed
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * @param \DateTime $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param mixed $departure
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
    }

    /**
     * @return mixed
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreatedDate(date_create());
    }

    public function __toString()
    {
        return $this->name;
    }
}