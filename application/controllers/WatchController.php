<?php

class WatchController extends Zend_Controller_Action {

    public function init() {
        $this->view->flash = $this->_helper->FlashMessenger->getMessages();
    }

    public function indexAction() {
        $ad = new Model_DbTable_Advertisment();
        $watch = new Zend_Session_Namespace('watch');
        // only switch to new video if this is a fresh login
        if (!isset($watch->ad)) {
            $this->view->the_ad = $watch->ad = $ad->getRandAdvertisment();
            $watch->finished = 0;
        } else {
            $this->view->the_ad = $watch->ad;
        }
        $this->view->points_form = new Form_Point();
    }

    /* Ajax call to add point and switch video */
    public function addpointAction() {
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $point = new Form_Point();
        $watch = new Zend_Session_Namespace('watch');
        $post = $this->getRequest()->getPost();
        /* form uses hash so form may only run processing script once per
         * entire page load */
        if ($this->getRequest()->isPost() && $point->isValid($post) && isset($watch->ad)) {
            try {
            $point = new Model_DbTable_Points();
            $user = Zend_Auth::getInstance()->getIdentity();
            $point->savePointWatch($user, $watch->ad);
            $ad = new Model_DbTable_Advertisment();
            $watch->ad = $ad->getRandAdvertisment();
            } catch (Exception $e){
                unset($watch->ad);
                throw $e;
            }
            echo "1";
        } else {
            echo "0";
        }
    }

}