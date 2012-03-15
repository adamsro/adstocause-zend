<?php

class Form_Donate extends Zend_Form {

    protected $decorators = array(
        array('ViewHelper'),
        array('Errors'),
        array('Label'),
    );

    public function __construct() {
        parent::__construct($options);
        $this->setName('Donate');
        $this->setAction('/watch/donate');

        $hash = new Zend_Form_Element_Hash('donate_hash');

        $pointsfield = new Zend_Form_Element_Text('points');
        $pointsfield->setAttrib('placeholder', 'Points')
                ->setDecorators($this->decorators)
                ->setRequired(true)
                ->setAttribs(array('size' => 8))
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Donate');
        $submit->setAttrib('name', 'donate-submit');

        $this->addElements(array($hash, $pointsfield, $submit));
    }

}