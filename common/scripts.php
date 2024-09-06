<!--    <script src="<?php // echo $site_root?>js/jquery.js"></script>-->
	<script type="text/javascript" src="<?php echo $site_root?>js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="<?php echo $site_root?>js/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
    
    <script src="<?php echo $site_root?>js/bs3/js/bootstrap.min.js"></script>
    <script src="<?php echo $site_root?>js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo $site_root?>js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $site_root?>js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="<?php echo $site_root?>js/jquery.nicescroll.js"></script>
    <script src="<?php echo $site_root?>js/highcharts.js"></script>
    <script src="<?php echo $site_root?>js/exporting.js"></script>
    <script src="<?php echo $site_root?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script> 
    <script src="<?php echo $site_root?>js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $site_root?>js/bootstrap-switch.min.js"></script>
    
	<script src="<?php echo $site_root?>js/morris-chart/morris.js"></script>
    <script src="<?php echo $site_root?>js/morris-chart/raphael-min.js"></script>
    
    <script type="text/javascript" src="<?php echo $site_root?>js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="<?php echo $site_root?>js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    <script src="<?php echo $site_root?>js/scripts.js"></script>
	<script src="<?php echo $site_root?>js/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo $site_root?>js/bootstrap_timepicker/bootstrap-timepicker.min.js"></script>
	<script src="<?php echo $site_root?>js/ckeditor/ckeditor.js"></script>
	<script src="<?php echo $site_root?>js/ckeditor/samples/js/sample.js"></script>

        <!-- date-range-picker -->
<!--<script src="<?php // echo $site_root?>js/moment.min.js"></script>-->
	<script src="<?php echo $site_root?>js/moment.min.js"></script>
<script src="<?php echo $site_root?>js/daterangepicker.js"></script>
        
		<script src="<?php echo $site_root?>js/bootstrap-switch.min.js"></script>
		<script src="<?php echo $site_root?>js/counterdown/js/countdown.js"></script>
		<script src="<?php echo $site_root?>js/datatables.min.js"></script>
	<script>
 
  $(function() {
	$('#datepicker').datepicker({ 								
							
							monthNames: [ "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" ],
							dateFormat: "dd-M-yy",
							/*onClose: function(selectedDate){
									alert(selectedDate);
								}*/
							/*showAnim: "fold"*/
							/*showAnim: "fadeIn"*/
							/*showAnim: "slideDown"*/
							/*showAnim: "show"*/
							/*minDate: new Date(2015, 1 - 1, 1),
							maxDate: "+1w",*/
							/*numberOfMonths: [ 1, 2 ]*/
							});
	
  });
		$(document).ready(function(){ 
			  $(".validate").validationEngine('attach', {				  	
					validateNonVisibleFields: true,
					updatePromptsPosition:true,
					scrollOffset: 150
				});										
		});
		function deleteit(){
			return(confirm("The record will be deleted permanently. Do you really want to continue?"));
			}
		function dapproveIt(){
			return(confirm("The Destination will be Approved permanently. Do you really want to proceed?"));
			}
		function sapproveIt(){
			return(confirm("The Service will be Approved permanently. Do you really want to proceed?"));
			}
		function active(){
			return(confirm("The Promocode will be Activated. Do you want to proceed?"));
			}
		function issue(){
			return(confirm("The Promocode will be Issued. Do you want to proceed?"));
			}
		function download(){
			return(confirm("The Promocode will be Downloaded. Do you want to proceed?"));
			}
		function trustIt(){
			return(confirm("The Customer will be marked as Trusted permanently. Do you really want to proceed?"));
			}
		function payIt(){
		return(confirm("The Booking will be marked as Paid. Do you really want to proceed?"));
		}
		function removedriver(){
		return(confirm("The driver will be removed. Do you really want to proceed?"));
		}
		function removesteward(){
		return(confirm("The steward will be removed. Do you really want to proceed?"));
		}
		function confirmIt(){
			return(confirm("Are you sure, you want to continue?"));
			}
		$(".switchbox").bootstrapSwitch();
		$(".scroller").niceScroll();
    </script>