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
                                <h1 class="title">Scan Barcode</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Scan Barcode</span>
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
                        


             <div class="col-lg-3">
 



             </div>


                        <div class="col-lg-6">


                             <!-- section title -->
                            <div class="section-title clearfix">
                                <div class="title-header">
                                    <h2 class="title">Scan Bar Code</h2>
                                </div>
                                <div class="heading-seperator">
                                    <span></span>
                                </div>
                            </div><!-- section title end -->

<?php
if(isset($_POST['text'])){

        $code =  $_POST['text'];

$query2 = mysqli_query($con, "SELECT * FROM barcode WHERE code = '$code' ");

$row2 = mysqli_fetch_assoc($query2);

$product = $row2['product'];

$description= $row2['description'];

$logistic = $row2['logistic'];

$phone = $row2['phone'];

$output =  "<b style='color:#be160d'>Product Name</b>: $product<hr>"; 
$output .=  "<b style='color:#be160d'>Description</b>: $description<hr>"; 
$output .=  "<b style='color:#be160d'>Logistic Details</b>: $logistic<hr>"; 
$output .=  "<b style='color:#be160d'>Sender Phone</b>: $phone<hr>"; 

echo $output;

}
?>

                            

                            <p style="color: #7cda0a">Fill the informations below to create a bar code</b></p>

                      <?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>       
                            
                            
                            <div class="spacing-6 ttm-bgcolor-grey mt-0 mb-0">
                                

        <form class="ed_teacher_form" action="#" method="post" role="form">
            
                         
                
               <div class="form-group">              
                <input  type="hidden" name="text" id="text" readonyy=""   class="form-control form-control-lg" placeholder="Enter student Registration Number">
                </div>

               </form>


            <div>
               <video id="preview" width="100%"></video>
             </div>

             


                        <script type="text/javascript">
                            let scanner = new Instascan.Scanner({video:document.getElementById('preview')});

                            Instascan.Camera.getCameras().then(function(cameras){

                                if(cameras.length > 0){

                                            scanner.start(cameras[0]);
                                }else{

                                    alert('No cameras found');
                                }

                            }).catch(function(e){
                                console.error(e);
                            });

                            scanner.addListener('scan', function(c){

                                    document.getElementById('text').value=c;
                                    document.forms[0].submit();
                            });


                        </script>
                




                            </div>
                        </div>




                       




                    </div><!-- row end -->
                </div>
            </section>
            <!-- contactbox-section end -->
           

        </div><!--site-main end-->


      
       

       
  
  
<?php  include ('./inc/footer.inc.php'); ?>


<script src="js2/adapter.min.js"></script>
<script src="js2/instascan.min.js"></script>
<script src="js2/vue.min.js"></script>