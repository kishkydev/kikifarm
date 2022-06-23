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

  $pin = pin_generator();
 $u = substr(strtolower($username),0,3);
 $basket_code = $u.$pin;   

 if(isset($_POST['action'])){
         $action = $_POST['action'];  
       $added_by = $_POST['added_by'];   
       $product_id = $_POST['product_id']; 
  //      $query2 = mysqli_query($con,"SELECT * FROM users WHERE username='$being_follow' ");
  // $row = mysqli_fetch_assoc($query2);
  //  $being_follow_id = $row["user_id"];
         
        
          if($action == 'addbasket'){

                    mysqli_query($con,"INSERT INTO basket VALUES('', '$basket_code', '$added_by', '$product_id', 'no') ");
            }

         else if($action == 'delbasket'){
                 mysqli_query($con,"DELETE FROM basket WHERE added_by='$added_by' AND product_id='$product_id' ");
            }    




    }
?>
           