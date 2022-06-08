<?php session_start();
include ('./../inc/connect.inc.php');
?>
<?php
$username = ''; 
  $user_id = '';

if(isset($_SESSION["user"])){
  //this is for normal user
  $username = $_SESSION["user"];
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $user_id = $rows["user_id"]; 
    }
else if(isset($_COOKIE['user_log_in'])) {
  //this is for normal user
  $username =  $_COOKIE['user_log_in']; 
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $user_id = $rows["user_id"];
  }


  $time = time();
?>

<?php

$shop_name = mysqli_real_escape_string($con,htmlentities(trim($_POST['shop_name'])));
$sname= mysqli_real_escape_string($con,htmlentities(trim($_POST['sname'])));
$oname= mysqli_real_escape_string($con,htmlentities(trim($_POST['oname'])));
$phone= mysqli_real_escape_string($con,htmlentities(trim($_POST['phone'])));
$email = mysqli_real_escape_string($con,htmlentities(trim($_POST['email'])));
$address = mysqli_real_escape_string($con,htmlentities(trim($_POST['address'])));
 $city = mysqli_real_escape_string($con,htmlentities(trim($_POST['city'])));
$description = mysqli_real_escape_string($con,htmlentities(trim($_POST['description'])));


$tag_line = mysqli_real_escape_string($con,htmlentities(trim($_POST['tag_line'])));
$website = mysqli_real_escape_string($con,htmlentities(trim($_POST['website'])));

$query1 = mysqli_query($con,"SELECT * FROM users WHERE user_id='$user_id' ");
$result = mysqli_fetch_array($query1)
 $main_state = $result["state_name"];


if(empty($_POST['join_state'])){
       $join_state = ''; 


 mysqli_query($con, "UPDATE users SET shop_name='$shop_name', sname='$sname', oname='$oname', phone='$phone', email='$email', address='$address', city='$city', description='$description', tag_line='$tag_line', website='$website' WHERE user_id='$user_id'; ") or die(mysqli_error());

        }else{
$join_state = implode(", ", $_POST['join_state']);
$join_state = $join_state.', '.$main_state;

 mysqli_query($con, "UPDATE users SET shop_name='$shop_name', sname='$sname', oname='$oname', phone='$phone', email='$email', address='$address', city='$city', description='$description', tag_line='$tag_line', website='$website', join_state='$join_state' WHERE user_id='$user_id'; ") or die(mysqli_error());


    }



   



  $success = 'Successfully updated';

        

?>

 <?php if (isset($success)) : ?>
  <div class="success1"><?php echo $success; ?></div> 
 <?php endif; ?>
