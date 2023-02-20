<?php
        include "config/connection.php";
        include "models/functions.php";
         $message = $_POST['message'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];

    $upit ="insert into adminmessages (idMessage, name, email, subject, message) values ('', '$name', '$email', '$subject', '$message')";
    $conn->query($upit);
?>