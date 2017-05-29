<?php  
	$host = "localhost";
	$user = "root";
	$password = "123123";
	$DB_name = "ourteamdb";

	#define connect location
	$conn = mysqli_connect($host, $user, $password, $DB_name);
 
	mysqli_set_charset($conn,"utf8");
  
	if(mysqli_connect_errno($conn))  
	{  
		echo "Failed to connect to MySQL: " . mysqli_connect_error();  
	}

	$phnum = $_POST['phnum'];  
	$point = $_POST['point'];
	
	#check blank
	#if($phnum == '' || $point == '')
	#{
	#	echo '빈칸을 채우십시오';
	#} 

	#else
	#{
		$sql = "UPDATE UserInfo SET point= point+'$point' WHERE phnum= '$phnum'";

		$check = mysqli_fetch_array(mysqli_query($conn,$sql));

		#check phone number success
		if(isset($sql))
		{
			echo 'point';
		}

		#no such phone number
		else
		{
			echo 'It is not registerd phone number';
		}

		mysqli_close($conn);
	#}
?> 