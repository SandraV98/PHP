<?php
  session_start();
  if(isset($_SESSION["userId"])) 
  {
    include "pages/head.php";
    include "config/connection.php";
    include "models/functions.php";
    include "pages/nav.php";
?>
<?php 
    if(isset($_POST["buyP"])) 
	{
		  $products = array();
			$products = $_POST['hiddenFieldProducts'];
			$numberProducts = count($products);
		//	echo $numberProducts;
			//$date=date('Y-m-d');
		   for($i=0;$i<$numberProducts;$i++)
		   {
      
			//$upit2 = "INSERT INTO narudzbine(idNarudzbina,idKorisnik,idProizvod) VALUES('','".$_SESSION['']."','".$products[$i]."')";
			$upit2 = "INSERT INTO orders(idOrder,idUsers,idProducts) VALUES('','".$_SESSION['userId']."','".$products[$i]."')";
      if ($conn->query($upit2)) 
			 {
				 $upit3='delete from cart where idProducts="'.$products[$i].'"';
         $conn->query($upit3);
				 header("location:successOrder.php");
			 } else
				 {
				echo "Greska";
			 }
		   }
	}

?>
  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
      <form action="" method="post">
        <div class="table-responsive">
        <?php
             $upit = "select * from cart c inner join products p on c.idProducts =p.idProducts where idUsers = '".$_SESSION['userId']."'";//sesija
             $niz = $conn->query($upit)->fetchAll();
?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Name Product</th>
                <th scope="col">Price</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php  foreach($niz as $n):
             ?>
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="<?=$n->image?>" width="100"alt="<?=$n->altImage?>" />
                    </div>
                  </div>
                </td>
                <td>
                  <h5><?=$n->title?></h5>
                </td>
          
                <td>
                <h5>$<?=$n->price?></h5>
                </td>
                <td>
                <input type ='hidden' name='hiddenFieldProducts[]' value="<?php echo $n->idProducts;?>"/>
                  <h5><a href="deleteProductsFromCart.php?idCart=<?php echo $n->idCart;?>">X</a>
</h5>
                </td>
              </tr>
              <tr>
              <?php endforeach;?>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="category.php">Continue Shopping</a>
            <button type="submit" id="buyP" name="buyP" class="btn_1 checkout_btn_1">Buy</button>
          </div>
        </div>
        </form>
      </div>
  </section>
  <!--================End Cart Area =================-->

  <!--::footer_part start::-->
  <?php include "pages/footer.php"?>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <!-- jquery -->
  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="js/swiper.min.js"></script>
  <!-- swiper js -->
  <script src="js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="js/slick.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/price_rangs.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
</body>

</html>
<?php
}
else{ header("location:404.php");}
?>