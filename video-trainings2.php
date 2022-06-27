<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); ?>




<?php 



$lang = $_GET['lang'];

if($lang == 'en'){
$language = 'Engish';
}elseif($lang == 'yo'){
$language = 'Yoruba';
}elseif($lang == 'ig'){
$language = 'Igbo';
}elseif($lang == 'ha'){
$language = 'Hausa';
}

//for pagination of the  list on the homepage
$getBlog = mysqli_query($con,"SELECT id FROM video WHERE language='$lang' ") or die (mysqli_error());

$total = mysqli_num_rows($getBlog);

$limit =(isset($_GET['limit'])) ? (int)$_GET['limit'] : 8;
$page =(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
(int)$link = 2;
$row_start = (($page - 1) * $limit);
(int)$limit = 10;
//$page = 1;

$last = ceil($total / $limit);

$start = (($page - $link) > 0) ? $page - $link : 1;
$end = (($page + $link) < $last) ? $page + $link : $last;       
        
$get_Blog = mysqli_query($con,"SELECT * FROM video WHERE language='$lang'
 ORDER BY id DESC LIMIT $row_start, $limit") or die (mysqli_error()); 


    
?>

 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title"><?php echo $language; ?> Video Trainings</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor"><?php echo $language; ?> Farmers </span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->



 <!-- process-section end -->
            <section class="ttm-row process-section clearfix" >
                <!-- <div class="container"> -->
                <div class="" style="padding:10px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section title -->
                            <div class="section-title text-center clearfix">
                                <div class="title-header">
                                    <h5>Agrictural Video Trainings</h5>
                                    <h2 class="title">Learn in <?php echo $language; ?></h2>
                                </div>
                                <div class="heading-seperator">
                                    <span></span>
                                </div>
                            </div><!-- section title end -->
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                             


  <?php while($row=mysqli_fetch_array($get_Blog)) : ?>
                <?php   
                $id = $row['id'];
                $title = $row['title'];
                $link = $row['link'];
                ?>           
             
                     

                    <div class="col-lg-6 thumbnail text-center">
                                           
                    <div class="video-container thumbnail">
                      <iframe src="<?php echo $link; ?>">           </iframe>
                    </div>  
                     <p class="" style="font-size: 20px; font-family: tahoma; color: #050a3d"><?php echo $title; ?></p>  


<a href="#" class="blink_voice ttm-btn ttm-btn-size-lg ttm-icon-btn-left ttm-btn-bgcolor-darkgrey ttm-textcolor-white" style="color: white;"><i class="fa fa-whatsapp"></i> Share</a> 

<a href="#" class="ttm-btn ttm-btn-size-lg ttm-btn-shape-square ttm-icon-btn-left ttm-btn-bgcolor-skincolor" style="color: white;"><i class="fa fa-eye"></i> View Large Screen</a>

                      <hr>
                            
                           
                    </div>
<?php endwhile; ?>







                          
                       
                    </div><!-- row end -->




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
                  <a class="previous page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $page-1; ?>&lang=<?php echo $lang; ?>"><i class="ti ti-arrow-left"></i></a>
                <?php endif; ?> 

                 <?php if($start > 1): ?>
                    <a class="page-numbers" href="?limit=<?php echo $limit; ?>&page=1&lang=<?php echo $lang; ?>">1</a>
                    <span>...</span>
                    <?php endif; ?>


                <?php for($y = $start; $y <= $end; $y++) : ?>
                    <?php if($page == $y) : ?>
                      <span><a class="current page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $y; ?>&lang=<?php echo $lang; ?>"><?php echo $y; ?></a></span>
                       <?php else : ?>
                        <a class="page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $y; ?>&lang=<?php echo $lang; ?>"><?php echo $y; ?></a>
                    <?php endif; ?> 
                    <?php endfor; ?>


                <?php if($end < $last): ?>
                    <span>...</span>
                    <a class="page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $last; ?>&lang=<?php echo $lang; ?>"><?php echo $last; ?></a>
                    <?php endif; ?>

                <?php if($page == $last): ?> 
                      <a href="#" class="next page-numbers"><i class="ti ti-arrow-right"></i></a>
                      <?php else : ?>
                      <a class="next page-numbers" href="?limit=<?php echo $limit; ?>&page=<?php echo $page+1; ?>&lang=<?php echo $lang; ?>"><i class="ti ti-arrow-right"></i></a>
                      <?php endif; ?>



            
             

                                </div>






                            </div>
                        </div>




                </div>
            </section>
            <!-- process-section end -->

<?php  include ('./inc/footer.inc.php'); ?>