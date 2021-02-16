<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Products - Man in the Moon</title>
	<link href="css/product.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="header" style="background-color: #fec84e;
	background-image: linear-gradient(315deg, #fec84e 0%, #ffdea8 74%)";>

	<div class="container">
		<div class="navbar">
		<div class="logo">
		<a href="mainpage.html"><img src="images/logo2.png" width="150px";></a>
		</div>
		<nav>
		<ul id="MenuItems">
			<li><a href="mainpage.html">Home</a></li>
			<li><a href="product.php">Products</a></li>
			<li><a href="customerprofile.php">Account</a></li>
		</ul>
	</nav>
				<a href="cart.php"><img src="images/cart.png" style="width:30px;height:30px"></a>
		<img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
	</div>
	</div>
</div>

<!------ All Products ------>

		<div class="small-container">
			<h2 class="title">All Products</h2>
			<div class="row">
	<?php
	include("connect.php");
	  $sql = "SELECT * FROM product";
	$result = mysqli_query($con,$sql);

		while ($row = mysqli_fetch_array($result))
		{

	echo '
			<div class="col-1">
			<a href="product-details.php?id='.$row['product_id'].'"><img src="images/'.$row['image'].'"></a>
			<a href="product-details.php?id='.$row['product_id'].'"><h4>'.$row['product_name'].'</h4></a>

			<p>RM'.$row['price'].'</p>
			</div>
				';
		}
			?>
	</div>
</div>





<!-------- footer -------->
	<div class="footer">
	<div class="container">
		<div class="row">
			<div class="footer-col-1">
				<h3>Download Our App</h3>
				<p>Download App for Android and Ios Mobile</p>
				<div class="app-logo">
					<img src="images/play-store.png">
					<img src="images/app-store.png">
				</div>
			</div>

			<div class="footer-col-2">
				<img src="images/logo1.png">
				<p>Deliver products that support a nutritious and sustainable diet</p>
			</div>

			<div class="footer-col-3">
				<h3>Follow Us</h3>
				<ul>
					<li>Facebook</li>
					<li>Twitter</li>
					<li>Instagram</li>
					<li>Youtube</li>
				</ul>
			</div>

			</div>
			<h4>
			<p class="copyright 2020">Copyright © 2020 Man in the Moon. All rights reserved.</p>
		</div>
	</div>

</body>
<html>
