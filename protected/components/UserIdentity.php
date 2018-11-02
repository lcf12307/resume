<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
		$model = new Model('user');
	    $result = $model->selectOne('*', array(
		    'id' => $this->username,
            'password' => $this->password,
            'type' => 0
        ));
	    if (empty($result)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
	        $this->errorCode=self::ERROR_NONE;
	        $roots = array(
	            6
            );
	        if ($result['id'] == 1){
	            $this->role=0;
            } elseif (in_array($result['id'], $roots)){
	            $this->role = 1;
            } else {
	            $this->role = 2;
            }
            $this->id = $result['id'];
	        $this->name = $result['name'];
        }

		return !$this->errorCode;
	}
}