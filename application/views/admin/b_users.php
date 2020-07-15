<div class="row-fluid" style="width:47%;">
    <!-- block -->
    <div class="block" style="float:left !important; min-height:388px;" >
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Users</div>
            <div class="muted pull-right"><span class="badge badge-warning"><a href="<?php echo site_url("admin/c_users"); ?>" >View all</a></span></div>
        </div>
        <div class="block-content collapse in" >
            

                <table cellpadding="0" style="font-family:century;" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                    <thead>
                    <tr>
                        
                        <td>User Name</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($view_users as $rows): ?>
                        <tr id="user_id_<?php  echo $rows["user_id"]; ?>">
                            <td style="max-width:25px !important; overflow:hidden;"><?php  echo $rows["user_name"]; ?></td>
                            <td ><?php  echo $rows["email"]; ?></td>
                            <td><a href="<?php echo site_url("admin/c_users/details");echo "/".$rows["user_id"];?>">Details</a>,
                            <a href="<?php echo site_url("admin/c_users/edit_user");echo "/".$rows["user_id"];?>">Edit</a>,
                            <a href="<?php echo site_url("admin/c_users/del_user");echo "/".$rows["user_id"];?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            
        </div>
    </div>
    <!-- /block -->
    
    
</div>
