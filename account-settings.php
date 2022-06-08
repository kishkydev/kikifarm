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
                                <h1 class="title">Account Settings</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Update your profile</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->

 
<?php

if(!isset($username)){
    header("Location: index.php");
}

//to update profile 
//get this to insert as value inside the input form
    $query_profile = mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 

     if($pixd==''){
    $profilepixd = "img/b3.png";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }
  
 $reg_id = $result["reg_id"];
$state_name = $result['state_name'];
$lg_name = $result['lg_name'];


 $sname = $result['sname']; 
$oname = $result['oname'];  
$phone = $result['phone'];
 $email = $result["email"]; 
$address = $result['address'];
$city = $result['city'];

 $description = $result["description"];

 $shop_name = $result["shop_name"]; 
 $tag_line = $result["tag_line"];
 $website = $result["website"]; 
  $join_state = $result["join_state"]; 



?>

<script type="text/javascript">
                                     $(document).on('click', '.submit_edited', function() {

                                         $('#loading1').html('<img src="img/loaderIcon.gif" style="margin-left:-10px;" height="20" width="20" />');
                          var shop_name = document.getElementById('shop_name').value; 
                         var sname = document.getElementById('sname').value; 
                         var oname = document.getElementById('oname').value; 
                         var phone = document.getElementById('phone').value; 
                         var email = document.getElementById('email').value; 
                         var address = document.getElementById('address').value; 
                         var city = document.getElementById('city').value; 
                         var description = document.getElementById('description').value; 
                         
                         var tag_line = document.getElementById('tag_line').value;  
                         var website = document.getElementById('website').value; 


                        var join_state = [];
                                $('.join_state:checked').each(function() {
                                join_state.push($(this).val());
                                });


                 

                                           $.ajax({
                                                        url:"ajax/account-settings",
                                                        method:"POST",
                                                        data:{shop_name:shop_name,sname:sname,oname:oname,phone:phone,email:email,address:address,city:city,description:description,join_state:join_state,tag_line:tag_line,website:website},
                                                        
                                                        success:function(data){
                                                           //the return value from json is giving to the below id(s)

                                                           $('#result1').html(data);
                                                            $('#loading1').html("");
                                                          // $('#form_wall')[0].reset();





                                                          }
                                                      });

                                         
                                            
                                          });

                                </script>   

        <!--site-main start-->
        <div class="site-main">

          
            <!-- contactbox-section -->
            <section class="ttm-row contact-form-section clearfix">
                <div class="container">
                    <div class="row"><!-- row -->
                        <div class="col-lg-2">
                         
                        </div>
                        <div class="col-lg-8">

                                                        <?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>


                            <div class="spacing-6 ttm-bgcolor-grey mt-0 mb-0">
                                <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="">
                                   

                                   
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input id="sname" value="<?php echo $sname; ?>" type="text" placeholder="Surname"  class="form-control with-border bg-white">
                                        </div>
                                    </div>
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input id="oname" value="<?php echo $oname; ?>" type="text" placeholder="Other Names" class="form-control with-border bg-white">
                                        </div>
                                    </div>

                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input id="phone" value="<?php echo $phone; ?>" type="text" placeholder="Phone Number"  class="form-control with-border bg-white">
                                        </div>
                                    </div>
                                     <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input id="shop_name" value="<?php echo $shop_name; ?>" type="text" placeholder="Shop Name" class="form-control with-border bg-white">
                                        </div>
                                    </div>



                                    
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <textarea id="description" value="<?php echo $description; ?>"  placeholder="Shop Description" class="form-control with-border bg-white"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input id="email" value="<?php echo $email; ?>" type="email" placeholder="Email" class="form-control with-border bg-white">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-6 col-md-6">
                                         <div class="form-group">
                                            <input id="city" value="<?php echo $city; ?>" type="text" placeholder="City" class="form-control with-border bg-white">
                                        </div>
                                    </div>

                                     <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <textarea id="address"  placeholder="Address" class="form-control with-border bg-white"><?php echo $address; ?></textarea>
                                        </div>
                                    </div>

                                     <div class="col-sm-6 col-md-6">
                                         <div class="form-group">
                                            <input id="website"value="<?php echo $website; ?>" value="<?php echo $tag_line; ?>" type="text" placeholder="Website" class="form-control with-border bg-white">
                                        </div>
                                    </div>

                                     <div class="col-sm-6 col-md-6">
                                         <div class="form-group">
                                            <input id="tag_line" value="<?php echo $tag_line; ?>" type="text"  placeholder="Tag line or motto" class="form-control with-border bg-white">
                                        </div>
                                    </div>

<?php

$query_subcat = mysqli_query($con,"SELECT * FROM states "); 
?>
<p style="color: #7cda0a">Please select other states you have branches or states where your mobility can reach.</p>
   <div class="form-group field-btn text-left">

                    <div class="input-block">                       
                       
    <?php while($rowsubcat = mysqli_fetch_assoc($query_subcat)):   ?>
     <?php 
 $state_id = $rowsubcat['state_id'];
  $state_name = $rowsubcat['name'];
     ?>

<label for="check<?php echo $state_id; ?>">
  <input  type="checkbox" id="check<?php echo $state_id; ?>" class="join_state" value="<?php echo $state_name; ?>" style="margin-left: 10px;">
                      <?php echo $state_name; ?></label>

       <?php endwhile; ?>       
  </div>
</div>
                                   

                                   <!--  <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="Massage" rows="4" placeholder="Write A Massage..." required="required" class="form-control with-border bg-white"></textarea>
                                        </div>
                                    </div> -->

 <p id="result1"></p>

                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <button type="button" id="submit" name="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey w-100 submit_edited">
                                                Update Profile <span id="loading1" style="margin-left:10px;"></span>
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