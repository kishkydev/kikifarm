<?php session_start();
include ('./../inc/connect.inc.php'); 
?>
<?php
if(isset($_POST['query'])) {
      $seacrh = $_POST["query"];   


$search_exploded = preg_split('/[\s]+/', $seacrh);
 
$x = "";
$construct = "";  
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="items LIKE '%$search_each%'";
else
$construct .="AND items LIKE '%$search_each%'";
    
}
  


 $query = mysqli_query($con,"SELECT * FROM search_items WHERE $construct   ");

$data = array();

if(mysqli_num_rows($query) > 0)
{
 while($row = mysqli_fetch_assoc($query))
 {
  $data[] = $row["items"];
 }
 echo json_encode($data);
}


}
?>
