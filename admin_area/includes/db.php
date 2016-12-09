<?php

$conn=mysqli_connect("localhost","root","mysql","ecommerce");
if(!$conn)
{
	echo"failed to connect to database:".mysqli_connect_error();
}
?>