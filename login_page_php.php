<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "config/connection.php";
        include "models/functions.php";
        try{
          
          $username = $_POST['username'];
            $password = $_POST['password'];
            $errorsArray=array();
            $answerServer="";
            $name_valid = "/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,14}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,14})*$/";
            $password_valid = "/^(?=.*\d+)(?=.*[a-zA-Z])[0-9a-zA-Z!@#$%]{6,10}$/";

             /*username*/
             if($username == "")
             {
                 $errorsArray['username'] = "Please fill out this field.";
             }
             else{
                 if(!preg_match($name_valid,$username))
                 {
                     $errorsArray['username'] = "Name is not valid. Required and alphabates only. Start with a capital letter.";
                 }
             }
            /*password*/
            if($password == ""){
            $errorsArray['password'] = "Please fill out this field. ";
            }
        else{
            if(!preg_match($password_valid,$password)){
            $errorsArray['password'] = "Password must contain at least 6-10 characters.
              At least one alpha AND one number. The following special chars are allowed (0 or more): !@#$%";
            }                     
            }
           // $password = md5($password);
           if(count($errorsArray)==0){
           $objUser = checkedLogin($username, $password);
            if($objUser)
            {
             $_SESSION['user'] = $objUser;
             $_SESSION['userId'] = $objUser->idUsers;
              $answerServer = ["idRole"=>$objUser->idRole];
              echo json_encode($answerServer);
              http_response_code(200);
              //header('Location:category.php');
            }else
            {
                //$answerServer = ["idRole"=>"Please, check your credentials and try again."];
                //echo json_encode($answerServer);
              header('Location:login.php'); 
            } 
        }
        }
        
        catch(PDOException $exception){
            http_response_code(500);
        }
 }
    else{
        http_response_code(404);
    }
    
?>