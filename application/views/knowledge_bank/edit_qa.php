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
                        <div class="muted pull-right"><a class="btn btn-info" href="<?php echo site_url("admin/c_knowledge/add_qa"); ?>"><span class="icon-plus"></span>Add Question</a></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                                <fieldset>
                                    <legend>Edit Category</legend>
                                    <?php
                                    if(isset($edit_data)){
                                        foreach($edit_data as $rows):

                                            $cr_question_title=$rows["kb_title"];
                                            $cr_question_answer=$rows["kb_desc"];
                                        endforeach;
                                    }
                                    ?>
                                    


                                    <div class="control-group <?php if(form_error("kb_title")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Question*</label>
                                        <div class="controls">
                                            <input id="question_title" name="question_title" class="input-xlarge focused" required=""
                                                   placeholder="Enter Question ?" type="text" value="<?php
                                            if(isset($cr_question_title))
                                            { echo $cr_question_title;}
                                            elseif(isset($question_title))
                                                echo $question_title; ?>">
                                            <span class="help-inline"><?php echo form_error("kb_title"); ?></span>
                                        </div>
                                    </div>

                                    <div class="control-group <?php if(form_error("kb_desc")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Description</label>
                                        <div class="controls">
                                            <textarea id="question_answer" name="question_answer" class="input-xlarge focused"    placeholder="Enter User Email"   ><?php
                                                if(isset($cr_question_answer))
                                                { echo $cr_question_answer;}
                                                elseif(isset($question_answer))
                                                    echo $question_answer; ?></textarea>
                                            <span class="help-inline"><?php echo form_error("kb_desc"); ?></span>
                                        </div>
                                    </div>

									<div class="control-group <?php if(form_error("kb_desc")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Related Questions</label>
                                        <div class="controls">
                                            <select name="releated_questions[]" id="releated_questions" multiple="multiple">
                                            <?php foreach($all_auestion_data as $row) {?>
                                            	<option value="<?php echo $row["kb_id"];?>"><?php echo $row["kb_title"];?></option>
                                            <?php }?>
                                            </select>
                                            <span class="help-inline"><?php echo form_error("kb_desc"); ?></span>
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