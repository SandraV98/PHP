<?php 
session_start();
if(isset($_SESSION["userId"])) 
{
?>
<?php
include "pages/head.php";
include "config/connection.php";

$upit ="delete from cart where idCart='".$_GET['idCart']."'";
$ok = $conn->query($upit);
if($ok)
{
    header("location: cart.php");
}
else{
    echo "greska";
}
?>
<?php
}
else{ header("location:404.php");}
?>