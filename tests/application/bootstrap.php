<?php

error_reporting(E_ALL | E_STRICT);

// Define path to application directory
defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../application'));

// Define application environment
defined('APPLICATION_ENV')
|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

// Set include path for Zend and Doctrine
set_include_path(implode(PATH_SEPARATOR, array(
realpath(APPLICATION_PATH . '/../../library'),
get_include_path(),
)));

// Set local library include path
set_include_path(implode(PATH_SEPARATOR, array(
realpath(APPLICATION_PATH . '/../library'),
get_include_path(),
)));

// echo get_include_path();
/** Zend_Application */
require_once 'Zend/Application.php';
require_once 'ControllerTestCase.php';