<?php
class Model_Acl extends Zend_Acl 
{

	public function __construct() 
	{
		/*
		 * Need to implement these fatures . Just to show what are the things I am going to add 
		 */
		
		/*
		 *  Add a new role called "guest"
		 *  Guest can view contents of the site 
		 */
		$this->addRole(new Zend_Acl_Role('guest'));

		/* 
		 * Add a role called user, which inherits from guest
		 * Users can post comments in site
		 */
		$this->addRole(new Zend_Acl_Role('user'), 'guest');
		
		/* 
		 * Add a role called blogger, which inherits from user
		 * Bloggers can post contents
		 */
		$this->addRole(new Zend_Acl_Role('blogger'), 'user');
		
		/*
		 * Add a role for admin which inherits blogger
		 * With every privilages
		 */
		$this->addRole(new Zend_Acl_Role('admin'), 'blogger');

		//Add a resource called posts
		$this->add(new Zend_Acl_Resource('posts'));
		
		//Add a resource called posts
		$this->add(new Zend_Acl_Resource('comments'));

		//Finally, we want to allow guests to view pages
		$this->allow('guest', 'posts', 'view');

		//User can add comments
		$this->allow('user', 'comments', 'add');
		
		// Bloggers can add, edit posts
		$this->allow('blogger', 'posts', 'edit');
		$this->allow('blogger', 'posts', 'add');
	}
	
	function test()
	{
		
	}
}