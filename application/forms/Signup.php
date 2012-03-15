<?php

class Form_Signup extends Zend_Form {

    protected $decorators = array(
        array('ViewHelper'),
        array('Errors'),
        array('Label'),
    );

    public function init() {
        $this->setName('Registration');
        $this->setAction('/index');

        $hash = new Zend_Form_Element_Hash('hash');

        $emailRegex = new Zend_Validate_Regex(array('pattern' => '/^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/i'));
        $emailRegex->setMessage('Improperly formatted email address \'%value%\'');
        $email = new Zend_Form_Element_Text('email');
        $email->setAttrib('placeholder', 'Email')
                ->setDecorators($this->decorators)
                ->addValidator($emailRegex, true)
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