<!DOCTYPE>

<?php
session_start();

include ('functions/function.php');


?>

<html>
	<head>
		<title> TechShop </title>

	<link rel="stylesheet" href="style_CSS/style.css" media="all" />
	</head>

<body>

	<!-- Main layout starts from here -->

	<div class="main_wrapper">

		<!-- Header starts here -->

		<div class="header_wrapper"> </div>
		<!-- Header ends here -->
		<!-- Navigation Bar starts here -->

		<div class="menubar">  

			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer_register.php">Sign up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
			
			<ul>
		

		<div id="form">
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="search a product" />
				<input type="submit" name="search" value="Search" />
			</form>
		</div>

		<!-- Navigation Bar ends here -->

		<!-- Content layout starts here-->

		<div class="content_wrapper" style="text-align:left;">

	<div id="sidebar">

		<div id="sidebar_title">Categories</div>
			
			<ul id="categ">
				
				<?php getCateg(); ?>

			<ul>

			<div id="sidebar_title">Brands</div>

			<ul id="categ">

				<?php getBrands(); ?>
			<ul>

	 </div>
</div>
		<div id="content_area"> 
		
		<?php cart(); ?>
		
					<div id="shopping_cart"> 
					
					<span style="float:right; font-size:15px; padding:5px; line-height:40px;">
					
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>
					
					
					<b style="color:yellow">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>
					
					
					<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:orange;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}
					
					
					
					?>
					
					</span>
			
			</div>
	
			
			<div id="products_box">
			
				<?php 
				if(!isset($_SESSION['customer_email'])){
					
					include("customer_login.php");
				}
				else {
				
				include("payment.php");
				
				}
				
				?>
				
		
				
			</div>


		</div>

</div>
		<!-- Content layout ends here -->


			<div id="footer"> 

			<h2 style="text-align:center; padding-top:30px;">&copy; 2017 by https://www.w3schools.com/</h2>


			 </div>

	

</div>

<!-- Main container ends here -->


</body>

</html>
