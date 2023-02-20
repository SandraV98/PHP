<?php
    session_start();
    include "config/connection.php";
    include "models/functions.php";
    $deleteMenu = "delete from users where idUsers ='".$_GET['idMenu']."'";
   $deleteMenu= $conn->query($deleteMenu);
    if($deleteMenu){
        header("location:menu_admin.php");
    }
    else{
        echo 'error.';
    }
?>