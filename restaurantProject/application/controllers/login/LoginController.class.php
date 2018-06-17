<?php

class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
		//get information send by post
		//var_dump($formFields); die;
		$form = [];
		foreach($formFields as $key=>$value)
		{
			$form[] = $value;
		}

		 //check if email and password exists in db
		 $userMod = new UserModel();
		 $numberOfUsers = $userMod->loginUser($form);

		 //var_dump(count($numberOfUsers));
		//if user exist check the password 
		//else message error there is no user with this email
		if(count($numberOfUsers) > 0)
		{			
			// if password match create session 
			$message = 'You are logged in !!!';
			$_SESSION = $numberOfUsers;
			var_dump($_SESSION);  
		}
		else
		{
			$message = 'wrong password or email';
		}
		return ['message' => $message];
    }
}