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
<p style="color: #7cda0a">Please select atleast one other town close to you. It will help people locate better.</p>
   <div class="form-group field-btn text-left">

                    <div class="input-block">                       
                       
	<?php while($rowsubcat = mysqli_fetch_assoc($query_subcat)):   ?>
     <?php 
 $lg_id = $rowsubcat['lg_id'];
  $lg_name = $rowsubcat['name'];
	 ?>


  <input id="check<?php echo $lg_id; ?>" type="checkbox" name="tag[]" value="<?php echo $lg_name; ?>">
                      <label for="check<?php echo $lg_id; ?>"><?php echo $lg_name; ?></label>

       <?php endwhile; ?>       
  </div>
</div>

<p style="color: #7cda0a"><span style="color:red">NOTE FOR LOGISTIC REGISTRATION</span>, go to your dashboard account settings to register states you have branches or you can reach.</p>


<?php
}
?>   
