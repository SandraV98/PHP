<?php
    session_start();
    if(isset($_SESSION['userId'])){
        include "pages/head.php";
        include "config/connection.php";
        include "models/functions.php";
     if(isset($_POST['btnEditUser']))
    {   
      
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        $upit1 = "update users set firstName = '$firstName', lastName='$lastName', email='$email',username='$username' 
                where idUsers ='".$_GET['idUsers']."'";
        $ok=$conn->query($upit1);
        if($ok){
            header('location: users_admin.php');

        }
        else{
            echo 'error';
        }
    }
    $upit = "select * from users where idUsers ='".$_GET['idUsers']."'";
     $q= $conn->query($upit)->fetchAll();

?>
<section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
<form method="POST" action="">
<?php foreach($q as $qq):?>
<label for="firstName">First name:</label>
<input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $qq->firstName;?>"/>
<label for="lastName">Last name:</label>
<input type="text" class="form-control" name="lastName" id="lastName"value="<?php echo $qq->lastName;?>" >
<label for="email" >Email name:</label>
<input type="text"name="email" class="form-control" id="email" value="<?php echo $qq->email;?>">
<label for="username">Username:</label>
<input type="text" class="form-control"name="username" id="username"value="<?php echo $qq->username;?>">

<input type="submit" class="btn_1 form-control" id='btnEditUser' name='btnEditUser' value="EDIT"/>
<?php endforeach; ?>
</form>

</div>
</div>
</div>

</section>
<script src="js/jquery-1.12.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php
}
else{ header("location:404.php");}
?>