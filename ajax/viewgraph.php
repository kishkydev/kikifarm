<?php session_start();
include ('./../inc/connect.inc.php');
?>

<script src="js/main.js"></script>

<?php

// if(isset($_POST['product_id'])){
         $product_id = $_POST['product_id']; 


//for pagination of the  list on the homepage
$getproduct = mysqli_query($con,"SELECT * FROM products WHERE type='1' AND product_id='$product_id'  ") or die (mysqli_error());


$runrows = mysqli_fetch_assoc($getproduct);
  $expected_date = $runrows['date_available'];
  $uploaded_date = strtotime($runrows['time_upload']);





$present_date = strtotime(date('y-m-d'));  



$expected_date = strtotime($expected_date);

$span_total = $expected_date - $uploaded_date;
$span_current = $present_date - $uploaded_date;


 $result_graph = ($span_current/$span_total)*100;

$result_graph = round($result_graph);


 $uploaded_date2 = date("jS F, Y", $uploaded_date);
 $present_date2 = date("jS F, Y", $present_date);
 $expected_date2 = date("jS F, Y", $expected_date);


  // }
?>


                                            <div class="mt-30">
                                                <!-- progress-bar -->
                                                <div class="ttm-progress-bar" data-percent="99%">
                                                    <div class="progress-bar-title ttm-textcolor-skincolor">Available Time (<b style="color: white"><?php echo $expected_date2; ?></b>)</div><!-- progress-bar-title -->
                                                    <div class="progress-bar-inner">
                                                        <div class="progress-bar progress-bar-color-bar_skincolor"></div>
                                                    </div>
                                                    <div class="progress-bar-percent" data-percent="99" style="color: white">99%</div><!-- progress-bar-percent -->
                                                </div>
                                                <!-- progress-bar END -->
                                                <!-- progress-bar -->
                                                <div class="ttm-progress-bar ttm-textcolor-skincolor" data-percent="<?php echo $result_graph; ?>%">
                                                    <div class="progress-bar-title">Progress Time Today(<b style="color: white"><?php echo $present_date2; ?></b>) </div><!-- progress-bar-TITLE -->
                                                    <div class="progress-bar-inner">
                                                        <div class="progress-bar progress-bar-color-bar_skincolor"></div>
                                                    </div>
                                                    <div class="progress-bar-percent" data-percent="<?php echo $result_graph; ?>" style="color: white"><?php echo $result_graph; ?>%</div><!-- progress-bar-PERCENT -->
                                                </div>
                                                <!-- progress-bar END -->
                                                <!-- progress-bar -->
                                                <div class="ttm-progress-bar ttm-textcolor-skincolor" data-percent="1%">
                                                    <div class="progress-bar-title">Start Time (<b style="color: white"><?php echo $uploaded_date2; ?></b>)</div><!-- progress-bar-TITLE -->
                                                    <div class="progress-bar-inner">
                                                        <div class="progress-bar progress-bar-color-bar_skincolor"></div>
                                                    </div>
                                                    <div class="progress-bar-percent" data-percent="1" style="color: white">1%</div><!-- progress-bar-PERCENT -->
                                                </div>
                                                <!-- progress-bar END -->
                                            </div>
                                           
                                           
                                           