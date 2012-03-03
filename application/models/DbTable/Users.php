<?php

class Model_DbTable_Users extends Zend_Db_Table_Abstract {
    /*
     * @var $_name table name : users
     */

    protected $_name = 'users';

    //Zend_Db_Adapter_Abstract::query()
    public function save($post) {
        if (!$post['email'] || !$post['password'])
            throw new Exception('email or password missing.');
        $data = array();
        $data['email'] = $post['email'];
        $data['password'] = $this->hashPassword($post['password']);
        $data['created'] = time();
        $data['last'] = time();
        unset($post['email']);
        unset($post['password']);
        unset($post['register-submit']);
        unset($post['hash']);
        $data['meta'] = serialize($post);
        /* 
         * INSERT INTO `users` (`email`, `password`, `created`, `last`, `meta`)
         *  VALUES (?, ?, ?, ?, ?)
         */
        $insert = $this->insert($data);
    }

    public function findCredentials($email, $pwd) {
        $select = $this->select()
                ->where('email = ?', $email)
                ->where('password = ?', $this->hashPassword($pwd));
        $row = $this->fetchRow($select);
        if ($row) {
            return $row;
        }
        return false;
    }

    protected function hashPassword($pwd) {
        return md5($pwd);
    }

}