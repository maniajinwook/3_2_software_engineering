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

	$phnum = $_POST['phnum'];
	#$phnum= '01033387411';
	$res = mysqli_query($conn,"SELECT phnum, point FROM UserInfo WHERE phnum = '$phnum'");
	$result = array();  

	if($row = mysqli_fetch_array($res))
	{
		echo $row[1];
	} 


	mysqli_close($conn);
?>