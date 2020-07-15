<div class="container">
    <div class="row">
        <div class="span3"></div>
       <div class="span9" style=" margin-left: 43%; margin-right: 25%;">
           <hr>
           <footer>
               <p>&copy;NEO GLOBAL 2015</p> <p>Page rendered in <strong>{elapsed_time}</strong> seconds</p>
           </footer>
       </div>
    </div>
</div>

<!--/. end of fluid-container-->

<!--bootstrap library -->
<script src="<?php echo base_url("media/vendors/jquery-1.9.1.min.js"); ?>"></script>
<script src="<?php echo base_url("media/bootstrap/js/bootstrap.min.js"); ?>"></script>
<!--easy pie chart library -->

<script src="<?php echo base_url("media/vendors/easypiechart/jquery.easy-pie-chart.js"); ?>"></script>

<!--sidebar on and off script-->
<script src="<?php echo base_url("media/assets/scripts.js"); ?>"></script>

<!--data table -->

<script src="<?php echo base_url("media/vendors/datatables/js/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("media/assets/DT_bootstrap.js"); ?>"></script>

<!--form -->

<link href="<?php echo base_url("media/vendors/datepicker.css"); ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url("media/vendors/uniform.default.css"); ?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url("media/vendors/chosen.min.css"); ?>" rel="stylesheet" media="screen">

<script src="<?php echo base_url("media/vendors/jquery.uniform.min.js"); ?>"></script>
<script src="<?php echo base_url("media/vendors/chosen.jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("media/vendors/bootstrap-datepicker.js"); ?>"></script>

<script src="<?php echo base_url("media/vendors/wysiwyg/wysihtml5-0.3.0.js"); ?>"></script>
<script src="<?php echo base_url("media/vendors/wysiwyg/bootstrap-wysihtml5.js"); ?>"></script>

<script src="<?php echo base_url("media/vendors/wizard/jquery.bootstrap.wizard.min.js"); ?>"></script>

<script type="text/javascript" src="<?php echo base_url("media/vendors/jquery-validation/dist/jquery.validate.min.js"); ?>"></script>
<script src="<?php echo base_url("media/assets/form-validation.js"); ?>"></script>

<script src="<?php echo base_url("media/assets/scripts.js"); ?>"></script>
<!--form scripts-->


<script>

// form validation
   jQuery(document).ready(function() {
FormValidation.init();
});


    $(function() {
        // Easy pie charts
        $('.chart').easyPieChart({animate: 1000});
    });


/**
 *  form page. date chooser
 */
$(function() {
    $(".datepicker").datepicker();
    $(".uniform_on").uniform();
    $(".chzn-select").chosen();
    $('.textarea').wysihtml5();

    $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;
        $('#rootwizard').find('.bar').css({width:$percent+'%'});
        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
        } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
        }
    }});
    $('#rootwizard .finish').click(function() {
        alert('Finished!, Starting over!');
        $('#rootwizard').find("a[href*='tab1']").trigger('click');
    });
});
</script>
</body>

</html>