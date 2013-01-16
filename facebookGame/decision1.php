<?php
require'dbmodel.php';

$decision =$_GET['decision'];

$table_id = 1;

Db::dbcon();
Db::setComment($decision,$table_id);
Db::dbClose();

$json_string = json_encode($decision);  

		echo $json_string;

?>