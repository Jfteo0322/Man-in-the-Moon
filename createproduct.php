<html>
<head>
<title>Create Product</title>
<link href="css/staff.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Gayathri:wght@100;400&display=swap" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}
textarea {resize:none;}

body{
  overflow: hidden;
}
</style>
</head>
<body>
<div class="editproductbackground"></div>
<div class="editproductmain">
  <h1 style="text-align:center;"> Create Product</h1>
  <div class="editproductcontent">

    <form action="insertProd.php" method="POST" ENCTYPE="multipart/form-data">
<div class="createinputs">
  <div class="Csortup">
  <div class="Cleftinputs">
    <input type="text" name="productname" placeholder="Product Name" class="productname" required>
    <br>
      <input type="file" name="upload" style="background:gray;border:none;width:180px;" accept="image/*" required>
  </div>
    <div class="Crightinputs">
    <input type="number" min="1" step="0.01" name="productprice" placeholder="Price" class="price" required>
<br>
        <select name="categories" class="categories"required>
            <option value="">Please Select</option>
            <option value="Butter">Butter</option>
            <option value="Cheese">Cheese</option>
            <option value="Cream">Cream</option>
            <option value="Milk">Milk</option>
          </select>
  </div>
</div>
    <div class="Cbottominputs">
    <textarea name="desc" placeholder="Description" required></textarea><br>
    <input type="submit" value="Create" style="background:#82f243;" >
    <input type="reset" value="Reset" style="background:#9c6a5c;" >
  </div>

</div>
    </form>
  </div>
</div>
<button class="back" onclick="window.location.href='staff.php'">Back </button>
</body>
</html>
