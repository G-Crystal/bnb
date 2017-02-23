<div class="page-content">
	<div class="page-header">
		<h1>
			Services
		</h1>
		<div class="title-action">
			<label for="">Franchise: </label>
			<?php if( hasAccess($this->session->userdata('user_level'),[1]) ){ ?>
			<select id="franchise_id">
				<?php dropDown( 'Franchise','','' ); ?>
			</select>
			<?php }else{ ?>
			<input id="franchise_id" type="hidden" value="<?php echo $this->session->userdata('user_franchise') ?>">
			<?php } ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="check_in"> Check In </label>
					<div class="col-sm-9">
						<input id="check_in" data-label="Check In" data-id="<?php echo ( isset($check_in->service_id) ) ? $check_in->service_id : ''; ?>" class="col-xs-10 col-sm-5 intput_value" placeholder="not set yet" type="text" value="<?php echo ( isset($check_in->service_price) ) ? $check_in->service_price : ''; ?>">
						<span class="input-group-btn">
							<button data-id="check_in" class="btn-service btn btn-inverse btn-sm" type="button">
								<span class="ace-icon fa fa-pencil icon-on-right bigger-110"></span>
								Update
							</button>
						</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="check_out"> Check Out </label>
					<div class="col-sm-9">
						<input id="check_out" data-label="Check Out" data-id="<?php echo ( isset($check_out->service_id) ) ? $check_out->service_id : ''; ?>" class="col-xs-10 col-sm-5 intput_value" placeholder="not set yet" type="text" value="<?php echo ( isset($check_out->service_price) ) ? $check_out->service_price : ''; ?>">
						<span class="input-group-btn">
							<button data-id="check_out" class="btn-service btn btn-warning btn-sm" type="button">
								<span class="ace-icon fa fa-pencil icon-on-right bigger-110"></span>
								Update
							</button>
						</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="loundry"> Loundry </label>
					<div class="col-sm-9">
						<input id="loundry" data-label="Loundry" data-id="<?php echo ( isset($loundry->service_id) ) ? $loundry->service_id : ''; ?>" class="col-xs-10 col-sm-5 intput_value" placeholder="not set yet" type="text" value="<?php echo ( isset($loundry->service_price) ) ? $loundry->service_price : ''; ?>">
						<span class="input-group-btn">
							<button data-id="loundry" class="btn-service btn btn-success btn-sm" type="button">
								<span class="ace-icon fa fa-pencil icon-on-right bigger-110"></span>
								Update
							</button>
						</span>
					</div>
				</div>

				<div class="hr hr-dotted"></div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="nighy_booking"> Night Bookings </label>
					<div class="col-sm-9">
						<input id="nighy_booking" data-label="Night Bookings" data-id="<?php echo ( isset($nighy_booking->service_id) ) ? $nighy_booking->service_id : ''; ?>" class="col-xs-10 col-sm-5 intput_value" placeholder="not set yet" type="text" value="<?php echo ( isset($nighy_booking->service_price) ) ? $nighy_booking->service_price : ''; ?>">
						<span class="input-group-btn">
							<button data-id="nighy_booking" class="btn-service btn btn-primary btn-sm" type="button">
								<span class="ace-icon fa fa-pencil icon-on-right bigger-110"></span>
								Update
							</button>
						</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="saturdays"> Saturdays </label>
					<div class="col-sm-9">
						<input id="saturdays" data-label="Saturdays" data-id="<?php echo ( isset($saturdays->service_id) ) ? $saturdays->service_id : ''; ?>" class="col-xs-10 col-sm-5 intput_value" placeholder="not set yet" type="text" value="<?php echo ( isset($saturdays->service_price) ) ? $saturdays->service_price : ''; ?>">
						<span class="input-group-btn">
							<button data-id="saturdays" class="btn-service btn btn-primary btn-sm" type="button">
								<span class="ace-icon fa fa-pencil icon-on-right bigger-110"></span>
								Update
							</button>
						</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="sundays"> Sundays </label>
					<div class="col-sm-9">
						<input id="sundays" data-label="Sundays" data-id="<?php echo ( isset($sundays->service_id) ) ? $sundays->service_id : ''; ?>" class="col-xs-10 col-sm-5 intput_value" placeholder="not set yet" type="text" value="<?php echo ( isset($sundays->service_price) ) ? $sundays->service_price : ''; ?>">
						<span class="input-group-btn">
							<button data-id="sundays" class="btn-service btn btn-primary btn-sm" type="button">
								<span class="ace-icon fa fa-pencil icon-on-right bigger-110"></span>
								Update
							</button>
						</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right"> Last Minute Booking </label>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="last_minute_booking24"> less than 24h </label>
					<div class="col-sm-9">
						<input id="last_minute_booking24" data-label="Last Minute Booking less than 24h" data-id="<?php echo ( isset($last_minute_booking24->service_id) ) ? $last_minute_booking24->service_id : ''; ?>" class="col-xs-10 col-sm-5 intput_value" placeholder="not set yet" type="text" value="<?php echo ( isset($last_minute_booking24->service_price) ) ? $last_minute_booking24->service_price : ''; ?>">
						<span class="input-group-btn">
							<button data-id="last_minute_booking24" class="btn-service btn btn-primary btn-sm" type="button">
								<span class="ace-icon fa fa-pencil icon-on-right bigger-110"></span>
								Update
							</button>
						</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="last_minute_booking72"> less than 72h </label>
					<div class="col-sm-9">
						<input id="last_minute_booking72" data-label="Last Minute Booking less than 72h" data-id="<?php echo ( isset($last_minute_booking72->service_id) ) ? $last_minute_booking72->service_id : ''; ?>" class="col-xs-10 col-sm-5 intput_value" placeholder="not set yet" type="text" value="<?php echo ( isset($last_minute_booking72->service_price) ) ? $last_minute_booking72->service_price : ''; ?>">
						<span class="input-group-btn">
							<button data-id="last_minute_booking72" class="btn-service btn btn-primary btn-sm" type="button">
								<span class="ace-icon fa fa-pencil icon-on-right bigger-110"></span>
								Update
							</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<label class="col-sm-4 text-success bigger-160">Cleaning</label>
			<div id="grid-name2" class="grid-wrap col-xs-12 padding-10">
				<table id="grid-table2"></table>
				<div id="grid-pager2"></div>
			</div>
		</div>
	</div>
</div>

<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="assets/js/jqGrid/jquery.jqGrid.src.js"></script>
<script src="assets/js/jqGrid/jquery.jqGrid.preset.js"></script>
<script src="assets/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="assets/js/bootbox.js"></script>
<script src="assets/js/jquery.gritter.js"></script>

<script type="text/javascript">
	franchise_id = $('#franchise_id').val();

	updateServices(franchise_id);

	$('#franchise_id').change(function(){
		franchise_id = $(this).val();
		var data = {
			module: 'cleaning',
			module_data: {franchise:franchise_id},
		};
		$.searchOnGrid('admin/jqGrid_ctrl','grid-table2',data,'admin/services/actions?franchise='+franchise_id);

		updateServices(franchise_id);
	});

	function updateServices(id){
		$.ajax({
			url: 'admin/services/getAllServices',
			data: {franchise:id},
			dataType: 'json',
			type: 'POST',
			success: function(res){
				// set value and data to null
				var check_in = $('.intput_value');
				check_in.val('');
				check_in.data('id','');

				if( res != '' ) {
					$.each(res,function(k,v){
						switch(v.service_name){
							case 'Check In': var input = $('#check_in'); break;
							case 'Check Out': var input = $('#check_out'); break;
							case 'Loundry': var input = $('#loundry'); break;
							case 'Night Bookings': var input = $('#nighy_booking'); break;
							case 'Saturdays': var input = $('#saturdays'); break;
							case 'Sundays': var input = $('#sundays'); break;
							case 'Last Minute Booking less than 24h': var input = $('#last_minute_booking24'); break;
							case 'Last Minute Booking less than 72h': var input = $('#last_minute_booking72'); break;
							default: break
						}

						input.val(v.service_price);
						input.data('id',v.service_id);
					});
				}
			}

		})
	}

	jQuery(function($) {
		$('#grid-table2').wd_jqGrid({
			url: 'admin/jqGrid_ctrl/load_data',
			module: 'cleaning',
			module_data: {franchise:franchise_id},
			colNames: ['ID','Name','Value','Sorting','Actions'],
			colModel: [	{name:'cleaning_id',index:'cleaning_id', width:30, sorttype:"int"},
						{name:'name',index:'name', width:150, editable: true},
						{name:'value',index:'value', width:100, editable: true, align:'right'},
						{name:'sorting',index:'sorting', width:50, editable: true},
						{name:'actions',index:'actions', width:100, fixed:true, sortable:false, resize:false,
							formatter:'actions', 
							formatoptions:{ 
								keys:true,
								
								delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
								//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
							}
						},
					],
			sortname: 'cleaning_id',
			editurl: 'admin/services/actions?franchise='+franchise_id,
			toolbarAdd: true
		});


	});

	$('.btn-service').click(function(){
		var button = $(this),
			id = button.data('id'),
			input = $('#'+id);

		if( input.val() ){
			var data = {
				service_id : input.data('id'),
				service_name : input.data('label'),
				service_price : input.val(),
				franchise_id : franchise_id
			}
			$.post('admin/services/updateServices',data)
				.done(function(res){
					console.log(res);
					if( res == 'success' ){
						$.gritter.add({
							// (string | mandatory) the heading of the notification
							title: 'Successful',
							// (string | mandatory) the text inside the notification
							text: data.service_name+' is now $'+data.service_price,
							class_name: 'gritter-success'
						});
					}else{
						$.gritter.add({
							// (string | mandatory) the heading of the notification
							title: 'Error!',
							// (string | mandatory) the text inside the notification
							text: res,
							class_name: 'gritter-error'
						});
					}
				});
		}else{
			bootbox.alert('Please input a value');
		}


	});

</script>