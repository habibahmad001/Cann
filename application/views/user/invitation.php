<?php
$errorMessage = getMessage('error_message');

$success_message = getMessage('success_message');

$info_message = getMessage('info_message');

if($errorMessage != ''){$msg = '<div class="error_message">'.$errorMessage.'</div>'; }

if($success_message != ''){$msg = '<div class="success_message">'.$success_message.'</div>'; }

if($info_message != ''){$msg = '<div class="info_message">'.$info_message.'</div>'; }

///////////// Edit ///////////////////
if( count($QUERY) > 0 ) 
{
	$status = $QUERY[0]->status;
	$email = $QUERY[0]->email;
}
else
{
	$status = "";
	$email = "";
}
///////////// Edit ///////////////////
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
<form action="<?php if(isset($ID)) $ID = $ID; else $ID = ""; echo site_url("/user/" . $pageName . "/update/" . $ID);?>" method="post" enctype="multipart/form-data" name="frm">
<div id="wrapper">
<input name="pagename" id="pagename" type="hidden" value="<?php echo site_url("/user/" . $pageName);?>" />
<table width="60%" border="0" class="edit_course" style="float: right; border: 1px solid rgb(204, 204, 204); margin: 2% 19% 0px 0px; <?php if(!strpos($_SERVER['REQUEST_URI'], "/Edit/")) echo "display:none;";?>">
  <thead style='background-color: #ebedf0; color: #565e66; font-family: "Lucida Sans","Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;'>
  <tr>
    <td width="4%">&nbsp;</td>
    <td colspan="2" align="center"><h1>Edit Invitation</h1></td>
    <td width="10%" align="right" valign="top" style="text-align:right;"><a href="javascript:void(0);" onclick="javascript:closewindow('<?php echo site_url("/user/invitation"); ?>');">[X]</a></td>
  </tr>
  </thead>
  <tr>
    <td>&nbsp;</td>
    <td width="31%">&nbsp;</td>
    <td width="55%">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><?php if(!empty($msg)) { ?><div style="width: 50%; padding: 6px; background-color: pink; text-align: center; color: red; font-family: arial; font-weight: bold;"><?php echo $msg;?></div><?php }?></td>
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
    <td align="right">Email : &nbsp;</td>
    <td align="left"><input type="text" name="email" id="email" value="<?php echo $email;?>" /></td>
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
    <td align="right">Status : &nbsp;</td>
    <td align="left">
        <select name="status">
          <option value="pending" <?php if($status == "pending") echo 'selected="selected"';?>>Pending</option>
          <option value="accepted" <?php if($status == "accepted") echo 'selected="selected"';?>>Accepted</option>
          <option value="rejected" <?php if($status == "rejected") echo 'selected="selected"';?>>Rejected</option>
        </select>
    </td>
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
<table width="60%" border="0" style="float: right; border: 1px solid rgb(204, 204, 204); margin: 4% 19% 0px 0px; margin-bottom:40px;">
  <thead style='background-color: #ebedf0; color: #565e66; font-family: "Lucida Sans","Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;'>
  <tr>
    <td colspan="3" align="center"><h1>Invitation Listing</h1></td>
    </tr>
  </thead>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC" width="30%"><strong>Email</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="30%"><strong>Status</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="40%"><input type="button" class="btn btn-xs btn-primary" name="add" id="add" value="Add New" />&nbsp;&nbsp;&nbsp;<strong>Action</strong></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php if((bool)$AQUERY > 0) foreach($AQUERY as $v) {?>
    <tr>
      <td align="center" width="30%"><?php echo $v->email;?></td>
      <td align="center" width="30%" style="text-transform:capitalize;"><?php echo $v->status;?></td>
      <td align="center" width="40%"><input type="button" class="btn btn-xs btn-success" name="invitation-btn" onclick="window.location.href = '<?php echo site_url("user/invitation") . "/send_invitation/" . urlencode( base64_encode($v->email) ); ?>';" id="invitation-btn" value="Send Invitation" />
      <input type="button" class="btn btn-xs btn-info" name="update" onclick="window.location.href = '<?php echo site_url("user/invitation") . "/Edit/" .$v->ci_id; ?>';" id="update" value="Update" />
      <input name="delete" type="button" class="btn btn-xs btn-danger" onclick="javascript:return confrm('<?php echo $pageName;?>','<?php echo $v->ci_id;?>');" value="Delete" /></td>
    </tr>
    <tr>
      <td height="10"></td>
      <td height="10"></td>
      <td height="10"></td>
    </tr>
    <?php } else {?>
    <tr>
    	<td colspan="3" align="center">No Account Listed</td>
    </tr>
    <?php }?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">
        </td>
      </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
</div>
</form>
</body>
</html>