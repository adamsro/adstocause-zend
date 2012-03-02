<?php

class Form_Registration extends Zend_Form {

    public function __construct() {
        parent::__construct($options);
        $this->setName('Registration');

        $email = new Zend_Form_Element_Text('email');
        $email->setAttrib('placeholder', 'Email')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $password = new Zend_Form_Element_Password('password');
        $password->setAttrib('placeholder', 'Password')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $repeat = new Zend_Form_Element_Password('repeat');
        $repeat->setAttrib('placeholder', 'Repeat Password')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Sign up');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($email, $password, $repeat, $submit));
    }

}