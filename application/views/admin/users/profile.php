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
                            <div class="muted pull-left">Bootstrap dataTables</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">

                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                    <thead>
                                    <tr>
                                        <td>User Id</td>
                                        <td>User Name</td>
                                        <td>User Email</td>
                                        <td>Status</td>
                                        <td>Joined Date</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($view_users as $rows): ?>
                                        <tr id="user_id_<?php  echo $rows["user_id"]; ?>">
                                            <td  ><?php  echo $rows["user_id"]; ?> </td>
                                            <td><?php  echo $rows["user_name"]; ?></td>
                                            <td><?php  echo $rows["user_email"]; ?></td>
                                            <td><?php  echo $rows["user_status"]; ?></td>
                                            <td><?php  echo $rows["user_joined"]; ?></td>
                                            <td><a href="<?php echo site_url("c_users/edit_user");echo "/".$rows["user_id"];?>">Edit</a>
                                                <a href="<?php echo site_url("c_users/del_user");echo "/".$rows["user_id"];?>">Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>



            </div>


        </div><!-- end of row-fluid -->
    </div>  <!-- end of container-fluid -->





<?php $this->load->view("admin/footer");
?>