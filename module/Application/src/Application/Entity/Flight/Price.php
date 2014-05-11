<?php
/**
* Price.php
*
* @date        28/04/2014
* @file        Price.php
*/

namespace Application\Entity\Flight;

use Core\Entity\EntityAbstract;
use Doctrine\ORM\Mapping as ORM;

/**
* Category
*
* @ORM\Entity
* @ORM\Table(name="flight_price")
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
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $flight;

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
}