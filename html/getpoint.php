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

	$res = mysqli_query($conn,"SELECT phnum, ticket, point FROM UserInfo WHERE phnum = '$phnum'");
	$result = array();  

	while($row = mysqli_fetch_array($res))
	{ 
		array_push($result, array('Phonenumber'=>$row[0],'ticket'=>$row[1],'point'=>$row[2]));
	} 

	$json = json_encode(array($result));
	echo $json;

	mysqli_close($conn);
?>