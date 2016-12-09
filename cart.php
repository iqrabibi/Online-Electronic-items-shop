<!DOCTYPE HTML>
<?php
include ("functions/functions.php");
?>
<html>
	<head>
		<title>Online Electronic Item Shop</title>
		<link rel="stylesheet" href="styles/styles.css" media="all" /> 
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

	</head>
<body>


	<header>
		
		
		
		 <nav class="navbar navbar-inverse">
  <div class="container-fluid full-color">
  <div class="container">
    
    <ul class="nav navbar-nav navbar-text">
      <li><a href="#"><i class="fa fa-ship fa-lg"></i>  Fast Shipping</a></li>
      <li><a href="#"><i class="fa fa-phone fa-lg"></i> Call Us:0311-3425678</a></li>
      <li><a href="#"><i class="fa fa-clock-o fa-lg"></i>Timing 9:00AM to 5:00PM</a></li>
	   <li><a href="#"><i class="fa fa-lock fa-lg"></i>100% secure shipping</a></li>
	    
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a  class="navbar-text" href="#"><span class="glyphicon glyphicon-user "></span> Sign Up</a></li>
      <li><a class="navbar-text" href="#"><span class="glyphicon glyphicon-log-in "></span> Login</a></li>
    </ul>
  </div>
  </div>
</nav>
		
		
		
		
		
		
			<div class="container-fluid design">
			
			
				<div class="container">
					<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12 col-lg-4 ">
					<a href="index.php">	<img src="images/logo1.PNG" type="image" alt="logo"/></a>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 col-lg-8 ">
																<div class="form-group has-feedback" style="margin-top:20px; float:left;width:400px;">
																<form method="get" enctype="multipart/form-data" action="result.php">
												
												<input type="text" class="form-control" id="inputSuccess2" name="user-query" placeholder="Looking For Something?"/>
												<br>
												<input type="submit"  name="search"  value="search"/>
												<span class="glyphicon glyphicon-search form-control-feedback"></span>
 
												</form>
											</div>
											<div style="float:right; ">
  <div style="color:#0B6180;" class="well"> Welcome Guest! <b style="color:#0B6180;">Shopping Cart</b> <br>Total Items=<b style="color:#A20006;"><?php total_item();?></b>,  Total Price=<b style="color:#A20006;">RS:<?php total_price(); ?> </b><b><a style="color:#A20006;"href="cart.php">"Go To Cart"</a></b></div>
</div>
											
				
				</div>
				</div>
				
				</div>
				</div>
				
				<div class="container-fluid" style="background:#A20006; border-top:1px solid black;margin-top:5px;margin-bottom:5px;margin-top:5px;"> 
				
				
				<div class="container">
  <ul class="nav nav-tabs" style="border-bottom:1px solid black;">
    <li class="list-item"><a class="menu-hover "href="index.php">Home</a></li>
    <li class="dropdown list-item">
      <a class="dropdown-toggle menu-hover" data-toggle="dropdown" href="#">Menu <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li class="list-item"><a  class="menu-hover" href="#">Computers</a></li>
        <li><a  class="menu-hover" href="#">LapTops</a></li>
		        <li><a  class="menu-hover" href="#">Cell Phones</a></li>
				        <li><a  class="menu-hover" href="#">Smart Phones</a></li>
        <li><a  class="menu-hover" href="#">Tablets</a></li>   
<li><a  class="menu-hover" href="#">TV</a></li>   
<li><a  class="menu-hover" href="#">Refrigerators</a></li>   		
      </ul>
    </li>
	 <li class="dropdown list-item">
    <a class="dropdown-toggle menu-hover" data-toggle="dropdown" href="#">brands <span class="caret"></span></a>
	 <ul class="dropdown-menu">
	<?php getbrands();
	?>
	
	</ul>
	</li>
	
    <li class="list-item"><a class="menu-hover" href="cart.php">Shopping Cart</a></li>
	<li class="list-item"><a class="menu-hover" href="all_products.php">All Products</a></li>
	<li class="list-item"><a class="menu-hover" href="customer/myaccount.php">My Account</a></li>
	 <li><a class="menu-hover" href="#">Contact Us</a></li>
  </ul>
</div>
</div>

				
				
				
				
			</header>

				
				<div class="container-fluid" style="margin-bottom:5px;margin-top:20px;">
				<div class="container"> 

				<div class="row">
				
				<div class="col-sm-12 col-md-6 col-lg-2">
									 <ul class="list-group order">
						<?php
						getCats();
						?>
						</ul>
										</div>
			
				<div class="col-sm-12 col-md-6 col-lg-10">
						
			
			
			
				<h2 class="display">Our Some products</h2>
				<form action="" method="post" enctype="multipart/form-data">
				
				</form>
				<?php cart(); ?>
				<ul class="list-group order" style=" text-align:center">
				
				</ul>
						</div>
			</div>	
 	</div>

</div>
				
				
				
				
				
				
				

				<div class="container"> footer</div>







 










</body>
</html>
