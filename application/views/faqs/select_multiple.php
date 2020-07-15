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
                        <div class="muted pull-right"><a class="btn btn-info" href="<?php echo site_url("admin/c_faqs/add_cat"); ?>"><span class="icon-plus"></span>Add Cat</a></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                                <fieldset>
                                    <legend>Edit Category</legend>
                                    <?php
                                    if(isset($edit_data)){
                                        foreach($edit_data as $rows):

                                            $cr_category_id=$rows["category_id"];
                                            $cr_question_title=$rows["question_title"];
                                            $cr_question_answer=$rows["question_answer"];
                                        endforeach;
                                    }
                                    ?>
                                    <div class="control-group <?php if(form_error("category_name")) echo "error"; ?>">
                                        <label class="control-label" for="forcusedInput">Select Category*</label>

                                        <div class="controls">
                                            <select id="category_id" name="category_id" required='' class="chzn-single">
                                            <option label="Select Category"  selected="" disabled   value="">Select Category</option>

                                            <?php
                                            foreach($a_categories as $row){
                                                $key=$row["category_id"];
                                                $value=$row["category_name"];

                                                echo "<option label='{$value}' value='{$key}'";
                                                if(isset($category_id) && $category_id==$key  ){
                                                    echo'selected="selected"';}
                                                elseif( isset($cr_category_id) && $cr_category_id=$key){
                                                    echo'selected="selected"';
                                                }
                                                else  echo '';
                                                echo ">".$value."</option>";
                                            }
                                            ?>
                                        </select></div>
                                        <span ><?php echo form_error('category_id'); ?></span>
                                    </div>
									<div class="control-group">
                                        <div class="controls">
                                        	<label class="control-label" for="focusedInput">List of Question</label>
                                            <label class="control-label" for="focusedInput">List of Question</label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <select name="question_name1" multiple="multiple">
                                            	<option value="volvo">Volvo</option>
    											<option value="saab">Saab</option>
                                                <option value="volvo">Volvo</option>
    											<option value="saab">Saab</option>
                                            </select>
                                            <select name="question_name2" multiple="multiple">
                                            	<option value="volvo">Volvo</option>
    											<option value="saab">Saab</option>
                                                <option value="volvo">Volvo</option>
    											<option value="saab">Saab</option>
                                            </select>
                                            <span class="help-inline"><?php echo form_error("question_answer"); ?></span>
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