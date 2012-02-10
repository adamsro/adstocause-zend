<?php

class IndexController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
	}

	public function indexAction()
	{
		// action body
		/*
		 * Get new posts and paginate
		 */
		$posts = new Model_DbTable_Posts();
		$result = $posts->getPosts();
		$page = $this->_getParam('page',1);
		$paginator = Zend_Paginator::factory($result);
		$paginator->setItemCountPerPage(2);
		$paginator->setCurrentPageNumber($page);
		$this->view->paginator = $paginator;
	}

	public function loginAction()
	{
		/*
		 * Creating $loginForm object of class Form_Login
		 */
		$loginForm = new Form_Login();
		/*
		 * Trying to redirect to the page from which it came
		 */
		$redirect = $this->getRequest()->getParam('redirect', 'index/index');
		$loginForm->setAttrib('redirect', $redirect );
		/*
		 * Get the Zend_Auth instance
		 */
		$auth = Zend_Auth::getInstance();
		/*
		 * Check whether it has any identity , else check whether the login form is submitted
		 */
		if(Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/index/hello');
		} else if ($this->getRequest()->isPost()) {
			if ( $loginForm->isValid($this->getRequest()->getPost()) ) {
				/*
				 * Get the username
				 */
				$username = $this->getRequest()->getPost('username');
				/*
				 * Get password
				 */
				$pwd = $this->getRequest()->getPost('pass');
				/*
				 * Create object $authAdapter of class Model_AuthAdapter
				 */
				$authAdapter = new Model_AuthAdapter($username, $pwd);
				/*
				 * Try to authenticate and check whether its valid
				 */
				$result = $auth->authenticate($authAdapter);
				if(!$result->isValid()) {
					switch ($result->getCode()) {
						case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
							$this->view->error = 'user credentials not found';
					}
				} else {
					/*
					 * If its valid redirect it . Now it will not work ;) . 
					 * Have not implemented the redirect to the page from where it came.
					 */
					$this->_redirect( $redirect );
				}
			}
		}
		/*
		 * Assign the form elements to view
		 */
		$this->view->loginForm = $loginForm;
	}

	public function logoutAction()
	{
		/*
		 * Logout and clear session
		 */
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();
		$this->_redirect('/');
	}
	
	public function registerAction()
	{
		/*
		 * Register for new account
		 */
		$register = new Form_Registration();
		if(Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/index/hello');
		} else if ($this->getRequest()->isPost()) {
			if ( $register->isValid($this->getRequest()->getPost()) ) {
				
			}	
		}	
		$this->view->register = $register;
	}
	
	public function forgotPasswordAction()
	{
		/*
		 * User submits for new password 
		 */
		$forgotPassword = new Form_ForgotPassword();
		if(Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/index/hello');
		} else if ($this->getRequest()->isPost()) {
			if ( $forgotPassword->isValid($this->getRequest()->getPost()) ) {
				
			}	
		}	
		$this->view->forgotPassword = $forgotPassword;
	}
}