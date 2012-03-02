<?php

class Form_Signup extends Zend_Form {

    protected $decorators = array(
        array('ViewHelper'),
        array('Errors'),
        array('Label'),
    );

    public function __construct() {
        parent::__construct($options);
        $this->setName('Registration');
        $this->setAction('/index');

        $hash = new Zend_Form_Element_Hash('hash');

        $email = new Zend_Form_Element_Text('email');
        $email->setAttrib('placeholder', 'Email')
                ->setDecorators($this->decorators)
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $password = new Zend_Form_Element_Password('password');
        $password->setAttrib('placeholder', 'Password')
                ->setDecorators($this->decorators)
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $repeat = new Zend_Form_Element_Password('repeat');
        $repeat->setAttrib('placeholder', 'Repeat Password')
                ->setDecorators($this->decorators)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Sign up');
        $submit->setAttrib('name', 'signup-submit');

        $this->addElements(array($hash, $email, $password, $repeat, $submit));
    }

}