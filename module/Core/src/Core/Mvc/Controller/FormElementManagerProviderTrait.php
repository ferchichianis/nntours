<?php
/**
 * FormElementManagerProviderTrait.php
 *
 * @date        28/04/2014
 * @file        FormElementManagerProviderTrait.php
 */

namespace Core\Mvc\Controller;


trait FormElementManagerProviderTrait
{

    /**
     * Get the form element manager instance
     *
     * @return \Zend\Form\FormElementManager
     */
    public function getFormElementManager()
    {
        return $this->getServiceLocator()->get('formElementManager');
    }


    /**
     * @return  \Zend\ServiceManager\ServiceManager
     */
    abstract public function getServiceLocator();

} 