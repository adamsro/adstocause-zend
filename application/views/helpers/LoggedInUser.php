<?php

class Zend_View_Helper_LoggedInUser {

    protected $_view;

    function setView($view) {
        $this->_view = $view;
    }

    function loggedInUser() {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $logoutUrl = $this->_view->linkTo('index/logout');
            $user = $auth->getIdentity();
            $username = $this->_view->escape($user['email']);
            $string = 'Logged in as ' . $username . ' | <a href="'
                    . $logoutUrl . '" class="logout-button">Log out</a>';
        } else {
            $loginUrl = $this->_view->linkTo('index/login');
            $string = '<a class="login-button" href="' . $loginUrl . '">Log in</a>';
        }
        return $string;
    }

}