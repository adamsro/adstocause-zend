<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initAutoload() {
        $moduleLoader = new Zend_Application_Module_Autoloader(array(
                    'namespace' => '',
                    'basePath' => APPLICATION_PATH));

        //$autoloader = Zend_Loader_Autoloader::getInstance();
        //$autoloader->setFallbackAutoloader(true);

        return $moduleLoader;
    }

//    protected function _initRoutes() {
//        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini', 'production');
//        $router = Zend_Controller_Front::getInstance()->getRouter();
//        $router->addConfig($config, 'routes');
//    }
    protected function _initViewSettings() {

        //$layout->setLayout('layout');
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $this->_view = $layout->getView();
        $this->_view->addHelperPath(APPLICATION_PATH . '/views/helpers', 'Zend_View_Helper');

        $this->_view->headTitle()->setSeparator(' | ');
        $this->_view->headTitle("Ads to Cause");
    }

}