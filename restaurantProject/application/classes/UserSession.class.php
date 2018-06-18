<?php
class UserSession
{
	public function __construct()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
            // Démarrage du module PHP de gestion des sessions.
			session_start();
		}
	}
    public function create($userId, $firstName, $lastName, $email, $street, $city, $codePostal, $tel)
    {
        // Construction de la session utilisateur
        $_SESSION['user'] =
        [
            'UserId'    => $userId,
            'FirstName' => $firstName,
            'LastName'  => $lastName,
            'Email'     => $email,
            'Street'    => $street,
            'City'      => $city,
            'CodePostal'=> $codePostal,
            'Tel'       => $tel
        ];
    }
    public function destroy()
    {
        // Destruction de l'ensemble de la session.
        $_SESSION = array();
        session_destroy();
    }
    public function getTel()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['Tel'];
    }
    public function getCodePostal()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['CodePostal'];
    }
    public function getCity()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['City'];
    }
    public function getStreet()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['Street'];
    }
    public function getEmail()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['Email'];
    }
    public function getFirstName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['FirstName'];
    }
    public function getFullName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['FirstName'].' '.$_SESSION['user']['LastName'];
    }
    public function getLastName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['LastName'];

    }
    public function getUserId()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['UserId'];
    }
	public function isAuthenticated()
	{
		if(array_key_exists('user', $_SESSION) == true)
		{
			if(empty($_SESSION['user']) == false)
			{
				return true;
			}
		}
		return false;
	}
}