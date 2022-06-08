<?php session_start();
include ('./../inc/connect.inc.php'); 
?>
<?php
if(!empty($_POST['state_name2'])) {
      $state_name = $_POST["state_name2"]; 

 $query = mysqli_query($con,"SELECT * FROM states WHERE name = '$state_name' ");
      $row = mysqli_fetch_array($query);
       $state_id = $row['state_id'];



	$query_subcat = mysqli_query($con,"SELECT * FROM local_governments WHERE state_id = '$state_id' ");	




?>

          <option value="">Select LG  in <?php echo $state_name; ?> State</option>          
     	                  
	<?php while($rowsubcat = mysqli_fetch_assoc($query_subcat)):   ?>
     <?php 
	 $lg_id = $rowsubcat['lg_id'];
       $lg_name = $rowsubcat['name'];
	 ?>

 <option value="<?php echo $lg_name; ?>"  style="margin: 10px; padding: 10px;"><?php echo $lg_name; ?></option>
       <?php endwhile; ?>       
 
<?php
}
?>   
