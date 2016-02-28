<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
{literal}
<script type="application/javascript">
	function login()
	{
	  var login = document.getElementById("Enviar");
	  var logout = document.getElementById("logout");
	  var login_text = document.getElementById("login_text");
	  var password_text = document.getElementById("password_text");
	  if(login.style.visibility == 'visible' && logout.style.visibility == 'hidden')
	  {
	  	login.style.visibility = 'hidden';
		logout.style.visibility = 'visible';
		login_text.style.visibility = 'hidden';
		password_text.style.visibility = 'hidden';

	  }else if(login.style.visibility == 'hidden' && logout.style.visibility == 'visible')
	  {
	  	login.style.visibility = 'visible';
		logout.style.visibility = 'hidden';
		login_text.style.visibility = 'visible';
		password_text.style.visibility = 'visible';
	  }
	  
	}
</script>

   <style type="text/css">
	* {margin:0;padding:0}
	html, body {height: 100%;}
	
	#contenedor {
		width:1440px; 
		background-color:#FFF8F0;
		text-align:left; 
	}
	
	#top{
		position:absolute;
		min-height:160px;
		width:1440px;
		background-image:url(/imag/My_Header_Image.png);
		left: 0px; 
		top: 0px;
		overflow: visible;
	}
	
	#login{
		background-image:url(/imag/Login.png); 
		width:95px; 
		min-height:33px; 
		position:absolute; 
		left: 1195px; 
		top: 12px;		
	}
	
	#logout{
		background-image:url(/imag/Login.png); 
		width:95px; 
		min-height:33px; 
		position:absolute; 
		left: 1295px; 
		top: 12px;
	}
	
	#lateral{
		position:absolute;
		background-color:#00FFFF;
		width:248px;
		min-height:500px;
		left: 0px;
		top: 161px;
	}
	
	#norm{
		position: absolute;
		width:1100px;
		min-height:500px;
		z-index: 1;
		left: 250px;
		top: 161px;
		overflow: auto;
		border : 1px solid #788DA2;
		text-align:center;
	}

	#footer{
		position:absolute; 
		left:0px; 
		top:660px; 
		z-index:2;
		min-height:80px;
		width:1440px;
		background-image:url(/imag/Bottom_Base.png);
		overflow:hidden;
	}
	
	#estil_1{


		background-color:#00FFFF;
		margin-left:420px;	
		width:220px;	
	}
	#estil_2{


		background-color:#00FFFF;
		margin-left:420px;	
		width:318px;	
	}
	
	
</style>

{/literal}
</head>
<body>

		<div id="top">
				<form action="/SocialSecondHand/home" method="post" enctype="multipart/form-data">
                        <input type="text" name="Mail" style="position:absolute; left: 805px; top: 14px;"/>      
                        <input type="text" name="Password" style="position:absolute; left: 1003px; top: 14px;"/>          	
						<h3><input name="Enviar" type="submit" id="Enviar" value="Login" style="background-image:url(Login.png); width:95px; height:33px; position:absolute; left: 1195px; top: 12px; visibility:visible;" onclick="login();"/></h3>                    	
				</form>
				<a href="/SocialSecondHand/home"><div id="index" style="width:184px; height:117px; position:absolute; left: 61px; top: 34px;"></div></a>		
				<div id="logout" style="visibility:hidden;" onclick="login()";>	
					<h3 style="text-align:center; margin-top:4px;"> Logout </h3>	
				</div>  	  	
				<div style="position:absolute; left: 805px; top: 14px;">
					<textarea id="login_text" name="login" cols="20" rows="1"></textarea>
				</div>
				<div style="position:absolute; left: 1003px; top: 14px;">
					<textarea id="password_text" name="password" cols="20" rows="1"></textarea>
				</div>
				<div style="background-image:url(/imag/Boto_Header.png); width:192px; height:38px; position:absolute; left: 280px; top: 123px;">
					<a href="/login"><h3 style="text-align:center; margin-top:7px;"> Login </h3></a>
				</div>	
				<div style="background-image:url(/imag/Boto_Header.png); width:192px; height:38px; position:absolute; left: 475px; top: 123px;">
					<a href="/crea"><h3 style="text-align:center; margin-top:7px;"> Producte </h3></a>
				</div>
				<div style="background-image:url(/imag/Boto_Header.png); width:192px; height:38px; position:absolute; left: 670px; top: 123px;">
					<a href="/llista"><h3 style="text-align:center; margin-top:7px;"> Llista </h3></a>
				</div>	
				<div style="background-image:url(/imag/Boto_Header.png); width:192px; height:38px; position:absolute; left: 865px; top: 123px;">
					<a href="/registre"><h3 style="text-align:center; margin-top:7px;"> Registre </h3></a>
				</div>		
		</div>

