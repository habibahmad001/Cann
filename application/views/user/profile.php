<?php
session_start();
include_once("../classes/cms.php");
include_once("../classes/users.php");
$objcms = new cms();
$objusers = new users();
$message = null;
$ok = true;


if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
{}
else
{
	header('Location: index.php');
}

if(isset($_REQUEST['submit']))
{
	
	if($_REQUEST['password']!=$_REQUEST['confirmpassword'] || $_REQUEST['password'] =="" )
	{	
		$msg = "Password value should be same in both fields.";	
		$ok = false;
	}
	
	
	if($ok)
	{
		if($objusers->change_password($_SESSION['user_id'],$_REQUEST['password']))
		{
			$msg = "Password has been updated successfully.";				
		}
		else
		{
			$msg = "Request failed, please try again.";		
		}
	}

}

$breadgram_title = "Profile";
$breadgram_link = "profile.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
	<link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<?php include("./header.php");?>


    <div class="container-fluid">
      <div class="row">
        <?php include("./left-pan.php");?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header" style="text-align: center;">Edit Profile</h2>
            <table class="table table-striped" style="width:50%; margin-left:25%;">
              <tbody>
              
                <tr>
                  <td>
                  <?php if(!empty($msg)) {?>
                  <div class="alert alert-danger"><?php echo $msg;?></div>
                  <?php }?>
                  		<form class="form-signin" role="form" action="" method="post">
                            <!--<input type="text" name="username" class="form-control" placeholder="User Name" required autofocus>-->
                            <input type="password" name="password" class="form-control" placeholder="Password" required><br />
                             <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
                            <label class="checkbox">&nbsp;</label>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update</button>
                          </form>
                          
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    
    <?php include("./footer.php");?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
  </body>
</html>
