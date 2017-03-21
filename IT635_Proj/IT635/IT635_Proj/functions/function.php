<?php
$servername = "localhost";
$username = "parth101";
$password = "passw0rd";
$dbname = "IT635_Proj";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error() ;
	
}
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}



function cart(){

if(isset($_GET['add_cart'])){

	global $con; 
	
	$ip = getIp();
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where ip_add='$ip' AND prod_id='$pro_id'";
	
	$run_check = mysqli_query($con, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_pro = "insert into cart (prod_id,ip_add) values ('$pro_id','$ip')";
	
	$run_pro = mysqli_query($con, $insert_pro); 
	
	echo "<script>window.open('index.php','_self')</script>";
	}
	
}

}

// getting the categories


function getCateg(){
	
	global $con;
	
	$get_categ = "select * from Categories";

	$run_categ = mysqli_query($con, $get_categ);

	while ($row_categ=mysqli_fetch_array($run_categ)){
	
		$categ_id = $row_categ ['categ_id'];
		$categ_title = $row_categ ['categ_title'];

	echo "<li><a href='index.php?cat=$categ_id'>$categ_title</a></li>";

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
	
	if(!isset($_GET['cat'])){
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
								
								<a href='index.php?add_cart=$prod_id'><button style='float:right;'>Add to Cart </button></a>
					</div>	"	;	
}			
		}
	
	}	
}

function getCatPro(){

	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];

	global $con; 
	
	$get_cat_pro = "select * from Products where product_categ='$cat_id'";

	$run_cat_pro = mysqli_query($con, $get_cat_pro); 
	
	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0){
	
	echo "<h2 style='padding:20px;'>No products where found in this category!</h2>";
	
	}
	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_categ'];
		$pro_brand = $row_cat_pro['product_brand'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					<h3>$pro_title</h3>
					
					<img src='Admin/product_img/$pro_image' width='180' height='180' />
					
					<p><b> $ $pro_price </b></p>
					
					<a href='details.php?prod_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?prod_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		";
		
	
	}
	
}

}

function getBrandPro(){

	if(isset($_GET['brand'])){
		
		$brand_id = $_GET['brand'];

	global $con; 
	
	$get_brand_pro = "select * from Products where product_brand='$brand_id'";

	$run_brand_pro = mysqli_query($con, $get_brand_pro); 
	
	$count_brands = mysqli_num_rows($run_brand_pro);
	
	if($count_brands==0){
	
	echo "<h2 style='padding:20px;'>No products where found associated with this brand!!</h2>";
	
	}
	
	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
	
		$pro_id = $row_brand_pro['product_id'];
		$pro_cat = $row_brand_pro['product_categ'];
		$pro_brand = $row_brand_pro['product_brand'];
		$pro_title = $row_brand_pro['product_title'];
		$pro_price = $row_brand_pro['product_price'];
		$pro_image = $row_brand_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					<h3>$pro_title</h3>
					
						<img src='Admin/product_img/$pro_image' width='180' height='180' />
					
					<p><b> $ $pro_price </b></p>
					
					<a href='details.php?prod_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?prod_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		
		";
		
	
	}
	
}
}






?>
