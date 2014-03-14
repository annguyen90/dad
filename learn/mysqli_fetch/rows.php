<?php include"../include/mysqli_connect.php" ?>
<?php
//
	$q = "SELECT `cat_id`,`cat_name`,position FROM `categories`";
	$r = mysqli_query($dbc , $q);
	while($rows = mysqli_fetch_assoc($r))
	echo $rows['cat_id']."  position:".$rows['cat_name']."<br>";
?>