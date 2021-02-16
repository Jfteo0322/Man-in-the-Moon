<html>
<?php
include("session.php");
?>
<head>

  <title>Staff Create</title>
  	<link href="css/test2.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>
<div id="wrap">
  <div>
  <img src="Logo.png">
</div>
<br>
<div class="main">
<h1 style="padding-top:20px;font-family: 'Alata', sans-serif;font-size:2vw;color:white;"> Create a Staff Account</h1>
<div class="inputs">

<form action="insertS.php" method="POST">
<div class="leftinput">
<input type="text" name="username" id="input" placeholder="Username" required><br><br>
<input type="email" name="email" id="input" placeholder="Email" required><br><br>
<input type="password" name="password" id="input" placeholder="Password" required><br><br>
<input type="password" name="confirm_password" id="input" placeholder="Confirm Password" required><br><br>
</div>
<div class="rightinput">
<input type="text" name="staffname" id="input" placeholder="Full Name" required><br><br>
<input type="number" name="contactnumber" id="input" placeholder="Contact Number" required><br><br>
<div style="width:15vw;margin:0 auto;margin-left:1.5vw;float:left;color:white;">
<select name="gender" id="select" required>
  <option value="">Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
</div>
<div style="float:right;display:block;margin-right:3vw;display:block;">
<input type="submit" name="submit" id="btn">
<input type="reset" name="reset" id="btn">
</div>
</div>
</form>


</div>
</div>
</div>
<button id="back" onClick="window.location.href='admin.php'">Back</button>
  </body>

</html>
