//<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
/*
* ajax sync process
*
*
*author chen lei
*/

				
				
//sync page if other user status changed
function syncPage(json){
	
/*	FB.init({
	    appId: '437142433006131', //这里设置你申请的APP ID
	    status: true,
	    cookie: true,
	    xfbml: true,
	    oauth: true
	}); 
		
	FB.api({ method: 'fql.query', query: 'SELECT uid FROM user WHERE uid=me()' }, function(response) {
        var user = response[0];
        if (user == undefined) {
            $('span.loading').replaceWith('<span>Sorry, please try again.</span>');
        } else {
            facebookId = user.uid; 
    	}
    });
    */
    
	var user1Img = json.user1Imag;
	var user1Ok = json.user1Ok;
	var user1Decision = json.user1Decision;
	
	var user2Img = json.user2Imag;
	var user2Ok = json.user2Ok;
	var user2Decision = json.user2Decision;
	
	var user3Img = json.user3Imag;
	var user3Ok = json.user3Ok;
	var user3Decision = json.user3Decision;
	
	var user4Img = json.user4Imag;
	var user4Ok = json.user4Ok;
	var user4Decision = json.user4Decision;
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
	
	syncUser1Decision(user1Decision);
	syncUser2Decision(user2Decision);
	syncUser3Decision(user3Decision);
	syncUser4Decision(user4Decision);
	
	
	if(user1Start==1){syncStart(winner);}


//	$("#result").text(user1Start);
//	$("#result").html(user1Ok);
   // $("#result").html(facebookId);
 	ajaxcheck();	
}

function syncUser1Decision(decision){
	if(decision != null){
			$("#user1Decision").val(decision);
	}else{
			$("#user1Decision").val("");
	}
}

function syncUser2Decision(decision){
	if(decision != null){
			$("#user2Decision").val(decision);
	}else{
			$("#user2Decision").val("");
	}
}

function syncUser3Decision(decision){
	if(decision != null){
			$("#user3Decision").val(decision);
	}else{
			$("#user3Decision").val("");
	}
}

function syncUser4Decision(decision){
	if(decision != null){
			$("#user4Decision").val(decision);
	}else{
			$("#user4Decision").val("");
	}
}

function syncStart(winner){
	
	var str = new Array();
	str=winner.split('+');//注split可以用字符或字符串分割  
  
	//alert(str.split(',')[1]);  
	 $("#result").html("the winner is  ");/// 
	 	 //alert(str[1]);
	  
	for(var i=1;i<=str.length;i++)   
	  
	{   
		//alert(str.length);
	  	var string = new String();
	  	string = "#img_win"+i;
        //alert(string);
		$(string).attr("src","https://graph.facebook.com/" + str[i-1] + "/picture?type=small");
	  
	}  
	
	
	
	$.ajax({
		url:'finalResult.php',
		type:'post',
		dataType:'json',
		timeout:4000,
		success:function(json){
			$("#u1").attr("src","https://graph.facebook.com/" + json.u1 + "/picture?type=small");
			$("#u2").attr("src","https://graph.facebook.com/" + json.u2 + "/picture?type=small");
			$("#u3").attr("src","https://graph.facebook.com/" + json.u3 + "/picture?type=small");
			$("#u4").attr("src","https://graph.facebook.com/" + json.u4 + "/picture?type=small");
			
			$("#u1_pay").html(json.u1_pay);
			$("#u2_pay").html(json.u2_pay);
			$("#u3_pay").html(json.u3_pay);
			$("#u4_pay").html(json.u4_pay);
			
			$("#u1_bet").html(json.u1_bet);
			$("#u2_bet").html(json.u2_bet);
			$("#u3_bet").html(json.u3_bet);
			$("#u4_bet").html(json.u4_bet);
			
			$("#t_pay").html(json.t_pay);
				
		}
	});
		
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
	$.ajax({
		url:'ajaxCheck.php',
		type:'post',
		dataType:'json',
		timeout:4000,
		data:'alert',
		error: ajaxcheck,
		success:syncPage
	});
		
  
                         
}

/////////////////////////////////////////////////////////////////////////////////
 function checkResponse(response) {
    if (!response.authResponse) {
        //scope是获取权限的意思,你可以获取其他的例如:offline_access, publish_stream等权限
        FB.login(handleSessionResponse,{ scope:'email'});
    } else {
        //这个方法就是获取Facebook用户信息的方法
        retrieveProfiles();
    }
}
//次方法是用来处理Facebook登陆的回话相应.
function handleSessionResponse(response) {
    if (!response.authResponse) {
        return;
    } else {
        //这个方法就是获取Facebook用户信息的方法
        retrieveProfiles();
    }
}
   
/////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
 
/*	var facebookId = '';

		

    
    
	$("#user1Frame").unbind();    
    $("#user1Frame").click(function(){
                    FB.getLoginStatus(checkResponse);
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "saveId1.php",//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    
    $("#user2Frame").unbind();    
    $("#user2Frame").click(function(){
                    
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "saveId2.php?facebookId="+facebookId,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    
    $("#user3Frame").unbind();    
    $("#user3Frame").click(function(){
                    
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "saveId3.php?facebookId="+facebookId,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    
    $("#user4Frame").unbind();    
    $("#user4Frame").click(function(){
                    
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "saveId4.php?facebookId="+facebookId,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    */
////////////////////////////
    $("#user1Start").unbind();
  $("#user1Start").click(function(){
                            $.ajax({
                               type: "POST",//请求的类型
                               url: "startButton.php",//接受请求的页面
                               data: "name=John&location=Boston",//传的数据
                              //成功后回调的函数 
                                success: function(msg){
                                // alert( "Data Saved: " + msg );
                               }
                            });
                         });
   
  $("#reset").unbind();
   $("#reset").click(function(){
						    $.ajax({
						       type: "POST",//请求的类型
						       url: "reset.php",//接受请求的页面
						       data: "name=John&location=Boston",//传的数据
						       dataType:'json'
						      //成功后回调的函数 
						       // success: function(msg){
						       //  	$("#result").html(msg);
						       //}
						    });
 });
  
   
    $("#user1OK").unbind();

 
	$("#user1OK").click(function(){
                    var pay1 = $("#user1Pay").val();
                    var bet1 = $("#user1Bet").val();
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "ok1.php?pay="+pay1+"&bet="+bet1,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    
    
    $("#user2OK").unbind();
    $("#user2OK").click(function(){
                    var pay2 = $("#user2Pay").val();
                    var bet2 = $("#user2Bet").val();
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "ok2.php?pay="+pay2+"&bet="+bet2,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    
	$("#user3OK").unbind();
    $("#user3OK").click(function(){
                    var pay3 = $("#user3Pay").val();
                    var bet3 = $("#user3Bet").val();
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "ok3.php?pay="+pay3+"&bet="+bet3,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    $("#user4OK").unbind();    
    $("#user4OK").click(function(){
                    var pay4 = $("#user4Pay").val();
                    var bet4 = $("#user4Bet").val();
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "ok4.php?pay="+pay4+"&bet="+bet4,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
/////////////////////////////////////////dicision
   $("#user1DecisionOK").unbind();    
    $("#user1DecisionOK").click(function(){
                    
                    var decision = $("#user1Decision").val();
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "decision1.php?decision="+decision,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    
       $("#user2DecisionOK").unbind();    
    $("#user2DecisionOK").click(function(){
                    
                    var decision = $("#user2Decision").val();
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "decision2.php?decision="+decision,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    
       $("#user3DecisionOK").unbind();    
    $("#user3DecisionOK").click(function(){
                    
                    var decision = $("#user3Decision").val();
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "decision3.php?decision="+decision,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    
       $("#user4DecisionOK").unbind();    
    $("#user4DecisionOK").click(function(){
                    
                    var decision = $("#user4Decision").val();
                    $.ajax({
						       type: "GET",//请求的类型
						       url: "decision4.php?decision="+decision,//接受请求的页面
                                //date:"pay=11",
						      //成功后回调的函数 
						        success: function(msg){
						         //$("#result").html(msg);
						       }
						    });
    });
    
    

  
  
ajaxcheck();
});
// ajaxcheck();
