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
                            <div class="muted pull-left">Course Management</div>
                            <div class="muted pull-right"><a class="btn btn-info" href="<?php echo site_url("admin/c_course/add_course"); ?>"><span class="icon-plus"></span>Add Course</a></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form class="form-horizontal" enctype="multipart/form-data" method="post">
                                    <fieldset>
                                        <legend>Add Course</legend>

										<div class="control-group <?php if(form_error("parent")) echo "error"; ?>" id="paren-outer">
                                            <label class="control-label" for="focusedInput">Parent</label>
                                            <div class="controls"  id="paren-inner">
                                                <!--<select name="parent-select" id="parent-select" class="input-xlarge focused">-->
                                                <select name="status" id="status" class="input-xlarge focused">
                                                     <option value="draft">Draft</option>
                                                     <option value="proofread">Proofread</option>
                                                     <option value="approval_pending">Approval Pending</option>
                                                     <option value="active">Active</option>
                                                     <option value="blocked">Blocked</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group <?php if(form_error("title")) echo "error"; ?>">
                                            <label class="control-label" for="focusedInput">Title*</label>
                                            <div class="controls">
                                                <input id="title" name="title" class="input-xlarge focused" required="" placeholder="Title" type="text" value="<?php if(isset($title)) echo $title; ?>">
                                                <span class="help-inline"><?php echo form_error("title"); ?></span>
                                            </div>
                                        </div>

                                        <div class="control-group <?php if(form_error("description")) echo "error"; ?>">
                                            <label class="control-label" for="focusedInput">Description</label>
                                            <div class="controls">
                                            <textarea id="description" name="description" class="input-xlarge focused"    placeholder="Enter Description here..."   ><?php  if(isset($description)) echo $description; ?></textarea>
                                                <span class="help-inline"><?php echo form_error("description"); ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group <?php if(form_error("sumary")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Sumary</label>
                                        <div class="controls">
                                            <textarea id="sumary" name="sumary" class="input-xlarge focused"    placeholder="Enter sumary"   ><?php if(isset($sumary)) { echo $sumary;}?></textarea>
                                            <span class="help-inline"><?php echo form_error("sumary"); ?></span>
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





<?php $this->load->view("admin/footer");?>

<script language="javascript">
 //////////// AJAX /////////////
$(document).ready(function(e) {
    $("select#parent-select").change(function(e) {
        $.post("./select",
		{
			pid: $(this).val()
		},
		function(data, status){
			if(status == "success")
			{
				alert( data );
			}
		});
    });
});	
//////////// AJAX /////////////
</script>