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

	echo "<li><a href='#'>$categ_title</a></li>";

	}	

}

function getBrands(){
	
	global $con;
	
	$get_Brands = "select * from Brands";

	$run_brand = mysqli_query($con, $get_Brands);

	while ($row_brand=mysqli_fetch_array($run_brand)){
	
		$brand_id = $row_brand ['brand_id'];
		$brand_title = $row_brand ['brand_title'];

	echo "<li><a href='#'>$brand_title</a></li>";

	}	

}

?>
