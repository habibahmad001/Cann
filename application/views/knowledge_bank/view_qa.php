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
                        <div class="muted pull-left">Questions Management</div>
                        <div class="muted pull-right"><a class="btn btn-info" href="<?php echo site_url
                            ("admin/c_knowledge/add_qa"); ?>"><span class="icon-plus"></span>Add Question</a></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                <tr>
                                    <td>QA ID</td>
                                    <td>Q Title</td>
                                    <td> QA </td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if(count($view_qa) > 0) foreach($view_qa as $rows): ?>
                                    <tr id="question_id_<?php  echo $rows["kb_id"]; ?>">
                                        <td  ><?php  echo $rows["kb_id"]; ?> </td>
                                        <td><?php  echo $rows["kb_title"]; ?></td>
                                        <td><?php  echo $rows["kb_desc"]; ?></td>
                                        <td><a href="<?php echo site_url("admin/c_knowledge/edit_qa");echo "/".$rows["kb_id"];?>">Edit</a>
                                            <a href="<?php echo site_url("admin/c_knowledge/del_qa");echo "/".$rows["kb_id"];?>">Delete</a></td>
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

