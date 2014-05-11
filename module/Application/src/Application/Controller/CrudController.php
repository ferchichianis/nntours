<?php
/**
 * CrudController.php
 *
 * @date        28/04/2014
 * @file        CrudController.php
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Core\Mvc\Controller\FormElementManagerProviderInterface;
use Core\Mvc\Controller\FormElementManagerProviderTrait;
use Zend\View\Model\ViewModel;


/**
 * CrudController
 */
class CrudController extends AbstractActionController implements FormElementManagerProviderInterface
{
    use FormElementManagerProviderTrait;

    public function getAction()
    {
        $id = $this->params()->fromRoute('id');

        $entityName = $this->params()->fromRoute('entity');

        $locator = $this->getServiceLocator();

        $entity = $locator->get('application.service.' . $entityName . '-manager')->find($id);

        if (!$entity) {
            $this->getResponse()->setStatusCode(404);
            return false;
        }

        return
            (
                new ViewModel(
                    [
                        'entity' => $entity,
                    ]
                )
            )
            ->addChild(
                (
                    new ViewModel(
                        [
                            'entity' => $entity,
                            'entityName' => $entityName
                        ]
                    )
                )
                ->setTemplate('application/get-buttongroups.phtml'),
                'buttonsView'
            )
            ->setTemplate('application/' . $entityName . '/get.phtml');


    }

    public function listAction()
    {
        $entityName = $this->params()->fromRoute('entity');
        return
            (
            new ViewModel(
                [
                    'entities' => $this->getServiceLocator()->get('application.service.' . $entityName . '-manager')->findAll(),
                ]
            )
            )
                ->addChild(
                    (
                    new ViewModel(
                        [
                            'entityName' => $entityName
                        ]
                    )
                    )
                        ->setTemplate('application/list-buttongroups.phtml'),
                    'buttons'
                )
                ->setTemplate('application/' . $entityName . '/list.phtml');
    }

    public function deleteAction()
    {

    }

    public function setAction()
    {
        $entityName = $this->params()->fromRoute('entity');

        $locator = $this->getServiceLocator();

        /** @var \Core\Form\FormAbstract $form */
        #$form = $this->getFormElementManager()->get('form.' . $entityName . '.set');
        $form = $this->getFormElementManager()->get('form.' . $entityName . '.set');

        if ($id = $this->params()->fromRoute('id')) {
            $entity = $locator->get('application.service.' . $entityName . '-manager')->find($id);

            if (!$entity) {
                $this->getResponse()->setStatusCode(404);
                return false;
            }
            $form->bind($entity);
        }

        if ($this->getRequest()->isPost()) {
            $form->setData($this->params()->fromPost());

            if ($form->isValid()) {
                /** @var \Application\Service\HotelManager $userManager */
                $locator->get('application.service.' . $entityName . '-manager')->persist($form->getObject());
                $this->redirect()->toRoute('crud', ['entity' => $entityName,'action' => 'get', 'id' => $form->getObject()->getId()]);
            }
        }

        return
            (
                new ViewModel(
                    [
                        'form' => $form,
                    ]
                )
            )
            ->addChild(
                (
                    new ViewModel(
                        [
                            'entityName' => $entityName
                        ]
                    )
                )
                ->setTemplate('application/set-buttongroups.phtml'),
                'buttonsSet'
            )
            ->setTemplate('application/' . $entityName . '/set.phtml');
    }
} 