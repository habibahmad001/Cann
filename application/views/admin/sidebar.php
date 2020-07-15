<?php

$sb_total_users=$this->config->item("sb_total_users"); // sidebar total users
?>

<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
<li class="<?php if(current_url()==site_url("dashboard") || current_url()==site_url("admin")) echo "active"; ?>">
<a href="<?php echo site_url("dashboard"); ?>"><i class="icon-chevron-right"></i> Dashboard</a>
</li>
    <li class="<?php if(current_url()==site_url("admin/c_users")) echo "active"; ?>">
        <a href="<?php echo site_url("admin/c_users"); ?>"><span class="badge badge-info pull-right"><?php
                if(! empty($sb_total_users))
                    echo $sb_total_users;
                else
                    echo "" ?></span>Users</a>
    </li>
    <div class="accordion-group">
    <div class="accordion-heading">
         <li class="<?php if(current_url()==site_url("admin/c_course") || current_url()==site_url("admin/view_course")) echo "active"; ?>">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Courses</a>
        </li>
    </div>
    <div id="collapseTwo" class="accordion-body <?php if(current_url()!=site_url("admin/c_course") && current_url()!=site_url("admin/c_course/view_course")&& current_url()!=site_url("admin/c_course/add_course")&& current_url()!=site_url("admin/c_course/add_course")) echo "collapse"; ?>">
        <div class="accordion-inner">
            <i class="icon-list-alt"></i><a class="accordion-inner" href="<?php echo site_url("admin/c_course"); ?>" >Courses</a>
        </div>
        <div class="accordion-inner">
            <i class="icon-list-alt"></i><a class="accordion-inner" href="<?php echo site_url("admin/c_course/view_course"); ?>" >Sections</a>
        </div>
        <!--...<div class="accordion-inner">
            <i class="icon-list-alt"></i><a class="accordion-inner" href="<?php echo site_url("admin/c_course/select_multiple"); ?>" >Select Questions</a>
        </div>...-->
    </div>
    </div>
    <li class="<?php if(current_url()==site_url("admin/c_categorys/view_cat")) echo "active"; ?>">
        <a href="<?php echo site_url("admin/c_categorys/view_cat"); ?>"><span class="badge badge-info pull-right"><?php
                if(! empty($sb_total_users))
                    echo $sb_total_users;
                else
                    echo "" ?></span>Categorys</a>
    </li>
    <!--<li class="<?php if(current_url()==site_url("admin/c_problems/view_pr")) echo "active"; ?>">
        <a href="<?php echo site_url("admin/c_problems/view_pr"); ?>"><span class="badge badge-info pull-right"><?php
                if(! empty($sb_total_users))
                    echo $sb_total_users;
                else
                    echo "" ?></span>Problems</a>
    </li>
    <li class="<?php if(current_url()==site_url("admin/c_summery/view_sum")) echo "active"; ?>">
        <a href="<?php echo site_url("admin/c_summery/view_sum"); ?>"><span class="badge badge-info pull-right"><?php
                if(! empty($sb_total_users))
                    echo $sb_total_users;
                else
                    echo "" ?></span>Summery</a>
    </li>-->
    
    
    <!--<div class="accordion-group">
    <div class="accordion-heading">
         <li class="<?php if(current_url()==site_url("admin/c_knowledge") || current_url()==site_url("admin/view_qa")) echo "active"; ?>">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree">Knowledge</a>
        </li>
    </div>
    <div id="collapseThree" class="accordion-body <?php if(current_url()!=site_url("admin/c_knowledge") && current_url()!=site_url("admin/c_knowledge/view_qa")&& current_url()!=site_url("admin/c_knowledge/add_qa")&& current_url()!=site_url("admin/c_knowledge/add_cat")) echo "collapse"; ?>">
        <div class="accordion-inner">
            <i class="icon-list-alt"></i><a class="accordion-inner" href="<?php echo site_url("admin/c_knowledge"); ?>" >Categories</a>
        </div>
        <div class="accordion-inner">
            <i class="icon-list-alt"></i><a class="accordion-inner" href="<?php echo site_url("admin/c_knowledge/view_qa"); ?>" >Questions</a>
        </div>
    </div>
    </div>-->
    
    <li>
    <a href="<?php echo site_url("oath/logout"); ?>" class="btn-warning"> Log out</a>
    </li>
</ul>