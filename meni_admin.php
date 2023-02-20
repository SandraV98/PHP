<?php
session_start();
    
    include "config/connection.php";
    include "models/functions.php";
    if(($_SESSION['userId'])){
      include "pages/head.php";
        //echo $_SESSION['userId'];
    $menu= showAll('meni');
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

    <h2 class="text-heading">Menu edit</h2> 
<table class="table">
  <tr>
  <th>id</th>
    <th>Link</th>
    <th>Link name</th>
    <th>Preview</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php  foreach($menu as $link){
?>
  <tr>
    <td><?php echo $link->idMenu?></td>
    <td><?php echo $link->link?></td>
    <td><?php echo $link->linkName?></td>
    <td><?php echo $link->preview?></td>
    <td><a href="editMenu.php?idMenu=<?php echo $link->idMenu;?>">Edit links</a></td>
    <td><a href="deleteMenu.php?idMenu=<?php echo $link->idMenu;?>">Delete links</a></td>
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