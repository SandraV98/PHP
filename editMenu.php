<?php
    session_start();
    if(isset($_SESSION['userId'])){
        include "pages/head.php";
        include "config/connection.php";
        include "models/functions.php";
     if(isset($_POST['btnEditMenu']))
    {   
      
        $link = $_POST['link'];
        $linkName = $_POST['linkName'];
        $preview = $_POST['preview'];

        $updateTable = "update meni set link = '$link', linkName='$linkName', preview='$preview' 
                where idMenu ='".$_GET['idMenu']."'";
        $updateQuery=$conn->query($updateTable);
        if($updateQuery){
            header('location: users_admin.php');
        }
        else{
            echo 'error';
        }
    }
    $querySelectWithIdMenu = "select * from meni where idMenu ='".$_GET['idMenu']."'";
     $queryMenu= $conn->query($querySelectWithIdMenu)->fetchAll();
?>
<section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
<form method="POST" action="">
<?php foreach($queryMenu as $menu):?>
<label for="link">Link: </label>
<input type="text" class="form-control" name="link" id="link" value="<?php echo $menu->link;?>"/>
<label for="linkName">Link name:</label>
<input type="text" class="form-control" name="linkName" id="linkName"value="<?php echo $menu->linkName;?>" >
<label for="preview" >Preview:</label>
<input type="text"name="preview" class="form-control" id="preview" value="<?php echo $menu->preview;?>">

<input type="submit" class="btn_1 form-control" id='btnEditMenu' name='btnEditMenu' value="EDIT"/>
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