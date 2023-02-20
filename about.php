<?php
    session_start();
    include "pages/head.php";
    include "config/connection.php";
    include "models/functions.php";
    if($_SESSION['userId']){
   // $voteResults = showVoteSurvey($_SESSION['userId']);
    $survey = showActiveSurvey();
    $active = $survey->idSurveyQuestions;
    
    if(isset($_POST['vote']))
	{
		// $votes=$_POST['answer'];
		 $u = "insert into votesurvey(idVote, idUsers, idSurveyAnswers,idSurveyQuestions) values('','".$_SESSION['userId']."', '".$_POST['answer']."', '$active')";
         $conn->query($u);
    }
   //$voteResult=$conn->query("select * from surveyanswers sa
   //inner join votesurvey vs on  vs.idSurveyAnswers=sa.idSurveyAnswers where idUsers = '".$_SESSION['userId']."'")->fetchAll();
?>
<section class="breadcrumb breadcrumb breadcrumb_iner_item">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="breadcrumb_iner">
                <div class="breadcrumb_iner_item">
                <?php
                                
                                $chk=$conn->query("SELECT * FROM votesurvey where idUsers='".$_SESSION['userId']."'")->fetchAll();
                                
                                if(count($chk)>0)
                                {
                                    echo "You have already voted on this poll. Check results.   ";                                
                                
                    ?>
                    <form method="post">
                    <input type="submit" name="voteResult" id="voteResult" value="Show votes" class="btn_3"/>
                    </form>
                   <?php if(isset($_POST['voteResult']))
                   {
                            $voteResults = showVoteSurvey($_SESSION['userId']);
                   ?>
			<div class="section-top-border">
            <div class="table-head">

                        <table border>
                        <tr><td><?php echo $survey-> surveyQuestions; ?></td></tr>
                        <tr><th><?php echo $voteResults->surveyAnswers?></th></tr>
                        </table>
                    </div>
                </div>

                    <?php }?>
                      <?php  }
                             if(count($chk)==0)
                                {
                            ?>
                                <form method="POST">
                                <h3><?php echo $survey-> surveyQuestions; ?></h3>
                                    <?php   
                                  //  $q1 = "select * from  surveyquestions sq inner join surveyanswers sa on sq.idSurveyQuestions=sa.idSurveyQuestions where sa.idSurveyQuestions=$active";                                 
                                    $q1 = "select * from  surveyquestions sq inner join surveyanswers sa
                                         on sq.idSurveyQuestions=sa.idSurveyQuestions where sa.idSurveyQuestions=$active";         
                                  $user = $conn->query($q1)->fetchAll();
                                    foreach($user as $u){
                         ?>   
                         <p class="mb-3"><input type="radio" name = "answer" value = "<?php echo $u->idSurveyAnswers;?>"><?php echo $u->surveyAnswers;?></p>
                          <?php } ?> 
                          <input type="submit" name="vote" id="vote" value="VOTE" class="btn_3"/> 
                                </form>
                          <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php include "pages/footer.php"?>


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

<?php
    }
    else{
        header("location:404.php");
    }
?>

                           