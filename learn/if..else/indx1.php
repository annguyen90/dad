<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
if($_SERVER['REQUEST_METHOD'] =='POST'){
	//tao 1 man ghi cac loi
	$errors = array();
	if(!empty($_POST['so1'])){
		$a = $_POST['so1'];
	}else{$errors[] ='a';}
	if(!empty($_POST['so2'])){
		$b = $_POST['so2'];
	}else{$errors[] = 'b';}
	
}else{
	$maseger = "sai";
}//End main if
?>
<body>
<form action="" method="post" name="tinhtoan">
<?php if(isset($maseger)) echo $maseger ;?>
	<div>
    	<label for="mun1">nhap so thu nhat:
        <?php if(isset($errors)&& in_array('a',$errors)) echo "ban ko dc de trong";?>
        </label>
        <input type="text" name="so1" />
    </div>
    <div>
    	<label for="mun2">nhap so thu hai:
        <?php if(isset($errors)&& in_array('b',$errors)) echo "ban ko dc de trong";?>
        </label>
        <input type="text" name="so2" />
    </div>
    <input type="submit" value="tinh hieu" name="hieu"/>
</form>
</body>
</html>
