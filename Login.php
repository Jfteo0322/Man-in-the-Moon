<html>

<head>
	<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/Login.css">
</head>

<body style="background: url('https://wallpapercave.com/wp/Kj5cd8B.jpg');  background-repeat: no-repeat;background-position:center;">
	<center>

	<br><br><br>
		<div class="login1">
	<h1	style ="font-size:80px;color:#373838;text-shadow: 2px 2px 1px #d2d6d6;font-family: Arial Black;">Login</h1>

			<div class="login2">
		<br>

    <form action="Login.php" method="post">
	<input type="text" class="input" placeholder="Username" name="username" required><br><br>
	<input type="password" class="input" placeholder="Password" name="password" required><br><br>

	<br><br>
	<input type="submit" value="Login" class="buttonlogin">
</form>
</div>
<div style="display:block;margin:100px;">
	<a href="Mainpage.html" style="text-decoration:none;"> Back to main page.</a>
	<br>
		<p style="color:#686a6e;font-weight:bold;">No account yet? <a href="register.php" style="color:#aaaeb5;">Sign Up</a> now!</p>
  </div>

		</div>
	</center>
</body>

<?php
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{

$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);

$sql="SELECT * FROM account WHERE username='$username' and
password='$password'";

if ($result=mysqli_query($con,$sql))
 {
$rowcount=mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result))
{
    $userid = $row["user_id"];
		$test = $row["account_type"];
}

if($rowcount==1) {
session_start();
$_SESSION['mySession']=$username;
$_SESSION['myUserID']=$userid;

if($test ==="Admin"){
	echo"<script>window.location.href='admin.php'</script>";
}
if($test ==="Staff"){
	echo"<script>window.location.href='staff.php'</script>";
}

if($test ==="Customer"){
	echo"<script>window.location.href='Mainpage.html'</script>";
}
}
else
{
  echo"<script>alert('Invalid Credentials! Please try again.')</script>";
}
}
mysqli_close($con);
}

?>

</html>
