<?php session_start();
include ('./../inc/connect.inc.php');
?>
<?php
$username = ''; 
	$user_id = '';


$time=time();


function GetUserIP(){
  global $con;
   $ip;
   if(getenv("HTTP_CLIENT_IP"))
   $ip = getenv("HTTP_CLIENT_IP");
   else if(getenv("HTTP_X_FORWARDED_FOR"))
   $ip = getenv("HTTP_X_FORWARDED_FOR");
   else if(getenv("REMOTE_ADDR"))
   $ip = getenv("REMOTE_ADDR");
   else
   $ip = "UNKNOWN";
   return $ip;
 }
$sender_ip =  GetUserIP();


 date_default_timezone_set('Africa/Lagos');
 $current_time = new DateTime();
 // $current_time->modify('-6 hours');
  $current_time =  $current_time->Format('jS M, Y  h:i A');




 if(isset($_POST['user_idP'])){

   $user_idP = $_POST['user_idP'];  
  $sender_phone = $_POST['my_phone'];
$my_text = mysqli_real_escape_string($con,htmlentities(trim($_POST['my_text'])));  


   $query_profile = mysqli_query($con,"SELECT * FROM users WHERE user_id='$user_idP' ");
    $result = mysqli_fetch_assoc($query_profile);
  

$phone = $result['phone'];
// $username = 'kutomarket';
// $password = 'kutomarketinfo1111';
$sender = 'kikifarm';   
$smessage = $my_text;  




mysqli_query($con,"INSERT INTO sms(date_time, user_id, phone, content, sender_ip) VALUES('$current_time', '$user_idP', '$sender_phone', '$smessage', '$sender_ip') ") or die(mysqli_error());               
    



    


 $url = "https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=RDcDNqPWCWOw779Xk7zLSkq9V4oVti7CNVoUXXZh0Y75wHkSFLFoFZFZI4HD&from=Supefantasy&to=$phone&body=$smessage&dnd=2";



//$xml = file_get_contents($url);


echo '<p style="color:green">SMS successfully sent</p>';
//echo $xml;
// $ok = substr($xml, 0, 2);
//     if($ok != 'OK'){
//       $errorfill  = 'Technical issue; please try again later';
//       }else{

//     $success = '<p style="color:red">SMS successfully sent</p>';
    
//       }


      
  //      $query2 = mysqli_query($con,"SELECT * FROM users WHERE username='$being_follow' ");
  // $row = mysqli_fetch_assoc($query2);
  //  $being_follow_id = $row["user_id"];
         
        
         //  if($action == 'addbasket'){

         //            mysqli_query($con,"INSERT INTO basket VALUES('', '$added_by', '$product_id', 'no') ");
         //    }

         // else if($action == 'delbasket'){
         //         mysqli_query($con,"DELETE FROM basket WHERE added_by='$added_by' AND product_id='$product_id' ");
         //    }    




    }
?>
           