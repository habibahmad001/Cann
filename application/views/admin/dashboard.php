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

                <?php $this->load->view("admin/sidebar"); ?>

            </div>

            <!--  main content body span 9 containing messeage header, breadcrumb, block for dashboard   -->
            <div class="span9"  id="content">

                <?php
					  $this->load->view("admin/breadcrumb");
					  $this->load->view("admin/b_piechart_statistics");
					  $this->load->view("admin/b_users.php");
                ?>


            </div>


        </div><!-- end of row-fluid -->
    </div>  <!-- end of container-fluid -->

<?php $this->load->view("admin/footer"); ?>