<html lang="en">
<?php
include("session.php");
$customer = $_SESSION['myUserID'];
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product Details - Man in the Moon</title>
	<link rel="stylesheet" href="css/style.css">
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

<!------product details ------>

	<?php
		include("connect.php");
		$id = intval($_GET["id"]);
		$result= mysqli_query($con,"SELECT * FROM product WHERE product_id =$id");
		while($row= mysqli_fetch_array($result))
		{
	?>

	<div class="small-container product-details">
		<div class="row">
			<div class="col-2">
				<img src="images/<?php echo $row['image']?>" width="100%" id="ProductImg">
			</div>
			<div class="col-2">
	<form action="insertCart.php" method="POST">
				<p><?php echo $row['categories']?></p>
				<h1><?php echo $row['product_name']?></h1>
				<h4>RM<?php echo $row['price']?></h4>
				<input type="number" style="width:80px;" name="quantity" min="1" value="1" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
				<input type="submit" class="btn" style="width:180px;" value="Add to Cart">
				<input type="hidden" name="productid" value="<?php echo $row['product_id']?> ">
				<input type="hidden" name="price" value="<?php echo $row['price']?> ">
				<input type="hidden" name="productname" value="<?php echo $row['product_name']?> ">
<input type="hidden" name="productimg" value="<?php echo $row['image']?> ">
</form>
				<h3>Product Details	<i class="fa fa-indent"></i></h3>
				<br>
				<p><?php echo $row['description']?></P>
			</div>
		</div>
	</div>

		<?php
		}
		mysqli_close($con);
		?>
<!------title------>

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
<!------ js for toggle menu ------>
	<script>
		var MenuItems = document.getElementById("MenuItems");

		MenuItems.style.maxHeight = "0px";

		function menutoggle(){
			if(MenuItems.style.maxHeight == "0px")
			{
				MenuItems.style.maxHeight = "200px";
			}
			else
			{
				MenuItems.style.maxHeight = "0px";
			}
		}

	</script>

<!------ js for product image ------>

	<script>
		var ProductImg = document.getElementById("ProductImg");
		var SmallImg = document.getElementsByClassName("small-img");

			SmallImg[0].onclick= function()
			{
				ProductImg.src= SmallImg[0].src;
			}
			SmallImg[1].onclick= function()
			{
				ProductImg.src= SmallImg[1].src;
			}
			SmallImg[2].onclick= function()
			{
				ProductImg.src= SmallImg[2].src;
			}
			SmallImg[3].onclick= function()
			{
				ProductImg.src= SmallImg[3].src;
			}


	</script>

</body>
</html>
