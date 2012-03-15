<?php

class Form_Login extends Zend_Form {

    public function init() {
        $this->setName('UserEmail');

        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Email')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $pass = new Zend_Form_Element_Password('pass');
        $pass->setLabel('Password')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $redirect = new Zend_Form_Element_Hidden('redirect');

        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($username, $pass, $submit));
    }

}