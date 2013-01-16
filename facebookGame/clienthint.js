//<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
/*
* ajax sync process
*
*
*author chen lei
*/

				
				
//sync page if other user status changed
function syncPage(json){

	var user1Img = json.user1Imag;
	var user1Ok = json.user1Ok;
	
	var user2Img = json.user2Imag;
	var user2Ok = json.user2Ok;
	
	var user3Img = json.user3Imag;
	var user3Ok = json.user3Ok;
	
	var user4Img = json.user4Imag;
	var user4Ok = json.user4Ok;
	//alert(user4Ok);
	var user1Start = json.user1Start;
	var winner = json.winner;

	syncUser1Img(user1Img);	
	syncUser2Img(user2Img);
	syncUser3Img(user3Img);
	syncUser4Img(user4Img);
	
	syncUser1Ok(user1Ok);
	syncUser2Ok(user2Ok);
	syncUser3Ok(user3Ok);
	syncUser4Ok(user4Ok);
	
	
	if(user1Start==1){syncStart(winner);}


//	$("#result").text(user1Start);
//	$("#result").html(user1Ok);
  // $("#result").html(user1Start);
 	ajaxcheck();	
}

function syncStart(winner){
	$("#result").html("the winner is" + winner );///
}
///
function syncUser1Ok(userOk){
	if(userOk != null){
		$("#user1Status").html("ok");
	//	$("#result").html("userok" );
		
	}else{
		$("#user1Status").html("wait");
	}
}

function syncUser2Ok(userOk){
	if(userOk != null){
		$("#user2Status").html("ok");
	}else{
		$("#user2Status").html("wait");
	}
}

function syncUser3Ok(userOk){
	if(userOk != null){
		$("#user3Status").html("ok");
	}else{
		$("#user3Status").html("wait");
	}
}

function syncUser4Ok(userOk){
	if(userOk != null){
		$("#user4Status").html("ok");
	}else{
		$("#user4Status").html("wait");
	}
}
//// add a photo	
function syncUser1Img(name){
	if(name){
		//$("#result").html(name);
        $("#user1Img").attr("src","https://graph.facebook.com/" + name + "/picture?type=large");
        //$("#user1Img").attr("src","http://4.bp.blogspot.com/-M7FEplJcjOM/UE0-vV3HUcI/AAAAAAAAEBA/-nTyQ8spBJc/s1600/Number-One.png");
	}else{
		$("#user1Img").attr("src","");
	}

}

function syncUser2Img(name){
	if(name){
		$("#user2Img").attr("src","https://graph.facebook.com/" + name + "/picture?type=large");
	}else{
		$("#user2Img").attr("src","");
	}
}
function syncUser3Img(name){
	if(name){
		$("#user3Img").attr("src","https://graph.facebook.com/" + name + "/picture?type=large");
	}else{
		$("#user3Img").attr("src","");
	}
}
function syncUser4Img(name){
	if(name){
		$("#user4Img").attr("src","https://graph.facebook.com/" + name + "/picture?type=large");
	}else{
		$("#user4Img").attr("src","");
	}
}


function ajaxcheck() {
	/*$.ajax({
		url:'ajaxCheck.php',
		type:'post',
		dataType:'json',
		timeout:4000,
		data:'alert',
		error: ajaxcheck,
		success:syncPage
	});
   /*
  $("#user1Start").unbind();
  	$("#user1Start").click(function(){
                            $.ajax({
                               type: "POST",//请求的类型
                               url: "startButton.php",//接受请求的页面
                               data: "name=John&location=Boston",//传的数据
                              //成功后回调的函数 
                                success: function(msg){
                                 alert( "Data Saved: " + msg );
                               }
                            });
                         });
  
 $("#reset").unbind();           
  
  $("#reset").click(function(){
						    $.ajax({
						       type: "POST",//请求的类型
						       url: "reset.php",//接受请求的页面
						       data: "name=John&location=Boston",//传的数据
						      //成功后回调的函数 
						        success: function(msg){
						         alert( "Data Saved: " + msg );
						       }
						    });
     });
*/
	
	
   
                         
}

$(document).ready(function(){
 ajaxcheck();

});
// ajaxcheck();


