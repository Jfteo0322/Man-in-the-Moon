<html>
<?php
include("session.php");
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart - Man in the Moon</title>
	  <link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
button.checkoutbtn{
	width:150px;
	height:50px;
	position:absolute;
	margin-top:10px;
	right:240px;
	background:#e7b55d;
	color:white;
	text-shadow: 1px 1px 1px gray;
	outline:none;
	border: 1px solid gray;
	border-radius: 10px;
		transition:0.3s;
}

button.checkoutbtn:hover{
	background:#e7ad5d;
	box-shadow: 1px 1px 3px black;
	transition:0.3s;
}
button.checkoutbtn:active{
transform: translateY(1px);
transition: 0.1s;

}

</style>
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

<!------ cart items details ------>

	<div class="small-container cart-page">
			<table>
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Subtotal</th>
			</tr>
		<?php
include("connect.php");
$id = $_SESSION['myUserID'];
$sel = "SELECT account.user_id,customer.user_id,customer.customer_id,orders.*,order_details.*,product.product_name,product.price
FROM account,customer,orders,order_details,product
WHERE account.user_id = customer.user_id
and customer.customer_id = orders.customer_id
and orders.paid ='NO'
and orders.order_id = order_details.order_id
and product.product_id = order_details.product_id
and account.user_id=$id;";

$result = mysqli_query($con,$sel);
while($row = mysqli_fetch_array($result))
{

echo'			<tr>
				<td>
					<div class="cart-info">
						<img src="images/'.$row['product_image'].'">
						<div>
							<p>'.$row['product_name'].'</p>
							<small>Price: RM'.$row['price'].'</small>
							<br>
							<a href="deletecart.php?id='.$row['detail_id'].'" onClick="return confirm(\'Are you sure you want to remove this item?\');">Remove</a>
						</div>
					</div>

				</td>
				<td>'.$row['quantity'].'</td>
				<td>RM'.$row['sub_total'].'</td>
			</tr>
		';
}
mysqli_close($con);
		?>
		</table>

		<div class="total-price">

			<table>
				<tr>
					<td>Total</td>
					<td><?php
include("connect.php");
$id = $_SESSION['myUserID'];
$total = "SELECT sum(order_details.sub_total)as total_price from customer,account,orders,order_details
where account.user_id = customer.user_id
and customer.customer_id = orders.customer_id
and orders.order_id = order_details.order_id
and orders.paid='NO'
and account.user_id = $id;";

$result = mysqli_query($con,$total);
while($row = mysqli_fetch_array($result))
{
	echo 'RM '.$row['total_price'];
}
mysqli_close($con);
					 ?></td>
				</tr>
			</table>
		</div>
<button class="checkoutbtn" onclick="window.location.href='checkout.php'">CheckOut</button>
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
<!--------js for menu items ------>
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


</body>
</html>
