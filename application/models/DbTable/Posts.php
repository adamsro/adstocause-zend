<?php
class Model_DbTable_Posts extends Zend_Db_Table_Abstract
{
	protected $_name = 'posts';

	public function getPosts()
	{
		$orderby = array('id DESC');
		$result = $this->fetchAll('1', $orderby );
		return $result->toArray();
	}

	public function getPost( $id )
	{
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row) {
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}

	/*
	 * Add new posts
	 */
	public function savePost( $post )
	{
		$data = array( 'Title'=> $post['Title'],
				'Description'=> $post['Description']);
		$this->insert($data);
	}
	
	/*
	 * Update old posts
	 */
	public function updatePost( $post )
	{
		$data = array(
				'id'=> $post['id'],
				'Title'=> $post['Title'],
				'Description'=> $post['Description']);
		$where = 'id = '.$post['id'];
		$this->update($data , $where );
	}
}