<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php');

if(isset($username)){

}else{
  header("Location: index.php");
}

$type = (int)$_GET['type'];
$message_id = (int)$_GET['id'];



 $query2 = mysqli_query($con, "SELECT * FROM message WHERE  message_id = '$message_id' ");
  $row2 = mysqli_fetch_assoc($query2);
                $message_idI = $row2['message_id'];
                $subjectI = $row2['subject'];
               $messageI = $row2['message'];
                $materialI = $row2['material'];
                $material_extI = $row2['material_ext'];
               $from_idI = $row2['from_id'];
                $to_idI = $row2['to_id'];
                $date_timeI = $row2['date_time'];
                $statusI = $row2['status'];
              
                   $user_id;

                $date_timeI =  date('M j, h:i A', $date_timeI);


                if($statusI == 'no'){
                    $readI = 'New';
                }



    $query44= mysqli_query($con,"SELECT * FROM users WHERE user_id = '$from_idI' ");
    $row44 = mysqli_fetch_assoc($query44);

     $from_pix = $row44['pix']; 
      

     

 $sname = $row44['sname']; 
  $oname = $row44['oname']; 
  $from_nameI_username = $row44['username'];

  $from_nameI =   $sname.' '.$oname;


     if($from_pix ==''){
    $from_pix = "images/avatar.png";
    }
    else{
    $from_pix = "uploads/thumbs/$from_pix";
      }


      //to update.................................
      mysqli_query($con, "UPDATE message SET status='yes' WHERE  message_id = '$message_id' ");


      //to delete...........................

      if(isset($_POST['delete'])){
        mysqli_query($con, "DELETE FROM message WHERE  message_id = '$message_id' ");

        header("Location: message");
      }

 ?>




 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title"><span class="fa fa-envelope-o"></span> Read Message</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index.html"><i class="ti ti-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor"><?php echo ucfirst($username);  ?></span>
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
                	<div class="col-lg-1 content-area">
                	</div>
                    <div class="col-lg-10 content-area">



<div class="ttm-single-product-details product">
 <div class="ttm-tabs tabs-for-single-products" data-effect="fadeIn">
                                <ul class="tabs clearfix">
                                	
                                    <li class="tab active"><a href="#"><i class="fa fa-eye"></i> Read Message</a></li>
                                	
                                    <li class="tab"><a href="#"><i class="fa fa-inbox"></i> Inbox (<?php echo $count_msg; ?>)</a></a></li>
                                     <li class="tab"><a href="#"><i class="fa fa-envelope"></i> Sent Message</a></li>
                                </ul>
                                <div class="content-tab ttm-bgcolor-white">


                                	
                                    <!-- content-inner -->
                                    <div class="content-inner active">

                             <h6 style="color:#7cda0a">MESSAGE <?php if($type==1){echo 'FROM:';}else{echo 'TO:';} ?> <b style="color:#173e43"><?php echo ucfirst($from_nameI_username); ?> (<?php echo ucwords($from_nameI); ?>)</b>

                             </h6>




                                    	 				<?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>


                                        <h2 style="color:#7cda0a">READ MESSAGE</h2>

                       <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="" enctype="multipart/form-data">
                        
    


<div class="table table-responsive">
<table class="table-condensed">  
            <tr>
                <td>
                  <img src="<?php echo  $from_pix; ?>" height="50" width="50" class="rounded-circle img-thumbnail">
              </td>
               
                <td> 
                    
              <a class="ttm-btn ttm-btn-size-xs ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-darkgrey" href="message?message=<?php echo $from_idI; ?>&rep=<?php echo $subjectI; ?>"><i class="fa fa-mail-reply"></i> Reply</a>   
                </td>
                
                <td>
                    <button class="ttm-btn ttm-btn-size-xs ttm-btn-shape-round ttm-icon-btn-right ttm-btn-bgcolor-skincolor" type="submit" name="delete" ><i class="fa fa-trash-o"></i> Delete</button>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                 <p style="color: #173e43" ><b><?php if($from_idI == $user_id){ echo 'ME: ';} ?></b><?php echo  $messageI; ?></p>
                          <?php if($materialI != '') : ?>
                             <p><a href="uploads_mat/<?php echo $materialI; ?>" class="button ttm-icon-btn-left ttm-btn-size-sm ttm-btn ttm-btn-bgcolor-darkgrey" download>1 Attachment <i class="fa fa-download"></i></a></p>
                           <?php endif; ?>
                            
                         

                </td>
            </tr>
        </table>
</div>
                   
                 
                          <!-- to show previous messages-->
                  <script type="text/javascript">

                   $(document).on('click', '#warn', function() {
                                $("#warning").slideDown("slow");
                                 document.getElementById('warning').style.display="block";
                                  document.getElementById('warn').style.display="none";
                       });
                  $(document).on('click', '#warned', function() {
                                    $("#warning").slideUp("slow");
                                 document.getElementById('warning').style.display="none";
                                 document.getElementById('warn').style.display="block";
                       });

                      </script>
                     <a href="javascript:;" id="warn" style="margin-top: 10px; color:#890912" ><ins><b>CHECK PREVIOUS</b></ins> <span class="fa fa-sort-desc" style="font-size:30px;"></span></a>
                      <div id="warning" style="display: none;">


<?php
$queryp= mysqli_query($con,"SELECT * FROM message WHERE (to_id='$user_id' AND from_id = '$from_idI') OR (to_id='$from_idI' AND from_id = '$user_id')  ORDER BY date_time DESC LIMIT 1,20");
?>


 <?php $i=1;  while($rowp = mysqli_fetch_assoc($queryp)) : ?>
            <?php

                $subjectp= $rowp['subject'];
               $messagep = $rowp['message'];
                $materialp = $rowp['material'];
                $material_extp = $rowp['material_ext'];
              $from_idp = $rowp['from_id'];
                $to_idp = $rowp['to_id'];
                $date_timep = $rowp['date_time'];
               
                


                $date_timep =  date('M j, h:i A', $date_timep);


            ?>
                        
                        <p><b style="color:#173e43"><?php if($from_idp == $user_id){ echo 'ME: ';} ?></b> <?php echo  $messagep; ?></p><hr>  
                  <?php $i++;  endwhile; ?>





                     <a href="javascript:;" id="warned" style="margin-bottom: 20px; color:#890912"><ins><b>CLOSE PREVIOUS</b></ins> <span class="fa fa-sort-asc" style="font-size:30px;"></span></a>
                      </div>

                       <!-- to show previous messages end  -->

            
                      




                   


                        
                       </form>    
                                    </div><!-- content-inner end-->

                          
                                    <!-- content-inner -->
                                    <div class="content-inner">
                                        <h2 style="color:#7cda0a">INBOX</h2>
                                        <!-- <table class="shop_attributes">
                                            <tbody><tr><th>color</th><td><p>Blue</p></td></tr></tbody>
                                        </table> -->

         <script type="text/javascript">
                        $(document).ready(function() {
        load_data();
        function load_data(page){

         
          
               $.ajax({
              url:"ajax/page1",
              method:"POST",
              data:{page:page},
              success:function(data){
                 //the return value from json is giving to the below id(s)
                  $('#pagination_data').html(data);
                }
            });

             }
          $(document).on('click', '.pagination_link', function(){
              var page = $(this).attr("id");
              load_data(page);
          });

        });
       



//........................
    //to plus the pag
      $(document).ready(function() {
       
        function load_data_plus(plus){

          
          
               $.ajax({
              url:"ajax/page1",
              method:"POST",
              data:{plus:plus},
              success:function(data){
                 //the return value from json is giving to the below id(s)
                  $('#pagination_data').html(data);
                }
            });

             }
          $(document).on('click', '.pagination_plus', function(){
              var plus = $(this).attr("id");
              load_data_plus(plus);
          });

        });


//........................
    //to minus the page
      $(document).ready(function() {
       
        function load_data_minus(minus){
           
               $.ajax({
              url:"ajax/page1",
              method:"POST",
              data:{minus:minus},
              success:function(data){
                 //the return value from json is giving to the below id(s)
                  $('#pagination_data').html(data);
                }
            });

             }
          $(document).on('click', '.pagination_minus', function(){
              var minus = $(this).attr("id");
              load_data_minus(minus);
          });

        });

                      </script>



                                      
                
                          <div id="pagination_data" ></div>
                         




                                    </div><!-- content-inner end-->

                                    <!-- content-inner -->
                                    <div class="content-inner">
                                        	<h2 style="color:#7cda0a">SENT MESSAGES</h2>


 <script type="text/javascript">
                        $(document).ready(function() {
        load_data2();
        function load_data2(page){
            
           
               $.ajax({
              url:"ajax/page2",
              method:"POST",
              data:{page:page},
              success:function(data){
                 //the return value from json is giving to the below id(s)
                  $('#pagination_data2').html(data);
                }
            });

             }
          $(document).on('click', '.pagination_link2', function(){
              var page = $(this).attr("id");
              load_data2(page);
          });

        });
       



//........................
    //to plus the pag
      $(document).ready(function() {
       
        function load_data_plus2(plus){
            
        
               $.ajax({
              url:"ajax/page2",
              method:"POST",
              data:{plus:plus},
              success:function(data){
                 //the return value from json is giving to the below id(s)
                  $('#pagination_data2').html(data);
                }
            });

             }
          $(document).on('click', '.pagination_plus2', function(){
              var plus = $(this).attr("id");
              load_data_plus2(plus);
          });

        });


//........................
    //to minus the page
      $(document).ready(function() {
       
        function load_data_minus2(minus){


          
               $.ajax({
              url:"ajax/page2",
              method:"POST",
              data:{minus:minus},
              success:function(data){
                 //the return value from json is giving to the below id(s)
                  $('#pagination_data2').html(data);
                }
            });

             }
          $(document).on('click', '.pagination_minus2', function(){
              var minus = $(this).attr("id");
              load_data_minus2(minus);
          });

        });

                      </script>

                            <div id="pagination_data2" ></div>


                                    </div><!-- content-inner end-->
                                    
                                </div>
                            </div>
</div>








                    </div>

                </div>

            </div>

        </div>
    </div>






<?php  include ('./inc/footer.inc.php'); ?>