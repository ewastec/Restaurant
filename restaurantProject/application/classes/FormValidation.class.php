<?php 
class FormValidation
{
    public function ifIsEmpty($formFields)
    {
        $form = array_values($formFields);

        foreach($form as $x)
        {
            if(empty($x))
            {
                $errorEmpty = "This cant be empty";
                throw new Exception($errorEmpty);
            }
        }

        return true;
    }
    public function isValid($formFields) {
        return $this->ifIsEmpty($formFields);
    }
    //public function 
    // public function validateRegister($formFields)
    // {
    //     $first_name = $formFields['first_name'];
    //     $last_name = $formFields['last_name'];
    //     $email = $formFields['email'];
    //     $password = $formFields['password'];
    //     $password2 = $formFields['password2'];
    //     $street = $formFields['street'];
    //     $city = $formFields['city'];
    //     $code_postal = $formFields['code_postal'];
    //     $tel = $formFields['tel'];
    //     //if empty
    //     if(empty($first_name))
    //     {
    //         $allOk = false;
    //         $first_nameErr = "This cant be empty";
    //     }
    //     //verification of email
    //     if (filter_var($email, FILTER_VALIDATE_EMAIL))
    //     {
    //         $allOk = true;
    //     }else{
    //         $allOk = false;
    //         $emailError = "Write your email";
    //     }
    //     //verification of password
    //     if($password === $password2)
    //     {
    //         $allOk = true;
    //     }else{
    //         $allOk = false;
    //         $passwordError = "Password has to match password";
    //     }
    // }
}