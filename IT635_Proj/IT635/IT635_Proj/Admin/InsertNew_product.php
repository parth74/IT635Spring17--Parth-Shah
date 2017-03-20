<!DOCTYPE>

<?php

include ("includes/db.php");


?>

<html>
	<head>
		<title>Insert New Products</title>

	</head>

<body>

	<form action="InsertNew_product.php" method="post" entype="multipart/form-data">

	<table align="center" width="800" border="2" bgcolor="skyblue">

		<tr align="center">
			<td colspan="7"><h2> Insert New Product Here</h2></td>
		</tr>

		<tr>
			<td align="right"><b>Product Title:</b></td>
			<td><input type="text" name="product_title" size="60" required /></td>
		</tr>

		<tr>
			<td align="right"><b>Product Category:</b></td>
		<td>
			<select name="product_categ" >
				<option>Select a Category</option>
		<?php

				$get_categ = "select * from Categories";

				$run_categ = mysqli_query($con, $get_categ);

				while ($row_categ=mysqli_fetch_array($run_categ)){
		
					$categ_id = $row_categ ['categ_id'];
					$categ_title = $row_categ ['categ_title'];

				echo "<option value='$categ_id'>$categ_title</option>";

				}	
			?>

			</select>
			
		</td>
		</tr>

		<tr>
			<td align="right"><b>Product Brand:</b></td>
			<td>
				<select name="product_brand" >
				<option>Select a Brand </option>
			
			<?php

				$get_Brands = "select * from Brands";

				$run_brand = mysqli_query($con, $get_Brands);

				while ($row_brand=mysqli_fetch_array($run_brand)){
	
					$brand_id = $row_brand ['brand_id'];
					$brand_title = $row_brand ['brand_title'];

				echo "<option value='$brand_id'>$brand_title</option>";

				}	

			?>

			</select>


			</td>
		</tr>

		<tr>
			<td align="right"><b>Product Image:</b></td>
			<td><input type="file" name="product_image" required  /></td>
		</tr>

		<tr>
			<td align="right"><b>Product Price:</b></td>
			<td><input type="text" name="product_price" required /></td>
		</tr>

		<tr>
			<td align="right"><b>Product Description:</b></td>
			<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
		</tr>

		<tr>
			<td align="right"><b>Product Keywords:</b></td>
			<td><input type="text" name="product_keywords" size="40" required /></td>
		</tr>
		
		<tr>
			<td align="right"><b>Product Stock:</b></td>
			<td><input type="text" name="product_stock" size="40" required /></td>
		</tr>
		
		

		<tr align="center">
			<td colspan="6"><input type="submit" name="insert_post" value="Add New Product" /></td>
		</tr>



	</table>

</form>



</body>
</html>

<?php
	
	if(isset($_POST['insert_post'])){

		//getting the text data from the fields

		
		$product_categ=$_POST['product_categ'];
		$product_brand=$_POST['product_brand'];
		$product_title=$_POST['product_title'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['product_desc'];
		$product_keywords=$_POST['product_keywords'];
		$product_stock=$_POST['product_stock'];
		

		//getting image from feild 
		$product_image=$_FILES['product_image']['name'];
		$product_image_tmp=$_FILES['product_image'] ['tmp_name'];
		
	move_uploaded_file($product_image_tmp,"$product_image");
		
		
		
		$InsertNew_product = "insert into Products
			(product_categ,product_brand,product_title,product_price,product_desc,product_image,product_keywords, product_stock) values
			('$product_categ', '$product_brand' , '$product_title', '$product_price' , '$product_desc' , ' $product_image', '$product_keywords', '$product_stock')";

		$insert_prod = mysqli_query($con, $InsertNew_product);
	
			If($insert_prod){
				
				echo "<script>alert('Product has been inserted!')</script>";
				echo "<script>window.open ('InsertNew_product.php','_self')</script>";
			
			}
}

?>
