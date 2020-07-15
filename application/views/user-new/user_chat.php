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
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->config->base_url()."public/";?>user/css/table.css">
    
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
<form action="<?php echo $this->config->base_url()."user/".$pageName;?>/add" method="post" id="frm" enctype="multipart/form-data" name="frm">
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
        <div id="chat" style="float: right; margin: 4% 0.5% 0 0%; padding: 1%;">
        <div class="col-lg-4">
        <table width="100%" border="0">
        <thead>
          <tr>
            <td  class="">
                <h3>List of Users<input name="uid" type="hidden" value="<?php echo $uid;?>" /> </h3>  
          </td>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td class="" >
                <ul>
                <?php if($QUERY != "") {foreach($QUERY as $row) { ?>
                        <li>
                            <a href="<?php echo $this->config->base_url()."user/chat/showchat/".$row->id;?>"><strong><?php echo $row->uname;//$row->fname." ".$row->lname."<br />"; ?></strong></a>
                            <span class="details">
                            Name: <?php echo $row->fname." ".$row->lname; ?><br />
                            Email: <?php echo $row->email; ?>
                            </span>
                        </li>
                    <?php } }?>
                </ul>
            </td>
          </tr>
          </tbody>
        </table>
		</div>
 		 <div class="col-lg-8">
							<table cellpadding="0" cellspacing="0" border="0">
								<thead>
									<tr align="left">
										<td width="661" class="">
											<h3>List of Messages</h3>
									  </td>
										
										
									</tr>
								</thead>
								<tbody>
									<tr align="left">
										<td class="">
											<ul>
                                            <?php if($QUERY2 > 0) {foreach($QUERY2 as $row2) { ?>
											<li class="<?php if($row2->fromm == $this->session->userdata('agentId')) echo "you"; else echo "me";?>">
												<?php echo $row2->message;?>
											</li>
                                            <?php }}?>
											<li><input name="send" type="hidden" value="1" />
												<textarea cols="" rows="" name="msgtxt"></textarea><button onclick="javascript:document.frm.submit();">Send</button>
											</li>
											
												

											</ul>
										</td>
										
										
									</tr>
								
									


								</tbody>
							</table>
                            </div>
						</div>
        <!--<div class="outer_box">
            <div class="left_pan">
            	<table width="100%" border="0">
                  <tr>
                    <td><input name="uid" type="hidden" value="<?php echo $uid;?>" />List Of Users</td>
                  </tr>
				  <?php if($QUERY != "") {foreach($QUERY as $row) { ?>
                  <tr>
                    <td><a href="<?php echo $this->config->base_url()."user/chat/showchat/".$row->id;?>"><?php echo $row->uname;//$row->fname." ".$row->lname."<br />"; ?></a></td>
                  </tr>
				  <?php } }?>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
            </div>
            <div class="right_pan">
            <table width="100%" border="0">
                  <tr>
                    <td>Messages List</td>
                  </tr>
				  <?php if($QUERY2 > 0) {foreach($QUERY2 as $row2) { ?>
                  <tr>
                    <td><?php echo $row2->message;?></td>
                  </tr>
				  <?php }}?>
                  <tr>
                    <td><textarea name="msgtxt"></textarea>&nbsp;&nbsp;<input type="submit" name="send" id="send" value="Send" style="float: right; margin: 2% 80% 0px 0px;" /></td>
                    
                  </tr>
               </table>
            </div>
        </div>-->
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