<?php

class Model_DbTable_Charity extends Zend_Db_Table_Abstract {

    protected $_name = 'charity';

    public function findXNum($number) {
        $res = $this->select()
                ->setIntegrityCheck(false) // rows become read only, cannot save updated result
                ->from('charity')
                ->order('RAND()')
                ->limit($number)
                ->query();
        return $res->fetchAll();
    }

    public function save($commentForm) {
        $data = array('post_id' => $commentForm['id'],
            'Description' => $commentForm['comment'],
            'Name' => $commentForm['name'],
            'Email' => $commentForm['email'],
            'Webpage' => $commentForm['webpage']);
        $this->insert($data);
    }

}