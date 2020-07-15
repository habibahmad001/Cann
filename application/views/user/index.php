<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title><?php echo $pageTitle;?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>admin/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $this->config->base_url()."public/";?>admin/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
	  <?php if(!empty($Message)) {?>
      <div class="alert alert-danger"><?php echo $Message;?></div>
      <?php }?>
      <form class="form-signin" role="form" action="<?php echo $this->config->base_url();?>user/login" method="post">
      <div id="logo-header-div"><img src="<?php echo $this->config->base_url() . "public/";?>images/logo.png" /><div id="site-title">Cultivate Artists Network</div></div>
        <h2 class="form-signin-heading">User Login</h2>
        <input type="text" name="userName" class="form-control" placeholder="User Name" value="<?php echo $userName?>" required autofocus><br />
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password?>" required>
        <label class="checkbox">&nbsp;</label>
        <input type="hidden" name="GetUserLogin" value="userLogin" />
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <!--<button class="btn btn-lg btn-primary btn-block" type="button" name="button" onClick="javascript:window.location.href = 'http://localhost/adsensnew/adword-api/linkdin/PHP-LinkedIn-SDK-master/exp.php';">LinkDin</button>-->
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
