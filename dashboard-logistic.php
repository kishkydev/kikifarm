<div class="col-lg-3 widget-area">
                            <aside class="widget widget-text">
                                <div class="ttm-author-widget text-center">
                                    <div class="author-widget_img" id="uploaded_image">
                                        <img height="200" width="200" class="author-img rounded-circle img-thumbnail img-responsive" src="<?php echo  $profilepixd; ?>" alt="author image">
                                    </div>
                                     <?php if($userP == $username) : ?>
                                    <div class="add-dp" id="OpenImgUpload">
                                               
                                                  <input type="file" id="file">
                                                  <label for="file"><i class="fa fa-camera"></i></label>     
                                                                  
                                    </div>

                                    

                                    <?php endif; ?>



                                    <h4 class="author-name" style="margin-top:10px;"><?php echo  $oname.' '.$sname; ?></h4>
                                    <!-- <p class="author-widget_text"><?php echo  $description; ?></p> -->
                                     <div class="ttm-btn-box pr-20 pb-20">








  <?php

                 $follow = $username;  
          $being_follow = $userP;
                     // this is to count the number of follwers 
  $check_if_follow = mysqli_query($con,"SELECT * FROM follow WHERE following='$follow' AND being_followed='$being_follow' ");    
            $countrow = mysqli_num_rows($check_if_follow);

                  ?>

<script type="text/javascript">
  // script for following and unfollowing...................................              
  $(document).ready(function(){
    function fetch_follower()
    {
      var  view = '<?php echo $userP; ?>'

      $.ajax({
        url:"ajax/fetch_follower",
        method:"POST",
        data:{view:view},
        
        success:function(data){
              $('.fetch_follower2').html(data);
            }                 
        });
     }
    fetch_follower();
    
    setInterval(function(){
      fetch_follower();
    }, 1000);
  }); 


  $(document).ready(function(){
    function fetch_following()
    {
      var  view = '<?php echo $userP; ?>'

      $.ajax({
        url:"ajax/fetch_following",
        method:"POST",
        data:{view:view},
        
        success:function(data){
              $('.fetch_following2').html(data);
            }                 
        });
     }
    fetch_following();
    
    setInterval(function(){
      fetch_following();
    }, 1000);
  }); 

  
  //to check the game of the user block...........
    $(document).on('click', '.follows', function() {

                           
                                var being_follow = '<?php echo $being_follow ?>';
                                var action = 'follow';
                                
                                $.ajax({
                                            url:"ajax/follow_unfollow",
                                            method:"POST",
                                            data:{action:action,being_follow:being_follow},
                                            success:function(data){
                                            
                                              
                                              
                                             $("#follows").attr("class", "ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-darkgrey follow unfollow");
                                             
                                              // $(".thumbfollow").css({'color':'#b81e1e'});
                                               $("#follows").html("<b>Unfollow Shop</b>");
                                               $("#follows").attr("id", "unfollow");
                                               
                                              }
                                          });

                                });


    //to check the game of the user block...........
    $(document).on('click', '.unfollow', function() {

                           
                                var being_follow = '<?php echo $being_follow ?>';
                                var action = 'unfollow';
                              

                                $.ajax({
                                            url:"ajax/follow_unfollow",
                                            method:"POST",
                                           data:{action:action,being_follow:being_follow},
                                            success:function(data){

                                        
                                             $("#unfollow").attr("class", "ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-darkgrey follow follows");
                                             
                                              $("#unfollow").html("<b>Follow Shop</b>");
                                               $("#unfollow").attr("id", "follows");
                                                
                                           
                                               
                                              }
                                          });

                                });

</script>




                                       <?php if($userP == $username) : ?>

                                           
                                           
                                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-darkgrey btn-block" href="account-settings" title="" style="color: white; font-family:tahoma; font-family:tahoma"><i class="fa fa-gear"></i> Account Settings</a>


                                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-darkgrey btn-block" href="#" title="" style="color: white; font-family:tahoma; font-family:tahoma"><i class="fa fa-inbox"></i> View SMS messages</a>
                                           
                                             <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-darkgrey btn-block" href="#" title="" style="color: white; font-family:tahoma; font-family:tahoma"><i class="fa fa-eye"></i> View Your Basket Orders</a>

                                               <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-darkgrey btn-block" href="#" title="" style="color: white; font-family:tahoma; font-family:tahoma"><i class="fa fa-eye"></i> View Your Logistic Notification</a>

                                         <?php else : ?>
                   
                    <!-- <?php if($countrow > 0) : ?>
                      <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-darkgrey follow unfollow" href="javascript:;" title="" id="unfollow" style="color: white; font-family:tahoma; font-family:tahoma"><b>Unfollow Shop</b> </a>
                    <?php else : ?>
                     <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-darkgrey follow follows" href="javascript:;" title="" id="follows" style="color: white; font-family:tahoma; font-family:tahoma"><b>Follow Shop</b> </a>
                    <?php endif; ?>  -->
                   


                                        <?php endif; ?>

<ul class="flw-status" style="margin-top: 10px;">
<li style="color: #12ad1d;">

<a href="following?user=<?php echo $userP; ?>">
  <b>Following</b>
  <b class="fetch_following2"></b>
</a>

</li>
<!-- <li style="color: #12ad1d;">
    <a href="follower?user=<?php echo $userP; ?>">
  <b>Followers</b>
  <b class="fetch_follower2"></b>
</a>
</li> -->
</ul>

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
      

 <?php if($userP == $username) : ?>
   <!--  <div class="ttm-btn-box pb-20" style="margin-top:10px;">
    <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-border ttm-icon-btn-right ttm-btn-color-skincolor" href="logout" title="" id="follows" style="font-family:tahoma; font-family:tahoma"><b><span class="fa fa-power-off"></span> Logout</b> </a>
    </div> -->
<?php else : ?>    

<?php
$whattext = "*kiKifarm:* Hello $usernameShop";
?>     
<!--  <div class="ttm-btn-box pb-20">
    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-icon-btn-left ttm-btn-bgcolor-darkgrey showsms" href="#" title="" style="color: white; font-family:tahoma; font-family:tahoma"><b>Send SMS</b> <i class="fa fa-envelope"></i></a>
</div> -->

<div class="ttm-btn-box pb-20">
    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-icon-btn-left ttm-btn-bgcolor-darkgrey" href="https://wa.me/<?php echo $phoneShop; ?>?text=<?php echo urlencode($whattext); ?>" title="" style="color: white; font-family:tahoma; font-family:tahoma"><b>Whatsapp</b> <i class="fa fa-whatsapp"></i></a>
</div>




<?php if(isset($username)) : ?><!-- to check it user logged in --> 

<div class="ttm-btn-box pb-20">
    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-icon-btn-left ttm-btn-bgcolor-darkgrey showsms" href="message?message=<?php echo $user_idPP; ?>" title="" style="color: white; font-family:tahoma; font-family:tahoma"><b>Send App message</b> <i class="fa fa-comment"></i></a>
</div>

<?php else : ?><!-- to check it user logged in -->

 <div class="ttm-btn-box pb-20">
    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-icon-btn-left ttm-btn-bgcolor-darkgrey notLoggedIn" href="javascript:;" id="notl<?php echo $user_idPP; ?>" style="color: white; font-family:tahoma; font-family:tahoma"><b>Send App message</b> <i class="fa fa-comment"></i></a>
</div>                                               

<?php endif; ?><!-- to check it user logged in -->





<?php endif; ?>


 <script type="text/javascript">
               $(document).on('click', '.showsms', function() {

                            $('#modalsendsms').modal("show");
                                

                                });

   


</script>


                                      </div> 
                                </div>





 <!-- acadion -->
                            <div class="accordion grey-background res-991-mt-30">
                                <!-- toggle -->
                                <div class="toggle" style="display: none;">
                                    <div class="toggle-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">XXXXXXX</a>
                                    </div>
                                    <div class="toggle-content">
                                        
                                    </div>
                                </div><!-- toggle end -->
                                <!-- toggle -->
                                <!-- <div class="toggle">
                                    <div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" class="active"><b>Share Shop on social media</b></a></div>
                                    <div class="toggle-content">
                                        <div class="row">
                                            <div class="col-sm-12" style="padding:0px;">
                                                



<?php
  $whatsapp = urlencode('https://kikifarm.com/'.$userP);
  ?>






            <div class="ttm-pf-single-detail-box mb-35"  style="padding:5px;">
                                                
                <ul class="ttm-pf-detailbox-list" > 
                  <li><a class="dropdown-item site-button-link facebook" href="javascript:void(0);" onClick="socialShare('facebook'); return false;">
                    <i class="fa fa-facebook" style="font-size:20px;"></i><span> <b>Share on Facebook</b></span></a></li>
                  <li><a class="dropdown-item site-button-link twitter" href="javascript:void(0);" onClick="socialShare('twitter'); return false;">
                    <i class="fa fa-twitter" style="font-size:20px;"></i><span> <b>Share on Twitter</b></span></a></li>
                  
                  <li><a class="dropdown-item site-button-link whatsapp" href="whatsapp://send?text=<?php echo $whatsapp; ?>" data-action="share/whatsapp/share">
                    <i class="fa fa-whatsapp" style="font-size:20px;"></i><span> <b>Share on Whatsapp</b></span></a></li>
                </ul>
            </div> 







                                            </div>
                                        </div>
                                    </div>
                                </div> --><!-- toggle end -->

                                 <!-- toggle -->
                                <div class="toggle" style="margin-top:10px;">
                                    <div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsethree"><b>Check more shop information</b></a></div>
                                    <div class="toggle-content">
                                        <div class="row">
                                             <div class="col-sm-12"  style="padding:0px;">
                                                

                                                <div class="ttm-pf-single-detail-box mb-35"  style="padding:5px;">
                                                
                                                  <ul class="ttm-pf-detailbox-list">
                                                   <li><i class="fa fa-user"></i><?php echo $userP; ?></li>
                                                   <li><i class="fa fa-phone"></i><?php echo $phone; ?></li>
                                                   
                                                   <li><i class="ti ti-world"></i><?php echo $website; ?></li>
                                                   <li><i class="fa fa-map-marker"></i><?php echo $state_name; ?> State</li>
                                                   <li><i class="fa fa-map-marker"></i><?php echo $lg_name; ?> LG</li>
                                                  </ul>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div><!-- toggle end -->

                               
                                
                            </div><!-- acadion  end-->

<?php if($userP == $username) : ?>
    <div class="ttm-btn-box pb-20" style="margin-top:10px;">
    <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-border btn-block text-center ttm-btn-color-skincolor" href="logout" title="" id="follows" style="font-family:tahoma; font-family:tahoma"><b><span class="fa fa-power-off"></span> Logout</b> </a>
    </div>
<?php endif; ?>  

                                
                            </aside>
                            
                        </div>
 


                        <div class="col-lg-9 content-area " >


                            


<?php
$query1 = mysqli_query($con,"SELECT * FROM users WHERE user_id = '$user_idPP' ");
  
    $result = mysqli_fetch_array($query1);


    $pixd = $result['pix']; 
    $sname = $result['sname']; 
    $oname = $result['oname']; 
    $owner = $result['username'];
    $owner_id = $result['user_id'];
    $shop_name = $result["shop_name"]; 
    $address = $result["address"]; 
    $phone = $result["phone"]; 

    $main_state = $result["state_name"]; 
    $join_states = $result["join_state"]; 

    if($pixd==''){
    $profilepixd = "images/avatar.png";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }

 $join_states = explode(",", $join_states);



?>
<div class="row ttm-bgcolor-grey">
    <div class="col-lg-6 col-md-6">
<p style="color: #173e43;"><b><span class="fa fa-map-marker"></span> Main State:</b> <?php echo $main_state; ?></p><hr>

<h5 style="color: red;"><b>Other States of presence:</b></h5>
 <?php

  foreach ($join_states as $join_state){
    ?>

      <p style="color: #173e43;"><span class="fa fa-map-marker"></span> <?php echo  $join_state; ?></p>

    <?php
    
  }
?>
    </div>


<div class="col-lg-6 col-md-6" style="padding: 10px;">
                            <div class="ttm_single_image-wrapper position-relative z-1 res-991-center">
                                <img class="img-fluid" src="images/single-img-04.jpg" title="single-img-04" alt="single-img-04">
                            </div><!-- ttm_single_image-wrapper end -->
</div>


</div>



<div class="row ttm-bgcolor-grey" style="padding:20px;">

                                <div class="col-md-6">
                                    <!--  featured-icon-box --> 
                                    <div class="featured-icon-box left-icon icon-align-top style3 ttm-bgcolor-white">
                                        <div class="featured-icon"><!--  featured-icon --> 
                                            <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                                <i class="flaticon flaticon-plant"></i><!--  ttm-icon --> 
                                            </div>
                                        </div>
                                        <div class="featured-content"><!--  featured-content -->
                                            <div class="featured-title"><!--  featured-title -->
                                                <h5 class="mb-5">Quick request for a farm produce</h5>
                                            </div>
                                            <div class="featured-desc"><!--  featured-desc -->
                                                <p>Drop a request for any items you need at a specific time; message get delivered to farmers near you </p>
                                            </div>
                                            <a href="#" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor mt-20"> Request Here</a>
                                        </div>
                                    </div><!--  featured-icon-box END -->
                                </div>
                                <div class="col-md-6 " >
                                    <!--  featured-icon-box --> 
                                    <div class="featured-icon-box left-icon icon-align-top style3 ttm-bgcolor-white">
                                        <div class="featured-icon"><!--  featured-icon --> 
                                            <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                                <i class="flaticon flaticon-agriculture"></i><!--  ttm-icon --> 
                                            </div>
                                        </div>
                                        <div class="featured-content"><!--  featured-content -->
                                            <div class="featured-title"><!--  featured-title -->
                                                <h5 class="mb-5">Produce to save from stores</h5>
                                            </div>
                                            <div class="featured-desc"><!--  featured-desc -->
                                                <p>Buyers can check farm produce with less than 2 weeks to leave the market</p>
                                            </div>
                                             <a href="food-rescue-save-stores" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey mt-20 mr-10"> Start Here</a>
                                        </div>
                                    </div><!--  featured-icon-box END -->
                                </div>

                                <div class="col-md-6">
                                    <!--  featured-icon-box --> 
                                    <div class="featured-icon-box left-icon icon-align-top style3 ttm-bgcolor-white">
                                        <div class="featured-icon"><!--  featured-icon --> 
                                            <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                                <i class="flaticon flaticon-sprinkler"></i><!--  ttm-icon --> 
                                            </div>
                                        </div>
                                        <div class="featured-content"><!--  featured-content -->
                                            <div class="featured-title"><!--  featured-title -->
                                                <h5 class="mb-5">Buy by-products of food processing</h5>
                                            </div>
                                            <div class="featured-desc"><!--  featured-desc -->
                                                <p>Customers can order or buy the by-procusts of food proccessing available from farmers</p>
                                            </div>
                                            <a href="#" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey mt-20 mr-10"> Start Here</a>
                                        </div>
                                    </div><!--  featured-icon-box END -->
                                </div>


                                
                                
                                

                                <div class="col-md-6">
                                    <!--  featured-icon-box --> 
                                    <div class="featured-icon-box left-icon icon-align-top style3 ttm-bgcolor-white">
                                        <div class="featured-icon"><!--  featured-icon --> 
                                            <div class="ttm-icon ttm-icon_element-color-skincolor ttm-icon_element-size-lg">
                                                <i class="flaticon flaticon-plant-1"></i><!--  ttm-icon --> 
                                            </div>
                                        </div>
                                        <div class="featured-content"><!--  featured-content -->
                                            <div class="featured-title"><!--  featured-title -->
                                                <h5 class="mb-5">Upcycles wasted farm produce</h5>
                                            </div>
                                            <div class="featured-desc"><!--  featured-desc -->
                                                <p>Farmers can sell or upcyles by-products or perished farm produce to cut loss or maximise profit</p>
                                            </div>
                                            <a href="#" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor mt-20"> Start Here</a>
                                        </div>
                                    </div><!--  featured-icon-box END -->
                                </div>
                            </div>

                        
                           
                         
                            
                        </div>

