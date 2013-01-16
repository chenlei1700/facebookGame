<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <link href="style.css" rel="stylesheet" type="text/css" />
 <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
  <script type='text/javascript' src='control.js'></script>
  <script src="//connect.facebook.net/en_US/all.js"></script>
  <?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
require_once('../facebookSdk/src/facebook.php');

  $config = array(
    'appId' =>'437142433006131',
    'secret' =>'692a026b44caa455b11b6a1a519de6e2',
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
?>
</head>

<body>
	
  
    <script >
      
      
var xmlHttp;
function showHint(url)
{

xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request")
  return
  } 
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
} 

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 //alert("success");
 } 
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 // Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
      
    </script> 
     <?php
    if($user_id) {
     
      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
       
        $user_profile = $facebook->api('/me','GET');
        //        foreach($user_profile as $key=>$value){
        //      echo    $key."\t".$value."\n"; }
        //echo  $user_profile['link'];
      
        $picurl=implode("/",array("https://graph.facebook.com",$user_profile['id'],"picture?type=large"));
        //echo $picurl;
        // echo "<p>https://graph.facebook.com/echo $user_profile['id']  ";

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $params = array(
         'scope' => 'read_stream, friends_likes',
          'redirect_uri' =>'http://apps.facebook.com/makeadecision/test2.php'
        );

        $loginUrl = $facebook->getLoginUrl($params);
        echo 'Please <a  target="_top" href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $params = array(
        'scope'  => 'read_stream, friends_likes',
        'redirect_uri'  => 'http://apps.facebook.com/makeadecision/test2.php',
        );
      $login_url = $facebook->getLoginUrl($params);
      echo  $login_url;
       echo 'Please <a target="_top" href="' . $login_url . '">logins.</a>';
      // echo  '<a  target="_top" href="https://www.facebook.com/dialog/oauth">ss</a>';
    }

  ?>
   <script  type="text/javascript">
   
    function getseat1(){
       if(document.getElementById("hidval").value== 1){
          alert("you have benn seated ");        
       }else{        
    document.getElementById("hidval").value=1;
    var sa="<?php  echo $picurl  ?>";
    sa="url("+sa;
    sa=sa+")";
         //document.getElementById("user1Img").style.background=sa;
         //document.getElementById("user1Img").style.backgroundColor="black";
         //document.getElementById("user1Img").style.backgroundRepeat="no-repeat"; 
     var url="getseat.php"
     url=url+"?table="+"1"
     url=url+"&id="+"<?php  echo  $user_profile['id']  ?>"
      showHint(url);
   }
  }
   function getseat2(){
       if(document.getElementById("hidval").value== 1){
          alert("you have benn seated ");        
       }else{        
    document.getElementById("hidval").value=1;
    var sa="<?php  echo $picurl  ?>";
    sa="url("+sa;
    sa=sa+")";
    //document.getElementById("user2Img").style.background=sa;
    //document.getElementById("user2Img").style.backgroundColor="black";
     var url="getseat.php"
     url=url+"?table="+"2"
     url=url+"&id="+"<?php  echo  $user_profile['id']  ?>"
      showHint(url);
   }
  }
      function getseat3(){
       if(document.getElementById("hidval").value== 1){
          alert("you have benn seated ");        
       }else{        
    document.getElementById("hidval").value=1;
    var sa="<?php  echo $picurl  ?>";
    sa="url("+sa;
    sa=sa+")";
    //document.getElementById("user3Img").style.background=sa;
    //document.getElementById("user3Img").style.backgroundColor="black";
     var url="getseat.php"
     url=url+"?table="+"3"
     url=url+"&id="+"<?php  echo  $user_profile['id']  ?>"
      showHint(url);
   }
  }
      function getseat4(){
       if(document.getElementById("hidval").value== 1){
          alert("you have benn seated ");        
       }else{        
    document.getElementById("hidval").value=1;
    var sa="<?php  echo $picurl  ?>";
    sa="url("+sa;
    sa=sa+")";
    //document.getElementById("user4Img").style.background=sa;
    //document.getElementById("user4Img").style.backgroundColor="black";
     var url="getseat.php"
     url=url+"?table="+"4"
     url=url+"&id="+"<?php  echo  $user_profile['id']  ?>"
      showHint(url);
   }
  }
    
  </script>
    <input id="hidval" type="hidden"  value=0  />

<form id="form2">
  <div id="wrapper_all">
	<div id="wrapper">
      
    
    	<div id="container_top">
        	<div id="user1Frame" class="user_1" >
            	<div class="user_sub_L" >
               <div onclick="javascript:getseat1()"><img id="user1Img" class="user_img" ></img></div>
                
                <table width="125" border="1" align="left" class="user_input_table">
  <tr>
    <td><p class="user_label_L">pay</p></td>
    <td><p class="user_label_R">bet</p></td>
  </tr>
  <tr>
    <td><input id="user1Pay" type="text" name="pay" class="user_input_L"></td>
    <td><input id="user1Bet" type="text" name="bet" class="user_input_R"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center" ><input id="user1OK" type="button" class="button" value="OK"></td>
  </tr>
</table>


                </div>
                
                
                <div class="user_sub_R">
                  <textarea id="user1Decision" type="text" name="desc" class="user_desc"></textarea>
                 <div id="user1Status" class="user_status">123</div>
                  <input id="user1DecisionOK" type="button"></input>
                
                
                
                </div>
            	
               
                
                
            
            </div>
        
        	
        	<div id="user2Frame" class="user_2" >
                      	<div class="user_sub_L">
                 <div onclick="javascript:getseat2()"><img id="user2Img" class="user_img"></img></div>
                
                <table width="125" border="1" align="left" class="user_input_table">
  <tr>
    <td><p class="user_label_L">pay</p></td>
    <td><p class="user_label_R">bet</p></td>
  </tr>
  <tr>
    <td><input id="user2Pay" type="text" name="pay" class="user_input_L"></td>
    <td><input id="user2Bet" type="text" name="bet" class="user_input_R"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input id="user2OK" class="button" type="button" value="OK"></td>
  </tr>
</table>


                </div>
                
                
                <div class="user_sub_R">
                  <textarea id="user2Decision" type="text" name="desc" class="user_desc"></textarea>
                 <div id="user2Status" class="user_status">123</div>
                <input id="user2DecisionOK" type="button"></input>
                
                
                </div>
            
            
            </div>
        
        
        </div>
        
        <div id="container_bottom">
         	<div id="user3Frame" class="user_3" >
                        	<div class="user_sub_L">
                 <div onclick="javascript:getseat3()"><img id="user3Img" class="user_img"></img></div>
                
                <table width="125" border="1" align="left" class="user_input_table">
  <tr>
    <td><p class="user_label_L">pay</p></td>
    <td><p class="user_label_R">bet</p></td>
  </tr>
  <tr>
    <td><input id="user3Pay" type="text" name="pay" class="user_input_L"></td>
    <td><input id="user3Bet" type="text" name="bet" class="user_input_R"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input id="user3OK" class="button" type="button" value="OK"></td>
  </tr>
</table>


                </div>
                
                
                <div class="user_sub_R">
                  <textarea id="user3Decision" type="text" name="desc" class="user_desc"></textarea>
                 <div id="user3Status" class="user_status">123</div>
                  <input id="user3DecisionOK" type="button"></input>
                
                
                
                </div>
            
            
            
            
            </div>
        
        	
        	<div id="user4Frame" class="user_4" >
                        	<div class="user_sub_L">
                 <div onclick="javascript:getseat4()"><img id="user4Img" class="user_img"></img></div>
                
                <table width="125" border="1" align="left" class="user_input_table">
  <tr>
    <td><p class="user_label_L">pay</p></td>
    <td><p class="user_label_R">bet</p></td>
  </tr>
  <tr>
    <td><input id="user4Pay" type="text" name="pay" class="user_input_L"></td>
    <td><input id="user4Bet" type="text" name="bet" class="user_input_R"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input id="user4OK" class="button" type="button" value="OK"></td>
  </tr>
</table>


                </div>
                
                
                <div class="user_sub_R">
                  <textarea id="user4Decision" type="text" name="desc" class="user_desc"></textarea>
                 <div id="user4Status" class="user_status">123</div>
                  <input id="user4DecisionOK" type="button"></input>
                
                
                
                </div>
            
            
            
            </div>
        
                <p>&nbsp;</p>


        
        
        
        </div>
    
    
    
    
    
    </div>
<div id="sidebar">
  <div id="header_L"><img src="img/top_logo.gif" width="510" height="60" /></div>
    <div id="header_R">
      <input type="submit" class="button_start" id="user1Start" value="Start">
      <input type ="button"  id="reset" value ="Reset" class="button_reset"></input>
      </div> 
    
<div id="footer_R">
<table id="t_result" width="300" border="1"  bordercolor="#333333">
  <tr>
    <td id="user">ゲーム結果</td>
    <td>pay</td>
    <td>bet</td>
  </tr>
  <tr>
    <td><img id="u1"></img></td>
    <td id="u1_pay">&nbsp;</td>
    <td id="u1_bet">&nbsp;</td>
  </tr>
  <tr>
    <td><img id="u2"></img></td>
    <td id="u2_pay">&nbsp;</td>
    <td id="u2_bet">&nbsp;</td>
  </tr>
  <tr>
    <td ><img id="u3"></img></td>
    <td id="u3_pay">&nbsp;</td>
    <td id="u3_bet">&nbsp;</td>
  </tr>
  <tr>
    <td><img id="u4"></img></td>
    <td id="u4_pay">&nbsp;</td>
    <td id="u4_bet">&nbsp;</td>
  </tr>
  <tr>
    <td>total</td>
    <td id="t_pay">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<div id="result"></div>
      <img id="img_win1"></img>
         <img id="img_win2"></img>
          <img id="img_win3"></img>
          <img id="img_win4"></img>
       
</div>
</div>
</div>
</div>
</form>



  
</body>
</html>