<!DOCTYPE>



<html>
	<head>
		<title>Insert New Products</title>

	</head>

<body>

	<form action="InsertNew_product.php" method="php" entype="multipart/form-data">

	<table align="center" width="700" border="2" bgcolor="skyblue">

		<tr align="center">
			<td colspan="7"><h2> Insert New Product Here</h2></td>
		</tr>

		<tr>
			<td align="right"><b>Product Title:</b></td>
			<td><input type="text" name="product_title" required/></td>
		</tr>

		<tr>
			<td align="right"><b>Product Category:</b></td>
		<td>
			<select name="product_categ" required>
				<option>Select a Category</option>
		<?php

		$servername = "localhost";
				$username = "parth101";
				$password = "passw0rd";
				$dbname = "IT635_Proj";

				// Create connection
				$con = new mysqli($servername, $username, $password, $dbname);

				$get_categ = "select * from Categories";

				$run_categ = mysqli_query($con, $get_categ);

				while ($row_categ=mysqli_fetch_array($run_categ)){
		
					$categ_id = $row_categ ['categ_id'];
					$categ_title = $row_categ ['categ_title'];

				echo "<option value='$cat_id'>$categ_title</option>";

				}	
			?>

			</select>
			
		</td>
		</tr>

		<tr>
			<td align="right"><b>Product Brand:</b></td>
			<td>
				<select name="product_brand" required>
				<option>Select a Brand</option>
			
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
			<td><input type="file" name="product_image" required /></td>
		</tr>

		<tr>
			<td align="right"><b>Product Price:</b></td>
			<td><input type="text" name="product_price" required /></td>
		</tr>

		<tr>
			<td align="right"><b>Product Description:</b></td>
			<td><textarea name="product_desc" cols="20" row="5" required></textarea></td>
		</tr>

		<tr>
			<td align="right"><b>Product Keywords:</b></td>
			<td><input type="text" name="product_keywords" size="50" required/></td>
		</tr>

		<tr align="center">
			<td colspan="6"><input type="submit" name="insert_product" value="Add New Product" /></td>
		</tr>



	</table>

</form>



</body>
</html>

<?php

	if(isset($_POST['insert_prod'])){

		//getting the text data from the fields

		$product_title=$_POST['product_title'];
		$product_categ=$_POST['product_categ'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['product_desc'];
		$product_keywords=$_POST['product_keyword'];

		//getting image from feild 
		$product_image=$_FILES['product_image']['name'];
		$product_image_tmp=$_FILES['product_image'] ['tmp_name'];
		

	}






?>



