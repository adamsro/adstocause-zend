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

    public function donatePoints($user, $cid, $number) {
        $res = $this->select()
                        //->setIntegrityCheck(false) // rows become read only, cannot save updated result
                        ->from('points')
                        ->order('created')
                        ->where('uid = ? AND cid IS NULL', $user['uid'])
                        ->limit($number)
                        ->query()->fetchAll();
        foreach ($res as $r) {
            $r['cid'] = $cid;
        }
        $res->save();
        return true;
    }

    /* get all unused points tally for a user */

    public function getCountForUser($user) {
        $stmt = $this->getAdapter()
                ->query("SELECT COUNT(*) AS count,  SUM(pointstodollar) AS dollars FROM points p " .
                "LEFT JOIN advertisment a ON a.aid=p.aid " .
                "WHERE uid = ? AND cid IS NULL", array((int) $user['uid']));
        return $stmt->fetch();
        //return (int) $result['count'];
    }

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