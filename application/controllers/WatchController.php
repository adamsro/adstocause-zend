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
        } else {
            $this->view->the_ad = $watch->ad;
        }
        $this->view->points_form = new Form_Point();
        /* now query for points */
        $points = new Model_DbTable_Points();
        $user = Zend_Auth::getInstance()->getIdentity();
        $result = $points->getCountForUser($user);

        $char = new Model_DbTable_Charity();
        $charities = $char->findXNum(4);
        $this->view->charities = $charities;
        $this->view->charity_form = new Form_Donate();
        $this->view->points = $result['count'];
        $this->view->dollars = $result['dollars'];
    }

    /* Ajax call to add point and switch video */

    public function addpointAction() {
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $point = new Form_Point();
        $watch = new Zend_Session_Namespace('watch');
        $theadsstfsf = $watch->ad;
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
            } catch (Exception $e) {
                unset($watch->ad);
                throw $e;
            }
            echo "1";
        } else {
            echo "0";
        }
    }

    public function donateAction() {
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $donate = new Form_Donate();
        $post = $this->getRequest()->getPost();
        /* form uses hash so form may only run processing script once per
         * entire page load */
        if ($this->getRequest()->isPost() && $donate->isValid($post)) {
            try {
                $point = new Model_DbTable_Points();
                $user = Zend_Auth::getInstance()->getIdentity();
                $point->donatePoints($user, $post['cid'], $post['points']);
            } catch (Exception $e) {
                throw $e;
            }
            echo "1";
        } else {
            echo "0";
        }
    }

}