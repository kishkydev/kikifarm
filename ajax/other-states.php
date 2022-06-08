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



if(isset($_POST['owner_id'])){
$owner_id = $_POST['owner_id'];

$query1 = mysqli_query($con,"SELECT * FROM users WHERE user_id = '$owner_id' ");
  
    $result = mysqli_fetch_array($query1);


    $pixd = $result['pix']; 
    $sname = $result['sname']; 
    $oname = $result['oname']; 
    $owner = $result['username'];
    $owner_id = $result['user_id'];
    $shop_name = $result["shop_name"]; 
    $address = $result["address"]; 
    $phone = $result["phone"]; 

    $main_state = $result["state_name"]; 
    $join_states = $result["join_state"]; 

    if($pixd==''){
    $profilepixd = "images/avatar.png";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }

 $join_states = explode(",", $join_states);

 ?>

<p style="color: #173e43;"><b>Username:</b> <?php echo ucfirst($owner); ?></p><hr>
<p style="color: #173e43;"><b>Shop Name:</b> <?php echo $shop_name; ?></p><hr>
<p style="color: #173e43;"><b>Phone:</b> <?php echo $phone; ?></p><hr>
<p style="color: #173e43;"><b>Main Address:</b> <?php echo $address; ?></p><hr>
<p style="color: #173e43;"><b><span class="fa fa-map-marker"></span> Main State:</b> <?php echo $main_state; ?></p><hr>

<h5 style="color: red;"><b>Other States of presence:</b></h5>
 <?php

  foreach ($join_states as $join_state){
    ?>

      <p style="color: #173e43;"><span class="fa fa-map-marker"></span> <?php echo  $join_state; ?></p>

    <?php
    
  }
                



}

//


?>


                                           
                                           
                                           