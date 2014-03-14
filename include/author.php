<?php
	if(isset($_GET['uid']) && filter_var($_GET['uid'] , FILTER_VALIDATE_INT , array('min_range' =>1))){
		$uid = $_GET['uid'];
		//neu ton tai uid thuc hien cau lenh truy van
		
		$q = "SELECT p.page_id, p.page_name, p.content, u.user_id, CONCAT_WS( '', first_name, last_name ) AS name, DATE_FORMAT( post_on, '%d %b,%y' ) AS time";
		$q .= " FROM pages AS p";
		$q .= " INNER JOIN users AS u";
		$q .= " USING ( user_id )";
		$q .= " WHERE page_id =$uid ";
		$r mysqli_query($dbc , $q );
		confirm_query($r,$q);
		
	}
?>