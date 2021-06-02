<?php

require_once('connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row["ID"];
		$username = $row["username"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;
	}
	header("Location: Admin_dashboard.php");
}
else
{
	echo "Invalid username or password";

}
?>