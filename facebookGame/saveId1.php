<?php
//insert user1's date
//author chenlei

require'dbmodel.php';
require_once('../facebookSdk/src/facebook.php');

  $config = array(
    'appId' =>'437142433006131',
    'secret' =>'692a026b44caa455b11b6a1a519de6e2',
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
  
  Db::dbcon();
	Db::setName($user_id,$table_id);
	Db::dbClose();
?>
