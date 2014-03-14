 <div id="content-container">
        <div id="section-navigation">
    	   <ul class="navi">
           <?php 
		   		//su dung GET de cay cat_id
				if(isset($_GET['cid']) && filter_var($_GET['cid'] , FILTER_VALIDATE_INT , array('min_range' =>1))){
					$cid = $_GET['cid'];
					$pid =NULL;
				}elseif(isset($_GET['pid']) && filter_var($_GET['pid'] ,FILTER_VALIDATE_INT , array('min_range'=>1))){
					$pid = $_GET['pid'];
					$cid = NULL;
				}else{
					$cid = NULL;
					$pid = NULL;
				
				}//End if isset $_GET['cid']
				//su dung GET lay page_id
				if(isset($_GET['pid']) && filter_var($_GET['pid'] ,FILTER_VALIDATE_INT , array('min_range'=>1))){
					$pid = $_GET['pid'];
				}else{
					$pid = NULL;
				}
		   		//ham truy van co so du lieu lay cat name
		   		$q = "SELECT cat_id , cat_name FROM categories";
				$r = mysqli_query($dbc,$q) or die ("Query {$q} \n<br/> MySQL Error: " .mysqli_error($dbc));
				while($cat = mysqli_fetch_array($r, MYSQLI_ASSOC)){
					echo "<li><a href='index.php?cid={$cat['cat_id']}'";
						if($cat['cat_id'] == $cid )
							echo "class = 'selected'";	
					echo ">".$cat['cat_name'];
					echo "</a>";
					//ham truy van csdl lay ra page mane
					$q1 = "SELECT page_id , page_name FROM `pages` WHERE cat_id = {$cat['cat_id']}  ORDER BY position ASC";
					$r1 = mysqli_query($dbc , $q1) or die ("Query {$q1} \n<br/> MySQL Error: " .mysqli_error($dbc));
					echo "<ul class = 'pages'>";
					while($page_name = mysqli_fetch_array($r1 , MYSQLI_ASSOC)){
						echo "<li><a href = 'index.php?pid={$page_name['page_id']}' ";
							if($page_name['page_id'] == $pid)
								echo "class = 'selected'";
						echo ">".$page_name['page_name'];
						echo "</a></li>";
					}
					// End while page name
					echo "</ul>";
					echo"</li>";
				}//end while cat name
		   ?>
          <!-- <li><a href="#">Home</a>
                <ul class="pages">
                   <li><a href="#">Home</a></li>
                   <li><a href="#">About</a></li>
                   <li><a href="#">Clients</a></li>
                   <li><a href="#">Contact Us</a></li>
                </ul>
           </li>
           <li><a href="#">About</a></li>
           <li><a href="#">Clients</a>
                <ul class="pages">
                   <li><a href="#">Home</a></li>
                   <li><a href="#">About</a></li>
                   <li><a href="#">Clients</a></li>
                   <li><a href="#">Contact Us</a></li>
                </ul>
           </li>
           <li><a href="#">Contact Us</a></li>
    	   </ul>-->
    </div><!--end section-navigation-->
