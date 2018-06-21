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
		
		$validateForm = new FormValidation();
		try {
			$validateForm->isValid($formFields);
			//create an array with value from formFields
			// $form = [];
			// foreach($formFields as $key=>$value)
			// {
			// 	$form[] = $value;
			// }
			$form = array_values($formFields);
			$slice = array_splice($form, 4, 1);
			//var_dump($form); die;
			// check if email exist in db
			$email = $formFields['email'];
			$userMod = new UserModel();
			$numberOfUsers = $userMod->checkEmail($email);
			//var_dump(count($numberOfUsers)); die;

			if(count($numberOfUsers) > 0)
			{
				$message = 'user with this email addresse alredy exist !!!';
				return ['message' => $message];
			}else{
				//push role on the end of array
				$role = 'user';
				array_push($form, $role);
				//var_dump($form); die;
				//register user		
				$userMod->registerUser($form);
				$http->redirectTo('/login');
			}
			
		} catch (Exception $e) {
			$http->redirectTo('/');
		}
    }
}
// b@gmail.com