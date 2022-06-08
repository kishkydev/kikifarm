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




 $state_name = urldecode($_GET['state_name']);
 $lg_name = urldecode($_GET['lg_name']);




 //................................................
$search_exploded2 = preg_split('/[\s]+/', $lg_name);
$x2 = "";
$construct2 = "";  
    
foreach($search_exploded2 as $search_each2)
{
$x2++;
if($x2==1)
$construct2 .="join_lg  LIKE '%$search_each2%'";
else
$construct2 .="AND join_lg LIKE '%$search_each2%'";
    
}
 





//for pagination of the  list on the homepage
$get = mysqli_query($con,"SELECT * FROM users WHERE user_type='farmer' AND state_name='$state_name' AND $construct2   ") or die (mysqli_error());

$total = mysqli_num_rows($get);

$limit =(isset($_GET['limit'])) ? (int)$_GET['limit'] : 8;
$page =(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
(int)$link = 2;
$row_start = (($page - 1) * $limit);
(int)$limit = 100;
//$page = 1;

$last = ceil($total / $limit);

$start = (($page - $link) > 0) ? $page - $link : 1;
$end = (($page + $link) < $last) ? $page + $link : $last;       
        
$getproduct = mysqli_query($con,"SELECT * FROM users WHERE user_type='farmer' AND state_name='$state_name' AND $construct2 ORDER BY user_id DESC LIMIT $row_start, $limit  ") or die (mysqli_error()); 
?>
   <script>              
 //...............to fetch town........................................
                              $(document).ready(function(){   

                                     $(document).on('click', '.select_lg', function() {

                          var state_name2 = document.getElementById('state_name').value;
                           
                                      
                     $.ajax({
                                                        url:"ajax/get_lg_search",
                                                        method:"POST",
                                                        data:{state_name2:state_name2},
                                                        
                                                        success:function(data){
                                                           //the return value from json is giving to the below id(s)

                                                           $('#subcat_list').html(data);
                                                           
                                                          }
                                                      });
                                          

                                         
                                            
                                          });

                                      });




   $(document).on('click', '#find_search', function() {



var find_word = $('#find_word').val(); 
 var state_name = $('#state_name').val(); 
  var lg_name = $('#subcat_list').val();



  if (find_word  && !lg_name && !state_name)  {                       
            window.location.href = 'find-shop-search2?find_word='+find_word;  
    }
    else if (find_word  && state_name  && !lg_name)  {                       
            window.location.href = 'find-shop-search3?find_word='+find_word+'&state_name='+state_name;  
    }
    else if (!find_word  && state_name  && lg_name)  {  

          window.location.href = 'find-shop-search4?lg_name='+lg_name+'&state_name='+state_name;  
      }
     else if (!find_word  && state_name  && !lg_name)  {  

          window.location.href = 'find-shop-search5?state_name='+state_name;  
      }
      else if (find_word  && state_name  && lg_name)  {  

          window.location.href = 'find-shop-search?find_word='+find_word+'&lg_name='+lg_name+'&state_name='+state_name;  
      }                                      


         });


   



</script>     



 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">Farmers' Shops</h1>
                            </div><!-- /.page-title-captions -->
                             <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-search"></i>&nbsp;&nbsp;Searched</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor"><?php echo $state_name; ?> <span class="ttm-textcolor-white">|</span> <?php echo $lg_name; ?></span>
                            </div>    
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->


        
             
   <!--site-main start-->
        <div class="site-main">
        <!-- sidebar -->
        <div class="sidebar ttm-bgcolor-white clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-9 content-area">
                        <div class="row">
                            <div class="col-md-12">
                                

                                
                           
<p style="color: #890912; margin-top: -20px; margin-bottom: 30px;"><b>Search shops by state and LG area</b></p>

                                <form class="products-ordering float-sm-left" method="get">
                                    <div class="form-group mb-30" style="margin-top: -20px;">

<?php
  $query_state = mysqli_query($con,"SELECT * FROM states"); 
  ?>
    <select name="orderby" id="state_name" class="form-control border select_lg">
    <option value="">Select your State of location</option>
    <?php while($rowlg = mysqli_fetch_assoc($query_state)):   ?>
     <?php  
     $state_id = $rowlg['state_id'];
    $state_named = $rowlg['name'];
      ?>
            <option  value="<?php echo $state_named; ?>"><?php echo $state_named; ?></option>
           
       <?php endwhile; ?>
</select>
                                    </div>
                                </form>
                                <form class="products-ordering float-sm-left" method="get">
                                    <div class="form-group mb-30" style="margin-top: -20px;">
                                        <select name="orderby" id="subcat_list" class="form-control border search_lg">
                                            <option value="">Select Local Government Area</option>
                                           
                                        </select>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <aside class="widget widget-search col-lg-8 col-md-8" style="margin-top: -20px;">
                            
                                <div class="form-group">
                                    <input name="search" autocomplete="off" id="find_word" type="text" class="form-control with-border" placeholder="Search farmer's shops....">
                                    <a href="javascript:;" id="find_search"><i class="fa fa-search" ></i></a>
                                </div>
                            
                        </aside>
                        <hr>

<script>
$(document).ready(function(){
 
 $('#find_word').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"ajax/fetch_cat3",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>




                        <div class="row">
                          

                           <?php while($result = mysqli_fetch_assoc($getproduct)) : ?>
                        <?php
                           
    $pixd = $result['pix']; 

$sname = $result['sname']; 
$oname = $result['oname']; 
$owner = $result['username'];
$shop_name = $result["shop_name"];
$phone = $result['phone'];

$shop_name = substr($shop_name,0,25);

   $state_product = $result['state_name'];


   if($pixd==''){
    $profilepixd = "images/avatar.png";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }


// //..........to count if in basket..................
//  $check_if_added_basket = mysqli_query($con,"SELECT * FROM basket WHERE added_by='$user_id' AND product_id='$product_id' ");    
//             $countrow_basket = mysqli_num_rows($check_if_added_basket);
                        ?>



                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product"><!-- product -->
                                    <div class="product-thumbnail"><!-- product-thumbnail -->
                                        <span class="onsale"><b><?php echo ucfirst($owner) ?>'s shop</b></span>
                                        <a href="<?php echo $owner; ?>"><img class="img-fluid w-100" src="<?php echo $profilepixd; ?>" alt=""></a>
                                      


                                    </div><!-- product-thumbnail end -->
                                    <div class="product-content text-left"><!-- product-content -->
                                        <div class="product-title"><!-- product-title -->
                                        
 <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-icon-btn-left ttm-btn-bgcolor-darkgrey showsms" href="#" title="" style="color: white; font-family:tahoma; font-family:tahoma"><b>Send Message</b> <i class="fa fa-comment"></i></a>

                                       
                                        </div>
                                       
                                        <div><!-- ratting-star -->
                                        <span style="color: #173e43;"></span>
                                        <a href="product-page?product-id=<?php echo $product_id; ?>"><span><?php if($shop_name != ''){echo $shop_name; }else{echo ucfirst($username); } ?></span></a>           
                                        </div>


<p style="color: #890912; margin-bottom:-5px"><b><?php echo $phone; ?></b></p>


                                        <div><!-- ratting-star -->
                                        
                                        <a href="product-page?product-id=<?php echo $product_id; ?>"  style="color: #e61b1b">
                                            <i class="fa fa-map-marker"></i> 
                                            <span style="color: #173e43"><?php echo $state_product; ?> State</span>
                                        </a>  

                                        <a href="<?php echo $owner; ?>"  style="color: #e61b1b; float: right;">
                                            <i class="fa fa-user"></i> 
                                            <span style="color: #173e43">Visit Shop</span>
                                        </a> 


                                        </div>
                                    </div>
                                </div>
                            </div>
                          

                           <?php endwhile; ?>
                          


                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="ttm-pagination">
                                   <!--  <span class="page-numbers current">1</span>
                                    <a class="page-numbers" href="#">2</a>
                                    <a class="next page-numbers" href="#"><i class="ti ti-arrow-right"></i></a>
 -->

                                  
                <?php if($page == 1): ?>
                <a href="#" class="page-numbers"><i class="ti ti-arrow-left"></i></a>
                 <?php else : ?>
                  <a class="previous page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $page-1; ?>&type=<?php echo $type; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><i class="ti ti-arrow-left"></i></a>
                <?php endif; ?> 

                 <?php if($start > 1): ?>
                    <a class="page-numbers" href="?limit=<?php echo $limit; ?>&page=1&type=<?php echo $type; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>">1</a>
                    <span>...</span>
                    <?php endif; ?>


                <?php for($y = $start; $y <= $end; $y++) : ?>
                    <?php if($page == $y) : ?>
                      <span><a class="current page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $y; ?>&type=<?php echo $type; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><?php echo $y; ?></a></span>
                       <?php else : ?>
                        <a class="page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $y; ?>&type=<?php echo $type; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><?php echo $y; ?></a>
                    <?php endif; ?> 
                    <?php endfor; ?>


                <?php if($end < $last): ?>
                    <span>...</span>
                    <a class="page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $last; ?>&type=<?php echo $type; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><?php echo $last; ?></a>
                    <?php endif; ?>

                <?php if($page == $last): ?> 
                      <a href="#" class="next page-numbers"><i class="ti ti-arrow-right"></i></a>
                      <?php else : ?>
                      <a class="next page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $page+1; ?>&type=<?php echo $type; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><i class="ti ti-arrow-right"></i></a>
                      <?php endif; ?>


            
             

                                </div>






                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 widget-area">
                        
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
                                    <span class="product-Price-amount amount"><span class="product-Price-currencySymbol">$</span>33.00</span>
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
                                                        <span class="product-Price-currencySymbol">$</span>50.00
                                                    </span>
                                                </del>
                                                <ins><span class="product-Price-amount">
                                                        <span class="product-Price-currencySymbol">$</span>40.00
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
                                    <span class="product-Price-amount amount"><span class="product-Price-currencySymbol">$</span>33.00</span>
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