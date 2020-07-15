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

                                            $cr_category_name=$rows["category_name"];
                                            $cr_category_description=$rows["category_description"];
                                        endforeach;
                                    }
                                    ?>
                                    <div class="control-group <?php if(form_error("category_name")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Category Name*</label>
                                        <div class="controls">
                                            <input id="category_name" name="category_name" class="input-xlarge focused" required=""
                                                   placeholder="Enter Category Name" type="text" value="<?php
                                            if(isset($cr_category_name))
                                            { echo $cr_category_name;}
                                            elseif(isset($category_name))
                                            echo $category_name; ?>">
                                            <span class="help-inline"><?php echo form_error("category_name"); ?></span>
                                        </div>
                                    </div>

                                    <div class="control-group <?php if(form_error("category_description")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Category Description</label>
                                        <div class="controls">
                                            <textarea id="category_description" name="category_description" class="input-xlarge focused"    placeholder="Enter User Email"   ><?php
                                                if(isset($cr_category_name))
                                                { echo $cr_category_name;}
                                                elseif(isset($category_name))
                                                    echo $category_name; ?></textarea>
                                            <span class="help-inline"><?php echo form_error("category_description"); ?></span>
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