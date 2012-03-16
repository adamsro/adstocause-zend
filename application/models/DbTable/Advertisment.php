<?php

class Model_DbTable_Advertisment extends Zend_Db_Table_Abstract {

    protected $_name = 'advertisment';

    /* Select one random advertisment for display */
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

        public function getdvertismentByUrl($url) {
        // SELECT `a`.*, `b`.* FROM `advertisment` AS `a` INNER JOIN `business` AS `b` ON a.aid = b.bid ORDER BY RAND() ASC LIMIT 1
        $res = $this->select()
                ->setIntegrityCheck(false) // rows become read only, cannot save updated result
                ->from(array('a' => 'advertisment'))
                ->where('a.url = ?', $url)
                ->join(array('b' => 'business'), 'a.aid = b.bid')
                ->limit(1)
                ->query();
        //exit(var_dump($res));
        return $res->fetch();
    }

}
