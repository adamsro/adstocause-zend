<?php

class Form_Registration extends Zend_Form {

    protected $decorators = array(
        array('ViewHelper'),
        array('Errors'),
        array('Label'),
    );

    public function init() {
        $this->setName('Registration');
        $this->setAction('/index/register');

        $csrf = new Zend_Form_Element_Hash('hash');
        $this->addElement($csrf);

        $email = new Zend_Form_Element_Hidden('email');
        $this->addElement($email);

        $password = new Zend_Form_Element_Hidden('password');
        $this->addElement($password);

        // print all charities in database as options
        $charity = new Zend_Form_Element_MultiCheckbox('charities');
        $charity->setDecorators($this->decorators);
        $this->addElement($charity);

        // print all add categories from db to screen
        $categories = new Zend_Form_Element_MultiCheckbox('categories');
        $categories->setDecorators($this->decorators);
        $this->addElement($categories);

        // A bit about the person
        $options = array('male' => 'male',
            'female' => 'female',
            'null' => 'prefer not to say');
        $gender = new Zend_Form_Element_Radio('gender');
        $gender->setMultiOptions($options);
        $gender->setLabel('Gender: ')
                ->setDecorators($this->decorators);
        $this->addElement($gender);


        $age = new Zend_Form_Element_Text('age');
        $age->setLabel('Age:')
                ->setDecorators($this->decorators)
                ->setRequired(true)
                ->setAttrib('size', '8')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        $age_val = new Zend_Validate_Int();
        $age_val->setMessage('Value must be numeric.');
        $age->addValidator($age_val);
        $this->addElement($age);


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Sign up');
        $submit->setAttrib('name', 'register-submit');
        $this->addElement($submit);
    }

    public function setEmail($email) {
        $this->getElement('email')->setValue($email);
    }

    public function setPassword($password) {
        $this->getElement('password')->setValue($password);
    }

    /**
     * Set checkbox values for list of desired charities
     *  @param array of format name,value
     */
    public function setCharities(array $charities) {
        $this->getElement('charities')->addMultiOptions($charities);
    }

    /**
     * Set checkbox values for list of desired ad categories
     *  @param array of format name,value
     */
    public function setAdCategories(array $categories) {
        $this->getElement('categories')->addMultiOptions($categories);
    }

}