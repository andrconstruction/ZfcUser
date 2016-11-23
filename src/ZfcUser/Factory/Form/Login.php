<?php


namespace ZfcUser\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ZfcUser\Form;

class Login implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ){
        
        $sm = $container;
        $fem = $sm->get('FormElementManager');
       
        /** @var FormElementManager $formElementManager */
        $options = $sm->get('zfcuser_module_options');
        $form = new Form\Login(null, $options);
        // Inject the FormElementManager to support custom FormElements
        $form->getFormFactory()->setFormElementManager($fem);

        $form->setInputFilter(new Form\LoginFilter($options));

        return $form;
    }
}
