<?php 
session_start();
ob_start();
include ('./inc/connect.inc.php'); ?>
<?php

$user_idPP = '';

if(isset($_SESSION["user"]) ){
  //this is for shop owner
 $username = $_SESSION["user"];

$get= mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get);
  $user_id = $rows["user_id"];
  $username = $rows["username"]; 
$reg_id = $rows["reg_id"]; 
$user_type = $rows["user_type"]; 
      $pix = $rows["pix"];  

    if($pix==''){
    $profilepix_db = "img/b3.png";
    }
    else{
    $profilepix_db = "uploads/thumbs/$pix";
      }


  }
  else if(isset($_COOKIE['user_log_in'])){
    
$username = $_COOKIE['user_log_in'];      
  $get= mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get);
  $user_id = $rows["user_id"];
  $username = $rows["username"]; 
  $reg_id = $rows["reg_id"]; 
$user_type = $rows["user_type"]; 

   $pix = $rows["pix"];  

    if($pix==''){
    $profilepix_db = "images/avatar.png";
    }
    else{
    $profilepix_db = "uploads/thumbs/$pix";
      }

      
    }else{
      
    }
    
//this will make the social media works
 if(isset($_GET['u'])){
    $userP = mysqli_real_escape_string($con,$_GET['u']);
    if($userP){
      
      $query = mysqli_query($con,"SELECT * FROM users WHERE username='$userP' ");
      if(mysqli_num_rows($query)===1){
        $rowP = mysqli_fetch_assoc($query);



        $userP = $rowP['username'];
        $_SESSION["userP"] = $userP ;
        
      
      }
      else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=https://kikifarm.com/ \" >";
        exit();
      }
    }
  }
  

if(isset($username)){
   $checkactive= mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND active='no' ");
  if(mysqli_num_rows($checkactive)===1){
    if($_SESSION["user"] || $_COOKIE['user_log_in']){
$xyt = 60*60*24*7*52;
$user_expire = time()-$xyt;
setcookie('user_log_in', $_SESSION["user"],  $user_expire);
session_destroy();
header("Location: login.php");
}
}



}
  //the social media ends here

  $time = time();



  //this will make the og-graph work dynamically..............................................
if($page_title != 'Shop'){
    $userP = '';
}

 $getShop= mysqli_query($con,"SELECT * FROM users WHERE username='$userP' ");
  $rowShop = mysqli_fetch_assoc($getShop);
  $user_idShop = $rowShop["user_id"];
  $usernameShop = $rowShop["username"]; 
  $reg_idShop = $rowShop["reg_id"]; 
$user_typeShop = $rowShop["user_type"]; 

$descriptionShop = $rowShop["description"];
$phoneShop = $rowShop["phone"];

   $pixShop = $rowShop["pix"];  

    if($pixShop==''){
    $profilepix_dbShop = "images/avatar.png";
    }
    else{
    $profilepix_dbShop = "uploads/thumbs/$pixShop";
      }

                
                $shop_nameShop = urldecode($rowShop['shop_name']);
                $shop_nameShop = mysqli_real_escape_string($con,$shop_nameShop);

if($page_title == 'Shop'){
     $page_url = 'https://www.kikifarm.com/'.urldecode($userP);

   
        $page_image = 'https://www.kikifarm.com/'.$profilepix_dbShop; 
       
    if($descriptionShop != ''){
        $page_desc = $descriptionShop;
        }
        else{
            $page_desc = 'kikiFarm platform makes farming, selling and buying easy and faster; connecting the farmers and the consumers to maximize profits and buy cheaper respectively';
            }
            
    if($shop_nameShop){
        $page_ogtitle = $shop_nameShop;
        }
        else{
            $page_ogtitle = 'kikiFarm';
            }
    
    }//the first if ends here....................
    else{                   
$page_image = 'https://www.kikifarm.com/images/avatar.png'; 
$page_url = 'https://www.kikifarm.com/';
$page_desc = 'kikiFarm platform makes farming, selling and buying easy and faster; connecting the farmers and the consumers to maximize profits and buy cheaper respectively';
$page_ogtitle = 'kikiFarm';
    }
//...............................................................................
?>


<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="We protect the farmers, make demand easy for the consumers and we link the farmers and the consumers to the logistics individuals and companies nearby" />
<meta name="description" content="kikiFarm platform makes farming, selling and buying easy and faster; connecting the farmers and the consumers to maximize profits and buy cheaper respectively" />
<meta name="author" content="https://www.outtaboxtech.com.ng/" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>kikiFarm</title>



 <meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Outtabox-Tech">
<meta name="twitter:title" content="<?php echo $page_ogtitle; ?>">
<meta name="twitter:description" content="<?php echo $page_desc; ?>">
<meta name="twitter:image" content="<?php echo $page_image; ?>">

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $page_ogtitle; ?>">
<meta property="og:description" content="<?php echo $page_desc; ?>">
<meta property="og:url" content="<?php echo $page_url; ?>">
<meta property="og:image" content="<?php echo $page_image; ?>">
<meta property="fb:app_id" content="292392571492063">


<!-- favicon icon -->
<link rel="shortcut icon" href="images/favicon.png" />

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

<!-- animate -->
<link rel="stylesheet" type="text/css" href="css/animate.css"/>

<!-- slick-slider -->
<link rel="stylesheet" type="text/css" href="css/slick.css">

<link rel="stylesheet" type="text/css" href="css/slick-theme.css">

<!-- fontawesome -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>

<!-- themify -->
<link rel="stylesheet" type="text/css" href="css/themify-icons.css"/>

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="css/flaticon.css"/>


<!-- REVOLUTION LAYERS STYLES -->

    <link rel="stylesheet" type="text/css" href="revolution/css/rs6.css">

<!-- prettyphoto -->
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">

<!-- shortcodes -->
<link rel="stylesheet" type="text/css" href="css/shortcodes.css"/>

<!-- main -->
<link rel="stylesheet" type="text/css" href="css/main.css"/>

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>

<script src="js/jquery-3.2.0.min.js"></script>


<script src="https://platform.twitter.com/widgets.js"></script>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

<script>
var metatags = document.getElementsByTagName("meta");
var shareurl = '';

function getMetaTagInfo(tag){
  for(metatags, a = 0; a < metatags.length; a++){
    if(tag == metatags[a].name || tag == metatags[a].getAttribute("property")){
      return metatags[a].content;
    }
  }
  return false;
}


function socialShare(socialnetwork){
  console.log(socialnetwork);
   
  var url = getMetaTagInfo("og:url");   // 'https://www.ishopealive.com/'  // window.location.href; //
  var description = getMetaTagInfo("og:description");
  switch(socialnetwork){
    case 'twitter':
      shareurl ='https://twitter.com/intent/tweet?button_hashtag=kikiFarm&text='+url;
      break;
    case 'facebook':
      shareurl ='https://www.facebook.com/sharer/sharer?u='+encodeURI(url);
      break;
    case 'google':
      shareurl ='https://plus.google.com/share?url='+encodeURI(url);
      break;
    default: 
      shareurl=false;
  }
  
  if(shareurl){
  window.open(shareurl,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
  }
  console.log(shareurl); 
}
</script>



</head>

<body>

    <!--page start-->
    <div class="page">

        <!-- preloader start -->
        <div id="preloader">
          <div id="status">&nbsp;</div>
        </div>
        <!-- preloader end -->

        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">
            <!-- ttm-header-wrap -->
            <div class="ttm-header-wrap" >
                <!-- ttm-stickable-header-w -->
                <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix" >
                    <!-- ttm-topbar-wrapper -->
                    <div class="ttm-topbar-wrapper clearfix">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ttm-topbar-content">
                                        <ul class="top-contact text-left">
                                            <li>Your Trusted 24 Hours Service Provider!</li>
                                        </ul>
                                        <div class="topbar-right text-right">
                                            <ul class="top-contact">
                                                <li>Office Hour : 08:00am - 6:00pm</li>
                                            </ul>
                                            <div class="ttm-social-links-wrapper list-inline">
                                                <ul class="social-icons">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- ttm-topbar-wrapper end -->
                    <div class="ttm-widget_header">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex flex-row align-items-center">
                                        <!-- site-branding -->
                                        <div class="site-branding mr-auto">
                                            <a class="home-link" href="index" title="Agrotek" rel="home">
                                                <img src="images/logo.png" id="logo-img" class="img-center" alt="logo">
                                            </a>
                                        </div><!-- site-branding end -->
                                        <!-- widget-info -->
                                        <div class="widget_info d-flex flex-row align-items-center justify-content-end">
                                            <div class="widget_icon"><i class="flaticon-call"></i></div>
                                            <div class="widget_content">
                                                <h5 class="widget_title">+2347066352274</h5>
                                                <p class="widget_desc">Make A Call</p>
                                            </div>
                                        </div><!-- widget-info end -->
                                        <!-- widget-info -->
                                        <div class="widget_info d-flex flex-row align-items-center justify-content-end">
                                            <div class="widget_icon"><i class="flaticon-email"></i></div>
                                            <div class="widget_content">
                                                <h5 class="widget_title">info@kikifarm.com</h5>
                                                <p class="widget_desc">Get A Estimate</p>
                                            </div>
                                        </div><!-- widget-info end -->
                                        <!-- widget-info -->
                                        <div class="widget_info d-flex flex-row align-items-center justify-content-end">
                                            <div class="widget_icon"><i class="flaticon-worldwide"></i></div>
                                            <div class="widget_content">
                                                <h5 class="widget_title">Sagamu, </h5>
                                                <p class="widget_desc">Ogun State.</p>
                                            </div>
                                        </div><!-- widget-info end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="site-header-menu" class="site-header-menu" style="background-color: #173e43;">
                        <div class="site-header-menu-inner ttm-stickable-header" style="background-color: #173e43;">
                            <div class="container" >
                                <!--site-navigation -->
                                <div id="site-navigation" class="site-navigation" >
                                    <!-- <div class="ttm-custombutton">
                                       <a href="#" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor"> Request for quote</a>
                                    </div> -->

<?php


// to check for farm product notifcation starts...............
if(isset($username)){

$queryFollow1 = mysqli_query($con,"SELECT * FROM follow WHERE following_id= '$user_id'  "); 

 $total = 0;

 while($rowFollow1 = mysqli_fetch_array($queryFollow1)) {


 $being_followed_id = $rowFollow1['being_followed_id'];
$product_id_owner = $rowFollow1['product_id'];


$queryFollow2 = mysqli_query($con,"SELECT * FROM products WHERE user_id= '$being_followed_id'  "); 

 while($rowFollow2 = mysqli_fetch_array($queryFollow2)) {
 
       $product_id = $rowFollow2['product_id'];
        //...................
    // $product_follow_query = mysqli_query($con,"SELECT product_id FROM follow WHERE following_id = '$user_id' ");
    // $follow_row = mysqli_fetch_array($product_follow_query);
    //  $product_list = $follow_row['product_id'];
    $product_list_explode = explode(",", $product_id_owner);

  //  print_r($product_list_explode);

        if(in_array($product_id, $product_list_explode)){
        
      
    }else{
         $total = $total + 1;
       // $total += $total;
        break;
    }
    

    }//second while ends here.........



}//first while ends here.........




//to count basket starts here.........
$count_basket = mysqli_query($con,"SELECT * FROM basket WHERE added_by = '$user_id' AND done='no' ");
$basket_count = mysqli_num_rows($count_basket);
//to count basket ends here.........




//to count message starts here.........
   $querymessage= mysqli_query($con,"SELECT * FROM message WHERE to_id='$user_id' AND status='no'  ");
$count_msg = mysqli_num_rows($querymessage);
  //to count message ends here.........


//to count basket logistic starts here.........
$count_basket_logistic = mysqli_query($con,"SELECT * FROM notify_logistic WHERE logistic_owner_id = '$user_id' AND done='no' ");
$basket_logistic_count = mysqli_num_rows($count_basket_logistic);
//to count basket ends here.........


}
// if usernames logistic ends ends here...............



  
?>



                                    <!-- header-icons -->
                                    <div class="ttm-header-icons" >
                                          <?php if(isset($username)) : ?> 
                                         
                                        <span class="ttm-header-icon ttm-header-cart-link">
                                            <a href="follow-products-notification"><i class="fa fa-bell"></i>
                                                <span class="number-cart"><?php echo $total; ?></span>
                                            </a>
                                        </span>
                                         <span class="ttm-header-icon ttm-header-cart-link">
                                            <a href="message"><i class="fa fa-envelope"></i>
                                                <span class="number-cart"><?php echo $count_msg; ?></span>
                                            </a>
                                        </span>

                                        <?php if($user_type != 'logistic') : ?> 
                                        <span class="ttm-header-icon ttm-header-cart-link">
                                            <a href="basket-products"><i class="fa fa-shopping-cart"></i>
                                                <span class="number-cart fetch_basket2"><?php echo $basket_count; ?></span>
                                            </a>
                                        </span>
                                        <?php else : ?> 
                                             <span class="ttm-header-icon ttm-header-cart-link">
                                            <a href="basket-logistics"><i class="fa fa-shopping-cart"></i>
                                                <span class="number-cart"><?php echo $basket_logistic_count; ?></span>
                                            </a>
                                        </span>
                                        <?php endif;?> 

                                        <span class="ttm-header-icon ttm-header-cart-link">
                                            <a href="<?php echo $username; ?>"><i class="fa fa-user"></i>
                                               
                                            </a>
                                        </span>

                                        <?php else : ?> 
                                        <span class="ttm-header-icon " >
                                            <a href="signup" style="margin-left:10px; color: #7cda0a;">SignUp</a> 
                                            <b style="color: white">|</b><a href="login" style="margin-left:10px; color: #7cda0a;">Login</a>
                                        </span>
                                        
                                        <?php endif; ?>
                                        <!-- <div class="ttm-header-icon ttm-header-search-link">
                                            <a href="#" class="sclose"><i class="ti ti-search"></i></a>
                                            <div class="ttm-search-overlay">
                                                <div class="ttm-bg-layer"></div>
                                                <div class="ttm-icon-close"></div>
                                                <div class="ttm-search-outer">
                                                    <form method="get" class="ttm-site-searchform" action="#">
                                                        <input type="search" class="field searchform-s" name="s" placeholder="Type Word Then Enter...">
                                                        <button type="submit">
                                                            <i class="ti ti-search"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div><!-- header-icons end -->
                                    <div class="ttm-menu-toggle">
                                        <input type="checkbox" id="menu-toggle-form" />
                                        <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                            <span class="toggle-block toggle-blocks-1"></span>
                                            <span class="toggle-block toggle-blocks-2"></span>
                                            <span class="toggle-block toggle-blocks-3"></span>
                                        </label>
                                    </div>
                                    <nav id="menu" class="menu" >
                                        <ul class="dropdown">
                                           <li class="active"><a href="index">Home</a>
                                                <!-- <ul>
                                                    <li><a href="index.html">Homepage 1</a></li>
                                                    <li><a href="home-2.html">Homepage 2</a></li>
                                                    <li class="active"><a href="home-3.html">Homepage 3</a></li>
                                                    <li><a href="home-4.html">Homepage 4<span class="label-new">New</span></a></li>
                                                    <li><a href="#">Header Styles</a>
                                                        <ul>
                                                            <li><a href="index.html">Header Style 01</a></li>
                                                            <li><a target="_blank" href="header-style-02.html">Header Style 02</a></li>
                                                            <li><a target="_blank" href="header-style-03.html">Header Style 03</a></li>
                                                            <li><a target="_blank" href="header-style-04.html">Header Style 04</a></li>
                                                            <li><a target="_blank" href="header-style-05.html">Header Style 05</a></li>
                                                        </ul>
                                                    </li>
                                                </ul> -->
                                            </li>
                                            <li><a href="farm-products">Farm Items</a></li>
                                             <li><a href="shops">Shops</a></li>
                                              <li><a href="farm-products-tracker">Food Tracker</a></li>
                                              <li><a href="food-rescue">Food Rescue</a></li>
                                             
                                           
                                               <li><a href="#">News</a>
                                                <ul>
                                                    <li><a href="news-feed-nigeria">Nigeria Agro News</a></li>
                                                    <li><a href="news-feed-foreign">Foreign Agro News</a></li>
                                                    <li><a href="news-feed-investor">Investors' Agro News</a></li>
                                                    <li><a href="#">Agro Forum</a></li>
                                                </ul>
                                                <li><a href="#">Logistics</a>
                                                <ul>
                                                   
                                                   
                                                    <li><a href="logistic-in-your-area">Logistic In Your Area</a></li>
                                                    <li><a href="signup">Register Logistics</a></li>
                                                    <li><a href="#">Request Logistic</a></li>
                                                    
                                                </ul>
                                            </li>
                                           <!--  <li><a href="#">Pages</a>
                                                <ul>
                                                    <li><a href="aboutus-01.html">About Us 1</a></li>
                                                    <li><a href="aboutus-02.html">About Us 2</a></li>
                                                    <li><a href="services-01.html">Services 1</a></li>
                                                    <li><a href="services-02.html">Services 2</a></li>
                                                    <li><a href="contact.html">Contact Us</a></li>
                                                    <li><a href="our-expert.html">Our Team</a></li>
                                                    <li><a href="faq.html">FAQs</a></li>
                                                    <li><a href="error.html">Error Page</a></li>
                                                    <li><a href="element.html">Elements</a></li>
                                                </ul>
                                            </li> -->
                                            <!-- <li><a href="#">Services</a>
                                                <ul>
                                                    <li><a href="lawn-garden-care.html">Lawn & Garden Care</a></li>
                                                    <li><a href="stone-hardscaping.html">Stone & Hardscaping</a></li>
                                                    <li><a href="forest-tree-planting.html">Forest & Tree Planting</a></li>
                                                    <li><a href="watering-systems.html">Watering Systems</a></li>
                                                    <li><a href="preparing-landscape.html">Preparing Landscape</a></li>
                                                    <li><a href="irrigation-drainage.html">Irrigation & Drainage</a></li>
                                                </ul>
                                            </li> -->
                                           <!--  <li><a href="#">Project</a>
                                                <ul>
                                                    <li><a href="project-style-01.html">Project Style 1</a></li>
                                                    <li><a href="project-style-02.html">Project Style 2</a></li>
                                                    <li><a href="#">Project Details</a>
                                                        <ul>
                                                            <li><a href="detail-style-01.html">Detail Style 1</a></li>
                                                            <li><a href="detail-style-02.html">Detail Style 2</a></li>
                                                            <li><a href="detail-style-03.html">Detail Style 3</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li> -->
                                            <!-- <li><a href="#">Blog</a>
                                                <ul>
                                                    <li><a href="blog.html">Blog Classic</a></li>
                                                    <li><a href="blog-grid.html">Blog Grid View</a></li>
                                                    <li><a href="blog-top-image.html">Blog Top Image</a></li>
                                                    <li><a href="blog-left-image.html">Blog Left Image</a></li>
                                                    <li><a href="single-blog.html">Blog Single View</a></li>
                                                </ul>
                                            </li> -->
                                            <!-- <li><a href="#">Shop</a>
                                                <ul>
                                                    <li><a href="shop.html">Default Shop</a></li>
                                                    <li><a href="product-details.html">Single Product Details</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li> -->
                                        </ul>
                                    </nav>
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div><!-- ttm-stickable-header-w end-->
            </div><!--ttm-header-wrap end -->
        </header><!--header end-->
<?php
if(isset($username)){
?>
    <script type="text/javascript">
        
         function fetch_basket()
    {
      var  user_id = '<?php echo $user_id; ?>'

      $.ajax({
        url:"ajax/fetch_basket",
        method:"POST",
        data:{user_id:user_id},
        
        success:function(data){
              $('.fetch_basket2').html(data);
            }                 
        });
     }
    </script>


<?php
}
?>



<script>
//this will make the not logged in works
        $(document).ready(function() {
          $(document).on('click', '.notLoggedIn', function() {
                var notLoggedIn = $(this).attr("id");               
                   
                   // alert(notLoggedIn);
                    $('#'+notLoggedIn).html('Please log in!');

               });
        });


</script>

<script type="text/javascript">
             

  $(document).on('click', '.qucikSearchImage', function() {

      $('#modalqucikSearchImage').modal("show");

                action = '';

               $.ajax({
                            url:"ajax/quicksearchimage",
                            method:"POST",
                            data:{action:action},
                            
                            success:function(data){
                               //the return value from json is giving to the below id(s)

                               $('#display-qucikSearchImage').html(data);

                              }
                          });

               

              });


</script>
