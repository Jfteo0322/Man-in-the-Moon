<html>
<head>
<title>Edit Product</title>
<link href="css/staff.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Gayathri:wght@100;400&display=swap" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}
textarea {resize:none;}
</style>
</head>
<body>
<div class="editproductbackground"></div>
<div class="editproductmain">
  <h1 style="text-align:center;"> Edit Product</h1>
  <div class="editproductcontent">


<?php
include("connect.php");
$id = intval($_GET['id']);
$result = mysqli_query($con,"SELECT * FROM product WHERE product_id=$id");
while($row = mysqli_fetch_array($result))
{
?>

    <form action="updateP.php" method="POST" ENCTYPE="multipart/form-data">
      <div class="editimg" >
      Product ID: <?php echo $row['product_id'];?>
<input type="hidden" name="productid" value="<?php echo $row['product_id']?>" readonly>
<img src="images/<?php echo $row['image']?>"></img>
</div>

<div class="editinputs">
  <div class="sortup">
  <div class="leftinputs">
    <input type="text" name="productname" placeholder="<?php echo $row['product_name']?>" value="<?php echo $row['product_name']?>" class="productname" required>
    <br>
      <input type="file" name="upload" style="background:gray;border:none;width:180px;" accept="image/*">
  </div>
    <div class="rightinputs">
    <input type="number" min="1" step="0.01" name="productprice" placeholder="<?php echo $row['price']?>" value="<?php echo $row['price']?>" class="price" required>
<br>
        <select name="categories" class="categories"required>
            <option value="Butter"<?php if ($row['categories'] == "Butter") { ?>selected="selected"<?php } ?>>Butter</option>
            <option value="Cheese"<?php if ($row['categories'] == "Cheese") { ?>selected="selected"<?php } ?>>Cheese</option>
            <option value="Cream"<?php if ($row['categories'] == "Cream") { ?>selected="selected"<?php } ?>>Cream</option>
            <option value="Milk"<?php if ($row['categories'] == "Milk") { ?>selected="selected"<?php } ?>>Milk</option>
          </select>
  </div>
</div>
    <div class="bottominputs">
    <textarea name="desc" placeholder="<?php echo $row['description']?>" required><?php echo $row['description']?></textarea><br>
    <input type="submit" value="Finish Edit">
    <div style="margin-left:100px;margin-top:-30px;" class="deletebtn">
<?php echo'<a href="DeleteProd.php?id='.$row['product_id'].'" class="delete" onClick="return confirm(\'Are you sure you want to delete?\');">Delete</a>';?>
</div>
  </div>

</div>
    </form>
<?php
}
mysqli_close($con);
?>

  </div>
</div>
</body>
</html>
