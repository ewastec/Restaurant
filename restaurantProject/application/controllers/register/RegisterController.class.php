<?php

class RegisterController
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
		// if (filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL)) {
        //     //for email validation (refer: http://us.php.net/manual/en/function.filter-var.php)

        //     $email = $_POST['e-mail'];
        // } else {
        //     $error[] = 'Your EMail Address is invalid  ';
        // }
		$email = $formFields['email'];
		
		//create an array with value from formFields
		$form = [];
		foreach($formFields as $key=>$value)
		{
			$form[] = $value;
		}

		// check if email exist in db
		$userMod = new UserModel();
		$numberOfUsers = $userMod->checkEmail($email);
		//var_dump(count($numberOfUsers)); die;

		if(count($numberOfUsers) > 0)
		{
			$message = 'user with this email addresse alredy exist !!!';
		}else{
			//register user		
			$message = $userMod->registerUser($form);
		}
		return ['message' => $message];
    }
}