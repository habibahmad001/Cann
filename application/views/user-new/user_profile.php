<?php
$errorMessage = getMessage('error_message');

$success_message = getMessage('success_message');

$info_message = getMessage('info_message');

if($errorMessage != ''){$msg = '<div class="error_message">'.$errorMessage.'</div>'; }

if($success_message != ''){$msg = '<div class="success_message">'.$success_message.'</div>'; }

if($info_message != ''){$msg = '<div class="info_message">'.$info_message.'</div>'; }
?>
<!DOCTYPE html>
<html lang="en">

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
    <link href="<?php echo $this->config->base_url()."public/";?>user/css/editprofile.css" rel="stylesheet" type="text/css">
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
<form action="<?php echo $pageName;?>/update" method="post" enctype="multipart/form-data" id="frm" name="frm">
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Profile</h1>
                </div>
				
                <!-- /.col-lg-12 -->
            </div>
			<!--right Side-->
            <div class="row">

                <div class="col-lg-8">
                  <div class="col-lg-12">
                    <div class="panel panel-default "><?php if(!empty($msg)) { ?><div style="margin: 0px 0px 0px 24%; width: 40%; padding: 6px; background-color: pink; text-align: center; color: red; font-family: arial; font-weight: bold;"><?php echo $msg;?></div><?php }?></td>
                        <div class="panel-heading">
                            <i class="fa fa-bar-man-o fa-fw"></i><?php echo $heading;?>
                            
                        </div>
                      <div class="profile">
					  <div class="form1 col-lg-6">
					  <div class="feelds">
					  <span>First Name</span><input name="fname" id="fname" value="<?php echo $QUERY[0]->fname;?>" type="text" placeholder="type your text">
					  </div>
					  <div class="feelds">
					  <span>Last Name</span><input name="lname" id="lname" value="<?php echo $QUERY[0]->lname;?>" type="text" placeholder="type your text">
					  </div>
					  <div class="feelds">
					  <span>Email</span><input name="email" id="email" value="<?php echo $QUERY[0]->email;?>" type="text" placeholder="type your text">
					  </div>
					  <div class="feelds">
					  <span>Address</span><input name="add" id="add" value="<?php echo $QUERY[0]->add;?>" type="text" placeholder="type your text">
					  </div>
					  </div>
					  <div class="form2 col-lg-6">
					  <div class="feelds">
					  
					  <div class="select-style-2">
                       <select name="sex" id="select">
                          <option>--- Select Gender ---</option>
                          <option value="1" <?php if($QUERY[0]->sex == 1) echo 'selected="selected"';?>>Male</option>
                          <option value="2" <?php if($QUERY[0]->sex == 2) echo 'selected="selected"';?>>Female</option>
                        </select>
                    </div>
					<span style="float:right;">Sex</span>
					  <!--<div class="select-style-2">
                    <select name="sex" id="select">
                      <option>--- Select Gender ---</option>
                      <option value="1" <?php if($QUERY[0]->sex == 1) echo 'selected="selected"';?>>Male</option>
                      <option value="2" <?php if($QUERY[0]->sex == 2) echo 'selected="selected"';?>>Female</option>
                    </select>
                    </div>-->
					<!--<span style="float:right;">Age</span>-->
					  </div>
					  <div class="feelds">
					  <span>User Name</span><input name="uname" id="uname" value="<?php echo $QUERY[0]->uname;?>" type="text" placeholder="type your text">
					  </div>
					  <div class="feelds">
					  <span>Password*</span><input type="password" name="pass" id="pass" value="<?php echo $QUERY[0]->pass;?>">
					  </div>
					  <div class="feelds">
					  <span>Phone No</span><input name="phone" id="phone" value="<?php echo $QUERY[0]->phone;?>" type="text" placeholder="type your text">
					  </div>
					  </div>
					  <input type="submit" name="save" id="save" value="Update Your Profile" />
					   </div>
                    </div>
					</div>

           
				
			      
				
			    </div>
				
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display:none">
                            <i class="fa fa-bell fa-fw"></i> Youtube Video
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="video"><img src="<?php echo $this->config->base_url()."public/";?>user/images/video_bg.jpg"></div> 
                         
                        </div>
						
                       <div class="panel panel-default ">
                        <div class="panel-heading">
                            <i class="fa fa-fw"></i> Quick Solutions Guide
                            <div class="pull-right">
                                <div class="btn-group">
                            
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
							
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                
                                            </thead>
                                            <tbody>
                                                <tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												    <td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												<tr>
												<td>1</td>
                                                    <td>% of Spend on non converting keywords</td>
                                                    <td><img src="<?php echo $this->config->base_url()."public/";?>user/images/right_icon.png"></td>
												</tr>
												
										
												
										
                                 
                                            </tbody>
											<tbody><tr>
											
											 </tr>
                                        </tbody></table>
										
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
          
                    <!-- /.panel .chat-panel -->
                </div>
				
              
            
				
				

        </div>


    </div>
	</div>
    <!-- /#wrapper -->

 

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
    $ppc.ad
</form>
</body>

</html>
