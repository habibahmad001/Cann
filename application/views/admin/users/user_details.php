<?php
$this->load->view("admin/header");
$this->load->view("admin/menu");
?>

<!-- main body container containing sidebar  and content -->
<!--sidebar span =3 and content span = 9 -->


<div class="container-fluid">
    <div class="row-fluid" >
        <!--sidebar span 3-->
        <div class="span3" id="sidebar">

            <?php  $this->load->view("admin/sidebar"); ?>

        </div>

        <!--  main content body span 9 containing messeage header, breadcrumb, block for dashboard   -->
        <div class="span9" id="content">

            <?php
            $this->load->view("admin/breadcrumb");

            ?>
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Transaction History</div>
                        <div class="muted pull-right"><b>Balance: <?php echo $user[0]['user_balance']." GB"; ?></b></div>
                    </div>
              
                    
                    <!-- /.panel -->
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" style=" margin-left:25px; margin-top:10px; margin-right:10px; ">
                                    <div class="table-responsive">
                       <table cellpadding="0" cellspacing="0" border="0"  class="table table-striped table-bordered" id="example">
                                            <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Transaction ID</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                     <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
											 $sr=0;
											 if($trans!=NULL)
											 foreach($trans as $row) {?>
                                                <tr>
                                                    <td><?php echo $sr=$sr+1; ?></td>
                                                    <td><?php echo $row['trans_code'] ?></td>
                                                    <td><?php echo $row['trans_type'] ?></td>
                       <td><?php echo $this->cquery->convert_price($row['trans_amount'])." (".$this->session->userdata("currency")."s)";?></td>
                                                    <td><?php echo $row['trans_date'] ?></td>
                                                    <td><?php echo $row['trans_status'] ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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
                    <!-- /.panel -->
                    <!-- /.panel -->
                </div>
                </div>
                <!-- /block -->
            </div>



        </div>


    </div><!-- end of row-fluid -->
</div>  <!-- end of container-fluid -->





<?php $this->load->view("admin/footer");
?>
