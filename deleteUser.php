<?php
    session_start();
    include "config/connection.php";
    include "models/functions.php";
    $upit = "delete from users where idUsers ='".$_GET['idUsers']."'";
   $q= $conn->query($upit);
    if($q){
        header("location:users_admin.php");
    }
    else{
        echo 'greska.';
    }
?>