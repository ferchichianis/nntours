<?php
/**
 * AirportManager.php
 *
 * @date        29/04/2014
 * @file        AirportManager.php
 */

namespace Application\Service;
use Application\Entity\Airport;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * AirportManager
 */
class AirportManager implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     * @param $id
     *
     * @return \Application\Entity\User
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function find($id)
    {
        return $this->getServiceLocator()->get('application.mapper.airport')->find($id);
    }

    public function findAll()
    {
        return $this->getServiceLocator()->get('application.mapper.airport')->findAll();
    }


    public function persist(Airport $e)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getServiceLocator()->get('em');

        $em->persist($e);

        $em->flush();
    }

    public function remove(Airport $user)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getServiceLocator()->get('em');

        $em->remove($user);
    }
} 