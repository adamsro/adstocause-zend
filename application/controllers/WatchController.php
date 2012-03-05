<?php

class WatchController extends Zend_Controller_Action {

    public function init() {
        $this->view->flash = $this->_helper->FlashMessenger->getMessages();
    }

    public function indexAction() {
        /* http://youtu.be/7wCmMrRX3UM
         * http://www.youtube.com/embed/W0X0cmQAdSE
         * http://youtu.be/tatccHVfuhA
         * http://www.youtube.com/embed/0SiQSjZhOzU
         */
    }

}