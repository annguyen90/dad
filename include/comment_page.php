<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//tao mang luu lai loi
		$errors = array();
		//ktra truong name
		if(!empty($_POST['name'])){
			$name = mysqli_real_escape_string($dbc,strip_tags( $_POST['name']));
		}else{ $errors[] = 'name';}
		
		//ktra truong email
		if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$email = mysqli_real_escape_string($dbc,strip_tags($_POST['email']));
		}else{ $errors[] = 'email';}
		
		//ktra truong comments
		if(!empty($_POST['comment'])){
			$comment = mysqli_real_escape_string($dbc,strip_tags($_POST['comment']));
		}else{ $errors[] = 'comment';}
		
		//ktra truong captcha
		if(isset($_POST['captcha']) && trim($_POST['captcha']) != $_SESSION['q']['answer']){
		$errors[] = 'sai';}
		
		//neu khong xay ra loi
		if(empty($errors)){
			//thuc hien cau lenh truy van co so du lieu
			$q = "INSERT INTO `comment`( page_id,`author`, `email`, `comment`, `comment_date`) VALUES ('{$pid}','{$name}','{$email}','{$comment}',NOW())";
			//$q ="INSERT INTO  `comment` ( page_id,  `author` ,  `email` ,  `comment` ,  `comment_date` ) ";
			//$q .=" VALUES ( 1,  'an',  'annguyen@gmailcom',  'toi rat thich bai nay,no rat bo ich', NOW( ) )";
			$r = mysqli_query($dbc,$q);
			confirm_query($r,$q);
			//neu them duoc vao co so du lieu 
			if(mysqli_affected_rows($dbc) ==1){
				$maseger = "thanh cong";
			}
		}else{ 
		//khong ket noi duoc co so du lieu
		echo "ko ket noi dc csdl";
	}
	}
?>

<?php
	//xuat du lieu ra man hinh
	$q = "SELECT author,comment,DATE_FORMAT(comment_date,'%d %b ,%y') AS date FROM comment WHERE page_id = '{$pid}'";
	$r = mysqli_query($dbc , $q);
	confirm_query($r ,$q);
	if(mysqli_num_rows($r) >0){
		//neu co ket qua tra ve thuc hien vog lap
		echo "<ol id ='disscuss'>";
		while(list($author,$comment,$date) = mysqli_fetch_array($r ,MYSQLI_NUM)){
			echo"<li>
				<p class ='author'>{$author}</p>
				<p class='comment_sec'>{$comment}</p>
				<p class='date'>{$date}</p>
			</li>";
		}//End while loop
		echo"</ol>";
	}//End if affected rows
?>
<form action='' method="post" name="comment_form">
<?php if(!empty($maseger)) echo $maseger ; ?>
	<fieldset>
    	<legend>Comment</legend>
    	<div>
        	<label for="name">Name:<samp class="required">*</samp>
            	<?php if(isset($errors) && in_array('name',$errors)) echo "ban ko dc de trong ten"; ?>
            </label>
            <input type="text" name="name"  id="name"/>
        </div>
        
        <div>
        	<label for="email">Email:<samp class="required">*</samp>
            <?php if(isset($errors) && in_array('email',$errors)) echo "ban ko dc de trong email"; ?>
            </label>
            <input type="text" name="email"  id="email"/>
        </div>
        
        <div>
        	<label for="comment">Your Comment:<samp class="required">*</samp>
            <?php if(isset($errors) && in_array('comment',$errors)) echo "ko dc d trong comment";?>
            </label>
            <div id="comment"><textarea name="comment" rows="10" cols="50" tabindex="3"></textarea></div>
        </div>
        
        <div>
        	<label for="captcha">Vui long tra loi cau hoi bang so :<?php echo captcha_rand() ;?><samp class="required">*</samp>
            	<?php if(isset($errors) && in_array('sai',$errors)) echo "sai ket qua tra loi lai";?>
            </label>
            <input type="text" name="captcha"  id="captcha"/ tabindex="4">
        </div>
        <input type="submit" value="comment" name="submit"/>
    </fieldset>
</form>