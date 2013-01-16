<?php
require'dbmodel.php';

$pay = $_POST['pay'];
$bet = $_POST['bet'];
$id = $_POST['id'];

print_r($pay);

		$arr = array(  
		    'pay' => $pay,  		    
		);  


		$json_string = json_encode($arr); 
	echo $json_string;

Db::dbcon();
Db::setNumber(1,2,1);
Db::dbClose();
?>
