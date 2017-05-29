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
	$password = $_POST['password'];
	
	#check blank
	if($phnum == '' || $password == '')
	{
		echo '빈칸을 채우십시오';
	} 

	else
	{
		$sql = "SELECT * FROM UserInfo WHERE phnum='$phnum' AND password='$password'";

		$check = mysqli_fetch_array(mysqli_query($conn,$sql));

		#check phone number success
		if(isset($check))
		{
			echo 'success';
		}

		#no such phone number
		else
		{
			echo 'wrong';
		}

		mysqli_close($conn);
	}
?> 