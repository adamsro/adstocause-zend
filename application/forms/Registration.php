<?php
class Form_Registration extends Zend_Form
{
	public function __construct()
	{
		parent::__construct($options);
		$this->setName('Registration');
		$username = new Zend_Form_Element_Text('username');
		$username->setLabel('Your Name')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('Email')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Password')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		$this->addElements( array($username, $email, $password, $submit));
	}
}