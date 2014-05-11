<?php
/**
 * MapperDoctrineAbstract.php
 *
 * @date        30/04/2014
 * @file        MapperDoctrineAbstract.php
 */

namespace Core\Mapper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;


/**
 * MapperDoctrineAbstract
 */
class MapperDoctrineAbstract implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     * @var string
     */
    protected $entityClassName;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $entityRepository;

    /**
     * @return string
     */
    public function getEntityClassName()
    {
        return $this->entityClassName;
    }

    /**
     * @param string $entityClassName
     *
     * @return $this
     */
    public function setEntityClassName($entityClassName)
    {
        $this->entityClassName = $entityClassName;
        return $this;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     * @throws \Exception
     */
    public function getEntityManager()
    {
        if (!$this->entityManager) {
            if ($this->getServiceLocator()->has('Doctrine\ORM\EntityManager')) {
                $this->setEntityManager($this->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
            } else {
                throw new \Exception('no service entity manager set');
            }
        }

        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     *
     * @return $this
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return EntityRepository
     * @throws \Exception
     */
    public function getEntityRepository()
    {
        if (!$this->entityRepository) {
            if ($this->getEntityClassName()) {
                $this->setEntityRepository($this->getEntityManager()
                                                ->getRepository($this->getEntityClassName()));
            } else {
                throw new \Exception('No Entity Class defined');
            }
        }

        return $this->entityRepository;
    }

    /**
     * @param EntityRepository $entityRepository
     *
     * @return $this
     */
    public function setEntityRepository(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
        return $this;
    }


}