<?php session_start();
include ('./../inc/connect.inc.php');
include ('./../func/thumb.func2.php');
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


function correctImageOrientation($filename) {
  if (function_exists('exif_read_data')) {
    $exif = @exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);       
        }
        // then rewrite the rotated image back to the disk as $filename
        imagejpeg($img, $filename, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists     
}
?>       
<?php
//upload.php
if($_FILES["file"]["name"] != '')
{

 
 $image_name = $_FILES['file']['name'];
	$image_size = $_FILES['file']['size'];
	$image_temp = $_FILES['file']['tmp_name'];

	$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
 $image_ext = @strtolower(end(explode('.', $image_name))); //strtolower becasue file ext names can be capitalized
	// explode function will separate the values from the dot, and the end function will select the last value e.g photo . jpeg
 //$image_ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);
	
	$max_size = '9000000';
	
	 $image_file = $image_name;
	
 if(in_array($image_ext , $allowed_ext) === false){
			 echo 'file type not allowed'; 
			}
					
		else if($image_size > $max_size || $image_size == 0){
			echo 'file size must not exceed 9MB';
			}
 
 else{

  //to rename...........
$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $image_name, PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $image_temp;
$destination  = "../uploads/album/{$basename}";
move_uploaded_file( $source, $destination );
//to rename...........
	 //move_uploaded_file($image_temp, '../uploads/album/'.$image_file);
	
	//move_uploaded_file($uploadedFile, $destinationFilename);
correctImageOrientation('../uploads/album/'.$basename);
create_blogthumbs('../uploads/album/', $basename, '../uploads/thumbs/'.$basename);
	$postpix = "$basename";	 


$pix_query = mysqli_query($con,"UPDATE users SET pix='$basename' WHERE user_id = '$user_id' ")or die(mysqli_error());
      
      unlink('../uploads/album/'.$basename);



	 
 echo '<img src="uploads/thumbs/'.$postpix.'" alt="" height="200" width="200" class="img-responsive author-img rounded-circle img-thumbnail" />';



}

}
?>

<div class="add-dp2" >
                        <input type="file" id="file">
                        <label for="file"><i class="fa fa-camera"></i></label>  
                                         
          </div>
