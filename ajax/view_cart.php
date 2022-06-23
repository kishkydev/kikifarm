<?php include ('./../inc/connect.inc.php'); ?>


<?php

if(isset($_POST['productId'])){

	$query = mysqli_query($con,"SELECT * FROM products WHERE product_id = '".$_POST['productId']."' ");
		$row = mysqli_fetch_array($query);
		$product_id = $row['product_id'];
		$product_name = $row['name'];
		$product_price = $row['nprice'];
		$product_pix1 = $row['pix1'];
		$product_pix2 = $row['pix2'];
		$product_desc = $row['desc'];
		$quantity = $row['quantity'];
		$price1 = number_format($row['nprice']);
		//echo json_encode($row);	

		$product_pix =  'uploads_product/thumbs/'.$product_pix1;
		$product_pix1 =  'uploads_product/album/'.$product_pix1;
		$product_pix2 =  'uploads_product/album/'.$product_pix2;



		$data = array(

				'product_id' => $product_id,
				'product_name' => $product_name,
				'product_price' => $product_price,
				'product_pix' => $product_pix,
				'product_pixa' => $product_pix1,
				'product_pixb' => $product_pix2,
				'desca' => $product_desc,
				'namea' => $product_name,
				'pricea' => $price1,
				
			);
		
		echo json_encode($data);




	}
?>