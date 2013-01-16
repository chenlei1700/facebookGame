<?php
//require 'dbmodel.php';
include ("dbmodel.php");
//$q=$_GET["pay"];
$db=new DB;
$db->dbcon();

$db->setNumber($_GET["pay"],$_GET["bet"],1);
//Db::dbcon();
//Db::setNumber((int)$_GET["pay"],(int)$_GET["bet"],1);
echo "success";
?>