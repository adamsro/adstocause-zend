<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        $this->view->flash = $this->_helper->FlashMessenger->getMessages();
    }

    public function indexAction() {
        $this->view->headTitle('Raise money through Advertisments', 'APPEND');

        $signup = new Form_Signup();
        $post = $this->getRequest()->getPost();
        if ($this->getRequest()->isPost() && $signup->isValid($post)) {
            $this->_forward('register');
        }
        $this->view->signup = $signup;
    }

    public function loginAction() {

        $loginForm = new Form_Login();
        $redirect = $this->getRequest()->getParam('redirect', 'index/index');
        $loginForm->setAttrib('redirect', $redirect);

        $auth = Zend_Auth::getInstance();

        // Check whether it has any identity , else check whether the login form is submitted
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('/watch');
        } else if ($this->getRequest()->isPost()) {
            if ($loginForm->isValid($this->getRequest()->getPost())) {

                $username = $this->getRequest()->getPost('username');
                $pwd = $this->getRequest()->getPost('pass');

                $authAdapter = new Model_AuthAdapter($username, $pwd);

                $result = $auth->authenticate($authAdapter);
                if (!$result->isValid()) {
                    switch ($result->getCode()) {
                        case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                            $this->view->error = 'user credentials not found';
                    }
                } else {
                    /*
                     * If its valid redirect it . Now it will not work ;) .
                     * Have not implemented the redirect to the page from where it came.
                     */
                    $this->_redirect($redirect);
                }
            }
        }
        /*
         * Assign the form elements to view
         */
        $this->view->loginForm = $loginForm;
    }

    public function logoutAction() {
        /*
         * Logout and clear session
         */
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        $this->_redirect('/');
    }

    public function registerAction() {
        $post = $this->getRequest()->getPost();
        if (!isset($post['register-submit']) && !isset($post['signup-submit'])) {
            $this->_redirect('/');
        }
        $signup = new Form_Signup();
        $register = new Form_Registration();
        $register->setEmail($post['email']);
        $register->setPassword($post['password']);
        $charities = array(1 => 'Red Cross', 2 => 'Blue Cross', 3 => 'Green Cross');
        $register->setCharities($charities);
        $categories = array(1 => 'Red C ross', 2 => 'Blue Cross', 3 => 'Green Cross');
        $register->setAdCategories($categories);

        /* either redirects if logged in, displays register form if signup form submitted,
         * or processes register form if register form submitted */
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $flashMessenger = $this->_helper->getHelper('FlashMessenger');
            $flashMessenger->addMessage('You are already logged in.');
            $this->_redirect('/watch');
        } else if (isset($post['register-submit']) && $register->isValid($post)) {
            $user = new Model_DbTable_Users();
            $user->save($post);
            $auth = Zend_Auth::getInstance();
            $authAdapter = new Model_AuthAdapter($post['email'], $post['password']);
            $result = $auth->authenticate($authAdapter);
            if (Zend_Auth::getInstance()->hasIdentity()) {
                $this->_redirect('/watch');
            } else {
                throw new Exception($result->getCode());
            }
        } else if (isset($post['signup-submit']) && $signup->isValid($post)) {
            unset($this->view->signup);
        }
        $this->view->register = $register;
        echo $this->view->render('index/index.phtml');
    }

    public function forgotPasswordAction() {
        /*
         * User submits for new password
         */
        $forgotPassword = new Form_ForgotPassword();
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('/index/hello');
        } else if ($this->getRequest()->isPost()) {
            if ($forgotPassword->isValid($this->getRequest()->getPost())) {

            }
        }
        $this->view->forgotPassword = $forgotPassword;
    }

    public function sitemapAction() {
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        echo $this->view->navigation()->sitemap();
    }

}