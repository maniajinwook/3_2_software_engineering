<?php  
 	$host = "localhost";
	$user = "root";
	$password = "123123";
	$DB_name = "ourteamdb";

	#define connect location
	$conn = mysqli_connect($host, $user, $password, $DB_name);  

	function unistr_to_xnstr($str)
	{ 
		return preg_replace('/\\\u([a-z0-9]{4})/i', "&#x\\1;", $str); 
	} 
	  
	if (mysqli_connect_errno($con))  
	{  
		echo "Failed to connect to MySQL: " . mysqli_connect_error();  
	}  
  
	mysqli_set_charset($con,"utf8");  
 
 	$res = mysqli_query($con,"select * from Person");  
   
	$result = array();  
   
	while($row = mysqli_fetch_array($res))
	{  
		array_push($result, array('id'=>$row[0],'phnum'=>$row[1],'point'=>$row[2]));  
	}  
   
	$json = json_encode(array("result"=>$result));
	echo $json;
 
	mysqli_close($con);    
?>
 
