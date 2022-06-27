<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); ?>
  


 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title">Generate Barcode</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Generate Barcode</span>
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
                        


<?php
$f = "visit.php";
if(!file_exists($f)){
    touch($f);
    $handle =  fopen($f, "w" ) ;
    fwrite($handle,0) ;
    fclose ($handle);

}
 
include('libs/phpqrcode/qrlib.php'); 


//  $tcnumber = substr($tcnumber, 0, $pos);

function pin_generator(){
        global $con;
        $generated_pin = rand(10000000000,99999999999);
        if($generated_pin == 0){
            pin_generator();
        }
        else{
            return $generated_pin;
        } 
        
    }

$code = pin_generator();
    



if(isset($_POST['submit']) ) {
    $tempDir = 'temp/'; 


//to rename...........
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$filename = $filename;
//to rename...........



$product = mysqli_real_escape_string($con,htmlentities(trim($_POST['product'])));

$description= mysqli_real_escape_string($con,htmlentities(trim($_POST['description'])));

$logistic = mysqli_real_escape_string($con,htmlentities(trim($_POST['logistic'])));

$phone = mysqli_real_escape_string($con,htmlentities(trim($_POST['phone'])));




 

//.............................

        if($product && $description && $phone && $logistic){



    $body =  $code;
    //$codeContents = 'mailto:'.$email.'?subject='.urlencode($subject).'&body='.urlencode($body); 

    $codeContents = $body;

    QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);


    mysqli_query($con, "INSERT INTO barcode(user_id, code, product, description, logistic, phone, qrcode) VALUES('$user_id','$code', '$product', '$description', '$logistic', '$phone', '$filename') ");

     //   header("Location: create-barcode?success");


        }else{


            $errormsg = 'Please input all the details';


        }

//..............................






//........................


$query2 = mysqli_query($con, "SELECT * FROM barcode WHERE code = '$code' AND user_id='$user_id' ");

    $row2 = mysqli_fetch_assoc($query2);

    $qrcode = $row2['qrcode'].'.png';

 $qrcode_image  = "temp/$qrcode";


}
?>





                        <div class="col-lg-6">


                             <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h2 class="title">Create Bar Code</h2>
                                </div>
                                <div class="heading-seperator">
                                    <span></span>
                                </div>
                            </div><!-- section title end -->
                            

                            <p style="color: #7cda0a">Fill the informations below to create a bar code</b></p>

                      <?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>       
                            
                            
                            <div class="spacing-6 ttm-bgcolor-grey mt-0 mb-0">
                                <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="#">
                                    
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                          
                                             <input name="product" type="text"  class="form-control with-border bg-white" placeholder="Enter Product Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                          
                                             <input name="description" type="text"  class="form-control with-border bg-white" placeholder="Enter Descriptions">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                          
                                             <input name="logistic" type="text"  class="form-control with-border bg-white" placeholder="Logistic Company or means of delivery">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                          
                                             <input name="phone" type="text"  class="form-control with-border bg-white" placeholder="Enter Phone Number">
                                        </div>
                                    </div>

                           
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <button type="submit"  name="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey w-100" value="">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>




 




                            </div>
                        </div>




                        <div class="col-lg-6">
                            <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h2 class="title">Share barcodes</h2>
                                </div>
                                <div class="heading-seperator">
                                    <span></span>
                                </div>
                            </div><!-- section title end -->

                            <?php if(isset($_POST['submit'])) : ?>
                            <div>
                                <p class="text-center"><img src="<?php echo  $qrcode_image; ?>" height="200" width="200"></p>
                                <p ><a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-left ttm-btn-bgcolor-skincolor" href="<?php echo  $qrcode_image; ?>" title="" download style="color: white; font-family:tahoma; "><i class="fa fa-download"></i> Download Barcode</a></p>

                            </div>
                            <?php else : ?>

                                <p class="text-center" style="color:#be160d"><b>The barcode shows here after generating</b></p>

                            <?php endif; ?>


                        </div>




                    </div><!-- row end -->
                </div>
            </section>
            <!-- contactbox-section end -->
           

        </div><!--site-main end-->


      
       

       
  
  
<?php  include ('./inc/footer.inc.php'); ?>