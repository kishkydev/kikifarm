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
                                    <p class="author-widget_text"><?php echo  $description; ?></p>
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

                                           
                                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-darkgrey btn-block" href="upload-products?id=<?php echo  urlencode($user_idPP); ?>" title="" style="color: white; font-family:tahoma; font-family:tahoma">Upload Farm Products <i class="ti ti-angle-double-right"></i></a>

                                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-darkgrey btn-block" href="account-settings" title="" style="color: white; font-family:tahoma; font-family:tahoma"><i class="fa fa-gear"></i> Account Settings</a>


                                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-darkgrey btn-block" href="#" title="" style="color: white; font-family:tahoma; font-family:tahoma"><i class="fa fa-inbox"></i> View SMS messages</a>
                                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-darkgrey btn-block" href="#" title="" style="color: white; font-family:tahoma; font-family:tahoma"><i class="fa fa-edit"></i> Edit Farm Products</a>

                                             <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-darkgrey btn-block" href="#" title="" style="color: white; font-family:tahoma; font-family:tahoma"><i class="fa fa-eye"></i> View Customers' Orders</a>

                                         <?php else : ?>
                   
                    <?php if($countrow > 0) : ?>
                      <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-darkgrey follow unfollow" href="javascript:;" title="" id="unfollow" style="color: white; font-family:tahoma; font-family:tahoma"><b>Unfollow Shop</b> </a>
                    <?php else : ?>

                     <?php if($username != '') : ?><!-- to check it user logged in -->
                     <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-darkgrey follow follows" href="javascript:;" title="" id="follows" style="color: white; font-family:tahoma; font-family:tahoma"><b>Follow Shop</b> </a>



                     <?php else : ?><!-- to check it user logged in -->



                     <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-darkgrey notLoggedIn" href="javascript:;" title="" id="notl1" style="color: white; font-family:tahoma; font-family:tahoma"><b>Follow Shop</b> </a>

                      

                     <?php endif; ?><!-- to check it user logged in -->

                    <?php endif; ?> 
                   


                                        <?php endif; ?>

<ul class="flw-status" style="margin-top: 10px;">
<li style="color: #12ad1d;">

<a href="following?user=<?php echo $userP; ?>">
  <b>Following</b>
  <b class="fetch_following2"></b>
</a>

</li>
<li style="color: #12ad1d;">
    <a href="follower?user=<?php echo $userP; ?>">
  <b>Followers</b>
  <b class="fetch_follower2"></b>
</a>
</li>
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
 <div class="ttm-btn-box pb-20">
    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-icon-btn-left ttm-btn-bgcolor-darkgrey showsms" href="#" title="" style="color: white; font-family:tahoma; font-family:tahoma"><b>Send SMS</b> <i class="fa fa-envelope"></i></a>
</div>

<div class="ttm-btn-box pb-20">
    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-icon-btn-left ttm-btn-bgcolor-darkgrey" href="https://wa.me/<?php echo $phoneShop; ?>?text=<?php echo urlencode($whattext); ?>" title="" style="color: white; font-family:tahoma; font-family:tahoma"><b>Whatsapp</b> <i class="fa fa-whatsapp"></i></a>
</div>




 <?php if($username != '') : ?><!-- to check it user logged in -->

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
                                <div class="toggle">
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
                                </div><!-- toggle end -->

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
 <script>
var limit = 9; //The number of records to display per request
 var start = 0; //The starting pointer of the data
 var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active
 var user_idP = <?php echo $user_idPP; ?>;

 function load_post_data(limit, start)
 {
  $.ajax({
   url:"ajax/load_posts",
   method:"POST",
   data:{limit:limit, start:start, user_idP:user_idP},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == 0)
    {
     $('#load_data_message').html('');
     action = 'active';
    }
    else
    {
     $('#load_data_message').html('<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
     action = 'inactive';
    }
    
   }
  });
 }


if(action == 'inactive')
 {
  action = 'active';
  load_post_data(limit, start);
 }





$(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_post_data(limit, start);
   }, 1000);
  }
 });
</script>


                        <div class="col-lg-9 content-area">




                        <div class="row" id="load_data"></div>
                         <div id="load_data_message"></div>
                           
                         <!--  <div class="row">
                            <div class="col-md-12 text-center">
                               

                                <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-skincolor" href="more-products?id=<?php echo $user_idPP; ?>&user=<?php echo $userP; ?>" style="color: white; font-family:tahoma; font-family:tahoma"><b>See more products...</b> </a>
                            </div>
                        </div> -->
   
                            
                        </div>

