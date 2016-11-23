<?php


namespace ZfcUser\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ZfcUser\Form;

class ChangePassword implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ){
        
        $sm = $container;
        $fem = $sm->get('FormElementManager');

        $options = $sm->get('zfcuser_module_options');
        $form = new Form\ChangePassword(null, $options);
        // Inject the FormElementManager to support custom FormElements
        $form->getFormFactory()->setFormElementManager($fem);

        $form->setInputFilter(new Form\ChangePasswordFilter($options));

        return $form;
    }
}
