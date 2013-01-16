<?php
require'dbmodel.php';

$pay =$_GET['pay'];
$bet =$_GET['bet'];
$table_id = 2;

Db::dbcon();
Db::setNumber($pay,$bet,2);
Db::dbClose();

$json_string = json_encode($pay);  

		echo $json_string;

?>