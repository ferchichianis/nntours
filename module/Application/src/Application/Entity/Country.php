<?php
/**
* Country.php
*
* @date        28/04/2014
* @file        Country.php
*/

namespace Application\Entity;

use Core\Entity\EntityAbstract;
use Doctrine\ORM\Mapping as ORM;

/**
* Country
*
* @ORM\Entity
* @ORM\Table
*/
class Country extends EntityAbstract
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
    protected $uname;

    /**
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $code2;

    /**
     *
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $code3;

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
     * @param string $code2
     */
    public function setCode2($code2)
    {
        $this->code2 = $code2;
    }

    /**
     * @return string
     */
    public function getCode2()
    {
        return $this->code2;
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
     * @param string $uname
     */
    public function setUname($uname)
    {
        $this->uname = $uname;
    }

    /**
     * @return string
     */
    public function getUname()
    {
        return $this->uname;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}