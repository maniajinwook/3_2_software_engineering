<?php
	$host = "localhost";
	$user = "root";
	$password = "123123";
	$DB_name = "ourteamdb";

	function unistr_to_xnstr($str)
	{
		return preg_replace('/\\\u([a-z0-9]{4})/i', "&#x\\1;", $str); 
	} 

	#define connect location
	$conn = mysqli_connect($host, $user, $password, $DB_name);  

	if(mysqli_connect_errno($conn))  
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}  

	mysqli_set_charset($conn,"utf8");  

	$res = mysqli_query($conn,"select * from UserInfo");
	$result = array();  

	while($row = mysqli_fetch_array($res))
	{  
		array_push($result, array('id'=>$row[0],'phnum'=>$row[1],'password'=>$row[2]));
	}

	$json = json_encode(array("result"=>$result));
	echo $json;
	#echo unistr_to_xnstr($json);

	mysqli_close($conn);
?>