<?php

include ("includes/db.php");

	if(isset($_POST['insert_post'])){

		//getting the text data from the fields

		$product_name=$_POST['product_titl'];
		$product_cat=$_POST['product_cate'];
		$product_manu=$_POST['product_bran'];
		$product_money=$_POST['product_pric'];
		$product_des=$_POST['product_des'];
		$product_word=$_POST['product_keyword'];
	//	$product_stock=$_POST['product_stock'];
		

		//getting image from feild 
		$product_pic=$_FILES['product_imag']['name'];
		$product_image_tmp=$_FILES['product_imag'] ['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_img/$product_image");
		
		$InsertNew_product = "insert into Products
			(product_categ,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat', '$product_manu' , '$product_name', '$product_money' , '$product_des' , '$product_pic', '$product_word')";


		$insert_prod = mysqli_query ($con, $InsertNew_product);	
		
		if ($insert_prod){
			echo "<script>alert('Product has been inserted!')</script>";
			echo "<script>window.open('InsertNew_product.php','_self')</script>";
			
	}
}


?>
