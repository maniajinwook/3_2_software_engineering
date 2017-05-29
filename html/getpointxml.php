<?php
	$host = "localhost";
	$user = "root";
	$password = "123123";
	$DB_name = "ourteamdb";

	#define connect location
	$conn = mysqli_connect($host, $user, $password, $DB_name);  

	if (mysqli_connect_errno($conn))  
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}  

	$phnum = $_POST['phnum']; 
	
	$sql = "SELECT point FROM UserInfo WHERE phnum = '$phnum'";

	$rs = mysql_query($sql);
	$xmlList.="<?xml version='1.0' encoding='UTF-8'?>";
	
	while($result = mysql_fetch_array($rs))
	{
		$phnum = $result[phnum];
		$board = $result[board];
		
		$xmlList.="<point>$point</point><phnum>$phnum</phnum>";
	}
	echo $xmlList;

	mysqli_close($conn);
?>