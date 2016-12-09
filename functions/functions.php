<?php
$conn= mysqli_connect("localhost","root","mysql","ecommerce");
if(!$conn)
{
	echo"failed to connect to database:".mysqli_connect_error();
}
	

//getting categories

function getCats()
{
	
	global $conn;
	$get_cat="select * from categories";
	$run_cat=mysqli_query($conn,$get_cat);
	while($row_cats=mysqli_fetch_array($run_cat))
	{
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat-title'];
		echo "<li class='list-group-item'><a class='hovers' href='index.php?cat=$cat_id'>$cat_title</a></li>";
		
	}
	
	
	
}
//getting brands

function getbrands()
{
	
	global $conn;
	$get_brand="select * from brands";
	$run_brand=mysqli_query($conn,$get_brand);
	while($row_brand=mysqli_fetch_array($run_brand))
	{
		$brand_id=$row_brand['brand_id'];
		$brand_title=$row_brand['brand_title'];
		echo "<li class='list-item'><a  class='menu-hover' href='index.php?brand=$brand_id'>$brand_title</a></li>";
		
	}
	
	
	
}
//get products
function getproducts()
{

	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	global $conn;
	$get_product="select * from products ";
	$run_product=mysqli_query($conn,$get_product);
	while($row_product=mysqli_fetch_array($run_product))
	{
		$pro_id=$row_product['product_id'];
		$pro_cat=$row_product['product_cat'];
		$pro_brand=$row_product['product_brand'];
		$pro_title=$row_product['product_title'];
		$pro_price=$row_product['product_price'];
		$pro_image=$row_product['product_image'];
		
		echo"<div style='display:inline-block '> <h3 style='padding-right:20px;color:#980108;text-align:center;'>$pro_title</h3><li class='list-item' style='display:inline-block; border:1px solid #00A5D2;padding:10px; margin:20px;'><img style='height:100px;'src='admin_area/product_images/$pro_image' alt='image'><p style='color:#980108';> Rs:$pro_price</p>
		<a href='details.php?pro_id=$pro_id' >Detail</a>
		<br>
		<a href='index.php?add_cart=$pro_id'><button style='color:#980108'; >Add to Cart</button></a></li></div>"
		
		;
		
	}
	
	
	}
	}
	
}




//catting categories
function getcatproducts()
{
	
	if(isset($_GET['cat'])){
		$cat_id=$_GET['cat'];
		
	global $conn;
	$get_cat_pro="select * from products where product_cat='$cat_id'";
	$run_cat_pro=mysqli_query($conn,$get_cat_pro);
	$count_cat=mysqli_num_rows($run_cat_pro);
	if($count_cat==0){
	echo "<h3>There is no Product in This Category!</h3>";
	
	exit();
	}
	else
	{
	
	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
	{
		$pro_id=$row_cat_pro['product_id'];
		$pro_cat=$row_cat_pro['product_cat'];
		$pro_brand=$row_cat_pro['product_brand'];
		$pro_title=$row_cat_pro['product_title'];
		$pro_price=$row_cat_pro['product_price'];
		$pro_image=$row_cat_pro['product_image'];
		
	
		
		echo"<div style='display:inline-block '> <h3 style='padding-right:20px;color:#980108;text-align:center;'>$pro_title</h3><li class='list-item' style='display:inline-block; border:1px solid #00A5D2;padding:10px; margin:20px;'><img style='height:100px;'src='admin_area/product_images/$pro_image' alt='image'><p style='color:#980108';> Rs:$pro_price</p>
		<a href='details.php?pro_id=$pro_id' >Detail</a>
		<br>
		<a href='index.php?add_cart=$pro_id'><button style='color:#980108'; >Add to Cart</button></a></li></div>"
		
		;
		
	
	
	}
	}
	
	}
}

//getting user ip
    function getIp() {

        $ip = $_SERVER['REMOTE_ADDR'];

     

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }

     

        return $ip;

    }
	//getting the total added items
	function total_item()
	{
		if(isset($_GET['add_cart']))
		{
			global $conn;
			$ip=getIp();
			$get_item="select * from cart where ip_add='$ip'";
			$run_item=mysqli_query($conn,$get_item);
			$count_item=mysqli_num_rows($run_item);
			
		}
		else{
			global $conn;
			$ip=getIp();
			$get_item="select * from cart where ip_add='$ip'";
			$run_item=mysqli_query($conn,$get_item);
			$count_item=mysqli_num_rows($run_item);
		}
		echo "$count_item";
	}

	//getting totao price
	function total_price()
	{
		$total=0;
		
	global $conn;
	$ip=getIp();
	$sel_price="select * from cart where ip_add='$ip'";
	$run_price=mysqli_query($conn,$sel_price);
	while($p_price=mysqli_fetch_array($run_price))
	{
		$pro_id=$p_price['p_id'];
		$pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($conn,$pro_price);
		while($pp_price=mysqli_fetch_array($run_pro_price))
		{
			$product_price=array($pp_price['product_price']);
			$value=array_sum($product_price);
			$total+=$value;
			
			
		}
		
		
	}
	echo $total;
	
	}
	
  //adding into cart   
function cart()
{
	if(isset($_GET['add_cart']))
	{
		global $conn;
		$pro_id=$_GET['add_cart'];
		$ip=getIp();
		$check_products="select * from cart where ip_add='$ip' AND p_id='$pro_id'";
		$run_check=mysqli_query($conn,$check_products);
		if(mysqli_num_rows($run_check)>0)
		{
			echo "";
		}
		
		else{
			$insert_pro="insert into cart (p_id,ip_add) values('$pro_id','$ip')";
			$run_pro=mysqli_query($conn,$insert_pro);
			echo "<script>windows.open('index.php','_self')</script>";
			
		}
	}
}
//getting brands

function getbrandproducts()
{
	
	if(isset($_GET['brand'])){
		$brand_id=$_GET['brand'];
		
	global $conn;
	$get_brand_pro="select * from products where product_brand='$brand_id'";
	$run_brand_pro=mysqli_query($conn,$get_brand_pro);
	$count_brand=mysqli_num_rows($run_brand_pro);
	if($count_brand==0){
	echo "<h3>There is no Product in This Brand!</h3>";
	
	
	}
	
	
	
	while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
	{
		$pro_id=$row_brand_pro['product_id'];
		$pro_cat=$row_brand_pro['product_cat'];
		$pro_brand=$row_brand_pro['product_brand'];
		$pro_title=$row_brand_pro['product_title'];
		$pro_price=$row_brand_pro['product_price'];
		$pro_image=$row_brand_pro['product_image'];
		
	
		
		echo"<div style='display:inline-block '> <h3 style='padding-right:20px;color:#980108;text-align:center;'>$pro_title</h3><li class='list-item' style='display:inline-block; border:1px solid #00A5D2;padding:10px; margin:20px;'><img style='height:100px;'src='admin_area/product_images/$pro_image' alt='image'><p style='color:#980108';> Rs:$pro_price</p>
		<a href='details.php?pro_id=$pro_id' >Detail</a>
		<br>
		<a href='index.php?add_cart=$pro_id'><button style='color:#980108'; >Add to Cart</button></a></li></div>"
		
		;
		
	
	
	}

	
	}
}
 
?>

