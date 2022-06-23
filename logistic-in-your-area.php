<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); ?>



<?php
$user_id_id = '';

if(!isset($user_id)){
 $user_id_id = '';   
}else{
 $user_id_id =  $user_id;
}

 



$queryS = mysqli_query($con,"SELECT * FROM users WHERE user_id = '$user_id_id'  ") or die (mysqli_error());
$row = mysqli_fetch_array($queryS);
$state_name = $row['state_name']; 

$construct = "join_state LIKE '%$state_name%'";

//for pagination of the  list on the homepage
$get = mysqli_query($con,"SELECT * FROM users WHERE   $construct  AND user_type='logistic' ") or die (mysqli_error());

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
        
$query1 = mysqli_query($con,"SELECT * FROM users WHERE   $construct AND user_type='logistic'  ") or die (mysqli_error());




?>


 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">Logistic in Your Area</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Logistic in Your Area</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->


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



    //...............to search town........................................
      $(document).ready(function(){      

   $(document).on('change', '.search_lg', function() {

          var search_lg =  $(this).val();
                              
        window.location.href = 'logistic-in-your-area-lg?lg='+search_lg;

         });
   });
</script>     


         <!--site-main start-->
        <div class="site-main">

            <!-- sidebar -->
            <div class="ttm-row only-one-section ttm-bgcolor-white clearfix">
                <div class="container">






                        <div class="row">
                            <div class="col-md-12">
                                

                                
<p style="color: #7cda0a;">Search by state and local government area</p>

                                <form class="products-ordering float-sm-left" method="get">
                                    <div class="form-group mb-30">

<?php
  $query_state = mysqli_query($con,"SELECT * FROM states"); 
  ?>
    <select name="orderby" id="state_name" class="form-control border select_lg">
    <option>Select your State of location</option>
    <?php while($rowlg = mysqli_fetch_assoc($query_state)):   ?>
     <?php  
     $state_id = $rowlg['state_id'];
    $state_name = $rowlg['name'];
      ?>
            <option  value="<?php echo $state_name; ?>"><?php echo $state_name; ?></option>
           
       <?php endwhile; ?>
</select>
                                    </div>
                                </form>
                                <form class="products-ordering float-sm-left" method="get">
                                    <div class="form-group mb-30">
                                        <select name="orderby" id="subcat_list" class="form-control border search_lg">
                                            <option value="">Select Local Government Area</option>
                                           
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>







                    <!-- row -->
                    <div class="row">

  <div class="ptb-25 text-center" style="padding: 5px;">
                                <h6 class="mb-0">Below are the Logistic companies near the location of the product you are about to order. <a href="#" class="ttm-textcolor-skincolor"> <u>Notify the logistics shop you prefer</u></a></h6>
                            </div>                      


                        <div class="col-lg-12">
                            <!-- ttm-cart-form -->
                            <form class="ttm-cart-form" action="#" method="post">
                                <table class="shop_table shop_table_responsive">
                                    <thead>
                                        <tr style="color:#173e43">
                                            <th class="product-remove">&nbsp;</th>
                                           
                                            <th class="product-thumbnail">Username</th>
                                            <th class="product-thumbnail">ShopName</th>
                                            <th class="product-subtotal">Phone</th>
                                            <th class="product-name">Main State</th>
                                            <th class="product-name">Other States</th>
                                            <th class="product-thumbnail">Main Address</th>
                                            
                                          
                                        </tr>
                                    </thead>
                                    <tbody>

<?php if($user_id_id == '') : ?>

 <tr style="color:#173e43">
    <td colspan="7"><b style="color:red;">Please login to view the logistic companies close to you</b> </td>
 </tr>   

<?php else : ?>


<?php $i = 1; while($result = mysqli_fetch_array($query1)) : ?>

    <?php 
                    
    $pixd = $result['pix']; 

    $sname = $result['sname']; 
    $oname = $result['oname']; 
    $owner = $result['username'];
    $owner_id = $result['user_id'];
    $shop_name = $result["shop_name"]; 
    $address = $result["address"]; 
    $phone = $result["phone"]; 

    $main_state = $result["state_name"]; 
    $join_state = $result["join_state"]; 

    if($pixd==''){
    $profilepixd = "images/avatar.png";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }



                        ?>

                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a href="#" class="remove"><?php echo $i; ?></a>
                                            </td>
                                           
                                            <td class="product-thumbnail" data-title="Username">
                                                <a href="<?php echo $owner; ?>"><?php echo ucfirst($owner); ?>
                                                    
                                                    <img class="img-fluid" src="<?php echo $profilepixd; ?>" alt="" style="float: left; margin-right: 5px; margin-left: 5px;">
                                                    
                                                </a>
                                            </td>

                                            <td class="product-thumbnail" data-title="Shop Name" >
                                                <a href="<?php echo $owner; ?>" style="color: #173e43;"><?php echo $shop_name; ?></a>
                                            </td>
                                            <td class="product-name" data-title="Phone" >
                                                <a href="<?php echo $owner; ?>"><b><?php echo $phone; ?></b></a>
                                            </td>
                                             <td class="product-name" data-title="Main State">
                                                <a href="<?php echo $owner; ?>"><b><?php echo $main_state; ?></b></a>
                                            </td>

                                           
                                            <td class="product-name" data-title="Other States" >

                                                <a href="javascript:;" id="other<?php echo $owner_id; ?>" class="button ttm-btn-size-sm ttm-btn ttm-btn-bgcolor-darkgrey" style="padding: 10px;">Other States</a>

                                                <a href="message?message=<?php echo $owner_id; ?>" class="button ttm-btn-size-sm ttm-btn ttm-btn-bgcolor-skincolor" style="padding: 10px;"> <span class="fa fa-comment"></span> Message</a>


                                                 



                                            </td>
                                           
                                            <td class="product-name" data-title="Main Address" >
                                                <a href="<?php echo $owner; ?>"><?php echo $address; ?></a>
                                            </td>                                         
                                           
                                        </tr>
                                   

<script type="text/javascript">
             

  $(document).on('click', '#other<?php echo $owner_id; ?>', function() {

      $('#modalOtherStates').modal("show");


            

           var owner_id = '<?php echo $owner_id; ?>';
         

               $.ajax({
                            url:"ajax/other-states",
                            method:"POST",
                            data:{owner_id:owner_id},
                            
                            success:function(data){
                               //the return value from json is giving to the below id(s)

                               $('#display-other-states').html(data);

                              }
                          });

               

              });


</script>


                                       
<?php $i++; endwhile; ?> 

 
<?php endif; ?>







                                    </tbody>
                                </table>
                            </form><!-- ttm-cart-form end -->


                            




                            
                        </div>
                    </div><!-- row end -->
                </div>
            </div>
            <!-- sidebar end -->

        </div><!--site-main end-->

<?php  include ('./inc/footer.inc.php'); ?>