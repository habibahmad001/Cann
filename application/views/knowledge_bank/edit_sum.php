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
                        <div class="muted pull-left">Categories Management</div>
                        <div class="muted pull-right"><a class="btn btn-info" href="<?php echo site_url("admin/c_summery/add_pr"); ?>"><span class="icon-plus"></span>Add Summery</a></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                                <fieldset>
                                    <legend>Edit Summery</legend>
                                    <?php
                                    if(isset($edit_data)){
                                        foreach($edit_data as $rows):
											$rs_title=$rows["rs_title"];
                                            $report_title=$rows["report_title"];
                                            $threshold_value=$rows["threshold_value"];
                                        endforeach;
                                    }
                                    ?>
                                    


                                    <div class="control-group <?php if(form_error("rs_title")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Problem Title*</label>
                                        <div class="controls">
                                            <input id="question_title" name="rs_title" class="input-xlarge focused" required=""
                                                   placeholder="Enter Problem Title" type="text" value="<?php
                                            if(isset($rs_title))
                                            { echo $rs_title;}
                                            elseif(isset($rs_title))
                                                echo $rs_title; ?>">
                                            <span class="help-inline"><?php echo form_error("rs_title"); ?></span>
                                        </div>
                                    </div>

                                    <div class="control-group <?php if(form_error("report_title")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Report Title</label>
                                        <div class="controls">
                                            <textarea id="question_answer" name="report_title" class="input-xlarge focused"    placeholder="Enter Report Title"   ><?php
                                                if(isset($report_title))
                                                { echo $report_title;}
                                                elseif(isset($report_title))
                                                    echo $report_title; ?></textarea>
                                            <span class="help-inline"><?php echo form_error("report_title"); ?></span>
                                        </div>
                                    </div>

									<div class="control-group <?php if(form_error("threshold_value")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Threshold Value</label>
                                        <div class="controls">
                                            <textarea id="question_answer" name="threshold_value" class="input-xlarge focused"    placeholder="Threshold Value"   ><?php
                                                if(isset($threshold_value))
                                                { echo $threshold_value;}
                                                elseif(isset($threshold_value))
                                                    echo $threshold_value; ?></textarea>
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