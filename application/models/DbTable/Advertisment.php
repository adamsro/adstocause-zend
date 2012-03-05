<?php

class Model_DbTable_Advertisment extends Zend_Db_Table_Abstract {

    protected $_name = 'advertisment';

    /*
     * Select one random advertisment for display
     */

    public function getRandAdvertisment() {
        // SELECT `a`.*, `b`.* FROM `advertisment` AS `a` INNER JOIN `business` AS `b` ON a.aid = b.bid ORDER BY RAND() ASC LIMIT 1
        $res = $this->select()
                ->setIntegrityCheck(false) // rows become read only, cannot save updated result
                ->from(array('a' => 'advertisment'))
                ->join(array('b' => 'business'), 'a.aid = b.bid')
                ->order('RAND()')
                ->limit(1)
                ->query();
        //exit(var_dump($res));
        return $res->fetch();
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