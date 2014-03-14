<?php 
	include "mysqli_connect.php";
	include"function.php";
	if( $pid = validate_id($_GET['pid'])){
	//neu hop le thuc hien cau lenh truy van
	$set = get_page_by_id($pid);
	//tao 1 mang luu cac du lieu vao de su dung
	$posts = array();
		if(mysqli_num_rows($set)>0){
			$page = mysqli_fetch_array($set ,MYSQLI_ASSOC);
				$title = $page['page_name'];
				$posts[] = array('page_name' =>$page['page_name'],'content'=>$page['content'],'post_on'=>$page['date'],'author'=>$page['name'],'page_id'=>$page['page_id']);	
		}else{echo "ban da sai";}
	}//kien tra thuoc tinh $_GET['pid']
	include"head.php";
	include"siderbar-a.php";
?>
 <div id="content">
 <?php
 	foreach($posts as $post ){
		echo "
			<div class='post'>
				<h2><a href='single_page.php?pid={$post['page_id']}'>{$post['page_name']}</a></h2>
				<p>".the_content($post['content'])."</p>
				<p class='meta'><strong>Posted by:</strong>{$post['author']}<strong> On:</strong>{$post['post_on']}</p>
			</div>
		
		";
	}
 ?>
 <?php include"comment_page.php"?>
 </div><!--end content-->
<?php 
	include"siderbar-b.php";
	include"footer.php";
?>
