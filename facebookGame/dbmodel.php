<?php
class Db{
 public static function dbcon(){
      @mysql_connect("175.184.33.52","chqc4o8_al4","T83Uye2L")
        or die("連絡失敗");
      @mysql_select_db("chqc4o8_al4")
        or die("选择的数据库不存在");
      mysql_query("SET NAMES utf8");
	  $myquery = @mysql_query("select * from tables");
   }
  public static function dbClose(){
    mysql_close();
  }
  
   public static function setNumber($pay,$bet,$table_id){
     
    if($pay>=0&&$pay<6){
      $upd_sql = "update tables set pay = '$pay',bet = '$bet' where table_id = '$table_id'";
      $myquery = mysql_query($upd_sql);
    }
    if($pay>=6)
    {
	  $upd_sql = "update tables set pay = 5,bet = '$bet' where table_id = '$table_id'";
      $myquery = mysql_query($upd_sql);
    }
    if($pay<0)
    {
      $upd_sql = "update tables set pay = 0,bet = '$bet' where table_id = '$table_id'";
      $myquery = mysql_query($upd_sql);
    }
  }
  
  public static function setDone(){
	  $upd_sql = "update tables set done = 1 where table_id = 1";
	  $myquery = mysql_query($upd_sql);
  }
  
  public static function setName($name,$table_id){
	  $upd_sql = "update tables set username = '$name' where table_id = '$table_id'";
	  $myquery = mysql_query($upd_sql);
  }
  
 /* public static function setWinner($table_id){
      $upd_sql = "update tables set winner = 1 where table_id = '$table_id'";
	  $myquery = mysql_query($upd_sql);
  }*/

 public static function setComment($comment,$table_id){
	  $upd_sql = "update tables set comment = '$comment' where table_id = '$table_id'";
	  $myquery = mysql_query($upd_sql);
 } 
 public static function getComment($table_id){
      $query = "select * from tables where table_id = '$table_id'";
	  $myquery = mysql_query($query);
	  $comment = mysql_result($myquery,0,5);
	  return($comment);
 }

  public static function paySum(){
      $query = "select * from tables";
      $myquery = mysql_query($query);
	  $sum = mysql_result($myquery,0,2)+mysql_result($myquery,1,2)+mysql_result($myquery,2,2)+mysql_result($myquery,3,2);
	  return($sum);
  }
 public static function getWinner(){
	  $query = "select * from tables";
      $myquery = mysql_query($query);
	  $bets = array();
	  for($i=0;$i<4;$i++){
	  $bets[$i] = mysql_result($myquery,$i,3);
	  }
	  //echo Db::paySum();
	  $sum = Db::paySum();
	  $abs1 = abs($bets[0]-$sum);
	  $abs2 = abs($bets[1]-$sum);
	  $abs3 = abs($bets[2]-$sum);
	  $abs4 = abs($bets[3]-$sum);
	  $absarr = array
	  (array('abs'=>$abs1,'name'=>mysql_result($myquery,0,1)),array('abs'=>$abs2,'name'=>mysql_result($myquery,1,1)),
		  array('abs'=>$abs3,'name'=>mysql_result($myquery,2,1)),array('abs'=>$abs4,'name'=>mysql_result($myquery,3,1)) 
	  );
	  foreach ($absarr as $key => $row) {
            $abs[$key] = $row['abs'];
            $name[$key] = $row['name'];
      }
	  array_multisort($abs, SORT_ASC,$absarr);
	  $str = array();
	  $j = 1;
	  $str[0]=$absarr[0]['name'];
	  $result= $str[0];

	  for($i=1;$i<4;$i++){
		  if($absarr[0]['abs']==$absarr[$i]['abs']){
			   $str[$j] = $absarr[$i]['name'];
			   $result=$result.'+'.$str[$j];
			   $j++;
		  }
		  
	  }
	  return($result);
	  /*Db::setWinner($absarr[0]['id']);
	  if($absarr[0]['abs']==$absarr[1]['abs'])
	 {
	  Db::setWinner($absarr[1]['id']);
	  }
      if($absarr[0]['abs']==$absarr[2]['abs'])
	 {
	  Db::setWinner($absarr[2]['id']);
	  }
	  if($absarr[0]['abs']==$absarr[3]['abs'])
	 {
	  Db::setWinner($absarr[3]['id']);
	 }*/
	  


 }
   public static function getNumberPay($table_id){
	  $query = "select * from tables where table_id = '$table_id'";
	  $myquery = mysql_query($query);
	  $pay = mysql_result($myquery,0,2);
	  return($pay);
  }
  
  public static function getNumberBet($table_id){
	  $query = "select * from tables where table_id = '$table_id'";
	  $myquery = mysql_query($query);
	  $bet = mysql_result($myquery,0,3);
	  return($bet);
	  
  }
  
  public static function getDone(){
      $query = "select * from tables where table_id = 1";
	  $myquery = mysql_query($query);
	  $done = mysql_result($myquery,0,4);
	  return($done);
  }
  
 /* public static function getWinner(){
      $query = "select * from tables";
	  $myquery = mysql_query($query);

	  //$winner = mysql_result($myquery,0,5);
	  //return($winner);
      $str = array();

	  $j = 0;
	  for($i=0;$i<4;$i++){
		  if(mysql_result($myquery,$i,5)==1){
			   $str[$j] = mysql_result($myquery,$i,1);
			   $j++;
		  }
	  }
	  //$winners = $str[0].$str[1].$str[2].$str[3];
	  /*$winners = " ";
	  for($i=0;$i<4;$i++){
	  if(mysql_result($myquery,$i,5)==1){
           $winners = $winners.mysql_result($myquery,$i,1);
	  }
	  }


    return ($str);
  }*/
  
  public static function getName($table_id){
      $query = "select * from tables where table_id = '$table_id'";
	  $myquery = mysql_query($query);
	  $name = mysql_result($myquery,0,1);
	  return($name);
  }
  
  public static function reset(){
      for($i = 1;$i<=4;$i++){
      $query = "update tables set username = NULL,pay = NULL,bet = NUll,done = 0,comment = NULL where table_id = '$i'";
	  $myquery = mysql_query($query);
      }
  }
 


}
?>
