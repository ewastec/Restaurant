<?php
class UserModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkEmail($email)
    {
        //var_dump($email); die;
        $sql = "SELECT * FROM `users` WHERE email = ?";
        $result = $this->db->query($sql, [$email]);
        return $result;
    }
    public function registerUser($form)
    {        
        $sql = 'INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `street`, `city`, `code_postal`, `tel`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';		
        $this->db->executeSql($sql, $form);    
        $message = "Thank you for registration !!!";        
        return $message;       
    }
    public function loginUser($form)
    {
        $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
        $result = $this->db->queryOne($sql, $form);
        //var_dump($result); die();
        return $result;
    }
}