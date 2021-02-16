<html>
<?php
include("session.php");
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="customerprofile.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
textarea{
	resize: none;
}
</style>
</head>

<body>
	<div class="header" style="background-color: #fec84e;
	background-image: linear-gradient(315deg, #fec84e 0%, #ffdea8 74%)";>

	<div class="mainbar">
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

<!------Customer Profile ------>

<div class="cusprofile">
	<div class="row">

	<div class="col-md-9">

		<div style="width: 100%;">
		<div class="card">

		  <div class="card-body">
			<div class="row">
		       <div class="col-md-12">
				<h2 class="title"> Your Profile</h2>
		       </div>
		    </div>
		         <div class="row">
		           <div class="col-md-12">
<?php
include("connect.php");
$id = $_SESSION['myUserID'];
$result = mysqli_query($con,"SELECT * FROM account, customer WHERE account.user_id = customer.user_id and account.user_id=$id");
while($row = mysqli_fetch_array($result))
{
?>
            <form action="only_updateC.php" method="POST">
							<input type="hidden" name="userid" value="<?php echo $row['user_id']?>">
                      <div class="form-group row">
                       <label for="username" class="col-4 col-form-label">User Name*</label>
                          <div class="col-8">
                                     <input type="text" name="username" id="username" class="form-control here" placeholder="<?php echo $row['username']?>" value="<?php echo $row['username']?>" required>
                           </div>
                           </div>

                        <div class="form-group row">
							<label for="name" class="col-4 col-form-label">Email*</label>
                               <div class="col-8">
                                <input type="email" name="email" id="Email" class="form-control here" placeholder="<?php echo $row['email']?>" value="<?php echo $row['email']?>" required>
                               </div>
                        </div>

                        <div class="form-group row">
                             <label for="contactname" class="col-4 col-form-label">Contact Number</label>
                               <div class="col-8">
                                          <input type="number" name="contact_number" id="contactnumber" class="form-control here" placeholder="<?php echo $row['contact_number']?>" value="<?php echo $row['contact_number']?>" required>
                               </div>
                        </div>

						<div class="form-group row">
							<label for="text" class="col-4 col-form-label">New Password</label>
								<div class="col-8">
                            <input type="text" name="password" id="text" class="form-control here" placeholder="<?php echo $row['password']?>" value="<?php echo $row['password']?>" required>
                                </div>
                       </div>

                        <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Your Name</label>
								<div class="col-8">
                                <input type="text" name="customer_name" id="yourname" class="form-control here" placeholder="<?php echo $row['customer_name']?>" value="<?php echo $row['customer_name']?>" required>
                                </div>
                       </div>

                        <div class="form-group row">
                            <label for="address" class="col-4 col-form-label">Address</label>
                                <div class="col-8">
                                            <textarea name="address" id="address" class="form-control here"  rows="4" cols="50" placeholder="<?php echo $row['address']?>" required><?php echo $row['address']?></textarea>
                                </div>
                        </div>

                       <div class="form-group row">
                             <label for="Date of Birth" class="col-4 col-form-label">Date of Birth</label>
                                <div class="col-8">
                                <input type="date" name="dob" id="date" class="form-control here" value="<?php echo $row['dob']?>" required>
                                </div>
                       </div>

                        <div class="form-group row">
                              <div class="offset-4 col-8">
                                 <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                              </div>
                        </div>

                    </form>
<?php
}
mysqli_close($con);
?>
	   <button class="logout" onclick="window.location.href='logout.php'">Logout</button>
		            </div>
		            </div>

		        </div>
		    </div>
		</div>
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
</body>
</html>
