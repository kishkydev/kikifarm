<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); ?>
  


 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">Login</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Login</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->
       

        <!--site-main start-->
        <div class="site-main">

          
            <!-- contactbox-section -->
            <section class="ttm-row contact-form-section clearfix">
                <div class="container">
                    <div class="row"><!-- row -->
                        <div class="col-lg-3">
                           
                        </div>




<?php
 $email = '';
if(isset($_POST['submit'])){
    if(get_magic_quotes_gpc()){
      $_POST['name'] = stripslashes($_POST['name']);

      }
  
      
    if(empty($_POST["name"])){
      $errormsg = 'You have not submitted your username or email or phone number';
      }
    else if(empty($_POST["pass"])){
      $errormsg = 'You have not submitted your password';
      } 
    else{
    
      
    $username = preg_replace('#[^a-zA-Z0-9$_-]#i', '', $_POST["name"]);
   // $user_password = preg_replace('#[^a-zA-Z0-9$_-]#i', '', $_POST["pass"]);
     $user_password = htmlspecialchars($_POST["pass"]);
    //$user_password_md5 = md5($user_password);
    
    $user_query = mysqli_query($con,"SELECT * FROM users WHERE
         (phone='$username' OR reg_id='$username' OR username='$username')  LIMIT 1") or die(mysqli_error());
    $user_count = mysqli_num_rows($user_query);//use to count the numbers of rows if it exist
    if($user_count > 0){ //if count = 1, do the while loop and createa session for phone_login
    while($user_row = mysqli_fetch_array($user_query)){

      if(password_verify($user_password, $user_row['password'])){

      $userId = $user_row["user_id"];
      $user_name = $user_row["username"];
       $active = $user_row["active"];
      
      $_SESSION["userId"] = session_id();
      $_SESSION["loginType"] = "user";


        $_SESSION["user_id"] = $userId;
        $_SESSION["user"] = $user_name;


        if($active == 'yes'){

          //to set the cookie................................
    if(($_POST['user_remember']) == 'on'){
      $user_expire = time()+60*60*24*7*52;
      setcookie('user_log_in', $_SESSION["user"], $user_expire);
      }
      //................................................
      header("location: $user_name");
    exit();

      }else{
           $errormsg = 'Sorry, this user account has been is blocked, please contact our support team';
      }//if not active(blocked users).........

      }else{
          $errormsg = 'Wrong user details';
        }//if password_verify.........


    }

  
    

   
  
    
    
    }
    else{
    $errormsg = 'That information is incorrect, try again!';
    }
    }
  }
?>





                        <div class="col-lg-6">


                             <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h2 class="title">Login</h2>
                                </div>
                                <div class="heading-seperator">
                                    <span></span>
                                </div>
                            </div><!-- section title end -->
                            

                            <p><b>Click to <a href="signup" style="color: #7cda0a">Register Here</a> if you do not have an account.</b></p>

                      <?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>       
                            
                            
                            <div class="spacing-6 ttm-bgcolor-grey mt-0 mb-0">
                                <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="#">
                                    
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input name="name" class="form-control with-border bg-white" placeholder="Username/Phone Number/REG ID"  <?php if(isset($_GET["user"])){echo 'value="'.$_GET["user"].'"';} ?> type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                       
                                        <div class="form-group">
                                            <input name="pass" class="form-control with-border bg-white" placeholder="Confirm Password" type="password" id="password-field" />
                                             <span class="fa fa-eye field-icon toggle-password" id="pass-status" aria-hidden="true" onclick="viewPassword()" 
                                  style="float: right; margin-left: -25px; margin-top: -30px; margin-right: 10px; position: relative; z-index: 1; color: #173e43"></span>
                                          </div>
                                    </div>

                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                      <input id="check1" type="checkbox" name="user_remember">
                      <label for="check1">Remember me</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="tab" href="#forgot-password" class="btn-link forgot-password forgot" > Forgot Password</a>
                    </div>
                    
                  </div>
                                     
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <button type="submit" id="submit" name="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey w-100" value="">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>




 <script type="text/javascript">
               $(document).on('click', '.forgot', function() {

                            $('#modalforgotpassword').modal("show");
                                

                                });

   $(document).on('click', '#forget-pass', function() {

       // alert('wwwwww');
             $('#display-pass').html("<p><img src='img/loaderIcon.gif' /></p>");

           var email = document.getElementById('email').value;
             if (email.length == 0)  {
                                   // alert(text);
                                    $("#display-pass").html("<p style='color:white'>Please enter your email</p>");
                                    return_color();
                                }
                              else{
        

               $.ajax({
                            url:"ajax/forgot-password.php",
                            method:"POST",
                            data:{email:email},
                            
                            success:function(data){
                               //the return value from json is giving to the below id(s)

                               $('#display-pass').html(data);

                                                      
                      
                             $('#form_wall')[0].reset();
                               
                              }
                          });

                }//validate..........

              });


</script>
      

      <script type="text/javascript">
                                              
                                                          function viewPassword()
                                                              {
                                                                var passwordInput = document.getElementById('password-field');
                                                                var passStatus = document.getElementById('pass-status');
                                                               
                                                                if (passwordInput.type == 'password'){
                                                                  passwordInput.type='text';
                                                                  passStatus.className='fa fa-eye-slash';
                                                                  
                                                                }
                                                                else{
                                                                  passwordInput.type='password';
                                                                  passStatus.className='fa fa-eye';
                                                                }
                                                              }


                                                        </script>








                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>
            <!-- contactbox-section end -->
           

        </div><!--site-main end-->


      
       

       
  
  
<?php  include ('./inc/footer.inc.php'); ?>