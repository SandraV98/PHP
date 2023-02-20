<?php
session_start();
    
    include "config/connection.php";
    include "models/functions.php";
    if(($_SESSION['userId'])){
      include "pages/head.php";
        //echo $_SESSION['userId'];
    $users= showAll('users');
?>

<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Admin Panel</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
<section class="sample-text-area container breadcrumb_iner">

    <h2 class="text-heading">Edit users</h2> 
<table class="table">
  <tr>
  <th>id</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Username</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php  foreach($users as $user){
?>
  <tr>
    <td><?php echo $user->idUsers?></td>
    <td><?php echo $user->firstName?></td>
    <td><?php echo $user->lastName?></td>
    <td><?php echo $user->email?></td>
    <td><?php echo $user->username?></td>
    <td><a href="editUser.php?idUsers=<?php echo $user->idUsers;?>">Edit users</a></td>
    <td><a href="deleteUser.php?idUsers=<?php echo $user->idUsers;?>">Delete users</a></td>
  </tr><?php } ?>
</table>

</section>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php
}
else{ header("location:404.php");}
?>