<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "config/connection.php";
        include "models/functions.php";
        if(isset($_POST['check'])){
        try{
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $errors=array();
            $answerServer="";

            $name_valid = "/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,14})*$/";
            $email_valid="/^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9]+(\.[a-z0-9]+)*(\.[a-z]{2,3})$/";
            $password_valid = "/^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{6,10}$/";

            /*firstName*/
            if($firstName == ""){
            $errors['firstName'] = "Please fill out this field.";
            }
            else{
                if(!preg_match($name_valid,$firstName))
                {
                    $errors['firstName'] = "At least 3 chars. Start with a capital letter.";
                }
            }
            /*username*/
            if($username == "")
            {
                $errors['username'] = "Please fill out this field.";
            }
            else{
                if(!preg_match($name_valid,$username))
                {
                    $errors['username'] = "Name is not valid. Required and alphabates only. Start with a capital letter.";
                }
            }
            /*lastName*/
            if($lastName == "")
            {
                $errors['lastName']  = "Please fill out this field.";
            }
            else
            {
                if(!preg_match($name_valid, $lastName))
                {
                    $errors['lastName']  = "Last name is not valid. Required and alphabates only. Start with a capital letter.";
                }
            }
            /*email*/
            if($email == ""){
            $errors['email'] = "Please fill out this field. ";
            }
            else{
                if(!preg_match($email_valid,$email)){
                $errors['email']  = "Email is not valid. Example: user.name@focus.com";
                }
            }
            
            /*password*/
            if($password == ""){
            $errors['password'] = "Please fill out this field. ";
            }
        else{
            if(!preg_match($password_valid,$password)){
            $errors['password'] = "Password must contain at least 6-10 characters.  At least one alpha AND one number. The following special chars are allowed (0 or more): !@#$%";
            }                     
            }
            //$sifrovanaLozinka = md5($lozinka);
            
            if(count($errors)==0){
            $idRole = 2;
            $newUser = enterUsers($firstName, $lastName, $email, $username,$password,$idRole);
           if($newUser){
                $answer = ["answer"=>"Congratulations, your account has been successfully created."];
                echo json_encode($answer);
                http_response_code(201);
                header("location: login.php");
            }
        }
     }
        catch(PDOException $exception){
            $exception = "Please, change your username, this is in use.";
            echo json_encode($exception);
            http_response_code(500);
        }
    }
 }
    else{
        http_response_code(404);
    }
    
?>



