<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); 


$user_idP = urldecode($_GET['id']);

//to check for validity of the user.....................
if($user_idP != $user_id){
  header("Location: index.php");
}
//.......................................................


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
                                    <h2 class="title">Two (2) types of upload you can do on kikiFarm</h2>
                                </div>
                                <div class="heading-seperator">
                                    <span></span>
                                </div>
                            </div><!-- section title end -->




                                <div class="accordion grey-background res-991-mt-30">
                                <!-- toggle -->
                                <div class="toggle">
                                    <div class="toggle-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b>(Type 1)</b> Upload products for tracker. Click to learn more.</a>
                                    </div>
                                    <div class="toggle-content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="mb-0">Here, a farmer can upload just planted crops or young livestocks and post the time frame it may likely grow enough for sale or available in the farment. Products uploaded can easily be monitored and tracked by consumers and agents and target their demand towards that period. The products can also be kept in consumer's tracklist. Start Upload <br>

                                       <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-right ttm-btn-bgcolor-darkgrey" href="upload-products2?type=1&id=<?php echo urlencode($user_idP) ?>" title="">Upload For Tracker <i class="ti ti-angle-double-right"></i></a>              

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- toggle end -->
                                <!-- toggle -->
                                <div class="toggle">
                                    <div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" class="active"><b>(Type 2)</b> Upload products for general farmers' market. Click to learn more.</a></div>
                                    <div class="toggle-content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="mb-0">Here, a farmer uploads already available farm items, which automatically on the general market page for customers and agents to place order or buy.Start Upload <br>

                                                    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-icon-btn-right ttm-btn-bgcolor-darkgrey" href="upload-products2?type=2&id=<?php echo urlencode($user_idP) ?>" title="">Upload For Market <i class="ti ti-angle-double-right"></i></a>  

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- toggle end -->
                </div>













                            

                            
                           
                        </div>
                    </div><!-- row end -->
                </div>
            </section>
            <!-- contactbox-section end -->
           

        </div><!--site-main end-->


      
       

       
  
  
<?php  include ('./inc/footer.inc.php'); ?>