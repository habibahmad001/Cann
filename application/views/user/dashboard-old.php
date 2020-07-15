<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo $this->config->base_url()."public/";?>admin/assets/ico/favicon.ico">

    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>admin/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $this->config->base_url()."public/";?>admin/css/dashboard.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url()."public/";?>admin/css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      <link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->config->base_url()."public/";?>admin/cal/calendar-win2k-cold-1.css" title="win2k-cold-1" />
      <script type="text/javascript" src="<?php echo $this->config->base_url()."public/";?>admin/cal/jquery.min.js"></script>
	  <script type="text/javascript" src="<?php echo $this->config->base_url()."public/";?>admin/cal/calendar.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->base_url()."public/";?>admin/cal/lang/calendar-en.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->base_url()."public/";?>admin/cal/calendar-setup.js"></script>
  </head>

  <body>

	<?php $this->load->view('admin/includes/header');?>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('admin/includes/left-pan');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <!--/////////////////// Add / Edit Sec ////////////////////////-->
        <div class="table-responsive" id="thediv" style="background-color:#F5F5F5; display:none; width: 90%;">
        <div style="width: 100%; padding-left: 98%;"><button class="btn btn-xs btn-danger" type="button" onClick="javascript:clos();">X</button></div>
        <table class="table table-striped" style="width:50%; margin-left:25%;">
              <tbody>
                <tr>
                  <td>
                  <?php if(!empty($msg)) {?>
                  <div class="alert alert-danger"><?php echo $msg;?></div>
                  <?php }?>
                  		<form class="form-signin" role="form" action="<?php echo $pageName;?>/add" onsubmit="return validateInfo();" method="post">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php  if(isset($name)) echo $name;?>"><br />
                            <input type="text" name="type" class="form-control" placeholder="Size" value="<?php  if(isset($size)) echo $size;?>" required><br />
                            <input type="text" name="status" class="form-control" placeholder="Color" value="<?php  if(isset($color)) echo $color;?>" required><br />
                            <input type="text" name="dat" id="dat" class="form-control" value="<?php if(isset($dat)) echo $dat;?>" style="width: 90%;" placeholder="Date" required><img src="<?php echo $this->config->base_url()."public/";?>admin/cal/img.gif" id="f_trigger_c" style="cursor: pointer; border: 1px solid red; float: right; margin: -25px 17px 0px 0px;" title="Date selector"
      onmouseover="this.style.background='red';" onMouseOut="this.style.background=''" />
                            <script type="text/javascript">
									Calendar.setup({
										inputField     :    "dat",     // id of the input field
										ifFormat       :    "%Y-%m-%d",       // format of the input field
										showsTime      :    false,            // will display a time selector
										button         :    "f_trigger_c",  // trigger for the calendar (button ID)
										align          :    "Bl",           // alignment (defaults to "Bl")
										singleClick    :    true
									});
								</script>	
                            <label class="checkbox">&nbsp;<input name="sub" type="hidden" value="<?php if(isset($_REQUEST['sub']) || isset($_REQUEST['pid'])) echo $sub;?>"></label>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="<?php if(isset($_REQUEST['id'])) echo "Update"; else echo "save";?>"><?php if(isset($_REQUEST['id'])) echo "Update"; else echo "ADD";?></button>
                          </form>
                          
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
       <!-- /////////////////// Add / Edit Sec ////////////////////////-->
          <h2 class="sub-header" style="text-align: center;">Products Detail</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Action&nbsp;&nbsp;<button class="btn btn-xs btn-success" type="button" onClick="javascript:view();">Add Item</button></th>
                </tr>
              </thead>
              <tbody>
              <?php if((bool)$QUERY > 0){ $i = 1;  foreach($QUERY->result() as $row) {?>
                <tr>
                  <td>1</td>
                  <td><?php echo $row->name; ?></td>
                  <td><?php echo $row->type; ?></td>
                  <td><?php echo $row->status; ?></td>
                  <td><!--<button class="btn btn-xs btn-primary" type="button">View</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                  <button class="btn btn-xs btn-primary" type="button" onClick="window.location.href = '#'">Edit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-xs btn-danger" type="button" onclick="javascript:return confrm('<?php echo $pageName;?>','<?php echo $row->id;?>');">Delete</button></td>
                </tr>
                <?php 
						$i++;}} else {
				?>
                 <tr>
                  <td colspan="12" style="text-align:center;"> No Record Found ! </td>
                </tr>
                <?php } ?>
                <?php if((bool)$QUERY > 0){?>
                <tr>
                  <td colspan="8" align="right"><?=$this->pagination->create_links().paginationList();?></td>
                </tr>
                <?php } else {?>
                <tr>
                  <td colspan="12" align="center"><?php //$objcms->buttom($CounterStart,$CounterEnd,$PageSize,$PageNo,$MaxPage,$sub,'#71bbe0');?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    <?php $this->load->view('admin/includes/footer');?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $this->config->base_url()."public/";?>admin/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>admin/assets/js/docs.min.js"></script>
    <script language="javascript">
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
	function view()
	{
		document.getElementById('thediv').style.display = 'block';
	
	}
	function clos()
	{
		window.location.href = '<?php echo $pageName;?>';
	}
	function changeRecordsPerPage(base_url)
	{
		var recordsPerPage = document.getElementById('records_per_page').value;
		location.href = document.getElementById('base___URL').value+'admin/general/chnageRecordsPerPage/<?php echo $pageName;?>/'+recordsPerPage;
    }
	</script>
  </body>
</html>

<?php
if(isset($_REQUEST['e']))
{
	echo '<script>view();</script>';
}
?>

