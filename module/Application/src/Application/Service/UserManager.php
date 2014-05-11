<?php
/**
 * User.php
 *
 * @date        29/04/2014
 * @file        User.php
 */

namespace Application\Service;
use Application\Entity\User;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * UserManager
 */
class UserManager implements ServiceLocatorAwareInterface
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
        return $this->getServiceLocator()->get('application.mapper.user')->find($id);
    }

    public function findAll()
    {
        return $this->getServiceLocator()->get('application.mapper.user')->findAll();
    }


    public function persist(User $user)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getServiceLocator()->get('em');

        $em->persist($user);

        $em->flush();
    }

    public function remove(User $user)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getServiceLocator()->get('em');

        $em->remove($user);
    }
} 