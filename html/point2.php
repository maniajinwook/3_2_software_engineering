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

	$name = $_POST['name'];
	$phnum = $_POST['phnum'];  
	$password = $_POST['password'];
	
	#check blank
	if($name == '' || $phnum == '' || $password == '')
	{
		echo '빈칸을 채우십시오';
	}

	else
	{
		$sql = "SELECT * FROM UserInfo WHERE phnum='$phnum'";

		$check = mysqli_fetch_array(mysqli_query($conn,$sql));

		#check
		if(isset($check))
		{
			echo '휴대폰 번호가 이미 등록되어있습니다';
		}

		else
		{ 
			$sql = "INSERT INTO UserInfo (name,phnum,password) VALUES('$name','$phnum','$password')";

			#success
			if(mysqli_query($conn,$sql))
			{
				echo '가입 성공';
			}

			#fail
			else
			{
				echo '다시 시도해주십시오';
			}
		}

		mysqli_close($conn);
	}

#---------------------------------------------------------------------------------------------------------------------------------
	#$res = mysqli_query($conn,"select * from UserInfo");
	#$result = array();  

	#while($row = mysqli_fetch_array($res))
	#{  
	#	if($phnum == array('phnum'=>$row[0]))
	#		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	#}
	#$ouccurences =array_count_values($phnum);
	#echo $occurences[4];
#---------------------------------------------------------------------------------------------------------------------------------
	#$result = mysqli_query($conn,"insert into UserInfo (name, phnum, password) values ('$name','$phnum','$password')");
  
	#if($result)
	#{  
	#	echo 'success';  
	#}  
	
	#else
	#{  
	#	echo 'failure';  
	#}  

	#mysqli_close($conn);
#---------------------------------------------------------------------------------------------------------------------------------
?> 