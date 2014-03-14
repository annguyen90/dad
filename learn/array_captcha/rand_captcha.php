<?php 
	$mang = array(
				1 =>array('cauhoi'=>'hai cong hai','traloi'=>4),
				2=>array('cauhoi'=>'mot cong mot','traloi'=>2),
				3=>array('cauhoi'=>'bon cong bon','traloi'=>8)
	);
	$mangnh = array_rand($mang);
	$a = $mang[$mangnh];
	echo $a
	//$q = $mang[$mangnh]['cauhoi'];
	//echo $q;
?>