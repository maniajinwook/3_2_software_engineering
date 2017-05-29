<?php
	$host = "localhost";
	$user = "root";
	$password = "123123";
	$DB_name = "ourteamdb";

	#define connect location
	$conn = mysqli_connect($host, $user, $password, $DB_name);  

	mysqli_set_charset($conn,"utf8");

	if (mysqli_connect_errno($conn))  
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}  

	$menu = $_POST['menu'];
	#$phnum= '01033387411';
	$res = mysqli_query($conn,"SELECT menu FROM MenuInfo WHERE menu = '$menu'");
	$result = array();  

	if($row = mysqli_fetch_array($res))
	{
		echo $row[0];
	} 


	mysqli_close($conn);
?>