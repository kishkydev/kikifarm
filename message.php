<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php');

if(isset($username)){

}else{
  header("Location: index.php");
}





if(isset($_GET['message'])){
$receipient_id =(int)$_GET['message']; 

 

 $query = mysqli_query($con, "SELECT * FROM users WHERE user_id = '$receipient_id' ");
  $result = mysqli_fetch_assoc($query);
   $pixd = $result['pix']; 
 
  $sname = $result['sname']; 
  $oname = $result['oname']; 
  $receiver_username = $result['username'];

  $receiver =   $sname.' '.$oname;
     if($pixd==''){
    $receiverpix = "images/avatar.png";
    }
    else{
    $receiverpix = "uploads/thumbs/$pixd";
      }


}

 ?>


<?php
  
//$time = time();
//date_default_timezone_set('Africa/Lagos');
date_default_timezone_set('UTC');  
 $current_time = time();
 
  if(isset($_POST['submit'])){
   $subject = mysqli_real_escape_string($con,htmlentities(trim($_POST['subject'])));
  $message = mysqli_real_escape_string($con,htmlentities(trim($_POST['message'])));

  

  if($subject && $message){
  

 
//...........................................................
if($_FILES['file']['size']){

  $image_size = $_FILES['file']['size'];
 $material = $_FILES['file']['name'];


  $targetfolder = "uploads_mat/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
$material = $_FILES['file']['name'];
 $ok=1;

 
  $file_ext = @strtolower(end(explode('.', $material))); //strtolower becasue file ext names can be capitalized

$file_type=$_FILES['file']['type'];

if ($file_type=="application/pdf" 
  || $file_type=="application/msword" 
  || $file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" 
  || $file_type=="application/vnd.openxmlformats-officedocument.presentationml.presentation"
  || $file_type == "image/gif"
  || $file_type == "image/jpeg"
  || $file_type == "image/jpg"
  | $file_type == "image/png"

) {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {




 mysqli_query($con, "INSERT INTO message(subject, message, material, material_ext, from_id, to_id, date_time) VALUES('$subject', '$message', '$material',  '$file_ext', '$user_id', '$receipient_id', '$current_time') ") or die(mysqli_error());
 $successmsg = 'Messsage Successfuly Sent';



 }

 else {

 $errormsg = "Problem uploading file";

 }

}

else {

 $errormsg = "You may only upload PDFs/Docx/PPT/Image<br>";

}

}else{
  // $errormsg = '<p style="color:white;">Plz upload a file</p>'; 

   mysqli_query($con, "INSERT INTO message(subject, message, from_id, to_id, date_time) VALUES('$subject', '$message', '$user_id', '$receipient_id', '$current_time') ") or die(mysqli_error());
 $successmsg = 'Messsage Successfuly Sent';

}

//.................................
    



    
      }

  else{
  $errormsg = 'Please all the fields are required'; 
    }


  
  }

?>
     


 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title"><span class="fa fa-envelope-o"></span> Messages Box</h1>
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
                                	 <?php if(isset($_GET['message'])) : ?>
                                    <li class="tab active"><a href="#"><i class="fa fa-edit"></i> Compose Message</a></li>
                                	<?php endif; ?>
                                    <li class="tab"><a href="#"><i class="fa fa-inbox"></i> Inbox (<?php echo $count_msg; ?>)</a></a></li>
                                     <li class="tab"><a href="#"><i class="fa fa-envelope"></i> Sent Message</a></li>
                                </ul>
                                <div class="content-tab ttm-bgcolor-white">


                                	<?php if(isset($_GET['message'])) : ?>
                                    <!-- content-inner -->
                                    <div class="content-inner active">

                                    	 				<?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>


                                        <h2 style="color:#7cda0a">COMPOSE MESSAGE</h2>

                       <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="" enctype="multipart/form-data">
                        
                            <p><img src="<?php echo  $receiverpix; ?>" height="50" width="50" class="rounded-circle img-thumbnail"> <span class="color-orange">Send message to</span> <b style="color:#173e43"><?php echo ucfirst($receiver_username); ?> (<?php echo ucwords($receiver); ?>)</b></p>
                          

                         	 <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input name="subject" placeholder="Subject: " <?php if(isset($_GET['rep'])){ echo 'value="Re: '.$_GET['rep'].'"';} ?>  type="text" class="form-control with-border bg-white"  >
                                        </div>
                                 </div> 



                                   <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message Body" class="form-control with-border bg-white"></textarea>
                                        </div>
                                    </div>



                          <div class="col-sm-12 col-md-12">
                          <div class="form-group">
                                <label>
                                    <span style="color:#7cda0a">PDF / PPT / Docx / Image (Optional)</span>
                                     <div class="form-group">
                                    <input name="file" type="file">
                                  </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                          <div class="form-group">
                              <button type="submit" class="button ttm-btn-size-lg ttm-btn ttm-btn-bgcolor-darkgrey" name="submit"><span class="fa fa-send"></span> Send</button>
                          </div>
                        </div>
                       </form>    
                                    </div><!-- content-inner end-->

                            <?php endif; ?>

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