<!DOCTYPE HTML>
<?php
include ("includes/db.php");

?>
<html>
<head>
<title>
Inserting Products
</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
	<div class="container">
	<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-8">
  <h2>Insert New Posts Here</h2>  
<form action="insert_products.php" method="post" enctype="multipart/form-data">  
  <table class="table">
    
    <tbody>
      <tr>
        <td>Product_title:</td>
        <td><input type="text" name="product_title" required /></td>
       
      </tr>
      <tr>
        <td>Product_category:</td>
        <td>
		<select name="product_cat" required >
		<option>Select a Category</option>
		<?php 
		global $conn;
	$get_cat="select * from categories";
	$run_cat=mysqli_query($conn,$get_cat);
	while($row_cats=mysqli_fetch_array($run_cat))
	{
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat-title'];
		echo "<option value='$cat_id' class='list-group-item'>$cat_title</option>";
		
	}
		?>
		
		</select>
		</td>
       
      </tr>
	  <tr>
        <td>Product_brand:</td>
		 <td>
		<select name="product_brand" required >
		<option>Select a Brand</option>
		<?php 
		global $conn;
	$get_brand="select * from brands";
	$run_brand=mysqli_query($conn,$get_brand);
	while($row_brand=mysqli_fetch_array($run_brand))
	{
		$brand_id=$row_brand['brand_id'];
		$brand_title=$row_brand['brand_title'];
		echo "<option value='$brand_id' class='list-group-item'>$brand_title</option>";
		
	}
		?>
		
		</select>
		</td>


       
      </tr>
	  <tr>
        <td>Product_image:</td>
        <td><input type="file" name="product_image" required /></td>
       
      </tr>
	  <tr>
        <td>Product_price:</td>
        <td><input type="text" name="product_price" required /></td>
       
      </tr>
	  <tr>
        <td>Product_description:</td>
        <td><textarea name="product_desc" ></textarea></td>
       
      </tr>
	  <tr>
        <td>Product_keywords:</td>
        <td><input type="text" name="product_keywords" required /></td>
       
      </tr>
	  <tr style="text-align:center;">
       
        <td><input type="submit" name="insert_post" value="Insert Now"/></td>
       
      </tr>
    </tbody>
  </table>
  </form>
</div>
</div>
</div>


	
</body>
</html>



<?php
if(isset($_POST['insert_post']))
{
	
	//getting text data from form
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keywords=$_POST['product_keywords'];
	//getting images from form
	$product_image=$_FILES['product_image']['name'];
	$product_image_temp=$_FILES['product_image']['tmp_name'];
	move_uploaded_file($product_image_temp,"product_images/$product_image");
	
	//inserting data
	$insert_product="insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('		$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords') ";


$insert_pro=mysqli_query($conn,$insert_product);
if($insert_pro)
{
	echo "<script>alert('Data is Inserted')</script>";
	echo "<script>window.open('insert_products.php','_self')</script>";
	
}
}

?>
