
<?php
    session_start();
    include "pages/head.php";
    include "config/connection.php";
    include "models/functions.php";
    include "pages/nav.php";
?>
    <!-- Header part end-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Tracking Order</h2>
                            <p>Home <span>-</span> Tracking Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================register Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                                <form>
                                    <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="firstName" name="firstName"
                                        placeholder="First Name"/>
                                        <span id="first_name_message"></span>
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="lastName" name="lastName"
                                        placeholder="Last Name"/>
                                        <span id="last_name_message"></span>
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="E-mail Address"/>
                                        <span id="email_message"></span>
                                </div>
                               
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="username" name="username" 
                                        placeholder="Username"/>
                                        <span id="username_message"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password"/>
                                        <span id="password_message"></span>
                                </div>
                                <div class="col-md-12">
                                    
                                <input type="submit" value="Register" id="check" class="btn_3"/>
                                <div id="odgovor"></div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================register end =================-->

    <!--::footer_part start::-->
        <?php include "pages/footer.php";?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    
    <script src="js/jquery-1.12.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" ></script>
      

    <script src="form.js" crossorigin="anonymous"></script>

    
    <!-- popper js -->
    <!-- bootstrap js -->
    <script src="js/popper.min.js"></script>

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
    <script src="js/mail-script.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/price_rangs.js"></script>


    <!-- custom js --
    <script src="js/custom.js"></script>-->
</body>

</html>
