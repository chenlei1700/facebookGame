<?php
require'dbmodel.php';

$pay =$_GET['pay'];
$bet =$_GET['bet'];
$table_id = 4;

Db::dbcon();
Db::setNumber($pay,$bet,$table_id);
Db::dbClose();

$json_string = json_encode($pay);  

		echo $json_string;

?>