<?php
$errorMessage = getMessage('error_message');

$success_message = getMessage('success_message');

$info_message = getMessage('info_message');

if($errorMessage != ''){$msg = '<div class="error_message">'.$errorMessage.'</div>'; }

if($success_message != ''){$msg = '<div class="success_message">'.$success_message.'</div>'; }

if($info_message != ''){$msg = '<div class="info_message">'.$info_message.'</div>'; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $pageTitle;?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	

    <!-- MetisMenu CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/bower_components/morrisjs/morris.css" rel="stylesheet">
	 <link href="<?php echo $this->config->base_url()."public/";?>user/css/line-g.css" rel="stylesheet">
	 <link href="<?php echo $this->config->base_url()."public/";?>user/css/pie.css" rel="stylesheet">
	 <link href="<?php echo $this->config->base_url()."public/";?>user/css/progress.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url()."public/";?>user/css/animated.css" rel="stylesheet" type="text/css">
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/jquery/dist/jquery.min.js"></script>
    <script language="javascript" src="<?php echo $this->config->base_url()."public/";?>user/js/function.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.pie {
background:
 h1 {
    text-align : center; 
    color : white;
    font-family: "Arial", arial, sans-serif;
  }

  section {
    background : white;
    margin : auto; 
    width : 400px; 
    height : 300px;
    padding-top : 50px;
    padding-left : 150px;
    border : 2px dashed rgba(#000,0.4);
    @include border-radius(5px);
  }

</style>
</head>

<body>
<form action="<?php echo $pageName;?>/update" method="post" enctype="multipart/form-data" name="frm">
<div id="wrapper">
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->config->base_url();?>user/home"><img src="<?php echo $this->config->base_url()."public/";?>user/images/logo.png"></a>
            </div>
            <!-- /.navbar-header -->

             <?php $this->load->view('user/includes/top-nav');?>
            <!-- /.navbar-top-links -->
           
            <?php $this->load->view('user/includes/left-pan');?>
            <!-- /.navbar-static-side -->
        </nav>
<table width="60%" border="0" style="float: right; border: 1px solid rgb(204, 204, 204); margin: 2% 14% 0px 0px;">
  <thead style='background-color: #ebedf0; color: #565e66; font-family: "Lucida Sans","Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;'>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><h1 style="padding: 0px 0px 0px 20%;"><?php echo $heading;?></h1></td>
    <td>&nbsp;</td>
  </tr>
  </thead>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><?php if(!empty($msg)) { ?><div style="margin: 0px 0px 0px 24%; width: 40%; padding: 6px; background-color: pink; text-align: center; color: red; font-family: arial; font-weight: bold;"><?php echo $msg;?></div><?php }?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">First Name : &nbsp;</td>
    <td align="left"><input type="text" name="fname" id="fname" value="<?php echo $QUERY[0]->fname;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">Last Name :&nbsp;</td>
    <td align="left"><input type="text" name="lname" id="lname" value="<?php echo $QUERY[0]->lname;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">Email*  :&nbsp;</td>
    <td align="left"><input type="text" name="email" id="email" value="<?php echo $QUERY[0]->email;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">Address :&nbsp;</td>
    <td align="left"><input type="text" name="add" id="add" value="<?php echo $QUERY[0]->add;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">Sex :&nbsp;</td>
    <td align="left">
    <select name="sex" id="select">
      <option>--- Select Gender ---</option>
      <option value="1" <?php if($QUERY[0]->sex == 1) echo 'selected="selected"';?>>Male</option>
      <option value="2" <?php if($QUERY[0]->sex == 2) echo 'selected="selected"';?>>Female</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">User Name* :&nbsp;</td>
    <td align="left"><input type="text" name="uname" id="uname" value="<?php echo $QUERY[0]->uname;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">Password* :&nbsp;</td>
    <td align="left"><input type="password" name="pass" id="pass" value="<?php echo $QUERY[0]->pass;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">Phone No :&nbsp;</td>
    <td align="left"><input type="text" name="phone" id="phone" value="<?php echo $QUERY[0]->phone;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="submit" class="btn btn-lg btn-primary btn-block" style="width: 17%;" name="save" id="save" value="Update" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="60%" border="0" style="float: right; border: 1px solid rgb(204, 204, 204); margin: 4% 14% 0px 0px;">
  <thead style='background-color: #ebedf0; color: #565e66; font-family: "Lucida Sans","Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;'>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><h1 style="padding: 0px 0px 0px 27%;">Membership Plans</h1></td>
    <td>&nbsp;</td>
  </tr>
  </thead>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">Current: Free plane Seleted.</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>

<table width="60%" border="0" style="float: right; border: 1px solid rgb(204, 204, 204); margin: 4% 14% 0px 0px; margin-bottom:40px;">
  <thead style='background-color: #ebedf0; color: #565e66; font-family: "Lucida Sans","Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;'>
  <tr>
    <td colspan="4"><h1 style="padding: 0px 0px 0px 18%;">Google Account Information</h1></td>
    </tr>
  </thead>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC" width="25%"><strong>Name</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="25%"><strong>ID</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="25%"><strong>Type</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="25%"><strong>Action</strong></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php if((bool)$AQUERY > 0) foreach($AQUERY as $v) {?>
    <tr>
      <td align="center" width="25%"><?php echo $v->name;?></td>
      <td align="center" width="25%"><?php echo $v->customerid;?></td>
      <td align="center" width="25%"><?php if($v->parantid == 0) echo "MCC"; else echo "Single";?></td>
      <td align="center" width="25%"><input name="delete" type="button" style="width: 50%;" onclick="javascript:return confrm('<?php echo $pageName;?>','<?php echo $v->id;?>');" value="Delete" /></td>
    </tr>
    <tr>
      <td height="10"></td>
      <td height="10"></td>
      <td height="10"></td>
      <td height="10"></td>
    </tr>
    <?php } else {?>
    <tr>
    	<td colspan="4" align="center">No Account Listed</td>
    </tr>
    <?php }?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><input type="button" onclick="javascript:window.location.href = '../adword-api/web-app/';" class="btn btn-lg btn-primary btn-block" style="width: 40%; float: left; margin: 0px 0px 0px 85px;" name="update" id="update" value="Update" />
        <input type="button" onclick="javascript:window.location.href = '../adword-api/web-app/';" class="btn btn-lg btn-primary btn-block" style="width: 40%; float: left; margin: 0px 15px;" name="add" id="add" value="Add New" /></td>
      </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
</div>
</form>



 

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/excanvas.min.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/jquery.flot.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/jquery.flot.time.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/js/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $this->config->base_url()."public/";?>user/dist/js/sb-admin-2.js"></script>
	<script type="text/javascript">
	function confrm(url,id)
	{
		if(confirm("Are you sure, you want to Delete?"))
		{
			 window.location.href = url+'/delete/'+id+'/'+url;
			return true;
		}
		else
			return false;
	}
$( '.progress-pie-chart' ).append( '<div class="ppc-progress"><div class="ppc-progress-fill"></div></div><div class="ppc-percents"><div class="pcc-percents-wrapper"><span>%</span></div></div></div>' );

$(function(){
  var $ppc = $('.progress-pie-chart'),
    percent = parseInt($ppc.data('percent')),
    deg = 360*percent/100;
  if (percent > 50) {
    $ppc.addClass('gt-50');
  }
  $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
  $('.ppc-percents span').html(percent+'%');
});
</script>
</body>
</html>