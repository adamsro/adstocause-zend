<?php

class Model_DbTable_Points extends Zend_Db_Table_Abstract {

    protected $_name = 'points';

    public function getPoint($id) {
        $id = (int) $id;
        $row = $this->fetchRow('pid = ' . $id);
        if (!$row) {
            throw new Exception("Count not find row $id");
        }
        return $row->toArray();
    }

    /*
     * Add new posts
     */

    public function savePoint($post) {
        $data = array('pid' => $post['pid'],
            'uid' => $post['uid'],
            'aid' => $post['aid']);
        $data['created'] = time();
        $data['last'] = time();
        $this->insert($data);
    }

    public function savePointWatch($user, $ad) {
        $data = array('pid' => $ad['pid'],
            'uid' => $user['uid'],
            'aid' => $ad['aid'],
            'created' => time(),
            'last' => time());
        $this->insert($data);
    }

}