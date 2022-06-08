<?php session_start();
include ('./../inc/connect.inc.php'); 
?>
<?php
if(!empty($_POST['state_id'])) {
      $state_id = $_POST["state_id"];   

 // $query = mysqli_query($con,"SELECT lg_id FROM lg WHERE lg_name = '$lg_name' ");
 //      $row = mysqli_fetch_assoc($query);
 //      $lg_id = $row['lg_id'];



	$query_subcat = mysqli_query($con,"SELECT * FROM local_governments WHERE state_id = '$state_id' ");	
?>

          <option value="">Select Local Government Area</option>          
     	                  
	<?php while($rowsubcat = mysqli_fetch_assoc($query_subcat)):   ?>
     <?php 
	 $lg_id = $rowsubcat['lg_id'];
  $lg_name = $rowsubcat['name'];
	 ?>

 <option value="<?php echo $lg_id; ?>"  style="margin: 10px; padding: 10px;"><?php echo $lg_name; ?></option>
       <?php endwhile; ?>       
 
<?php
}
?>   
