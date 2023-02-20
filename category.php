<?php
    session_start();
    include "pages/head.php";
    include "config/connection.php";
    include "models/functions.php";
    include "pages/nav.php";
    if(($_SESSION['userId'])){
   // $products1 = showAll("products");
     // $_SESSION['cart'] = array(); 
     if(isset($_POST['addToCart'])){

        $product=$_POST["pid"];
        //echo $product;
        /* '".$_SESSION['idKorisnik']."' umjesto 1
*/
        $upit = "INSERT INTO cart(idCart, idUsers,idProducts) VALUES('','".$_SESSION['userId']."','$product')";
        $conn->query($upit);
         header("Location:cart.php");
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
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">      
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                       
                    </div>

                    <div class="row align-items-center latest_product_inner">
					
                        <?php

                               // definisemo start promenljivu
                                    
                                $products = showProducts("products");
                                foreach($products as $r): 
                         ?>  
                                <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item">
                                <input type="hidden" id="pimage" name="pimage" value="<?php $r->image;?>"/>
                                    <img src="<?=$r->image?>" alt="<?=$r->altImage?>">
                                    <div class="single_product_text">
                                    <input type="hidden" id="ptitle" name="ptitle" value="<?php $r->title;?>"/>
                                        <h4><?=$r->title;?></h4>
                                        <input type="hidden" id="pprice" name="pprice" value="<?php $r->price;?>"/>
                                        <h3><?= $r->price;?>$</h3>
                                        <form action="" method="post">
                                        <input type="hidden" id="pid" name="pid" value="<?php echo $r->idProducts;?>"/>
                                        <button type="submit" class="btn_3" name="addToCart" id="addToCart" class="aa-browse-btn"><span class="fa fa-shopping-cart"></span>Add to cart</button>        

                                        </form>
                                    </div>
                                </div>
                                </div>
                                <?php endforeach; ?>
                               
                        </div>
                        <div class="col-lg-12">
                            <div class="pageination">
                            <?php 
                                if($start!=0)
                                {
                                $nstart=$start-$number;
                                echo "<a href='category.php?start=$nstart' class='btn_3'> Previous page</a>";
                                }

                                $sum=$start+$number;
                                //echo "<strong>".$start." - ".$sum."/".$number."</strong>";

                                if($start = $start + $number)
                                {
                                
                                $nstart1=$start;
                                echo "<a href='category.php?start=$nstart1' class='btn_3'>Next page</a>";
                               // echo $nstart1;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

   
    <!-- product_list part end-->

    <!--::footer_part start::-->
    <?php
            include "pages/footer.php";        
        ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
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