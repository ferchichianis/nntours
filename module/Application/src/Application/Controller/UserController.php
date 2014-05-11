<?php
/**
 * UserController.php
 *
 * @date        28/04/2014
 * @file        UserController.php
 */

namespace Application\Controller;

use Core\Mvc\Controller\FormElementManagerProviderInterface;
use Core\Mvc\Controller\FormElementManagerProviderTrait;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * UserController
 */
class UserController extends AbstractActionController implements FormElementManagerProviderInterface
{
    use FormElementManagerProviderTrait;

    public function getAction()
    {
        $id = $this->params()->fromRoute('id');

        $locator = $this->getServiceLocator();

        $userEntity = $locator->get('application.service.user-manager')->getById($id);

        return ['user' => $userEntity];
    }

    public function listAction()
    {
        return ['users' => $this->getServiceLocator()->get('application.service.user-manager')->getAll()];
    }

    public function deleteAction()
    {
        return ['users' => $this->getServiceLocator()->get('application.service.user-manager')->getAll()];
    }

    public function setAction()
    {
        $locator = $this->getServiceLocator();

        /** @var \Application\Form\User $form */
        $form = $this->getFormElementManager()->get('form.user.set');

        if ($id = $this->params()->fromRoute('id')) {
            $userEntity = $locator->get('application.service.user-manager')->getById($id);

            if (!$userEntity) {
                $this->getResponse()->setStatusCode(404);
                return false;
            }
            $form->bind($userEntity);
        }

        if ($this->getRequest()->isPost()) {
            $form->setData($this->params()->fromPost());

            if ($form->isValid()) {
                /** @var \Application\Service\UserManager $userManager */
                $locator->get('application.service.user-manager')->persist($form->getObject());
                $this->redirect()->toRoute('user/view', ['id' => $form->getObject()->getId()]);
            }
        }

        return compact('form');
    }
} 