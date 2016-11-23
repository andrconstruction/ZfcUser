<?php

namespace ZfcUser\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ZfcUser\Form;
use ZfcUser\Validator;

class Register implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ){
        
        $sm = $container;
        $fem = $sm->get('FormElementManager');
       

        $options = $sm->get('zfcuser_module_options');
        $form = new Form\Register(null, $options);
        // Inject the FormElementManager to support custom FormElements
        $form->getFormFactory()->setFormElementManager($fem);

        //$form->setCaptchaElement($sm->get('zfcuser_captcha_element'));
        $form->setHydrator($sm->get('zfcuser_register_form_hydrator'));
        $form->setInputFilter(new Form\RegisterFilter(
            new Validator\NoRecordExists(array(
                'mapper' => $sm->get('zfcuser_user_mapper'),
                'key'    => 'email'
            )),
            new Validator\NoRecordExists(array(
                'mapper' => $sm->get('zfcuser_user_mapper'),
                'key'    => 'username'
            )),
            $options
        ));

        return $form;
    }
}
