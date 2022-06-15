<?php session_start();
include ('./../inc/connect.inc.php');
?>
<?php
$username = ''; 
	$user_id = '';

if(!isset($_SESSION["user"]) && isset($_COOKIE['user_log_in'])){
  //this is for normal user
  $_SESSION["user"] = $_COOKIE['user_log_in'];
  $username = $_SESSION["user"];
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"]; 
    }
else{
  //this is for normal user
  $username = @$_SESSION["user"]; 
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"];
  }

$time=time();

function pin_generator(){
        global $con;
        $generated_pin = rand(1000000,9999999);
        if($generated_pin == 0){
            pin_generator();
        }
        else{
            return $generated_pin;
        } 
        
    }

  $request_code = pin_generator();
 // $u = substr(strtolower($username),0,3);
 // $basket_code = $u.$pin;


 if(isset($_POST['request_phone'])){
         $request_product = $_POST['request_product'];  
       $request_date = $_POST['request_date'];   
       $request_name = $_POST['request_name']; 
       $request_phone = $_POST['request_phone'];   
       echo $request_state = $_POST['request_state']; 
  //      $query2 = mysqli_query($con,"SELECT * FROM users WHERE username='$being_follow' ");
  // $row = mysqli_fetch_assoc($query2);
  //  $being_follow_id = $row["user_id"];
         
        
          

 mysqli_query($con,"INSERT INTO make_request(request_code, request_product, request_date, request_name, request_phone, request_state) VALUES('$request_code', '$request_product', '$request_date', '$request_name', '$request_phone', '$request_state') ");
           
 $success = 'Your request has been sent. Farmers nearby will contact you soon';


    }
?>
           
<?php if (isset($errorfill)) : ?>
 <div class="error1"><?php echo $errorfill; ?></div>
 <?php endif; ?>
 <?php if (isset($success)) : ?>
    <div class="success1"><?php echo $success; ?></div> 
 <?php endif; ?>
