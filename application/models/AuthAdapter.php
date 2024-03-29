<?php
class Model_AuthAdapter implements Zend_Auth_Adapter_Interface
{
	protected $email;
	protected $password;
	protected $user;

	public function __construct($email, $password) {
		$this->email = $email;
		$this->password = $password;
		$this->user = new Model_DbTable_Users();
	}

	public function authenticate()
	{
		$match = $this->user->findCredentials($this->email, $this->password);
		//var_dump($match);
		if(!$match) {
			$result = new Zend_Auth_Result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, null);
		} else {
			$user = current($match);
			$result = new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $user);
		}
		return $result;
	}

}