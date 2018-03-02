<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pace/pace.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lobipanel/lobipanel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/iscroll/iscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/prism/prism.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waypoint/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/counterUp/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/amcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/serial.js"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/amcharts/plugins/export/export.css" type="text/css" media="all" />
<script src="<?php echo base_url(); ?>assets/js/amcharts/themes/light.js"></script>
<script src="<?php echo base_url(); ?>assets/js/toastr/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-tour/bootstrap-tour.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/production-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/traffic-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/task-list.js"></script>
<script>
$(function(){
$('.counter').counterUp({
delay: 10,
time: 1000
});
toastr.options = {
"closeButton": true,
"debug": false,
"newestOnTop": false,
"progressBar": false,
"positionClass": "toast-top-right",
"preventDuplicates": false,
"onclick": null,
"showDuration": "300",
"hideDuration": "1000",
"timeOut": "3500",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
}
});

$(".user-menu").click(function() {
  $(this).toggleClass("show");
});


console.log("CREATED BY : TELECREATIVE")
</script>
</body>
</html>
