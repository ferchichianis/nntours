<?php
/**
 * HotelManager.php
 *
 * @date        29/04/2014
 * @file        HotelManager.php
 */

namespace Application\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Application\Entity\Hotel;
/**
 * HotelManager
 */
class HotelManager implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;
    /**
     * @param $id
     *
     * @return Hotel
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function find($id)
    {
        return $this->getServiceLocator()->get('application.mapper.hotel')->find($id);
    }

    public function findAll()
    {
        return $this->getServiceLocator()->get('application.mapper.hotel')->findAll();
    }


    public function persist(Hotel $e)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getServiceLocator()->get('em');

        $em->persist($e);

        $em->flush();
    }
} 