<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="language" content="en-us"/>
<div class="page-content">
	<div class="page-header">
		<h1>
			Availability Calendar
		</h1>
		<div class="rating-wrap">
			<div class="rating inline"></div>
		</div>
	</div>	
	<div class="row">
		<div class="col-xs-12">
			<div id="user-profile-2" class="user-profile">
				<div class="tab-content no-border padding-24">
					<div id="home" class="tab-pane in active">
						<div class="row">
							<div class="col-xs-12 col-sm-12" id='calendar'></div>
						</div><!-- /.row -->

						<div class="space-20"></div>
					</div><!-- /#home -->
				</div>
				<!-- </div> --> <!-- End Tabbable -->
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->


<script src="assets/js/jquery.validate.js"></script>
<script src="assets/js/jquery-ui.custom.js"></script>
<script src="assets/js/jquery.ui.touch-punch.js"></script>
<script src="assets/js/jquery.gritter.js"></script>
<script src="assets/js/bootbox.js"></script>
<script src="assets/js/jquery.easypiechart.js"></script>
<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="assets/js/jquery.hotkeys.js"></script>
<script src="assets/js/bootstrap-wysiwyg.js"></script>
<script src="assets/js/select2.js"></script>
<script src="assets/js/fuelux/fuelux.spinner.js"></script>
<script src="assets/js/x-editable/bootstrap-editable.js"></script>
<script src="assets/js/x-editable/ace-editable.js"></script>
<script src="assets/js/jquery.maskedinput.js"></script>

<script src="assets/js/ace/elements.scroller.js"></script>
<script src="assets/js/ace/elements.colorpicker.js"></script>
<script src="assets/js/ace/elements.fileinput.js"></script>
<script src="assets/js/ace/elements.typeahead.js"></script>
<script src="assets/js/ace/elements.wysiwyg.js"></script>
<script src="assets/js/ace/elements.spinner.js"></script>
<script src="assets/js/ace/elements.treeview.js"></script>
<script src="assets/js/ace/elements.wizard.js"></script>
<script src="assets/js/ace/elements.aside.js"></script>
<script src="assets/js/ace/ace.js"></script>
<script src="assets/js/ace/ace.ajax-content.js"></script>
<script src="assets/js/ace/ace.touch-drag.js"></script>
<script src="assets/js/ace/ace.sidebar.js"></script>
<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="assets/js/ace/ace.submenu-hover.js"></script>
<script src="assets/js/ace/ace.widget-box.js"></script>
<script src="assets/js/ace/ace.settings.js"></script>
<script src="assets/js/ace/ace.settings-rtl.js"></script>
<script src="assets/js/ace/ace.settings-skin.js"></script>
<script src="assets/js/ace/ace.widget-on-reload.js"></script>
<script src="assets/js/ace/ace.searchbox-autocomplete.js"></script>
<script src="assets/js/jquery.raty.js"></script>

<!---------------Full calender ---------------------->
<link rel="stylesheet" type="text/css" href="assets/css/fullcalendar.min.css">
<script type="text/javascript" src="assets/js/moment.min.js"></script>
<script type="text/javascript" src="assets/js/fullcalendar.min.js "></script>

<script type="text/javascript">
	jQuery(function($) {
		keeper_id = <?php echo json_encode($users['info']->user_id); ?>;
		var  base_url = '<?php echo base_url(); ?>';
		
		var date = new Date();
		$('#calendar').fullCalendar({
		    //defaultDate: date,
		    header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		    },
		    defaultView: 'agendaWeek',
		    editable: true,
		     eventClick: function(calEvent, jsEvent, view) {
			//alert('f')
		     },
		    events: [
			<?php if(!empty($keeper_availability)){
				foreach ($keeper_availability as $k=>$v){
					?>
					{
					id:<?php echo $v->id?>,
					title:'Working time',
					start: '<?php echo $v->av_start_time;?>',
					end: '<?php echo $v->av_end_time;?>'
						},
					
			<?php } }?>],
			eventRender: function(event, element) {
				//console.log(event);
				element.append( "<span class='closeon'>X</span>" );
				element.find(".closeon").click(function() {
				  // $('#calendar').fullCalendar('removeEvents',event_id);
				});
			},
			eventClick: function(calEvent, jsEvent, view) {
			
			var r = confirm("Are you sure want to delete this availability hours ?");
			if (r == true) {
				$('#calendar').fullCalendar('removeEvents', function (event) {    
				
				params = {'id': calEvent.id};
				    $.ajax({
					  url: base_url+'keeper/profile/deleteCalendarData',
					 data: params,
					 type: 'POST'
				       }).done(function(data) {
				    //alert('Availability hours has been deleted');
						    });
				
				return event == calEvent; });
			} else {
			    
			}
				
			},
			selectable: true,
			eventDrop: function(event, delta, element) {
				var startDate = event.start.format('YYYY-MM-DD hh:mm'),
				endDate = event.end.format('YYYY-MM-DD hh:mm'),
				params = {'id': event.id, 'start': startDate, 'end': endDate};
				$.ajax({
				      url: base_url+'keeper/profile/updateCalendarData',
				      data: params,
				      type: 'POST'
				    }).done(function(data) {
					alert('Availability  updated Successful! ');
				});
			},
			select: function (start, end, jsEvent, view) {
				var start_date = moment(start).format("YYYY-MM-DD HH:mm");
				var end_date = moment(end).format("YYYY-MM-DD  HH:mm");
				console.log(start_date);
				console.log(end_date);
				$("#calendar").fullCalendar('addEventSource', [{
				    start: start,
				    end: end,
				}, ]);
				
				//saveMyData({'user_id': keeper_id, 'start': start, 'end': end});
				var startDate = start.format('YYYY-MM-DD HH:mm'),
				endDate = end.format('YYYY-MM-DD HH:mm'),
				params = {'user_id': keeper_id, 'start': startDate, 'end': endDate};
				$.ajax({
				      url: base_url+'keeper/profile/addCalendarData',
				      data: params,
				      type: 'POST'
				    }).done(function(data) {
					alert('Availability  added Successful! ');
				});
			},
			selectOverlap: function(event) {
			    //return ! event.block;
			}
		});
		
		
		
		function saveMyData(event) {
			alert(event.user_id)
			var datastring = {user_id : event.user_id,
			start: event.start,
			end:   event.end
			}
			$(function(){  
	    		            $.ajax({type: 'POST',
	    		             url: base_url+'keeper/profile/addCalendarData',
	    		              data: datastring,
	    		               success: function(data){ 
		    		               parent.$('#new_cal_data').html(data); 
	    		               }, error: function(comment){   }  });  });
			//jQuery.post(
			//    '/keeper/profile/addCalendarData', 
			//    {
			//	user_id : event.user_id,
			//	start: event.start,
			//	end:   event.end
			//    }
			//);
		}	

	});
</script>