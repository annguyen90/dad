<?php include"../include/mysqli_connect.php" ?>

<?php

//ham lay ket qua ra bag viec su dung ASSOC
	 $q = "SELECT `cat_id`,`cat_name`,position FROM `categories`";
     $r = mysqli_query($dbc,$q) or die("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
	while( $kq = mysqli_fetch_array($r, MYSQLI_ASSOC))
	{printf("ID: %s  Name: %s<br>", $kq["cat_id"], $kq["cat_name"]); }
//ham lay ket qua bang viec su dung NUM
	$q = "SELECT `cat_id`,`cat_name`,position FROM `categories`";
	$r = mysqli_query($dbc , $q);
	while($num = mysqli_fetch_array($r , MYSQLI_NUM)){
		echo"ID:$num[0]Name:$num[1]"."<br>";
	}

?>