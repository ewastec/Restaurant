<?php

class UserController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
		$session = new UserSession();
		if($session->isAuthenticated())
		{
			return ['session' => $session];
		}		
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
		//var_dump($formFields); die;		
		//var_dump(array_keys($formFields)); die;
		$user = new UserModel();
		switch(array_keys($formFields))
		{
			case 'editAccount':
				$user->editUserAccount($formFields[editAccount]);
				break;
			case 'deleteAccount':
				$user->deleteUserAccount($formFields['deleteAccount']);
				break;
		}
		
		
		
    }
}