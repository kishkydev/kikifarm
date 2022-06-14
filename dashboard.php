 <?php
$page_title = 'Shop';
?>

 <?php  include ('./inc/header.inc.php');

if(!isset($userP)){
  header("Location: login");
}

if(!isset($_SESSION["user"])){
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
if(isset($username) && $user_idShop != $user_idPP){


$queryProd = mysqli_query($con,"SELECT * FROM products WHERE user_id = '$user_idPP'  "); 

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


 <!-- modal windows for sending SMS........................-->
      
        <div id="modalsendsms" class="modal fade" tabindex="-1" style="margin-top:200px;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content"  style="">
                    
                    
                        <div class="modal-body">

                       
                        <form id="form_wallsms" role="form">
                                <h4 class="" style="">Send SMS. Put your phone number and message</h4>
<div class="col-sm-12 col-md-12">
    <div class="form-group">
        <textarea id="my_text" rows="4" placeholder="Write A Massage..."  class="form-control with-border bg-white"></textarea>
    </div>
    <div class="form-group">
        <input id="my_phone" placeholder="Your Phone Number"  class="form-control with-border bg-white">
    </div>
    <p id="countresult"></p>

    <p id="display-sms" style="text-align:center"></p>



                                        <div class="text-left">
                                            <button type="button" id="sendSms" name="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey w-100">
                                                Send SMS <span id="loadingSms"></span>
                                            </button>
                                        </div>



</div>



                                <!--  <button class="btn btn-danger" id="forget-pass" type="button"> Request Password</button>
                                 <p style="color: white"><span id="display-pass"></span> -->
                            
                        </form>
                         


<script type="text/javascript">
    $(document).ready(function(){
    var myText = document.getElementById("my_text");
    var result = document.getElementById("countresult");
    var limit = 160;
    result.textContent = 0 + "/" + limit;

    myText.addEventListener("input", function(){
        var textLenght = myText.value.length;
        result.textContent = textLenght + "/" + limit;

        if(textLenght > limit){
            myText.style.borderColor = "#ff2851";
            result.style.color = "#ff2851";
        }else{
            myText.style.borderColor = "#b2b2b2";
            result.style.color = "#737373";
        }
    });

});
//............................................

 $(document).on('click', '#sendSms', function() {

       // alert('wwwwww');
             $('#loadingSms').html("<img src='img/loaderIcon.gif' />");

           var my_text = document.getElementById('my_text').value;
           var my_phone = document.getElementById('my_phone').value;
           var user_idP = '<?php echo $user_idPP; ?>';
           var limit2 = 160;
           var textLenght2 = my_text.length;


           //alert(limit2);
            if(textLenght2 > limit2){
                                   
                                    $("#display-sms").html("<p style='color:red'>Please not more than 255 characters</p>");
                                    $('#loadingSms').html("");
                                }
             else if(my_text.length == 0){
                                   
                                    $("#display-sms").html("<p style='color:red'>Please input the message content</p>");
                                    $('#loadingSms').html("");
                                }
            else if(my_phone.length == 0){
                                   
                                    $("#display-sms").html("<p style='color:red'>Please input your phone number</p>");
                                    $('#loadingSms').html("");
                                }

                              else{
        

               $.ajax({
                            url:"ajax/send-sms",
                            method:"POST",
                            data:{my_text:my_text, my_phone:my_phone, user_idP:user_idP},
                            
                            success:function(data){
                               //the return value from json is giving to the below id(s)

                               $('#display-sms').html(data);
                               $('#loadingSms').html("");
                                                      
                      
                             $('#form_wallsms')[0].reset();
                               
                              }
                          });

                }//validate..........

              });




</script>


                        

                         
                         
                       </div>

                    <div class="modal-footer">
                         <button class="btn btn-default closer3" data-dismiss="modal"><b class="fa fa-close"></b></button>
                    </div>

                   
                </div>
            </div>
        </div>  