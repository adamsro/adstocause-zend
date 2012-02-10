<?php
class Model_DbTable_Comments extends Zend_Db_Table_Abstract
{
	protected $_name = 'comments';
	
	public function getComments( $postid ) 
	{
		$result = $this->fetchAll( "post_id = '$postid'"  );
		return $result->toArray();
	}
	
	public function saveComment( $commentForm )
	{
		$data = array('post_id' => $commentForm['id'] ,
				'Description' => $commentForm['comment'],
				'Name' => $commentForm['name'],
				'Email' => $commentForm['email'],
				'Webpage' => $commentForm['webpage'] );
		$this->insert($data);
	}
	
}