<?php
//xac dinh hang so cho dia chi tuyet doi
	define('BASE_URL' , 'http://localhost/cms/');
	define('LIVE', FALSE); // FALSE la dang trong qua trinh phat trien | TRUE la dang trong production
	//kiem tra co so du lieu
	 function confirm_query($result, $query) {
        global $dbc;
        if(!$result && !LIVE) {
            die("Query {$query} \n<br/> MySQL Error: " .mysqli_error($dbc));
        } 
    }

	//dieu huong trang dia chi web
	 function redirect_to($page = 'index.php') {
        $url = BASE_URL . $page;
        header("Location: $url");
        exit();
    }
	
	//rut ngan content xuog 400 ky tu
	 function the_excerpt($text, $string = 400) {
        $sanitized = htmlentities($text, ENT_COMPAT, 'UTF-8');
        if(strlen($sanitized) > $string) {
            $cutString = substr($sanitized,0,$string);
            $words = substr($sanitized, 0, strrpos($cutString, ' '));
            return $words;
        } else {
            return $sanitized;
        }
       
    } // End the_excerpt
	
	//isset bien get
	function validate_id($id){
		if(isset($id) && filter_var($id ,FILTER_VALIDATE_INT ,array('min_range'=>1))){
			$validate = $id;
			return $validate;
		}else{
			return NULL;
		}
	}
	function get_page_by_id($id){
	global $dbc;
		$q ="SELECT p.page_id, p.page_name,p.content, DATE_FORMAT( p.post_on,  '%b %d,%y' ) AS date, 
		CONCAT_WS(  '', u.first_name, u.last_name ) AS name";
		$q .=" FROM pages AS p";
		$q .=" INNER JOIN users AS u";
		$q .=" USING ( user_id ) ";
		$q .=" WHERE p.page_id ={$id}";
		$q .=" ORDER BY DATE ASC ";
		$q .=" LIMIT 0 , 30";
		$result =mysqli_query($dbc,$q);
		confirm_query($result,$q);
		return $result;
	}//ket thuc cau lenh truy van page
	
	function the_content($text){
		$clear = htmlentities($text, ENT_COMPAT,'utf-8');
		return str_replace(array("\r\n","\n"),array("<p>","</p>"),$clear);
	}//tao khoang cach cho content
	
	//tao captcha tu dong dua ra cau hoi
	function captcha_rand(){
		$captcha = array(
					1 =>array('question'=>'mot cong mot','answer'=>2),
					2 =>array('question'=>'hai cong hai ','answer'=>4),
					3 =>array('question'=>'ba cong ba','answer'=>6),
					4 =>array('question'=>'hai cong mot','answer'=>3),
					5 =>array('question'=>'hai cong ba','answer'=>5),
					6 =>array('question'=>'mot cong bon','answer'=>5),
					7 =>array('question'=>'ba cong nam','answer'=>8)
		);
		$rand_key = array_rand($captcha);
		$_SESSION['q'] = $captcha[$rand_key];
		return $question = $captcha[$rand_key]['question'];
	}
?>