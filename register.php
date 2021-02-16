<html>
<head>
	<title>Create Account</title>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&display=swap'>
<link rel="stylesheet" type="text/css" href="css/register.css">
<link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
</head>
<body>

<div class="main">
	<div class="left">
<div class="title">
		<img src="Logo.png">
	<h1 class="welcome">Welcome</h1>
<div class="abc">
	<p> If you already had an account, you can <a href="Login.php">Login </a> instead.</p>
</div>


</div>
</div>

<div class="right" style="background:rgba(226, 226, 226, 0.8);">
<div class="title2">
Create an account
</div>
<div class="inputs">
		<form action="insertC.php" method="POST">
	<div class="leftinput">
<input type="text" class="input" placeholder="Username" name="username" required><br><br>
<input type="email" class="input" placeholder="Email" name="email" required><br><br>
<input type="number" class="input" placeholder="Contact Number"  name="contact_number" required><br><br>
<input type="password" class="input" placeholder="Password"  name="password" required><br><br>
<input type="password" class="input" placeholder="Confirm Password"  name="confirm_password" required><br><br>
</div>
	<div class="rightinput">
<input type="text" class="input" placeholder="Your Name"  name="customername" required><br><br>
<label for="address">Address</label>
<textarea id="address" name="address" rows="4" cols="50"></textarea>

<label for="dob">Date Of Birth</label>
<input type="date" class="input" id="dob"  name="dob" required><br><br>
</div>
<div class="bottominput">
<input type="submit" value="Submit">
<input type="reset" value="Reset">
</div>
</form>
</div>
</div>
</div>



</body>

</html>
