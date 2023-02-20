<?php
    session_start();
    include "pages/head.php";
    include "config/connection.php";
    include "models/functions.php";
    if(($_SESSION['userId']=='1')){
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
            <div class="section-top-border">
				<h3 class="mb-30">EDITING</h3>
				<div class="table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">#</div>
							<div class="visit">LINK NAME</div>
						</div>
						<div class="table-row">
							<div class="serial">01</div>
							<div class="visit banner_text_iner"><a class="genric-btn info" href="users_admin.php">User editing</a></div>
						</div>
						<div class="table-row">
							<div class="serial">02</div>
                            <div class="visit"><a class="genric-btn info" href="meni_admin.php">Edit menu</a></div>
						</div>
                        <div class="table-row">
							<div class="serial">03</div>
                            <div class=""><a class="genric-btn  info" href="prooduct_admin.php">Product editing</a></div>
						</div>
                        <div class="table-row">
							<div class="serial">04</div>
                            <div class=""><a class="nav-link genric-btn  info" href="message_admin.php">Admin messages</a></div>
						</div>
					</div>
				</div>
			</div>
            <?php include "pages/footer.php";?>
   
     <script src="js/jquery-1.12.1.min.js"></script>
    <!-- botstrap js -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php
}
else{ header("location:404.php");}
?>