<html>
<?php
include("session.php");
?>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/checkout.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

textarea{
  resize: none;
  overflow: hidden ;
  outline:none;
  height:100px;
}

input#tpdisplay{
  background: transparent;
  outline:none;
  border:none;
  color:white;
  font-size:15px;
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
<!-------above is header------>

<div class="backgroundcheck"></div>
<div class="row">
  <div class="col-75">
    <div class="containerc">

      	<?php
include("connect.php");
$id = $_SESSION['myUserID'];
$sel = "SELECT sum(order_details.sub_total)as total_price,account.user_id,account.email,customer.user_id,customer.address,customer.customer_name,orders.*
FROM account,customer,orders,order_details,product
WHERE account.user_id = customer.user_id
and customer.customer_id = orders.customer_id
and orders.paid ='NO'
and orders.order_id = order_details.order_id
and product.product_id = order_details.product_id
and account.user_id=$id
group by orders.order_id
";
$result = mysqli_query($con,$sel);
while($row = mysqli_fetch_array($result))
{
?>
      <form action="receipt.php" method="POST">
        <input type="hidden" name="orderid" value="<?php echo $row['order_id']?>">
        <div class="row">
          <div class="col-50">
            <h3 style="margin-bottom:50px;margin-top:70px;">Your information</h3><br>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="<?php echo $row['customer_name']?>" value="<?php echo $row['customer_name'] ?>" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="<?php echo $row['email']?>" value="<?php echo $row['email'] ?>" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <textarea name="address"><?php echo $row['address'] ?></textarea>
            <input type="hidden" name="orderid" value="<?php echo $row['order_id']?>">
<input type="text" id="tpdisplay" value="Total Price: RM<?php echo $row['total_price']?>" readonly>
<input type="hidden" name="totalprice" value="<?php echo $row['total_price']?>" readonly>


          </div>

          <div class="col-50">
            <h3 style="margin-top:30px;">Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;background:white;border-radius:20px;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;background:white;border-radius:20px;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Full name on your card" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>
            </div>
          </div>

        </div>
        <input type="submit" value="Pay" class="btn">
      </form>
      <?php
} mysqli_close($con);
					 ?>
    </div>
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
</html>
