<?php
/**
* Category.php
*
* @date        28/04/2014
* @file        Category.php
*/

namespace Application\Entity\Hotel;

use Core\Entity\EntityAbstract;
use Doctrine\ORM\Mapping as ORM;

/**
* Category
*
* @ORM\Entity
* @ORM\Table(name="hotel_category")
*/
class Category extends EntityAbstract
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
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}