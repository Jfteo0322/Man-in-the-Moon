<html>
<?php
include("session.php");
?>
<?php
include("connect.php");
$result = mysqli_query($con, "SELECT * FROM account");
?>
<head>

  <title>Admin Panel</title>
  <link href="css/test1.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

</head>

<body>

  <div id="headband">

    <div id="logo">
      <img src="Logo.png">
    </div>

    <div id="welcome">
    <?php echo  '<h1>Welcome, '.$_SESSION['mySession'].'.</h1>';?>
    </div>

<div class="buttons">
<button onclick="window.location.href='registerstaff.php'" id="staffcreate" >Create Staff Account</button>
    <button id="logout" onclick="window.location.href='logout.php'">Logout</button>
</div>

  </div>
  <center>
    <div id="main">
      <div class="leftpanel">
        <div class="leftwrap">
       <form method="POST" action="admin.php">
          <input type="text" name="search" placeholder="Search a username." id="search1">
          <input type="submit" name="searchbtn" value="Search"  id="search2">
           </form>

<div class="accountdisplay">
<?php
include("connect.php");
if(isset($_POST['searchbtn']))
{
  $sql = "SELECT * FROM account WHERE username LIKE '%".$_POST['search']."%'";
}
else
{
  $sql = "SELECT * FROM account";
}

$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($result))
{
  if($row['account_type'] == "Customer"){
  echo '<a class="accountdata" href="editC.php?id='.$row['user_id'].'" target="display" style="text-decoration: none;background:#4cd0a5;">'.$row['user_id'].' | '.$row['username'].'</a>';
}
  if($row['account_type'] == "Staff"){
  echo '<a class="accountdata" href="editS.php?id='.$row['user_id'].'" target="display" style="text-decoration: none;background:#5a4cd0;">'.$row['user_id'].' | '.$row['username'].'</a>';
}
  if($row['account_type'] == "Admin"){
  echo '<a class="accountdata" href="editA.php?id='.$row['user_id'].'" target="display" style="text-decoration: none;background:#d08a4c;">'.$row['user_id'].' | '.$row['username'].'</a>';
}
}
?>

          </div>

        </div>
      </div>

      <div class="rightpanel">
        <iframe name="display" class="displayframe">
        </iframe>
        </div>


      </div>

  </center>
</body>

</html>
