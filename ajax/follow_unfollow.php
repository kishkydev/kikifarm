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

 if(isset($_POST['action'])){
         $action = $_POST['action'];  
       $being_follow = $_POST['being_follow'];   

       $query2 = mysqli_query($con,"SELECT * FROM users WHERE username='$being_follow' ");
  $row = mysqli_fetch_assoc($query2);
   $being_follow_id = $row["user_id"];
         
        
          if($action == 'follow'){

                    mysqli_query($con,"INSERT INTO follow VALUES('', '$username', '$userid', 'unread', '$being_follow', '$being_follow_id', '$time', '') ");
            }

         else if($action == 'unfollow'){
                 mysqli_query($con,"DELETE FROM follow WHERE following='$username' AND being_followed='$being_follow' ");
            }    




    }
?>
           