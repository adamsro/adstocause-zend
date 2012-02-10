<?php

class GalleryController extends Zend_Controller_Action
{
	public function init()
	{
		/* Initialize action controller here */
		$this->user = 'kthari85';
	}

	public function indexAction()
	{
		// action body
		/*
		 * Get the various albums of current user .
		 * Only public photos and albums will be shown
		 * Not implemented the authentication
		 * We can show when authenticated. But I am not adding for now .
		 */
		$service = new Zend_Gdata_Photos();
		$query = new Zend_Gdata_Photos_UserQuery();
		$query->setUser($this->user);
		try {
			$userFeed = $service->getUserFeed(null, $query);
			$this->view->userFeed = $userFeed;
		} catch (Zend_Gdata_App_Exception $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function albumAction()
	{
		// action body
		$service = new Zend_Gdata_Photos();
		$user = $this->_getParam('user');
		$albumId = $this->_getParam('albumId');
		/*
		 * Get photos from Album
		 */
		$query = new Zend_Gdata_Photos_AlbumQuery();
		$query->setUser($user);
		$query->setAlbumId($albumId);
		$albumFeed = $service->getAlbumFeed($query);
		/*
		 * Assign to view
		 */
		$this->view->albumFeed = $albumFeed;
		$this->view->user = $user;
		$this->view->albumId = $albumId;
	}

	public function viewAction()
	{
		/*
		 * View a particular picture in fullsize from an album
		 */
		/*
		 * Get user and albumId
		 */
		$user = $this->_getParam('user');
		$albumId = $this->_getParam('albumId');
		$photoId = $this->_getParam('photoId');
		
		$service = new Zend_Gdata_Photos();
		$query = new Zend_Gdata_Photos_PhotoQuery();
		$query->setUser($user);
		$query->setAlbumId($albumId);
		$query->setPhotoId($photoId);
		$query = $query->getQueryUrl() . "?kind=comment,tag";

		$photoFeed = $service->getPhotoFeed($query);
		$this->view->photoFeed = $photoFeed;
		$this->view->user = $user;
		$this->view->albumId = $albumId;
		
	}

}