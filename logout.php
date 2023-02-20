<?php
 session_start();  
 session_destroy();  

 session_start();
unset($_SESSION['idUser']);
unset($_SESSION['korisnicko']);
unset($_SESSION['email']);
unset($_SESSION['username']);

header("location:login.php");  
 
 ?>
