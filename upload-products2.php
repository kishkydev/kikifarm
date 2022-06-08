<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); 


$user_idP = urldecode($_GET['id']);
$type = urldecode($_GET['type']);

//to check for validity of the user.....................
if($user_idP != $user_id){
  header("Location: index.php");
}
//.......................................................

if($type==1){
    $upload_type = 'Upload products for TRACKER';
}else{
    $upload_type = "Upload products for general FARMERS' MARKET";
}

?>
  
<?php

function pin_generator(){
        global $con;
        $generated_pin = rand(1000000,9999999);
        if($generated_pin == 0){
            pin_generator();
        }
        else{
            return $generated_pin;
        } 
        
    }

//$time = time();
date_default_timezone_set('Africa/Lagos');
 $current_time = date('Y-m-d h:i:s');
//this is going to make the profile form works
if(isset($_POST['submit1'])){
    
     $name = mysqli_real_escape_string($con,htmlentities(trim($_POST['name']))); 
     $description = mysqli_real_escape_string($con,htmlentities(trim($_POST['description'])));
     $measure = mysqli_real_escape_string($con,htmlentities(trim($_POST['measure'])));
     $price = mysqli_real_escape_string($con,htmlentities(trim($_POST['price'])));
     if($type == 1){
     $date_available = mysqli_real_escape_string($con,htmlentities(trim($_POST['date_available'])));
        }

     $price = str_replace(',', '', $price);
    

     $general = $name.' '.$description; 
        $new_pin =  pin_generator();
    
    
    if(empty($name)){     
        $errormsg = 'You have not entered a product name'; 
        }
        else if(empty($description)){
        $errormsg = 'You have not entered product description';
        }
        else if(empty($price)){
        $errormsg = 'You have not entered a price';
        }

        
        // else if($measure == ''){
        // $errorpost = 'You have not entered a measurement'; 
        // }
        
        else{
    
    if($type == 1){

if(empty($date_available)){
        $errormsg = 'Select the possible date of maturity or availabilty';
        }
        else{
$query_form = mysqli_query($con,"INSERT INTO products(type, user_id, code, name, description, measure, price, date_available, time_upload, general) VALUES('$type', '$user_idP', '$new_pin', '$name', '$description', '$measure', '$price', '$date_available', '$current_time', '$general') ") or die(mysqli_error());               
    header("Location: upload-productpix?code=$new_pin&id=$user_idP");
            }



            }
            else{

$query_form = mysqli_query($con,"INSERT INTO products(type, user_id, code, name, description, measure, price,  time_upload, general) VALUES('$type','$user_idP', '$new_pin', '$name', '$description', '$measure', '$price', '$current_time', '$general') ") or die(mysqli_error());               
    header("Location: upload-productpix?code=$new_pin&id=$user_idP");


            }






        }
        

//to process the form ends here
}//if not a user




?>


 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">Upload Products</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Upload Products</span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->
       

        <!--site-main start-->
        <div class="site-main">

          
            <!-- contactbox-section -->
            <section class="ttm-row contact-form-section clearfix">
                <div class="container">
                    <div class="row"><!-- row -->
                        <div class="col-lg-2">
                           
                        </div>









                        <div class="col-lg-8">


                             <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h2 class="title"><?php echo $upload_type; ?></h2>
                                </div>
                                <div class="heading-seperator">
                                    <span></span>
                                </div>
                            </div><!-- section title end -->


                                                        <?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>       
                            
                            
                            <div class="spacing-6 ttm-bgcolor-grey mt-0 mb-0">
                               




                                                      

                                                              
                            
                            
                        
                                <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="">
                                    
                                  

                            <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                       <label style="color:#7cda0a">Product name</label>
                            <input class="form-control with-border bg-white" type="text" name="name" placeholder="Enter product name">
                                    </div>
                            </div>


                             <?php if ($type == 1) : ?>
                            <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                      <label style="color:#7cda0a">Possible date of maturity or availabilty</label>
                            <input class="form-control with-border bg-white" type="date" name="date_available" placeholder="Enter old price">
                                    </div>
                            </div>
                             <?php endif; ?>

                            <div class="col-sm-6 col-md-6">
        <div class="form-group">
 <?php
    $query_cat = mysqli_query($con,"SELECT * FROM measures ORDER BY measure ASC");   
    ?>
                
         
         <label style="color:#7cda0a">Select mode of item measurement</label>  
        <select  name="measure"  class="form-control with-border bg-white" >
            <option value="">Select measurements mode</option>
            <?php while($rowcat = mysqli_fetch_assoc($query_cat)):   ?>
     <?php 
     $measure_id = $rowcat['id'];
      $measure = $rowcat['measure'];
     ?>
            
            <option  value="<?php echo $measure; ?>"><?php echo $measure; ?></option>
       <?php endwhile; ?>       
        </select>
                                        
        </div>
</div>


                        
                            <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                     <label style="color:#7cda0a">Price</label>
                            <input class="form-control with-border bg-white" type="number" name="price" placeholder="Enter  price">
                                    </div>
                            </div>
                            

                            <div class="col-sm-12 col-md-12"> 
                                    <div class="form-group">
                                      <label style="color:#7cda0a">Product Description</label>
                            <textarea name="description"  placeholder="Decribe the product" class="form-control with-border bg-white" rows="10"></textarea>  
                                    </div>
                            </div>


                                 

                                     
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <button type="submit" id="submit" name="submit1" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey w-100" value="">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>








                                                           





                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>
            <!-- contactbox-section end -->
           

        </div><!--site-main end-->


      
       

       
  
  
<?php  include ('./inc/footer.inc.php'); ?>