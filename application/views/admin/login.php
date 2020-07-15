
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url("media/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url("media/bootstrap/css/bootstrap-responsive.min.css"); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url("media/assets/styles.css"); ?>" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo base_url("media/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"); ?>"></script>
</head>
<body id="login">

<div class="container">

    <form class="form-signin" method="post" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Please Sign In</h2>
        <input id="user_name" name="use_name" required="" value="aaaa" type="text" class="input-block-level" placeholder="Enter User Name">
        <input id="user_password" name="user_password" required="" type="password" class="input-block-level" placeholder="Password">
<span style="color:#C00;"><?php if(isset($message["msg_body"]))echo $message["msg_body"]; ?></span>
        <button class="btn btn-large btn-primary" id="submit" name="submit" type="submit">Sign in</button>
        
    </form>

</div> <!-- /container -->
<script src="<?php echo base_url("media/vendors/jquery-1.9.1.min.js"); ?>"></script>
<script src="<?php echo base_url("media/bootstrap/js/bootstrap.min.js"); ?>"></script>
</body>
</html>