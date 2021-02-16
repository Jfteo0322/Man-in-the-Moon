<?php
include("connect.php");

$target_dir = "images/";
$target_file = $target_dir.basename($_FILES["upload"]["name"]);

if (move_uploaded_file($_FILES["upload"]["tmp_name"],$target_file)){

$productname = $_POST["productname"];
$productprice = $_POST["productprice"];
$productcategory = $_POST["categories"];
$productdesc = $_POST["desc"];
$file_name = basename($_FILES["upload"]["name"]);

$sql = "INSERT INTO product(product_name,price,categories,description,image)

VALUES

('$productname','$productprice','$productcategory','$productdesc','$file_name')";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
mysqli_close($con);
echo '<script>alert("A new product is added!");
window.location.href = "createproduct.php";
</script>';
}
else {
echo "The file is not uploaded.";
}

mysqli_close($con);
?>
