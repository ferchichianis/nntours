<?php
/**
* Price.php
*
* @date        28/04/2014
* @file        Price.php
*/

namespace Application\Entity\Hotel;

use Core\Entity\EntityAbstract;
use Doctrine\ORM\Mapping as ORM;

/**
* Category
*
* @ORM\Entity
* @ORM\Table(name="hotel_price")
*/
class Price extends EntityAbstract
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
     * @ORM\ManyToOne(targetEntity="Application\Entity\Hotel", inversedBy="prices")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    protected $hotel;

    /**
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $category;

    /**
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $value;

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $hotel
     */
    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
    }

    /**
     * @return string
     */
    public function getHotel()
    {
        return $this->hotel;
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
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}