<?php
require'dbmodel.php';



Db::dbcon();


	$u1 = Db::getName(1);
	$u2 = Db::getName(2);
	$u3 = Db::getName(3);
	$u4 = Db::getName(4);

	$u1_pay = Db::getNumberPay(1);
	$u2_pay = Db::getNumberPay(2);
	$u3_pay = Db::getNumberPay(3);
	$u4_pay = Db::getNumberPay(4);
	
	$u1_bet = Db::getNumberBet(1);
	$u2_bet = Db::getNumberBet(2);
	$u3_bet = Db::getNumberBet(3);
	$u4_bet = Db::getNumberBet(4);

	$t_pay = Db::paySum();

	
	
//Db::cal_pet();


	
		$arr = array(  
		    'u1' => 	$u1,  
		    'u2' => 	$u2, 
		    'u3' => 	$u3,
            'u4' => 	$u4,  
            
           	'u1_pay' => 	$u1_pay,  
		    'u2_pay' => 	$u2_pay, 
		    'u3_pay' => 	$u3_pay,
            'u4_pay' => 	$u4_pay,  
            	
		    'u1_bet' => 	$u1_bet,  
		    'u2_bet' => 	$u2_bet, 
		    'u3_bet' => 	$u3_bet,
            'u4_bet' => 	$u4_bet, 
            
            't_pay'		=> 	$t_pay	    
		    
		);  

		$json_string = json_encode($arr);  

		echo $json_string;


?>