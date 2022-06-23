<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); 

include('./func/blogthumb.func.php');

$user_idP = urldecode($_GET['id']);
$code = urldecode($_GET['code']);


//to check for validity of the user.....................
if($user_idP != $user_id){
  header("Location: index.php");
}
//.......................................................


?>
  


<?php


  //to update profile pix
  //to process the form starts here
if(isset($_POST['submit'])){



$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');



  $image_name1 = $_FILES['file1']['name'];
  $image_size1 = $_FILES['file1']['size'];
  $image_temp1 = $_FILES['file1']['tmp_name'];
 $image_ext1 = @strtolower(end(explode('.', $image_name1)));


  $image_name2 = $_FILES['file2']['name'];
  $image_size2 = $_FILES['file2']['size'];
  $image_temp2 = $_FILES['file2']['tmp_name'];
  $image_ext2 = @strtolower(end(explode('.', $image_name2)));

   $image_name4 = $_FILES['file4']['name'];
  $image_size4 = $_FILES['file4']['size'];
  $image_temp4 = $_FILES['file4']['tmp_name'];
  $image_ext4 = @strtolower(end(explode('.', $image_name4)));

   $image_name3 = $_FILES['file3']['name'];
  $image_size3 = $_FILES['file3']['size'];
  $image_temp3 = $_FILES['file3']['tmp_name'];
  $image_ext3 = @strtolower(end(explode('.', $image_name3)));




  //strtolower becasue file ext names can be capitalized
  // explode function will separate the values from the dot, and the end function will select the last value e.g photo . jpeg
  $errors = array();
  
  if(empty($image_name1 || $image_name2 || $image_name3 || $image_name4)){
    $errors[] = 'Please choose atleast one file';
      }
  else{


    if($image_name2 && in_array($image_ext1 , $allowed_ext) === false){
      $errors[] = 'File 1 type not allowed';
      }
    

    
       if($image_name2 && in_array($image_ext2 , $allowed_ext) === false){
      $errors[] = 'File 2 type not allowed';
      }
    

 
      if($image_name3 && in_array($image_ext3 , $allowed_ext) === false){
      $errors[] = 'File 3 type not allowed';
      }
    

  
      if($image_name4 && in_array($image_ext4 , $allowed_ext) === false){
      $errors[] = 'File 4 type not allowed';
      }
    

    // if($image_size1 > 900000 || $image_size2 > 900000 || $image_size3 > 900000 || $image_size4 > 900000){
    //   $errors[] = 'None of the file must exceed 9MB';  
    // }
    
  }
  if(!empty($errors)){
    foreach($errors as $errormsg){
      //echo '<div class="error1">'.$errormsg.'</div><br>';
      
      }
    }
    else{
    

   $image_file1 = $image_name1;
   $image_file2 = $image_name2;
   $image_file3 = $image_name3;
   $image_file4 = $image_name4;


  //to rename...........
$filename1   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension1  = pathinfo( $image_name1, PATHINFO_EXTENSION ); // jpg
$image_file1   = $filename1 . "." . $extension1; // 5dab1961e93a7_1571494241.jpg


$filename2   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension2  = pathinfo( $image_name2, PATHINFO_EXTENSION ); // jpg
$image_file2   = $filename2 . "." . $extension2; // 5dab1961e93a7_1571494241.jpg


$filename3   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension3  = pathinfo( $image_name3, PATHINFO_EXTENSION ); // jpg
$image_file3   = $filename3 . "." . $extension3; // 5dab1961e93a7_1571494241.jpg

$filename4   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension4  = pathinfo( $image_name4, PATHINFO_EXTENSION ); // jpg
$image_file4   = $filename4 . "." . $extension4; // 5dab1961e93a7_1571494241.jpg
//to rename...........




  move_uploaded_file($image_temp1, 'uploads_product/album/'.$image_file1);
  move_uploaded_file($image_temp2, 'uploads_product/album/'.$image_file2);
  move_uploaded_file($image_temp3, 'uploads_product/album/'.$image_file3);
  move_uploaded_file($image_temp4, 'uploads_product/album/'.$image_file4);

 
 
 if($image_file1){
  $profilepix1 = "uploads_product/thumbs/$image_file1";
  create_thumb('uploads_product/album/', $image_file1, $profilepix1);
}
else{
  $profilepix1 = '';
}

if($image_file2){
  $profilepix2 = "uploads_product/thumbs/$image_file2";
  create_thumb('uploads_product/album/', $image_file2, $profilepix2);
}
else{
  $profilepix2 = '';
}

 if($image_file3){ 
  $profilepix3 = "uploads_product/thumbs/$image_file3";
  create_thumb('uploads_product/album/', $image_file3, $profilepix3);
}
else{
  $profilepix3 = '';
}

if($image_file4){
  $profilepix4 = "uploads_product/thumbs/$image_file4";
  create_thumb('uploads_product/album/', $image_file4, $profilepix4);
}
else{
  $profilepix4 = '';
}

 //unlink('uploads/album/'.$image_file);





  mysqli_query($con,"UPDATE products SET pix1='$image_file1', pix2='$image_file2', pix3='$image_file3', pix4='$image_file4'  WHERE code = '$code' AND user_id='$user_idP' ") or die(mysqli_error());  
  

   $successmsg = 'Congratulations, you have successfully uploaded the product';
  
   '<br>';
  
      }
  }
//to process the form ends here
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
                                    <h2 class="title">Upload Product pictures</h2>
                                </div>
                                <div class="heading-seperator">
                                    <span></span>
                                </div>
                            </div><!-- section title end -->


  
    <?php if (isset($successmsg)) : ?>
           <div class="success1"><?php echo $successmsg; ?></div> 

<div class="ttm-btn-box pr-20 pb-20">
    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-center ttm-btn-bgcolor-skincolor" href="upload-products?id=<?php echo $user_idP; ?>" title="">Go back To Upload Product</a>
</div>

        
    <?php endif; ?>


    <?php if (isset($errormsg)) : ?>
           <div class="error1"><?php echo $errormsg; ?></div> 
     <?php endif; ?>
      
                            
                            
                            <div class="spacing-6 ttm-bgcolor-grey mt-0 mb-0">
                               




                                                              
                            
                            
                        
    <form id="ttm-quote-form" class="row ttm-quote-form clearfix" enctype="multipart/form-data" method="post" action="">
                                    
                                                         

<div class="col-sm-6 col-md-6">
    <div class="form-group">
         <label style="color:#7cda0a">Picture 1</label> <span style="color:red">(Important)</span>
      <input name="file1" type="file">
      </div>
</div>

<div class="col-sm-6 col-md-6">
      <div class="form-group">
        <label style="color:#7cda0a">Picture 2</label>
      <input name="file2" type="file">
      </div>
</div>

<div class="col-sm-6 col-md-6">
      <div class="form-group">
        <label style="color:#7cda0a">Picture 3</label>
      <input name="file3" type="file">
      </div>
</div>

<div class="col-sm-6 col-md-6">
      <div class="form-group">
        <label style="color:#7cda0a">Picture 4</label>
      <input name="file4" type="file">
      </div>
</div>


                                 

                                     
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <button type="submit" id="submit" name="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey w-100" value="">
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