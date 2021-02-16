<html>
<?php
include("connect.php");
$result = mysqli_query($con, "SELECT * FROM product");
?>
<head>
<title>Staff Panel</title>
<link href="css/staff.css" type="text/css" rel="stylesheet">
</head>
<body>
  <div class="wrapper">

<div class="leftband">
  <img src="Logo.png">
  <div class="title">
Welcome
</div>
  <form method="post" action="staff.php">
    <input type="text" name="search" placeholder="Search product name" class="searchbox"><br>
    <input type="submit" name="searchbtn" value="Search" class="searchbtn">
  </form>
  <button class="addproduct" onclick="window.location.href='createproduct.php'">Add Product</button>
  <button class="logout" onclick="window.location.href='logout.php'">Logout</button>
</div>

<div class="main">
<?php
include("connect.php");
if(isset($_POST['searchbtn']))
{
  $sql = "SELECT * FROM product WHERE product_name LIKE '%".$_POST['search']."%'";
}
else
{
  $sql = "SELECT * FROM product";
}

$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($result))
{
    echo'   <div class="productdisplay">
            <div class="backimg"></div>
            <div class="contentproduct">
            <h3>'.$row['product_name'].'</h3><br>
            <img src="images/'.$row['image'].'"></img>
            <div class="productdescription">
        <p>'.$row['description'].'</p><br>
            </div>
            <p>Price:<br>RM'.$row['price'].'</p>
            <p>Categories:<br>'.$row['categories'].'</p>
            <a id="edit" href="productedit.php?id='.$row['product_id'].'"> Edit </a>
        </div>
          </div>
        ';
}
  ?>




</div>
</div>
</body>
</html>
