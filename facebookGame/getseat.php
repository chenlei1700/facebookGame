<?php

include ("dbmodel.php");
$db=new Db();
$db->dbcon();

$db->setName($_GET["id"],$_GET["table"]);
//Db::dbcon();
//Db::setNumber((int)$_GET["pay"],(int)$_GET["bet"],1);
echo "success";
?>