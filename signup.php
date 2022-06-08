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
                                <h1 class="title">Sign Up</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Sign Up</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->


<?php
      
       function pin_generator(){
    global $con;
    $generated_pin = rand(100000,999999);
    if($generated_pin == 0){
      pin_generator();
    }
    else{
      return $generated_pin;
    } 
    
  }

  if(isset($_POST['submit'])){

   
    $username = mysqli_real_escape_string($con,htmlentities(trim($_POST['username'])));
  $sname = mysqli_real_escape_string($con,htmlentities(trim($_POST['sname'])));
   $oname = mysqli_real_escape_string($con,htmlentities(trim($_POST['oname'])));
   $email = mysqli_real_escape_string($con,htmlentities(trim($_POST['email'])));
 $phone = mysqli_real_escape_string($con,htmlentities(trim($_POST['phone'])));

  

  $pass = mysqli_real_escape_string($con,htmlentities(trim($_POST['pass'])));
  $cpass = mysqli_real_escape_string($con,htmlentities(trim($_POST['cpass'])));



 
 if(!isset($_POST['user_type'])){
  $errormsg = 'Please indicate if you are a farmer or consumer';
}
else if(!isset($_POST['state']) || $_POST['state']=='Select your State of location'){
  $errormsg = 'Please select your state of location';

}
else if(!isset($_POST['lg']) || $_POST['lg']=='Select Local Government Area'){
  $errormsg = 'Please select your local Government area';

}

// else if(empty($_POST['tag'])){
//         $errorpost = 'Please select atleast one other town close to you';   
//         }

else{


 $user_type = mysqli_real_escape_string($con,htmlentities(trim($_POST['user_type'])));
  
$state = mysqli_real_escape_string($con,htmlentities(trim($_POST['state'])));
  $lg = mysqli_real_escape_string($con,htmlentities(trim($_POST['lg'])));



 $query1 = mysqli_query($con,"SELECT name FROM states WHERE state_id = '$state' ");
      $row1 = mysqli_fetch_assoc($query1);
      $state_name = $row1['name'];
 $query2 = mysqli_query($con,"SELECT name FROM local_governments WHERE lg_id = '$lg' ");
      $row2 = mysqli_fetch_assoc($query2);
      $lg_name = $row2['name'];

//..............
if(empty($_POST['tag'])){
       $tag = ''; 
        }else{
$tag = implode(", ", $_POST['tag']);
    }
//..............


$username = strtolower($username);
  if($username && $sname && $oname && $email &&  $phone && $pass && $cpass && $user_type){
  

       // $password = md5($pass);
       // $cpassword = md5($cpass);

         $password = password_hash($pass, PASSWORD_DEFAULT);
        $cpassword = password_hash($cpass, PASSWORD_DEFAULT);

        $phone_check = mysqli_query($con,"SELECT phone FROM users WHERE phone = '$phone' ");
    $phone_checkCount = mysqli_num_rows($phone_check);//use to count the numbers of rows if it exist

    $user_check = mysqli_query($con,"SELECT username FROM users WHERE username = '$username' ");
    $userCount = mysqli_num_rows($user_check);
   
  if($phone_checkCount == 1){
              
      $errormsg = 'The phone number has already been used by another user';
    }
  
  else if($pass == $cpass){


    if(strlen($username)>30 || strlen($username)<5){
            $errormsg = 'Your username must be between 5 and 30 characters';
            }
    elseif($userCount == 1){      
      $errormsg = 'The username has already been used by another user';
    }
    elseif(preg_match("/^[0-9a-zA-Z_]{4,}$/", $username) === 0){

$errormsg = 'Username must not contain space but only digits, letters and underscore';

    }else{

   

//to send activation key to the user mail
        $str = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        $str = str_shuffle($str);
       
        $reg_id = $str.pin_generator();

        $join_lg = $lg_name.' '.$tag;

        if($user_type=='logistic'){
            $join_state = $state_name;
                    }else{
             $join_state = '';       
                    }
        
 
 mysqli_query($con, "INSERT INTO users(username, sname, oname, email, phone,  state_id, state_name, lg_id, lg_name, password, reg_id, join_lg, user_type, join_state) VALUES('$username', '$sname',  '$oname', '$email', '$phone', '$state', '$state_name', '$lg', '$lg_name', '$password', '$reg_id', '$join_lg', '$user_type', '$join_state') ") or die(mysqli_error());
   


 $successmsg = 'Successfully registered. You can now <a href="login?user='.$username.'" style="color:#183153;"><br>login here</a>';











          }


    
     
  }else{
    $errormsg = 'Sorry your passwords do not match</p>';
    }
  
  }
  else{
  $errormsg = 'Please all the fields are required'; 
    }
  
  
}//if teacher radio is selected......................

  }


?>


       

        <!--site-main start-->
        <div class="site-main">

          
            <!-- contactbox-section -->
            <section class="ttm-row contact-form-section clearfix">
                <div class="container">
                    <div class="row"><!-- row -->
                        <div class="col-lg-6">
                            <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h2 class="title">Sign Up</h2>
                                </div>
                                <div class="heading-seperator">
                                    <span></span>
                                </div>
                            </div><!-- section title end -->
                             <p style="font-size: 20px;"><b>Click to <a href="login" style="color: #7cda0a">Login Here</a> if you are registered.</b></p>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <!--  featured-icon-box --> 
                                    <div class="featured-icon-box left-icon style9 ttm-bgcolor-white mb-30">
                                        <div class="featured-icon"><!--  featured-icon --> 
                                            <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                                <i class="flaticon flaticon-agriculture"></i><!--  ttm-icon --> 
                                            </div>
                                        </div>
                                        <div class="featured-content"><!--  featured-content -->
                                            <div class="featured-title"><!--  featured-title -->
                                                <h5 class="mb-5">Registration as a farmer</h5>
                                            </div>
                                            <div class="featured-desc"><!--  featured-desc -->
                                                <p>Here contains all you need to know about registering as a farmer</p>
                                            </div>
                                            <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-15" href="#">Learn More <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div><!--  featured-icon-box END -->
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <!--  featured-icon-box --> 
                                    <div class="featured-icon-box left-icon style9 ttm-bgcolor-white">
                                        <div class="featured-icon"><!--  featured-icon --> 
                                            <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                                <i class="flaticon flaticon-farmer"></i><!--  ttm-icon --> 
                                            </div>
                                        </div>
                                        <div class="featured-content"><!--  featured-content -->
                                            <div class="featured-title"><!--  featured-title -->
                                                <h5 class="mb-5">Registration as a consumer</h5>
                                            </div>
                                            <div class="featured-desc"><!--  featured-desc -->
                                                <p>Here contains all you need to know about registering as a consumer</p>
                                            </div>
                                            <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-15" href="#">Learn More <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div><!--  featured-icon-box END -->
                                </div>

                                 <div class="col-lg-12 col-md-12" style="margin-top:20px">
                                    <!--  featured-icon-box --> 
                                    <div class="featured-icon-box left-icon style9 ttm-bgcolor-white">
                                        <div class="featured-icon"><!--  featured-icon --> 
                                            <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                                <i class="fa fa-truck"></i><!--  ttm-icon --> 
                                            </div>
                                        </div>
                                        <div class="featured-content"><!--  featured-content -->
                                            <div class="featured-title"><!--  featured-title -->
                                                <h5 class="mb-5">Registration as a Logistic Company</h5>
                                            </div>
                                            <div class="featured-desc"><!--  featured-desc -->
                                                <p>Here contains all you need to know about registering as a logistic personel or company</p>
                                            </div>
                                            <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-icon-btn-right mt-15" href="#">Learn More <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div><!--  featured-icon-box END -->
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">

                                                        <?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>


                            <div class="spacing-6 ttm-bgcolor-grey mt-0 mb-0">
                                <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label style="color:#173e43">
                                            <input name="user_type" value="farmer" type="radio" class="">
                                                    FARMER
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                             <label style="color:#173e43">
                                            <input name="user_type" value="consumer" type="radio" class="">
                                                    CONSUMER
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                             <label style="color:#173e43">
                                            <input name="user_type" value="logistic" type="radio" class="">
                                                    LOGISTIC
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control with-border bg-white" placeholder="Username" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="sname" type="text" placeholder="Surname"  class="form-control with-border bg-white">
                                        </div>
                                    </div>
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="oname" type="text" placeholder="Other Names" class="form-control with-border bg-white">
                                        </div>
                                    </div>
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="phone" type="text" placeholder="Phone Number"  class="form-control with-border bg-white">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="email" type="email" placeholder="Email" class="form-control with-border bg-white">
                                        </div>
                                    </div>
                  
<script>
                              $(document).ready(function(){   
          //.....................................................................
                                     $(document).on('click', '.select_lg', function() {

                                   var state_id = document.getElementById('state_id').value;
                                      
                                   $.ajax({
                                                        url:"ajax/get_lg",
                                                        method:"POST",
                                                        data:{state_id:state_id},
                                                        
                                                        success:function(data){
                                                           //the return value from json is giving to the below id(s)

                                                           $('#subcat_list').html(data);
                                                           
                                                          }
                                                      });
                                         
                                            
                                          });



                                     //.....................................................................
                                     $(document).on('click', '.select_lg2', function() {

                                   var state_id = document.getElementById('state_id').value;
                                      
                                   $.ajax({
                                                        url:"ajax/get_lg2",
                                                        method:"POST",
                                                        data:{state_id:state_id},
                                                        
                                                        success:function(data){
                                                           //the return value from json is giving to the below id(s)

                                                           $('#subcat_list2').html(data);
                                                           
                                                          }
                                                      });
                                         
                                            
                                          });


                                      });
                      

</script>     
          <?php
  $query_state = mysqli_query($con,"SELECT * FROM states"); 
  ?>
                                 
                <div class="col-lg-12">
                    <div class="form-group">
                        <select name="state" id="state_id" class="form-control with-border bg-white select_lg select_lg2">
                            <option>Select your State of location</option>
    <?php while($rowlg = mysqli_fetch_assoc($query_state)):   ?>
     <?php  
     $state_id = $rowlg['state_id'];
    $state_name = $rowlg['name'];
      ?>
            <option  value="<?php echo $state_id; ?>"><?php echo $state_name; ?></option>
       <?php endwhile; ?>
                    </select>
                </div>
            </div>


  <div class="col-lg-12">
        <div class="form-group">
        <select name="lg" id="subcat_list" class="form-control with-border bg-white">
            <option value="">Select Local Government Area</option>
        </select>    
        </div>
</div>


                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="pass" class="form-control with-border bg-white" placeholder="Password" type="password" id="password-field">
                                             <span class="fa fa-eye field-icon toggle-password" id="pass-status" aria-hidden="true" onclick="viewPassword()" 
          style="float: right; margin-left: -25px; margin-top: -30px; margin-right: 10px; position: relative; z-index: 1; color: #173e43 "></span>
                                        </div>
                                    </div>
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="cpass" class="form-control with-border bg-white" placeholder="Confirm Password" type="password" id="password-field2">
                                            <span class="fa fa-eye field-icon toggle-password" id="pass-status2" aria-hidden="true" onclick="viewPassword2()" 
          style="float: right; margin-left: -25px; margin-top: -30px; margin-right: 10px; position: relative; z-index: 1; color: #173e43"></span>
                                        </div>
                                    </div>

                                   <!--  <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="Massage" rows="4" placeholder="Write A Massage..." required="required" class="form-control with-border bg-white"></textarea>
                                        </div>
                                    </div> -->
<div class="col-md-12">
 <div class="form-group" id="subcat_list2">
                 
</div>
</div>


                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <button type="submit" id="submit" name="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey w-100">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>



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


                                                             function viewPassword2()
                                                              {
                                                                var passwordInput = document.getElementById('password-field2');
                                                                var passStatus = document.getElementById('pass-status2');
                                                               
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