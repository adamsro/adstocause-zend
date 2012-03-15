<?php

class Form_Point extends Zend_Form {

    protected $decorators = array(
        array('ViewHelper'),
        array('Errors'),
        array('Label'),
    );

    public function init() {
        $this->setName('Registration');
        $this->setAction('/watch/addpoint');

        $csrf = new Zend_Form_Element_Hash('hash');
        $this->addElement($csrf);

        $email = new Zend_Form_Element_Hidden('email');
        $this->addElement($email);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Next');
        $submit->setAttrib('name', 'point-submit');
        $submit->setAttrib('id', 'point-submit');
        $this->addElement($submit);
    }

}