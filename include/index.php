<?php 
	include"head.php";
	include "mysqli_connect.php";
	include"siderbar-a.php";
	include"function.php";
?>
 <div id="content" >
	<?php  
	if(isset($_GET['cid']) && filter_var($_GET['cid'] , FILTER_VALIDATE_INT , array('min_range' =>1))){
		$cid = $_GET['cid'];
	//neu ko xay ra loi thuc hien cau lenh truy van
		$q ="SELECT p.page_name,p.page_id ,LEFT(p.content,40) AS content,p.cat_id,CONCAT_WS( '', u.first_name, u.last_name) AS name, DATE_FORMAT( p.post_on, '%b %d,%y' ) AS date , u.user_id";
		$q .=" FROM pages AS p INNER JOIN users AS u USING ( user_id )";
		$q .=" WHERE p.cat_id ={$cid}";
		$q .=" ORDER BY date ASC  LIMIT 0, 10";
		$r = mysqli_query($dbc ,$q);
		confirm_query($r,$q);
		if(mysqli_num_rows($r)>0){
			while($page =mysqli_fetch_array($r ,MYSQLI_ASSOC)){
				echo"
					<div class='post'>
						<h2><a href='single_page.php?pid={$page['page_id']}'>{$page['page_name']}</a></h2>
						<p>".the_excerpt($page['content'])."...<a href = '#'>Read More</a></p>
						<p class='meta'><strong>Posted by:</strong>{$page['name']}<strong> On:</strong>{$page['date']}</p>
					</div>
				";
			}//End while loop
		}else{
			echo"<p>ko co bai nao trong category</p>";
		}//end if num rows $r
		}else if( isset($_GET['pid']) && filter_var($_GET['pid'] , FILTER_VALIDATE_INT , array('min_range' =>1))){
			$pid = $_GET['pid'];
			//thuc hien cau lenh truy van
			$q = "SELECT p.page_id, p.page_name, p.content,u.user_id, DATE_FORMAT( post_on, '%b %d ,%y' ) AS date, CONCAT_WS( '', u.first_name, u.last_name ) AS name, COUNT(c.comment_id )AS count ";
			$q .="FROM pages AS p ";
			$q .="INNER JOIN COMMENT AS c ";
			$q .="USING ( page_id ) ";
			$q .="INNER JOIN users AS u ";
			$q .="USING ( user_id ) ";
			$q .="WHERE p.page_id ={$pid} ";
			$q .=" ORDER BY date ASC LIMIT 0 , 10 ";
			$r = mysqli_query($dbc ,$q);
			confirm_query($r,$q);
			if(mysqli_num_rows($r)>0){
			//neu co ket qua tra ve
				while($p = mysqli_fetch_array($r ,MYSQLI_ASSOC)){
					echo"
						<div class ='post'>
							<h2><a href = 'single_page.php?pid={$p['page_id']}'>{$p['page_name']}</a></h2>
							<p class ='comments'><a href = 'single_page.php?pid={$p['page_id']}'>{$p['count']}</a></p>
							<p>".the_excerpt($p['content'])."</br>"."...<a href = '#'>Read More</a></p>
							<p class='meta'><strong>Posted by:</strong><a href = 'author.php?uid={$p['user_id']}'>{$p['name']}</a><strong> On:</strong>{$p['date']}</p>
						</div>
					";
				}//end while loop
			}//end nun rows $r
	}else {
	?>
    	 <h2>Welcome To izCMS</h2>
            <div>
                <p>
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                </p>
                
                <p>
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                </p>
                
                <p>
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                </p>
                
                <p>
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                </p>
                
                <p>
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                </p>
                
                <p>
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                </p>
            </div>
    <?php } ?>
</div><!--end content-->
<?php 
	include"siderbar-b.php";
	include"footer.php";
?>
