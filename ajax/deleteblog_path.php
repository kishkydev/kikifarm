<?php session_start();
 include ('./../inc/connect.inc.php');
 ?>
<?php  
 //delete.php  
 if(!empty($_POST["path"]))  
 {  
 	$postpix = $_POST["path"];
      if(unlink('../uploads_blog/album/'.$postpix) && unlink('../uploads_blog/thumbs/'.$postpix))  
      {  
           echo 'Image Deleted';  
      }  
 }  
 ?>  