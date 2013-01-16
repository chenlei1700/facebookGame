<?php
//insert user1's date
//author chenlei

require'dbmodel.php';

$facebookId =$_GET['facebookId'];

$table_id = 3;

Db::dbcon();
Db::setName($facebookId,$table_id);
Db::dbClose();

$json_string = json_encode($pay);  

		echo $json_string;

?>