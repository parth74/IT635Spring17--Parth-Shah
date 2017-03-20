<?php
$servername = "localhost";
$username = "parth101";
$password = "passw0rd";
$dbname = "IT635_Proj";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);


// getting the categories


function getCateg(){
	
	global $con;
	
	$get_categ = "select * from Categories";

	$run_categ = mysqli_query($con, $get_categ);

	while ($row_categ=mysqli_fetch_array($run_categ)){
	
		$categ_id = $row_categ ['categ_id'];
		$categ_title = $row_categ ['categ_title'];

	echo "<li><a href='index.php?categ=$categ_id'>$categ_title</a></li>";

	}	

}

function getBrands(){
	
	global $con;
	
	$get_Brands = "select * from Brands";

	$run_brand = mysqli_query($con, $get_Brands);

	while ($row_brand=mysqli_fetch_array($run_brand)){
	
		$brand_id = $row_brand ['brand_id'];
		$brand_title = $row_brand ['brand_title'];

	echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";

	}	

}

function getProd(){
	
	if(!isset($_GET['categ'])){
		if(!isset($_GET['brand'])){
		
	global $con;
		
		$get_prod= "select * from Products order by RAND () Limit 0,6";
		
		$run_prod= mysqli_query($con, $get_prod);
		
		while($row_prod=mysqli_fetch_array($run_prod)){
			
				$prod_id = $row_prod['product_id'];
				$prod_categ = $row_prod['product_categ'];
				$prod_brands = $row_prod['product_brands'];
				$prod_title = $row_prod['product_title'];
				$prod_price = $row_prod['product_price'];
				$prod_image = $row_prod['product_image'];
				$prod_stock = $row_prod['product_stock'];
				
				echo "
				
					<div id='single_product'>
					
								<h3>$prod_title</h3>
								
								<img src='Admin/product_img/$prod_image' width='180' height='180' />
								
								<p> <b>$ $prod_price </b> </p>
					
								<a href='details.php?prod_id=$prod_id' style='float:left; color:black;'>Details</a>
								
								<a href='index.php?prod_id=$prod_id'><button style='float:right;'>Add to Cart </button></a>
					</div>	"	;	
}			
		}
	
	}	
}

function getCategProd(){
	
	if(isset($_GET['categ'] ) ) {
		
			$categ_id=$_GET['categ'];
		
	global $con;
		
		$get_categ_prod= "select * from Products where products_categ='$categ_id'";
		
		$run_categ_prod= mysqli_query($con, $get_categ_prod);
		
		while($row_categ_prod=mysqli_fetch_array($run_categ_prod)){
			
				$prod_id = $row_categ_prod['product_id'];
				$prod_categ = $row_categ_prod['product_categ'];
				$prod_brands = $row_categ_prod['product_brands'];
				$prod_title = $row_categ_prod['product_title'];
				$prod_price = $row_categ_prod['product_price'];
				$prod_image = $row_categ_prod['product_image'];
				$prod_stock = $row_categ_prod['product_stock'];
				
				echo "
				
					<div id='single_product'>
					
								<h3>$prod_title</h3>
								
								<img src='Admin/product_img/$prod_image' width='180' height='180' />
								
								<p> <b>$ $prod_price </b> </p>
					
								<a href='details.php?prod_id=$prod_id' style='float:left; color:black;'>Details</a>
								
								<a href='index.php?prod_id=$prod_id'><button style='float:right;'>Add to Cart </button></a>
					</div>	"	;	
}			
	}
	
	}	






?>
