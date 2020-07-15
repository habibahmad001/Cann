<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url()."public/";?>user/css/login.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url()."public/";?>user/css/bootstrap.css">

<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>

<body>
<form action="<?php echo $pageName;?>/login" method="post" enctype="multipart/form-data" name="frm">
<div id="widget_preview" class="open login">

  
  

  
    <!-- start changes --->
  <div class="login-wrap col-lg-6 col-md-6 col-sm-12">



    <div class="login-inner">

       <h3>Alredy User</h3>
       <div class="form">
 
	<input type="text" name="userName" id="userName" placeholder="Username">
	<input type="password" name="password" id="password" placeholder="Password">
	<input type="submit" name="GetUserLogin" id="GetUserLogin" value="Login" />

</div>
  </div>
  
  
</div>
<div class="login-wrap col-lg-6 col-md-6 col-sm-12">



    <div class="login-inner">

       <h3>New User</h3>
       <div class="form">

	<input type="text" name="name" id="name" placeholder="Name">
	<input type="text" name="email" id="email" placeholder="Email">
    <input type="text" name="aemail" id="aemail" placeholder="Adword Email">
	<input type="submit" name="manual" id="manual" value="Manual" /><input type="submit" name="api" id="api" value="API" />

</div>
  </div>
  
  
</div>


  <!-- start changes --->
</div>
</form>
</body>
</html>