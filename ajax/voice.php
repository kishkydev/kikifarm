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



if(isset($_POST['product_id'])){
$product_id = $_POST['product_id'];

$query1 = mysqli_query($con,"SELECT * FROM products WHERE product_id='$product_id'  ") or die (mysqli_error());
  
    $runrows = mysqli_fetch_array($query1);


                            $product_id = $runrows['product_id'];
                            $prod_name = ucfirst($runrows['name']);
                            $prod_description = $runrows['description'];
                            $prod_price = $runrows['price'];

                            $prod_code = $runrows['code'];
                          
                            
        
                            $pix1 = $runrows['pix1'];
                            $pix2 = $runrows['pix2'];
                            $pix3 = $runrows['pix3'];
                            $pix4 = $runrows['pix4'];

                    $user_id_product = $runrows['user_id'];
                 
                        $query_profile = mysqli_query($con,"SELECT * FROM users WHERE user_id='$user_id_product' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 

    $sname = $result['sname']; 
$oname = $result['oname']; 
$owner = $result['username'];
    $shop_name = $result["shop_name"]; 

$shop_name = substr($shop_name,0,25);

   $state_product = $result['state_name'];



 require_once ('../vendor/autoload.php');
            use \Statickidz\GoogleTranslate;

            $yoruba = 'yo';
            $igbo = 'ig';
            $hausa = 'ha';

            $source = 'en';
            $target = 'yo';
            $text = 'I want to buy maize';

            $trans = new GoogleTranslate();
            $result = $trans->translate($source, $target, $prod_description);

            echo '<h2>'.$result.'</h2>';



}

//


?>


                                           
                                           
                                           