<?php
/**
 * FormElementManagerProviderInterface.php
 *
 * @date        28/04/2014
 * @file        FormElementManagerProviderInterface.php
 */

namespace Core\Mvc\Controller;


interface FormElementManagerProviderInterface
{


    /**
     * Get the form element manager instance
     *
     * @return \Zend\Form\FormElementManager
     */
    public function getFormElementManager();


} 