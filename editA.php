<html>
<head>
    <link href="css/editA.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<body>

      <div class="wrap" style="">
<?php
include("connect.php");
$id = intval($_GET['id']);
$result = mysqli_query($con,"SELECT * FROM account WHERE user_id=$id");
while($row = mysqli_fetch_array($result))
{
?>
<form>
          <div class="leftinfo">
          User ID:
          <input type="text" name="userid" id="userid" value="<?php echo $row['user_id']?>" style="color:white;" readonly>
          Username:
          <input type="text" name="username" id="input" value="<?php echo $row['username']?>"  readonly>
          Email:
          <input type="text" name="email" id="input" value="<?php echo $row['email']?>"  readonly>
          Password:
          <input type="text" name="password" id="input" value="<?php echo $row['password']?>"  readonly>
      <div id="btn" style="background-color:#64bd37;">You cannot edit Admin's account.</div>
      </div>
</form>
<?php
}
mysqli_close($con);
?>
</div>
</body>
</html>
