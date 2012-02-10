<?php
class Form_Post extends Zend_Form
{
	public function __construct()
	{
		parent::__construct($options);
		$this->setName('Posts');
		$id = new Zend_Form_Element_Hidden('id');
		$title = new Zend_Form_Element_Text('Title');
		$title->setLabel('Title')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
		$allowedTags = array(
						'a' => array('href', 'title'),
						'strong',
						'img' => array('src', 'alt'),
						'ul',
						'ol',
						'li',
						'em',
						'u',
						'p',
						'strike');
		$description = new Zend_Form_Element_Textarea('Description');
		$description->setLabel('Description')
				->setRequired(true)
				->setAttrib('rows',20)
				->setAttrib('cols',50)
				->addFilter('StringTrim')
/*				->addFilter('StripTags', $allowedTags)
 * 				Don't know why its not working ?
 */
				->addValidator('NotEmpty');
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		$this->addElements( array( $id, $title, $description, $submit ));
	}
}