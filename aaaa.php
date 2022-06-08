<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); 


    
?>


<?php
$message = '';
if(isset($_POST["upload"]))
{

	
 if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $matric = mysqli_real_escape_string($con, $data[0]);
	$mat =	$matric;
	//$mat = 'med/12/13/'.$matric;
   // $email = mysqli_real_escape_string($con, $data[1]);
   // $phone1 = mysqli_real_escape_string($con, $data[2]);
    $query = "
     INSERT INTO search_items VALUES('', '$mat')
    ";
    mysqli_query($con, $query) or die(mysqli_error());
   }
   fclose($handle);
   echo 'successfully uploaded';
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}
/*
if(isset($_GET["updation"]))
{
 $message = '<label class="text-success">Product Updation Done</label>';
}

$query = "SELECT * FROM email";
$result = mysqli_query($con, $query); 

*/
?>
<!DOCTYPE html>

  <div class="container">
   <h2 align="center">Update Mysql Database through Upload CSV File using PHP</a></h2>
   <br />
   <form method="post" enctype='multipart/form-data' action="#">
    <p><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="product_file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <?php echo $message; ?>
   <h3 align="center">Deals of the Day</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Category</th>
      <th>Product Name</th>
      <th>Product Price</th>
     </tr>
     <?php
    /* while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["product_category"].'</td>
       <td>'.$row["product_name"].'</td>
       <td>'.$row["product_price"].'</td>
      </tr>
      ';
     } */
     ?>
    </table>
   </div>
  </div>

<?php  include ('./inc/footer.inc.php'); ?>