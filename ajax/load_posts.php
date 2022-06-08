<?php session_start();
include ('./../inc/connect.inc.php'); ?>
<?php
$username = ''; 
  $user_id = '';

if(!isset($_SESSION["user"]) && isset($_COOKIE['user_log_in'])){
  //this is for normal user
  $_SESSION["user"] = $_COOKIE['user_log_in'];
  $username = $_SESSION["user"];
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"]; 
    }
else{
  //this is for normal user
  $username = @$_SESSION["user"]; 
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"];
  }


  $time = time();

?>

<?php if(isset($_POST["limit"], $_POST["start"])) : ?>
 
<?php
	

$user_idP = $_POST["user_idP"];

$getproduct = mysqli_query($con,"SELECT * FROM products WHERE user_id='$user_idP' ORDER BY product_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."  ") or die (mysqli_error()); 

			 ?>
            
            
            
			<?php while($runrows=mysqli_fetch_array($getproduct)) : ?>
				<?php 
	
                            $product_id = $runrows['product_id'];
                            $prod_name = ucfirst($runrows['name']);
                            $prod_description = $runrows['description'];
                            $prod_price = $runrows['price'];

                            $prod_code = $runrows['code'];
                            $type = $runrows['type'];
                            $date_available = $runrows['date_available'];
                            
        
                            $pix1 = $runrows['pix1'];
                            $pix2 = $runrows['pix2'];
                            $pix3 = $runrows['pix3'];
                            $pix4 = $runrows['pix4'];
                           


//date availaibe notification starts here............................
                            $current_date = date('y-m-d');  

$available_day = date("jS F, Y", strtotime($date_available));


$notifation_days =  abs(strtotime($date_available) - strtotime($current_date));



$negative_days = strtotime($date_available) - strtotime($current_date);




if($negative_days < 1){
    $neg_days = '-';
}else{
    $neg_days = '+';
}


                    
                $suffix = '';
                switch(1)
                    {
                        case($notifation_days < 60):
                        $count = $notifation_days;
                        if($count===0)
                            $count = 'a moment';
                        else if($count==1)
                            $suffix = 'second';
                        else
                            $suffix  = 'seconds';
                        break;  
                        
                        case($notifation_days >= 60 && $notifation_days < 3600):
                        $count = floor($notifation_days/60) ;
                         if($count==1)
                            $suffix = 'minute';
                        else
                            $suffix  = 'minutes';
                        break;  
                        
                        case($notifation_days >= 3600 && $notifation_days < 86400):
                        $count = floor($notifation_days/3600) ;
                         if($count==1)
                            $suffix = 'hour';
                        else
                            $suffix  = 'hours';
                        break;
                        
                        case($notifation_days >= 86400 && $notifation_days < 604800):
                        $count = floor($notifation_days/86400) ;

                         if($count==1)
                            $suffix = 'day';
                        else
                            $suffix  = 'days';
                        break;

                        case($notifation_days >= 604800 && $notifation_days < 2629743):
                        $count = floor($notifation_days/604800) ;


if($count==1){
 $dy =  floor(($notifation_days-604800)/86400);   
}else if($count==2){
$dy =  floor(($notifation_days-(604800*2))/86400);
}
else if($count==3){
$dy =  floor(($notifation_days-(604800*3))/86400);
}
else if($count==4){
$dy =  floor(($notifation_days-(604800*4))/86400);
}


                         if($count==1)
                            $suffix = 'week '.$dy.' days';
                        else
                            $suffix  = 'weeks '.$dy.' days';
                        break;
                        
                        case($notifation_days >= 2629743 && $notifation_days < 31556926):
                        $count = floor($notifation_days/2629743) ;


if($count==1){
 $dy =  floor(($notifation_days-2629743)/86400);   
}else if($count==2){
$dy =  floor(($notifation_days-(2629743*2))/86400);
}
else if($count==3){
$dy =  floor(($notifation_days-(2629743*3))/86400);
}
else if($count==4){
$dy =  floor(($notifation_days-(2629743*4))/86400);
}
else if($count==5){
$dy =  floor(($notifation_days-(2629743*5))/86400);
}

else if($count==6){
$dy =  floor(($notifation_days-(2629743*6))/86400);
}

else if($count==7){
$dy =  floor(($notifation_days-(2629743*7))/86400);
}

else if($count==8){
$dy =  floor(($notifation_days-(2629743*8))/86400);
}

else if($count==9){
$dy =  floor(($notifation_days-(2629743*9))/86400);
}

else if($count==10){
$dy =  floor(($notifation_days-(2629743*10))/86400);
}
else if($count==11){
$dy =  floor(($notifation_days-(2629743*11))/86400);
}

else if($count==12){
$dy =  floor(($notifation_days-(2629743*12))/86400);
}




                         if($count==1)
                            $suffix = 'month '.$dy.' days';
                        else
                            $suffix  = 'months '.$dy.' days';
                        break;
                        
                        case($notifation_days >= 31556926):
                        $count = floor($notifation_days/31556926) ;
                         if($count==1)
                            $suffix = 'year';
                        else
                            $suffix  = 'years';
                        break;
                    }
//date availaibe notification ends here............................



 $user_id_product = $runrows['user_id'];
                 
                        $query_profile = mysqli_query($con,"SELECT * FROM users WHERE user_id='$user_id_product' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 

    $sname = $result['sname']; 
$oname = $result['oname']; 
$owner = $result['username'];
    $shop_name = $result["shop_name"]; 

$shop_name = substr($shop_name,0,25);

   $state_product = $result['state_name'];

if(isset($username)){
//..........to count if in basket..................
 $check_if_added_basket = mysqli_query($con,"SELECT * FROM basket WHERE added_by='$user_id' AND product_id='$product_id' ");    
            $countrow_basket = mysqli_num_rows($check_if_added_basket);

}	

  ?>




                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product"><!-- product -->
                                    <div class="product-thumbnail"><!-- product-thumbnail -->
                                        <span class="onsale">Sale!</span>
                                        <a href="product-page?product-id=<?php echo $product_id; ?>"><img class="img-fluid w-100" src="<?php echo 'uploads_product/thumbs/'.$pix1; ?>" alt=""></a>
                                        
                                         <div class="ttm-shop-icon"><!-- ttm-shop-icon -->


<?php if($type == 1) : ?>


	<script type="text/javascript">
     
     //to check the game of the user block...........
    $(document).on('click', '.addbasket<?php echo $product_id ?>', function() {

                           
                                var added_by = '<?php echo $user_id ?>';
                                var action = 'addbasket';
                                 var product_id = '<?php echo $product_id ?>';
                                
                                $.ajax({
                                            url:"ajax/add_basket",
                                            method:"POST",
                                            data:{action:action,added_by:added_by,product_id:product_id},
                                            success:function(data){
                                            
                                              
                                              
                                             $("#addbasket<?php echo $product_id ?>").attr("class", "basket<?php echo $product_id ?> delbasket<?php echo $product_id ?>");
                                             
                                              // $(".thumbfollow").css({'color':'#b81e1e'});
                                               $("#addbasket<?php echo $product_id ?>").html("Remove From Tracker <span class='fa fa-times'></span>");
                                               $("#addbasket<?php echo $product_id ?>").attr("id", "delbasket<?php echo $product_id ?>");

                                               fetch_basket();
                                               
                                              }
                                          });

                                });


    //to check the game of the user block...........
    $(document).on('click', '.delbasket<?php echo $product_id ?>', function() {

                           
                                var added_by = '<?php echo $user_id ?>';
                                var action = 'delbasket';
                                 var product_id = '<?php echo $product_id ?>';

                                $.ajax({
                                            url:"ajax/add_basket",
                                            method:"POST",
                                           data:{action:action,added_by:added_by,product_id:product_id},
                                            success:function(data){

                                        
                                             $("#delbasket<?php echo $product_id ?>").attr("class", "basket<?php echo $product_id ?> addbasket<?php echo $product_id ?>");
                                             
                                              $("#delbasket<?php echo $product_id ?>").html("Add To Tracker <span class='fa fa-shopping-cart'></span>");
                                               $("#delbasket<?php echo $product_id ?>").attr("id", "addbasket<?php echo $product_id ?>");
                                                
                                                fetch_basket();
                                               
                                              }
                                          });

                                });



 </script>


                                             <?php if(isset($username)) : ?><!-- to check it user logged in -->
                                            <?php if($countrow_basket > 0) : ?>
                                            <div class="product-btn add-to-cart-btn"><a id="delbasket<?php echo $product_id; ?>" href="javascript:;" class="basket<?php echo $product_id; ?> delbasket<?php echo $product_id; ?>">Remove From Tracker <span class="fa fa-times"></span></a></div>
                                             <?php else : ?>

                                            <div class="product-btn add-to-cart-btn"><a id="addbasket<?php echo $product_id; ?>" href="javascript:;" class="basket<?php echo $product_id; ?> addbasket<?php echo $product_id; ?>">Add To Tracker <span class="fa fa-shopping-cart"></span></a></div>
                                            <?php endif; ?>

                                            <?php else : ?><!-- to check it user logged in -->

                                                 <div class="product-btn add-to-cart-btn"><a id="notl<?php echo $product_id; ?>" href="javascript:;" class="notLoggedIn">Add To Tracker <span class="fa fa-shopping-cart"></span></a></div>

                                             <?php endif; ?><!-- to check it user logged in -->


<?php else : ?>


<script type="text/javascript">
     
     //to check the game of the user block...........
    $(document).on('click', '.addbasket<?php echo $product_id ?>', function() {

                           
                                var added_by = '<?php echo $user_id ?>';
                                var action = 'addbasket';
                                 var product_id = '<?php echo $product_id ?>';
                                
                                $.ajax({
                                            url:"ajax/add_basket",
                                            method:"POST",
                                            data:{action:action,added_by:added_by,product_id:product_id},
                                            success:function(data){
                                            
                                              
                                              
                                             $("#addbasket<?php echo $product_id ?>").attr("class", "basket<?php echo $product_id ?> delbasket<?php echo $product_id ?>");
                                             
                                              // $(".thumbfollow").css({'color':'#b81e1e'});
                                               $("#addbasket<?php echo $product_id ?>").html("Remove From Basket <span class='fa fa-times'></span>");
                                               $("#addbasket<?php echo $product_id ?>").attr("id", "delbasket<?php echo $product_id ?>");

                                               fetch_basket();
                                               
                                              }
                                          });

                                });


    //to check the game of the user block...........
    $(document).on('click', '.delbasket<?php echo $product_id ?>', function() {

                           
                                var added_by = '<?php echo $user_id ?>';
                                var action = 'delbasket';
                                 var product_id = '<?php echo $product_id ?>';

                                $.ajax({
                                            url:"ajax/add_basket",
                                            method:"POST",
                                           data:{action:action,added_by:added_by,product_id:product_id},
                                            success:function(data){

                                        
                                             $("#delbasket<?php echo $product_id ?>").attr("class", "basket<?php echo $product_id ?> addbasket<?php echo $product_id ?>");
                                             
                                              $("#delbasket<?php echo $product_id ?>").html("Add To Basket <span class='fa fa-shopping-cart'></span>");
                                               $("#delbasket<?php echo $product_id ?>").attr("id", "addbasket<?php echo $product_id ?>");
                                                
                                                fetch_basket();
                                               
                                              }
                                          });

                                });



 </script>



                                            <?php if(isset($username)) : ?><!-- to check it user logged in -->

                                            <?php if($countrow_basket > 0) : ?>
                                            <div class="product-btn add-to-cart-btn"><a id="delbasket<?php echo $product_id; ?>" href="javascript:;" class="basket<?php echo $product_id; ?> delbasket<?php echo $product_id; ?>">Remove From Basket <span class="fa fa-times"></span></a></div>
                                             <?php else : ?>

                                            <div class="product-btn add-to-cart-btn"><a id="addbasket<?php echo $product_id; ?>" href="javascript:;" class="basket<?php echo $product_id; ?> addbasket<?php echo $product_id; ?>">Add To Basket <span class="fa fa-shopping-cart"></span></a></div>
                                            <?php endif; ?>

                                            <?php else : ?><!-- to check it user logged in -->

                                                 <div class="product-btn add-to-cart-btn"><a id="notl<?php echo $product_id; ?>" href="javascript:;" class="notLoggedIn">Add To Basket <span class="fa fa-shopping-cart"></span></a></div>

                                             <?php endif; ?><!-- to check it user logged in -->
<?php endif; ?>







                                        </div>
                                    </div><!-- product-thumbnail end -->
                                    <div class="product-content text-left"><!-- product-content -->
                                        <div class="product-title"><!-- product-title -->
                                            <h2><a href="product-page?product-id=<?php echo $product_id; ?>"><?php echo $prod_name ?></a></h2>
                                        </div>

                                        <?php if($type == 1) : ?>
                                        <div><!-- ratting-star -->
                    <p>Available <b style="color: #173e43"><?php echo $neg_days ?><?php echo  $count.' '.$suffix; ?></b></p>
                     <p>Around <?php echo $available_day ?></p>
                                        </div>
                                         <?php endif; ?>


                                        <a href="product-page?product-id=<?php echo $product_id; ?>">
                                        <span class="product-price"><!-- product-Price -->
                                            <span class="product-Price-currencySymbol">
                                                <span class="product-Price-amount" style="color: #173e43">
                                                        <del class="product-Price-currencySymbol">N</del> <?php echo number_format($prod_price); ?>
                                                </span>
                                                
                                           
                                                <!-- <ins><span class="product-Price-amount">
                                                        <del class="product-Price-currencySymbol">N</del><?php echo $prod_price ?>
                                                    </span>
                                                </ins> -->
                                            </span>
                                        </span>
                                            </a>

                                    <div><!-- ratting-star -->
                                        <span style="color: #173e43;">BY</span>
                                        <a href="product-page?product-id=<?php echo $product_id; ?>"><span><?php if($shop_name != ''){echo $shop_name; }else{echo ucfirst($username); } ?></span></a>           
                                        </div>
                                        <div><!-- ratting-star -->
                                        
                                        <a href="product-page?product-id=<?php echo $product_id; ?>"  style="color: #e61b1b">
                                            <i class="fa fa-map-marker"></i> 
                                            <span style="color: #7cda0a"><?php echo $state_product; ?> State</span>
                                        </a>  

                                        <a href="<?php echo $owner; ?>"  style="color: #e61b1b; float: right;">
                                            <i class="fa fa-user"></i> 
                                            <span style="color: #7cda0a">Visit Shop</span>
                                        </a> 


                                        </div>




                                    </div>
                                </div>
                            </div>
                          



									
   
    	<?php endwhile; ?> 
       
      <?php endif; ?>