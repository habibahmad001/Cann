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
                                ("admin/c_summery/add_sum"); ?>"><span class="icon-plus"></span>Add Summery</a></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form class="form-horizontal" enctype="multipart/form-data" method="post">
                                    <fieldset>
                                        <legend>Add Summery</legend>

                                        <div class="control-group <?php if(form_error("rs_title")) echo "error"; ?>">
                                            <label class="control-label" for="focusedInput">Problem Title*</label>
                                            <div class="controls">
                                                <input id="rs_title" name="rs_title" class="input-xlarge focused" required=""
                                                       placeholder="Enter Problem Title" type="text" value="<?php
                                              if(isset($rs_title))
                                                    echo $rs_title; ?>">
                                                <span class="help-inline"><?php echo form_error("rs_title"); ?></span>
                                            </div>
                                        </div>

                                        <div class="control-group <?php if(form_error("report_title")) echo "error"; ?>">
                                            <label class="control-label" for="focusedInput">Report Title</label>
                                            <div class="controls">
                                            <textarea id="report_title" name="report_title" class="input-xlarge focused"    placeholder="Enter Report Title..."   ><?php
                                              if(isset($report_title))
                                                    echo $report_title; ?></textarea>
                                                <span class="help-inline"><?php echo form_error("report_title"); ?></span>
                                            </div>
                                        </div>
										
                                        <div class="control-group <?php if(form_error("threshold_value")) echo "error"; ?>">
                                            <label class="control-label" for="focusedInput">Threshold Value*</label>
                                            <div class="controls">
                                                <input id="threshold_value" name="threshold_value" class="input-xlarge focused" required=""
                                                       placeholder="Threshold Value" type="text" value="<?php
                                              if(isset($threshold_value))
                                                    echo $threshold_value; ?>">
                                                <span class="help-inline"><?php echo form_error("threshold_value"); ?></span>
                                            </div>
                                        </div>
										

                                        <div class="form-actions">
                                            <button id="submit" name="submit" type="submit" value="submit" class="btn
                                        btn-primary">Save</button>
                                            <button id="reset" name="reset" type="reset" class="btn">Reset</button>
                                        </div>
                                    </fieldset>
                                </form>


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