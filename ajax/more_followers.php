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

	$time = time();
?>

<div class="table-responsive">
<table class="= table-condensed">
	

<?php if(isset($_POST["limit"], $_POST["start"])) : ?>
            
  <?php
$time = time();
//user is now the owner of the profile that was formrly usernameP
$user = mysqli_real_escape_string($con,$_POST['user']); 


//to query out users following
// 

$query = mysqli_query($con,"SELECT following FROM follow WHERE being_followed='$user' AND following != '$username'  ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." "); ?>



	

<?php while($row_follow = mysqli_fetch_assoc($query)) : ?>
<?php $follower = $row_follow['following']; 
  
//to check whether users have uploaded their default pictures (for upload)
$checker = mysqli_query($con,"SELECT * FROM users WHERE username='$follower' ");
	$rowsub = mysqli_fetch_assoc($checker);

							$farmer_username = $rowsub['username'];
									
										$farmer_pix = $rowsub['pix'];
										$farmer_id = $rowsub['user_id'];
										if($farmer_pix == ""){
			
												$farmer_pix = "images/avatar.png";
													
													}
												else{
													$farmer_pix = 'uploads/thumbs/'.$farmer_pix;
													}
			
?>

<tr>
	<td><a href="<?php echo $farmer_username; ?>"><img src="<?php echo $farmer_pix; ?>" alt="" class="img-fluid rounded-circle" height="60" width="60"></a></td>
	<td><a style="" href="<?php echo $farmer_username; ?>"><?php echo ucfirst($farmer_username); ?></a></td>
	<td>

<?php if(isset($username)) : ?><!-- to check it user logged in --> 

		 <a href="message?message=<?php echo $farmer_id; ?>" class="button ttm-btn-size-xs ttm-btn-shape-round ttm-btn ttm-btn-bgcolor-darkgrey" style="padding: 10px;"> <span class="fa fa-comment"></span> Message</a>

<?php else : ?><!-- to check it user logged in -->

<a href="javascript:;" id="notl<?php echo $farmer_id; ?>"  class="button ttm-btn-size-xs ttm-btn-shape-round ttm-btn ttm-btn-bgcolor-darkgrey notLoggedIn" style="padding: 10px;"> <span class="fa fa-comment"></span> Message</a>
                                                

<?php endif; ?><!-- to check it user logged in -->



	</td>
</tr>
							




<?php endwhile; ?>  

<?php endif; ?>

	</table>		
</div>