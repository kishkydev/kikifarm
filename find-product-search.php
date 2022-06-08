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



if(isset($_GET['type'])){
    $type = $_GET['type'];
}else{
     $type = 2; 
}




 $find_word = urldecode($_GET['find_word']);
 $state_name = urldecode($_GET['state_name']);
 $lg_name = urldecode($_GET['lg_name']);


$search_exploded = preg_split('/[\s]+/', $find_word);
 
$x = "";
$construct = "";  
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="`products`.`name` LIKE '%$search_each%'";
else
$construct .="AND `products`.`name` LIKE '%$search_each%'";
    
}
  

 //................................................
$search_exploded2 = preg_split('/[\s]+/', $lg_name);
$x2 = "";
$construct2 = "";  
    
foreach($search_exploded2 as $search_each2)
{
$x2++;
if($x2==1)
$construct2 .="`users`.`join_lg`  LIKE '%$search_each2%'";
else
$construct2 .="AND `users`.`join_lg` LIKE '%$search_each2%'";
    
}
 






//for pagination of the  list on the homepage

$get = mysqli_query($con,"SELECT *
  FROM `users`
  LEFT JOIN `products`
  ON `users`.`user_id` = `products`.`user_id`
  WHERE $construct AND `users`.`state_name`='$state_name' AND $construct2 AND type='$type'   ") or die (mysqli_error());





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
        
//$getproduct = mysqli_query($con,"SELECT * FROM products WHERE type='$type' ORDER BY date_available DESC LIMIT $row_start, $limit  ") or die (mysqli_error()); 


$getproduct = mysqli_query($con,"SELECT *
  FROM `users`
  LEFT JOIN `products`
  ON `users`.`user_id` = `products`.`user_id`
  WHERE $construct AND `users`.`state_name`='$state_name' AND $construct2 AND type='$type' ORDER BY product_id DESC LIMIT $row_start, $limit ") or die (mysqli_error());
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

  //alert(lg_name);

  // if(!$.trim(state_name)){
  //   var state_name = '';
  // }
 
  //  if(!$.trim(lg_name)){
  //   var lg_name = '';
  // }
 


    if (find_word  && !lg_name && !state_name)  {                       
            window.location.href = 'find-product-search2?find_word='+find_word;  
    }
    else if (find_word  && state_name  && !lg_name)  {                       
            window.location.href = 'find-product-search3?find_word='+find_word+'&state_name='+state_name;  
    }
      else{

          window.location.href = 'find-product-search?find_word='+find_word+'&lg_name='+lg_name+'&state_name='+state_name;  
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
                                <h1 class="title">Farm Products</h1>
                            </div><!-- /.page-title-captions -->
                             <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-search"></i>&nbsp;&nbsp;Searched</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor"><?php echo $find_word; ?> <span class="ttm-textcolor-white">|</span> <?php echo $state_name; ?> <span class="ttm-textcolor-white">|</span> <?php echo $lg_name; ?></span>
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
                                

                                
                           
<p style="color: #890912; margin-top: -20px; margin-bottom: 30px;"><b>Search items by state and LG area</b></p>

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
                                    <input name="search" autocomplete="off" id="find_word" type="text" class="form-control with-border" placeholder="Search agricultural product....">
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
    url:"ajax/fetch_cat2",
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
                          

                           <?php while($runrows = mysqli_fetch_assoc($getproduct)) : ?>
                        <?php
                            $product_id = $runrows['product_id'];
                            $prod_name = ucfirst($runrows['name']);
                            $prod_description = $runrows['description'];
                            $prod_price = $runrows['price'];

                            $prod_code = $runrows['code'];
                          
                            
        
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

$shop_name = substr($shop_name,0,25);

   $state_product = $result['state_name'];


if(isset($username)){
//..........to count if in basket..................
 $check_if_added_basket = mysqli_query($con,"SELECT * FROM basket WHERE added_by='$user_id' AND product_id='$product_id' ");    
            $countrow_basket = mysqli_num_rows($check_if_added_basket);

}

                        ?>

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


                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product"><!-- product -->
                                    <div class="product-thumbnail"><!-- product-thumbnail -->
                                        <span class="onsale">Sale!</span>
                                        <a href="product-page?product-id=<?php echo $product_id; ?>"><img class="img-fluid w-100" src="<?php echo 'uploads_product/thumbs/'.$pix1; ?>" alt=""></a>
                                        <div class="ttm-shop-icon"><!-- ttm-shop-icon -->

                                            <?php if(isset($username)) : ?><!-- to check it user logged in -->

                                            <?php if($countrow_basket > 0) : ?>
                                            <div class="product-btn add-to-cart-btn"><a id="delbasket<?php echo $product_id; ?>" href="javascript:;" class="basket<?php echo $product_id; ?> delbasket<?php echo $product_id; ?>">Remove From Basket <span class="fa fa-times"></span></a></div>
                                             <?php else : ?>

                                            <div class="product-btn add-to-cart-btn"><a id="addbasket<?php echo $product_id; ?>" href="javascript:;" class="basket<?php echo $product_id; ?> addbasket<?php echo $product_id; ?>">Add To Basket <span class="fa fa-shopping-cart"></span></a></div>
                                            <?php endif; ?>

                                            <?php else : ?><!-- to check it user logged in -->

                                                 <div class="product-btn add-to-cart-btn"><a id="notl<?php echo $product_id; ?>" href="javascript:;" class="notLoggedIn">Add To Basket <span class="fa fa-shopping-cart"></span></a></div>

                                             <?php endif; ?><!-- to check it user logged in -->

                                        </div>


                                    </div><!-- product-thumbnail end -->
                                    <div class="product-content text-left"><!-- product-content -->
                                        <div class="product-title"><!-- product-title -->
                                            <h2><a href="product-page?product-id=<?php echo $product_id; ?>"><?php echo $prod_name ?></a></h2>
                                        </div>
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
                  <a class="previous page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $page-1; ?>&type=<?php echo $type; ?>&find_word=<?php echo $find_word; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><i class="ti ti-arrow-left"></i></a>
                <?php endif; ?> 

                 <?php if($start > 1): ?>
                    <a class="page-numbers" href="?limit=<?php echo $limit; ?>&page=1&type=<?php echo $type; ?>&find_word=<?php echo $find_word; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>">1</a>
                    <span>...</span>
                    <?php endif; ?>


                <?php for($y = $start; $y <= $end; $y++) : ?>
                    <?php if($page == $y) : ?>
                      <span><a class="current page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $y; ?>&type=<?php echo $type; ?>&find_word=<?php echo $find_word; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><?php echo $y; ?></a></span>
                       <?php else : ?>
                        <a class="page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $y; ?>&type=<?php echo $type; ?>&find_word=<?php echo $find_word; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><?php echo $y; ?></a>
                    <?php endif; ?> 
                    <?php endfor; ?>


                <?php if($end < $last): ?>
                    <span>...</span>
                    <a class="page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $last; ?>&type=<?php echo $type; ?>&find_word=<?php echo $find_word; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><?php echo $last; ?></a>
                    <?php endif; ?>

                <?php if($page == $last): ?> 
                      <a href="#" class="next page-numbers"><i class="ti ti-arrow-right"></i></a>
                      <?php else : ?>
                      <a class="next page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $page+1; ?>&type=<?php echo $type; ?>&find_word=<?php echo $find_word; ?>&state_name=<?php echo $state_name; ?>&lg_name=<?php echo $lg_name; ?>"><i class="ti ti-arrow-right"></i></a>
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