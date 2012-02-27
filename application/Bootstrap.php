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

}