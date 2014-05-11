<?php
/**
 * Airport.php
 *
 * @date        28/04/2014
 * @file        Airport.php
 */

namespace Application\Entity;

use Core\Entity\EntityAbstract;
use Doctrine\ORM\Mapping as ORM;

/**
 * Airline
 *
 * @ORM\Entity
 * @ORM\Table
 * @ORM\HasLifecycleCallbacks
 */
class Airport extends EntityAbstract
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
    protected $name;

    /**
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $code3;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\City")
     * @ORM\JoinColumn(name="city", referencedColumnName="id")
     **/
    protected $city;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    protected $createdDate;

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $code3
     */
    public function setCode3($code3)
    {
        $this->code3 = $code3;
    }

    /**
     * @return string
     */
    public function getCode3()
    {
        return $this->code3;
    }

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate(\DateTime $createdDate)
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
     * @param integer $id
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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