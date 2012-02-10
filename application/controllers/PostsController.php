<?php

class PostsController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
	}

	public function indexAction()
	{
		// action body
	}

	public function viewAction()
	{
		// action body
		$postid = (int)$this->_getParam('id');
		if( empty($postid) ) {
		}
		$post = new Model_DbTable_Posts();
		$result = $post->getPost($postid);
		$this->view->post = $result;
		$commentsObj = new Model_DbTable_Comments();
		$request = $this->getRequest();
		$commentsForm = new Form_Comments();
		/*
		 * Check the comment form has been posted
		 */
		if ($this->getRequest()->isPost()) {
			if ($commentsForm->isValid($request->getPost())) {
				$model = new Model_DbTable_Comments();
				$model->saveComment($commentsForm->getValues());
				$commentsForm->reset();
			}
		}
		$data = array( 'id'=> $postid );
		$commentsForm->populate( $data );
		$this->view->commentsForm = $commentsForm;
		$comments = $commentsObj->getComments($postid);
		$this->view->comments = $comments;
		$this->view->edit = '/posts/edit/id/'.$postid;
	}

	public function commentsAction()
	{
		// action body
	}

	public function addAction()
	{
		// action body
		if(!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('index/index');
		}
                $acl = new Model_Acl();
		$identity = Zend_Auth::getInstance()->getIdentity();
                if( $acl->isAllowed( $identity['Role'] ,'posts','add') ) {
                    $request = $this->getRequest();
                    $postForm = new Form_Post();
                    if ($this->getRequest()->isPost()) {
                            if ($postForm->isValid($request->getPost())) {
                                    $model = new Model_DbTable_Posts();
                                    $model->savePost($postForm->getValues());
                                    $this->_redirect('index/index');
                            }
                    }
                    $this->view->postForm = $postForm;
                }
	}

	public function editAction()
	{
		// action body
		$request = $this->getRequest();
		$postid = (int)$request->getParam('id');
		if(!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('posts/view/id/'.$postid);
		}
		$identity = Zend_Auth::getInstance()->getIdentity();
		
		$acl = new Model_Acl();
		if( $acl->isAllowed( $identity['Role'] ,'posts','edit') ) {
			$postForm = new Form_Post();
			$postModel = new Model_DbTable_Posts();
			if ($this->getRequest()->isPost()) {
				if ($postForm->isValid($request->getPost())) {
					$postModel->updatePost($postForm->getValues());
					$this->_redirect('posts/view/id/'.$postid);
				}
			} else {
				$result = $postModel->getPost($postid);
				$postForm->populate( $result );
			}
			$this->view->postForm = $postForm;
		} else {
			var_dump( $identity['Role'] );
			//$this->_redirect('posts/view/id/'.$postid);
		}
	}

}