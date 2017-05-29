<?php
	$conn = mysql_connect('localhost', 'root', '123123');

	if($conn)
	{
		echo"Success";
	}

	else
	{
		echo"Fail";
	}
?>
