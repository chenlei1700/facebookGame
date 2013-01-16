<?php
require'dbmodel.php';



Db::dbcon();


	$user1Imag = Db::getName(1);
	$user2Imag = Db::getName(2);
	$user3Imag = Db::getName(3);
	$user4Imag = Db::getName(4);

	$user1Ok = Db::getNumberPay(1);
	$user2Ok = Db::getNumberPay(2);
	$user3Ok = Db::getNumberPay(3);
	$user4Ok = Db::getNumberPay(4);

	$user1Decision = Db::getComment(1);
	$user2Decision = Db::getComment(2);
	$user3Decision = Db::getComment(3);
	$user4Decision = Db::getComment(4);
	
	$user1Start = Db::getDone();
	
//Db::cal_pet();
	$winner = Db::getWinner();


	
		$arr = array(  
		    'user1Imag' => 	$user1Imag,  
		    'user1Ok' 	=> 	$user1Ok, 
		    'user1Decision' => 	$user1Decision,
		    	
            'user2Imag' => 	$user2Imag ,  
		    'user2Ok' 	=> 	$user2Ok, 
		    'user2Decision' => 	$user2Decision,
		    	
		    'user3Imag' => 	$user3Imag,  
		    'user3Ok' 	=> 	$user3Ok,
		    'user3Decision' => 	$user3Decision, 
		    	
		    'user4Imag' =>	$user4Imag,  
		    'user4Ok'	=> 	$user4Ok, 
		    'user4Decision' => 	$user4Decision,
		    
		    'user1Start' => $user1Start, 
		    	
		    'winner' 	=>$winner	
		    
		    
		);  


/*
		$arr = array(  
		    'user1Imag' => 	1,  
		    'user1Ok' 	=> 	1,  
		    	
            'user2Imag' => 	1,  
		    'user2Ok' 	=> 	1, 
		    	
		    'user3Imag' => 	1,  
		    'user3Ok' 	=> 	1, 
		    	
		    'user4Imag' =>	1,  
		    'user4Ok'	=> 	1, 
		    
		    'user1Start' => 1, 
		    	
		    'winner' 	=>	1
		    
		    
		);
*/
//Db:reset();
		$json_string = json_encode($arr);  

		echo $json_string;


?>