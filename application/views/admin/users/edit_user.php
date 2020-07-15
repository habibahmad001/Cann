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
                        <div class="muted pull-left">Edit User Registration Form</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                                <fieldset>
                                    <legend>Edit User</legend>

                                    <?php
                                    if(isset($edit_user)) {
                                        foreach ($edit_user as $row) {

                                            $cr_user_name = $row["user_name"];
											$cr_user_password = $row["password"];
                                            $cr_user_email = $row["email"];
											$cr_user_status=$row["status"];

                                        }
                                    }



                                    ?>

                                    <div class="control-group <?php if(form_error("user_name")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">User Name*</label>
                                        <div class="controls">
                                            <input id="user_name" readonly name="user_name" class="input-xlarge disabled"
                                                   required=""
                                                   placeholder="Enter User Name" type="text" value="<?php
                                            if(isset($cr_user_name)){
                                                echo $cr_user_name;
                                            }
										
                                             ?>">
                                            <span class="help-inline"><?php echo form_error("user_name"); ?></span>
                                        </div>
                                    </div>


                                    <div class="control-group <?php if(form_error("status")) echo "error"; ?>">
                                        <label class="control-label" for="forcusedInput">Status*</label>

                                        <div class="controls">
                                            <select id="status" name="status" required='' class="chzn-single">
                                            <option label="Select Status"  selected="" disabled   value="">Select Status</option>

                                          <option <?php  if( isset($cr_user_status) && ($cr_user_status=="active")){
                                                    echo "selected=selected";} ?> value="active" >Active </option>
                                           <option <?php  if( isset($cr_user_status) && ($cr_user_status=="block")){
                                                    echo "selected=selected";} ?> value="block" >Block </option>
                                                
                                               
                                              
                                        </select></div>
                                        <span ><?php echo form_error('status'); ?></span>
                                    </div>
                                    <div class="control-group <?php if(form_error("email")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">User Email*</label>
                                        <div class="controls">
                                            <input id="user_email" name="user_email" class="input-xlarge focused"
                                                   placeholder="Enter User Email" type="email" required="" value="<?php
                                            if(isset($cr_user_email)){
                                                echo $cr_user_email;
                                            }
                                            echo set_value("email"); ?>">
                                            <span class="help-inline"><?php echo form_error("email"); ?></span>
                                        </div>
                                    </div>

                                    <!--<div class="control-group <?php if(form_error("pass")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">User Password*</label>
                                        <div class="controls">
                                            <input id="user_password"  name="user_password" class="input-xlarge focused"
                                                   placeholder="Enter User Password" type="password" required="" value="<?php
                                            if(isset($cr_user_password)){
                                                echo $cr_user_password;
                                            }
                                            echo set_value("pass"); ?>">
                                            <span class="help-inline"><?php echo form_error("pass"); ?></span>
                                        </div>
                                    </div>

                                    <div class="control-group <?php if(form_error("user_password2")) echo "error"; ?>">
                                        <label class="control-label" for="focusedInput">Confirm Password*</label>
                                        <div class="controls">
                                            <input id="user_password2" name="user_password2" class="input-xlarge focused"
                                                   placeholder="Enter User Password" type="password" required="" value="<?php
                                            if(isset($cr_user_password)){
                                                echo $cr_user_password;
                                            }
                                            echo set_value("user_password"); ?>">
                                            <span class="help-inline"><?php echo form_error("user_password2"); ?></span>
                                        </div>
                                    </div>-->


                                    <div class="form-actions">
                                        <button id="submit" name="submit" type="submit"  class="btn
                                        btn-primary">Save
                                            changes</button>
                                        <button id="reset" name="reset" type="reset" class="btn">Cancel</button>
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


