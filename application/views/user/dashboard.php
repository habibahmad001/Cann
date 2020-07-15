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
<form action="<?php if(isset($ID)) $ID = $ID; else $ID = ""; echo site_url("/user/" . $pageName . "/update/" . $ID);?>" method="post" enctype="multipart/form-data" name="frm">
<div id="wrapper">
<input name="pagename" id="pagename" type="hidden" value="<?php echo site_url("/user/" . $pageName);?>" />
<?php if($Id == 1) {?>
<table width="60%" border="0" style="float: right; border: 1px solid rgb(204, 204, 204); margin: 4% 19% 0px 0px; margin-bottom:40px;">
  <thead style='background-color: #ebedf0; color: #565e66; font-family: "Lucida Sans","Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;'>
  <tr>
    <td><a href="<?php echo site_url("./user/dashboard/view_dashboard") . "/1";?>">Courses Owner</a></td>
    <td><a href="<?php echo site_url("./user/dashboard/view_dashboard") . "/2";?>">Course Admin</a></td>
    <td><a href="<?php echo site_url("./user/dashboard/view_dashboard") . "/3";?>">Course User</a></td>
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
    <td align="center" bgcolor="#CCCCCC" width="20%"><strong>Title</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="20%"><strong>Sumary</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="20%"><strong>Description</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="40%">&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php if((bool)$COURSE_OWNER_QUERY > 0) foreach($COURSE_OWNER_QUERY as $v) {?>
    <tr>
      <td align="center" width="20%"><?php echo $v->title;?></td>
      <td align="center" width="20%"><?php echo $v->sumary;?></td>
      <td align="center" width="20%"><?php echo $v->description;?></td>
      <td align="center" width="40%">&nbsp;</td>
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
      <td colspan="4">
        </td>
      </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
<?php } else if($Id == 2) {?>
<table width="60%" border="0" style="float: right; border: 1px solid rgb(204, 204, 204); margin: 4% 19% 0px 0px; margin-bottom:40px;">
  <thead style='background-color: #ebedf0; color: #565e66; font-family: "Lucida Sans","Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;'>
  <tr>
    <td><a href="<?php echo site_url("./user/dashboard/view_dashboard") . "/1";?>">Courses Owner</a></td>
    <td><a href="<?php echo site_url("./user/dashboard/view_dashboard") . "/2";?>">Course Admin</a></td>
    <td><a href="<?php echo site_url("./user/dashboard/view_dashboard") . "/3";?>">Course User</a></td>
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
    <td align="center" bgcolor="#CCCCCC" width="20%"><strong>Title</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="20%"><strong>Sumary</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="20%"><strong>Description</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="40%">&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php if((bool)$COURSE_ADMIN_QUERY > 0) foreach($COURSE_ADMIN_QUERY as $v) {?>
    <tr>
      <td align="center" width="20%"><?php echo $v->title;?></td>
      <td align="center" width="20%"><?php echo $v->sumary;?></td>
      <td align="center" width="20%"><?php echo $v->description;?></td>
      <td align="center" width="40%">&nbsp;</td>
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
      <td colspan="4">
        </td>
      </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
<?php } else if($Id == 3) {?>
<table width="60%" border="0" style="float: right; border: 1px solid rgb(204, 204, 204); margin: 4% 19% 0px 0px; margin-bottom:40px;">
  <thead style='background-color: #ebedf0; color: #565e66; font-family: "Lucida Sans","Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;'>
  <tr>
    <td><a href="<?php echo site_url("./user/dashboard/view_dashboard") . "/1";?>">Courses Owner</a></td>
    <td><a href="<?php echo site_url("./user/dashboard/view_dashboard") . "/2";?>">Course Admin</a></td>
    <td><a href="<?php echo site_url("./user/dashboard/view_dashboard") . "/3";?>">Course User</a></td>
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
    <td align="center" bgcolor="#CCCCCC" width="20%"><strong>Title</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="20%"><strong>Sumary</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="20%"><strong>Description</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="40%">&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php if((bool)$COURSE_USER_QUERY > 0) foreach($COURSE_USER_QUERY as $v) {?>
    <tr>
      <td align="center" width="20%"><?php echo $v->title;?></td>
      <td align="center" width="20%"><?php echo $v->sumary;?></td>
      <td align="center" width="20%"><?php echo $v->description;?></td>
      <td align="center" width="40%">&nbsp;</td>
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
      <td colspan="4">
        </td>
      </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
<?php } ?>
</div>
</form>
</body>
</html>