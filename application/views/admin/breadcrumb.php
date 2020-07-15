<div class="row-fluid">
    <?php
    if(isset($message["code"])):

        ?>

            <div class="alert alert-<?php echo $message["msg_class"]; ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4><?php echo $message["msg_header"]; ?>         </h4>
                <?php echo $message["msg_body"];  ?>
            </div>
        <?php  endif; ?>
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="breadcrumb">
                <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                <?php
                $tc=count($breadcrumb);
                $i=0;
                foreach($breadcrumb as $row):
                    $i++;
                    ?>
                <li class="<?php if(current_url()==$row["url"]) echo "active";?>" >
                    <a href="<?php if(isset($row["url"])) echo $row["url"]; else echo "#"; ?>"><?php if(isset
                        ($row["name"])) echo $row["name"]; else echo "Dashboard "; ?></a>
                    <span class="divider"><?php if($i<$tc) echo "/" ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

