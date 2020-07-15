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
	$title = $QUERY[0]->title;
	$is_answer = $QUERY[0]->is_answer;
	$qqid = $QUERY[0]->qqid;
}
else
{
	$title = "";
	$is_answer = "";
	$qqid = $cid;
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

  answer {
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
<form action="<?php if(isset($ID)) $ID = $ID; else $ID = ""; echo site_url("/user/" . $pageName . "/update/" . $ID . "/" . $qqid);?>" method="post" enctype="multipart/form-data" name="frm">
<div id="wrapper">
<input name="pagename" id="pagename" type="hidden" value="<?php echo site_url("/user/" . $pageName);?>" />
<input name="catid" id="catid" type="hidden" value="<?php echo $qqid;?>" />
<table width="60%" border="0" class="edit_course" style="float: right; border: 1px solid rgb(204, 204, 204); margin: 2% 19% 0px 0px; <?php if(!strpos($_SERVER['REQUEST_URI'], "/Edit/")) echo "display:none;";?>">
  <thead style='background-color: #ebedf0; color: #565e66; font-family: "Lucida Sans","Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;'>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><h1>Edit Answer</h1></td>
    <td style="text-align:right;" align="right" valign="top"><a href="javascript:void(0);" onclick="javascript:closewindow('<?php echo site_url("/user/answer/cid/" . $qqid); ?>');">[X]</a></td>
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
    <td align="right">Title : &nbsp;</td>
    <td align="left"><input type="text" name="title" id="title" value="<?php echo $title;?>" /></td>
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
    <td align="right">Order :&nbsp;</td>
    <td align="left"><input <?php if (!(strcmp($is_answer,"TRUE"))) {echo "checked=\"checked\"";} ?> type="checkbox" name="is_answer" id="is_answer" value="TRUE" style="width: 40px;" /><input name="qqid" type="hidden" value="<?php echo $qqid; ?>" /></td>
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
    <td colspan="3" align="center"><h1>Answer Listing</h1></td>
    </tr>
  </thead>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC" width="25%"><strong>Title</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="25%"><strong>Is Answer</strong></td>
    <td align="center" bgcolor="#CCCCCC" width="25%"><input type="button" class="btn btn-xs btn-primary" name="add" id="add" value="Add New" />&nbsp;&nbsp;&nbsp;<strong>Action</strong></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php if((bool)$AQUERY > 0) foreach($AQUERY as $v) {?>
    <tr>
      <td align="center" width="25%"><?php echo $v->title;?></td>
      <td align="center" width="25%"><?php echo $v->is_answer;?></td>
      <td align="center" width="25%"><input type="button" class="btn btn-xs btn-success" name="answer" onclick="window.location.href = '<?php echo site_url("user/answer") . "/cid/" .$v->qaid; ?>';" id="content" value="Content" />
      <input type="button" class="btn btn-xs btn-info" name="update" onclick="window.location.href = '<?php echo site_url("user/answer") . "/Edit/" . $v->qaid . "/" . $qqid; ?>';" id="update" value="Update" />
      <input name="delete" type="button" class="btn btn-xs btn-danger" onclick="javascript:return confrm('<?php echo $qqid;?>','<?php echo $v->qaid;?>');" value="Delete" /></td>
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
      <td colspan="4">
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
<script language="javascript">
	function confrm(url,id)
	{
		if(confirm("Are you sure, you want to Delete?"))
		{
			 window.location.href = 'http://localhost/can/user/answer/delete/'+id+'/'+url;
			return true;
		}
		else
			return false;
	}
</script>
</body>
</html>