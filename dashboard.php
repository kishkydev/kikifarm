 <?php
$page_title = 'Shop';
?>

 <?php  include ('./inc/header.inc.php');

if(!isset($userP)){
  header("Location: login");
}

if(!isset($_SESSION["user"]) || !isset($_COOKIE['user_log_in'])){
 $username = '';
}

  ?>


       
<?php

//to update profile 
//get this to insert as value inside the input form
    $query_profile = mysqli_query($con,"SELECT * FROM users WHERE username='$userP' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 

 $user_idPP = $result["user_id"];
$sname = $result['sname']; 
$oname = $result['oname']; 

$phone = $result['phone'];
 $reg_id = $result["reg_id"];
    $shop_name = $result["shop_name"]; 

 $description = $result["description"];

 $user_type = $result["user_type"];


 $city = $result['city'];
$state_name = $result['state_name'];
$lg_name = $result['lg_name'];
 $tag_line = $result["tag_line"];
 $website = $result["website"]; 

 $video_link = $result["video_link"];
  $email = $result["email"]; 
 $input_tags = $result["input_tags"];

 $tags_explode = explode(",",$input_tags);

    $tags_count = count($tags_explode);


  if($pixd==''){
    $profilepixd = "images/avatar.png";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }
  
  

  //.... get review number
      $queryR = mysqli_query($con,"SELECT * FROM review WHERE user_id='$user_idPP' ");
    $countReview = mysqli_num_rows($queryR); 
//...............................................



// to update followproduct notifcation starts...............
if(isset($username) && $user_id != $user_idPP){


$queryProd = mysqli_query($con,"SELECT * FROM products WHERE user_id= '$user_idPP'  "); 

 while($rowProd = mysqli_fetch_array($queryProd)) {
 
       $product_id = $rowProd['product_id'];
        //...................
    $product_follow = mysqli_query($con,"SELECT product_id FROM follow WHERE following_id = '$user_id' AND being_followed_id='$user_idPP' ");
    $prod_row = mysqli_fetch_array($product_follow);
     $product_row_list = $prod_row['product_id'];
    $product_row_list_explode = explode(",", $product_row_list);

    //print_r($product_row_list_explode);

        if(in_array($product_id, $product_row_list_explode)){
        //echo 'failed';
    }else{
        if($product_row_list == ''){
        mysqli_query($con,"UPDATE follow SET product_id=CONCAT(product_id,'$product_id') 
        WHERE following_id='$user_id' AND being_followed_id='$user_idPP' ");
            }else{
          mysqli_query($con,"UPDATE follow SET product_id=CONCAT(product_id,',$product_id') 
        WHERE following_id='$user_id' AND being_followed_id='$user_idPP' ");      
            }
        // echo 'success';
    }  

    }//hile ends here.........

}


//..............ends here......................




?>
   
<script>
//.......................................
//this is for the show little image of the image post to be posted work

$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 9000000)
  {
   alert("Image File Size must not exceed 9MB");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"ajax/uploadpix",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#OpenImgUpload').html("<img src='img/loaderIcon.gif' />");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data); 
     $('#OpenImgUpload').html("");
     }
   });
  }
 });
 
 
 $(document).on('click', '#remove_button', function(){  
           if(confirm("Are you sure you want to remove this image?"))  
           {  
                var path = $('#remove_button').data("path");  
                $.ajax({  
                     url:"ajax/deleteblog_path",  
                     type:"POST",  
                     data:{path:path},  
                     success:function(data){  
                          if(data != '')  
                          {  
                               $('#uploaded_image').html('');  
                          }  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
 
 
});

</script>

 <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box text-left">
                            <div class="page-title-heading">
                                <h1 class="title"><?php echo $shop_name; ?></h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index"><i class="ti ti-user"></i>&nbsp;&nbsp;<b><?php echo strtoupper($user_type); ?></b></a>
                                </span>
                                <span class="ttm-bread-sep ttm-textcolor-white">&nbsp;   →  &nbsp;</span>
                                <span class="ttm-textcolor-skincolor"><?php echo $userP; ?></span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->


        <!--site-main start-->
        <div class="site-main ttm-bgcolor-white">
            <!-- sidebar -->
            <div class="sidebar ttm-sidebar  clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row" style="margin-top:20px">





<?php if($user_type == 'farmer') : ?>

 <?php include ('dashboard-farmer.php');  ?>

<?php elseif($user_type == 'consumer') : ?>

 <?php include ('dashboard-consumer.php');  ?>

<?php elseif($user_type == 'logistic') : ?>
    
<?php include ('dashboard-logistic.php');  ?>

<?php endif; ?>


                        
                        




                    </div><!-- row end -->
                </div>
            </div>
            <!-- sidebar end -->
        </div><!--site-main end-->

 <?php  include ('./inc/footer.inc.php'); ?>