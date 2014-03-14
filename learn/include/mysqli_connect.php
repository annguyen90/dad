<?php 
	//ket noi co so du lieu
	$dbc = mysqli_connect('localhost','root','','cms');
	//neu ket noi khong thanh cong in ket qua ra man hinh
	if(!$dbc)
		trigger_error('not connect DB:'.mysqli_connect_error());
		else{
		//dat phuong thuc ket noi la utf-8
			mysqli_set_charset($dbc,'utf-8');
		}
?>