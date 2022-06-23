<?php

$page_title = 'kikiFarm';

$item_id = (int)$_GET['product-id'];
?>

<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); 




//to check for validity of the user.....................
// if($user_idP != $user_id){
//   header("Location: index.php");
// }
//.......................................................


?>

<?php
//to update viewed product
    mysqli_query($con,"UPDATE products SET view=view+1 WHERE product_id='$item_id' ");
//..................


 $getproduct = mysqli_query($con,"SELECT * FROM products WHERE product_id = '$item_id' ORDER BY product_id DESC"); 

$runrows = mysqli_fetch_assoc($getproduct);
        
                            $product_id = $runrows['product_id'];
                            $prod_name = ucfirst($runrows['name']);
                            $prod_description = $runrows['description'];
                            $prod_price = $runrows['price'];

                            $prod_code = $runrows['code'];
                            $date_available = $runrows['date_available'];
                            
                            $type = $runrows['type'];
        
                            $pix1 = $runrows['pix1'];
                            $pix2 = $runrows['pix2'];
                            $pix3 = $runrows['pix3'];
                            $pix4 = $runrows['pix4'];


                             $user_id_product = $runrows['user_id'];
                 
                        $query_profile = mysqli_query($con,"SELECT * FROM users WHERE user_id='$user_id_product' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 

    $sname = $result['sname']; 
$oname = $result['oname']; 
$owner = $result['username'];
    $shop_name = $result["shop_name"]; 


   $state_product = $result['state_name'];
   $lg_product = $result['lg_name'];                        


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
                            
?>

   <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title"><?php echo $prod_name ?></h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">More Details</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->
 <script type="text/javascript">
     
     //to check the game of the user block...........
    $(document).on('click', '.addbasket', function() {

                           
                                var added_by = '<?php echo $user_id ?>';
                                var action = 'addbasket';
                                 var product_id = '<?php echo $product_id ?>';
                                
                                $.ajax({
                                            url:"ajax/add_basket",
                                            method:"POST",
                                            data:{action:action,added_by:added_by,product_id:product_id},
                                            success:function(data){
                                            
                                              
                                              
                                             $("#addbasket").attr("class", "cart_button ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-bgcolor-darkgrey basket delbasket");
                                             
                                              // $(".thumbfollow").css({'color':'#b81e1e'});
                                               $("#addbasket").html("Remove From Basket <span class='fa fa-times'></span>");
                                               $("#addbasket").attr("id", "delbasket");

                                               fetch_basket();
                                               
                                              }
                                          });

                                });


    //to check the game of the user block...........
    $(document).on('click', '.delbasket', function() {

                           
                                var added_by = '<?php echo $user_id ?>';
                                var action = 'delbasket';
                                 var product_id = '<?php echo $product_id ?>';

                                $.ajax({
                                            url:"ajax/add_basket",
                                            method:"POST",
                                           data:{action:action,added_by:added_by,product_id:product_id},
                                            success:function(data){

                                        
                                             $("#delbasket").attr("class", "cart_button ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-bgcolor-darkgrey basket addbasket");
                                             
                                              $("#delbasket").html("Add To Basket <span class='fa fa-shopping-cart'></span>");
                                               $("#delbasket").attr("id", "addbasket");
                                                
                                                fetch_basket();
                                               
                                              }
                                          });

                                });



 </script>

  <?php

  if(isset($username)){



  $check_if_added_basket = mysqli_query($con,"SELECT * FROM basket WHERE added_by='$user_id' AND product_id='$product_id' ");    
            $countrow_basket = mysqli_num_rows($check_if_added_basket);

            }

                  ?>      

        <!--site-main start-->
        <div class="site-main">
        <!-- sidebar -->
        <div class="sidebar ttm-bgcolor-white clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-9 content-area">
                        <div class="ttm-single-product-details product">
                            <div class="ttm-single-product-info clearfix">
                                <div class="product-gallery images">
                                    <figure class="ttm-product-gallery__wrapper">
                                        <div class="product-gallery__image">
                                            <img class="img-fluid" src="<?php echo 'uploads_product/thumbs/'.$pix1; ?>" alt="product-img">
                                        </div>
                                    </figure>
                                </div>
                                <div class="summary entry-summary">
                                    <h3 class="singel_product_title"><?php echo $prod_name ?></h3>
                                    <div class="product-rating clearfix">
                                        <div class="ttm-ratting-star"><!-- ratting-star -->
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#reviews" class="review-link" rel="nofollow">(<span class="count">1</span> customer review)</a>
                                    </div>
                                    <p class="price">
                                        <span class="Price-amount amount">
                                             <del class="product-Price-currencySymbol">N</del> <?php echo number_format($prod_price); ?>
                                        </span>
                                    </p>


                                            <?php if($type == 1) : ?>
                                            
                                            <div>
                                             <span style="color: #e61b1b"><?php echo $neg_days ?><?php echo  $count.' '.$suffix; ?></span>
                                            </div>
                                            
                                            <?php endif; ?>

                                    <div class="product-details__short-description">
                                        <p><?php echo $prod_description ?></p>
                                    </div>
                                    <div><!-- ratting-star -->
                                        <span style="color: #173e43;">BY</span>
                                        <span><a href="<?php echo $owner; ?>"><?php if($shop_name != ''){echo $shop_name; }else{echo ucfirst($owner); } ?></a></span>           
                                        </div>
                                        <div><!-- ratting-star -->
                                        
                                           <span style="color: #7cda0a"><?php echo $state_product; ?> State</span>             
                                        </div>
                                    <form class="cart" action="#" method="post" enctype="multipart/form-data">
                                      

                                          <?php if(isset($username)) : ?><!-- to check it user logged in -->
                                        <?php if($countrow_basket > 0) : ?>
                                        <a href="javascript:;" id="delbasket"  class="cart_button ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-bgcolor-darkgrey basket delbasket">Remove From Basket <span class="fa fa-times"></span></a>

                                        <?php else : ?>
                                         <a href="javascript:;" id="addbasket"  class="cart_button ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-bgcolor-darkgrey basket addbasket" >Add To Basket <span class="fa fa-shopping-cart"></span></a>
                                         <?php endif; ?>

                                          <?php else : ?><!-- to check it user logged in -->

                                                

                                                  <a href="javascript:;" id="notl<?php echo $product_id; ?>"  class="cart_button ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-bgcolor-darkgrey notLoggedIn" >Add To Basket <span class="fa fa-shopping-cart"></span></a>

                                             <?php endif; ?><!-- to check it user logged in -->

                                           

                                          


                                    </form>
                                    <div class="product_meta">
                                        

                                         <?php if($type=='1') : ?>
                                        <div class="sku_wrapper">
                                            <span>Available: </span>
                                            <a href="#" rel="tag"><b style="color: #173e43"><?php echo $neg_days ?><?php echo  $count.' '.$suffix; ?></b>
                                            </a>
                                        </div>
                                        <div class="posted_in">
                                            <span>Around: </span>
                                            <a href="#" rel="tag"><b style="color: #7cda0a"><?php echo $available_day ?></b></a>
                                        </div>
                                        <?php endif; ?>






                                    </div>
                                </div>
                            </div>




                              <div class="row slick_slider blog-slide" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "dots":false, "arrows":true, "autoplay":true, "infinite":true, "centerMode":false, "responsive": [{"breakpoint":500,"settings":{"slidesToShow": 1}}]}'>
                                     <?php if($pix2!='') : ?>
                                    <div class="col-lg-12">
                                        <div class="">
                                            <img class="img-fluid" src="<?php echo 'uploads_product/thumbs/'.$pix2; ?>" alt="single-img-twentythree">
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($pix3!='') : ?>
                                    <div class="col-lg-12">
                                        <div class="">
                                            <img class="img-fluid" src="<?php echo 'uploads_product/thumbs/'.$pix3; ?>" alt="single-img-twentysix">
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($pix4!='') : ?>
                                    <div class="col-lg-12">
                                        <div class="">
                                            <img class="img-fluid" src="<?php echo 'uploads_product/thumbs/'.$pix4; ?>" alt="single-img-twentyseven">
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                </div>



                            <div class="ttm-tabs tabs-for-single-products" data-effect="fadeIn">
                                <ul class="tabs clearfix">
                                    <li class="tab active"><a href="#">Description</a></li>
                                   <!--  <li class="tab"><a href="#">Additional information</a></li> -->
                                    <li class="tab"><a href="#">Reviews ()</a></li>
                                </ul>
                                <div class="content-tab ttm-bgcolor-white">
                                    <!-- content-inner -->
                                    <div class="content-inner active">
                                        <h2>Description</h2>
                                        <p><?php echo $prod_description ?></p>

                                        <div><!-- ratting-star -->
                                        <span style="color: #173e43;">BY</span>
                                        <span><?php if($shop_name != ''){echo $shop_name; }else{echo ucfirst($username); } ?></span>           
                                        </div>
                                        <div><!-- ratting-star -->
                                        
                                           <span style="color: #7cda0a"><?php echo $state_product; ?> State</span>             
                                        </div>
                                        <div><!-- ratting-star -->
                                        
                                           <span style="color: #e61b1b"><?php echo $lg_product; ?> Local Goverment Area</span>             
                                        </div>
                                        
                                    </div><!-- content-inner end-->
                                    <!-- content-inner -->
                                    <!-- <div class="content-inner">
                                        <h2>Additional information</h2>
                                        <table class="shop_attributes">
                                            <tbody><tr><th>color</th><td><p>Blue</p></td></tr></tbody>
                                        </table>
                                    </div> -->
                                    <!-- content-inner end-->
                                    <!-- content-inner -->
                                    <div class="content-inner">
                                        <div id="reviews" class="woocommerce-Reviews">
                                          Reviews show here
                                           <!--  <div id="comments">
                                                <h2 class="woocommerce-Reviews-title">1 review for <span>Beanie with Logo</span></h2>
                                                <ol class="commentlist">
                                                    <li class="review">
                                                        <div class="comment_container">
                                                            <img class="avatar" src="images/blog/blog-comment-01.jpg" alt="comment-img">
                                                            <div class="comment-text">
                                                                <div class="ttm-ratting-star float-right">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong class="eview__author">Cherie </strong><span class="review__dash">–</span>
                                                                    <time class="woocommerce-review__published-date" datetime="2018-11-01T04:58:58+00:00">November 1, 2018</time>
                                                                </p>
                                                                <div class="description">
                                                                    <p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante<br>Very good product and amazing quality.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div> -->
                                            <!-- <div id="review_form_wrapper">
                                                <div class="comment-respond">
                                                    <span class="comment-reply-title">Add a review
                                                        <small><a rel="nofollow" id="cancel-comment-reply-link" href="#">Cancel reply</a></small>
                                                    </span>
                                                    <form action="#" method="post" id="commentform" class="comment-form">
                                                        <p class="comment-notes">
                                                            <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                        </p>
                                                        <div class="comment-form-rating">
                                                            <label>Your rating</label>
                                                            <ul class="stars">
                                                                <li class="fa fa-star-o"></li>
                                                                <li class="fa fa-star-o"></li>
                                                                <li class="fa fa-star-o"></li>
                                                                <li class="fa fa-star-o"></li>
                                                                <li class="fa fa-star-o"></li>
                                                            </ul>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Your review*</label>
                                                                    <textarea name="Massage" rows="3" placeholder="" required="required" class="form-control with-border"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Name*</label>
                                                                    <input name="name" type="text" class="form-control with-border" placeholder="" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Email*</label>
                                                                    <input name="email" type="text" placeholder="" required="required" class="form-control with-border">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input id="comment-cookies-consent" name="comment-cookies-consent" type="checkbox" value="yes">
                                                                <label for="comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group text-left mt-30">
                                                                    <button type="submit" id="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey" value="">
                                                                        Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related products">
                            <h3>Related products</h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product"><!-- product -->
                                        <div class="product-thumbnail"><!-- product-thumbnail -->
                                            <img class="img-fluid w-100" src="images/product/product-one.jpg" alt="">
                                            <div class="ttm-shop-icon"><!-- ttm-shop-icon -->
                                                <div class="product-btn add-to-cart-btn"><a href="#">ADD TO CART</a></div>
                                            </div>
                                        </div><!-- product-thumbnail end -->
                                        <div class="product-content text-left"><!-- product-content -->
                                            <div class="product-title"><!-- product-title -->
                                                <h2><a href="product-details.html">Album</a></h2>
                                            </div>
                                            <div class="ttm-ratting-star"><!-- ratting-star -->
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span class="product-price"><!-- product-Price -->
                                                <del class="product-Price-currencySymbol">N</del> 16.00
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product"><!-- product -->
                                        <div class="product-thumbnail"><!-- product-thumbnail -->
                                            <span class="onsale">Sale!</span>
                                            <img class="img-fluid w-100" src="images/product/product-two.jpg" alt="">
                                            <div class="ttm-shop-icon"><!-- ttm-shop-icon -->
                                                <div class="product-btn add-to-cart-btn"><a href="#">ADD TO CART</a></div>
                                            </div>
                                        </div><!-- product-thumbnail end -->
                                        <div class="product-content text-left"><!-- product-content -->
                                            <div class="product-title"><!-- product-title -->
                                                <h2><a href="product-details.html">Beanie with Logo</a></h2>
                                            </div>
                                            <div class="ttm-ratting-star"><!-- ratting-star -->
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span class="product-price"><!-- product-Price -->
                                                <span class="product-Price-currencySymbol">
                                                    <del><span class="product-Price-amount">
                                                            <del class="product-Price-currencySymbol">N</del>20.00
                                                        </span>
                                                    </del>
                                                    <ins><span class="product-Price-amount">
                                                           <del class="product-Price-currencySymbol">N</del>18.00
                                                        </span>
                                                    </ins>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product"><!-- product -->
                                        <div class="product-thumbnail"><!-- product-thumbnail -->
                                            <img class="img-fluid w-100" src="images/product/product-three.jpg" alt="">
                                            <div class="ttm-shop-icon"><!-- ttm-shop-icon -->
                                                <div class="product-btn add-to-cart-btn"><a href="#">ADD TO CART</a></div>
                                            </div>
                                        </div><!-- product-thumbnail end -->
                                        <div class="product-content text-left"><!-- product-content -->
                                            <div class="product-title"><!-- product-title -->
                                                <h2><a href="product-details.html">Belt</a></h2>
                                            </div>
                                            <div class="ttm-ratting-star"><!-- ratting-star -->
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span class="product-price"><!-- product-Price -->
                                                <del class="product-Price-currencySymbol">N</del>16.00
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 widget-area">
                        <aside class="widget widget-search">
                            <form role="search" method="get" class="search-form" action="#">
                                <div class="form-group">
                                    <input name="search" type="text" class="form-control with-border" placeholder="Search....">
                                    <i class="fa fa-search"></i>
                                </div>
                            </form>
                        </aside>
                        <aside class="widget widget-categories">
                                <h3 class="widget-title">Product Categories</h3>
                                <ul>
                                    <li><a href="#">Dairy Farm</a><span>4</span></li>
                                    <li><a href="#">Flower</a><span>2</span></li>
                                    <li><a href="#">Gardening</a><span>1</span></li>
                                    <li><a href="#">Tips &amp; Tricks</a><span>4</span></li>
                                    <li><a href="#">Watering Plants</a><span>2</span></li>
                                </ul>
                            </aside>
                        <aside class="widget widget-top-rated-products">
                            <h3 class="widget-title">Popular Product</h3>
                            <ul class="">
                                <li class="clearfix">
                                    <a href="#"><img src="images/product/product-one.jpg" alt="">
                                        <span class="product-title">Corn Tree</span>
                                    </a>
                                    <div class="ttm-ratting-star"><!-- ratting-star -->
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="product-Price-amount amount"><del class="product-Price-currencySymbol">N</del>33.00</span>
                                </li>
                                <li class="clearfix">
                                    <a href="#"><img src="images/product/product-two.jpg" alt="">
                                        <span class="product-title">Fresh Okra</span>
                                    </a>
                                    <div class="ttm-ratting-star"><!-- ratting-star -->
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="product-Price-amount amount">
                                        <span class="product-Price-currencySymbol">
                                                <del><span class="product-Price-amount">
                                                        <del class="product-Price-currencySymbol">N</del>50.00
                                                    </span>
                                                </del>
                                                <ins><span class="product-Price-amount">
                                                        <del class="product-Price-currencySymbol">N</del>40.00
                                                    </span>
                                                </ins>
                                            </span>
                                    </span>
                                </li>
                                <li class="clearfix">
                                    <a href="#"><img src="images/product/product-eight.jpg" alt="">
                                        <span class="product-title">Green Broccoli</span>
                                    </a>
                                    <div class="ttm-ratting-star"><!-- ratting-star -->
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="product-Price-amount amount"><del class="product-Price-currencySymbol">N</del>33.00</span>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget tagcloud-widget">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tagcloud">
                                <a href="#" class="tag-cloud-link">Bulbsplant</a>
                                <a href="#" class="tag-cloud-link">Care</a>
                                <a href="#" class="tag-cloud-link">Farm</a>
                                <a href="#" class="tag-cloud-link">Gardening</a>
                                <a href="#" class="tag-cloud-link">Gardens</a>
                                <a href="#" class="tag-cloud-link">Landscaping</a>
                                <a href="#" class="tag-cloud-link">Planting</a>
                                <a href="#" class="tag-cloud-link">Seed Saving</a>
                            </div>
                        </aside>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
        <!-- sidebar end -->
    </div><!--site-main end-->


<?php  include ('./inc/footer.inc.php'); ?>
