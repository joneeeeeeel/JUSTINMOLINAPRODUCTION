<?php
$connect = new PDO("mysql:host=localhost;dbname=justinmolina_production", "root", "");
$conn = mysqli_connect("localhost","root","","justinmolina_production");

if(!$conn)
{
	echo "Database connection faild...";
}
?>