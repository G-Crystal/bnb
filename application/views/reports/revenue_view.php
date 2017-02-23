<div class="page-content">
	<div class="col-xs-12 col-sm-4 with-search">
		<p class="text-primary bigger-180 lighter">
			Patient list
			<small class="text-muted">
				<i class="ace-icon fa fa-angle-double-right"></i>
				List of all patient.
			</small>
		</p>		
	</div>
	<div class="col-xs-12 col-sm-8">
		<form class="form-horizontal" role="form">
			<div class="row">
				<div class="form-group col-xs-6">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date Range </label>
					<div class="col-sm-9">
						<input class="form-control pull-right" type="text" name="date-range-picker" id="id-date-range-picker-1" />
					</div>
				</div>
				<div class="form-group col-xs-6">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Type </label>
					<div class="col-sm-9">
						<select class="chosen-select form-control" id="form-field-select-3" >
																<option value="">  </option>
																<option value="AL">Revenue</option>
																<option value="AK">Alaska</option>
																<option value="AZ">Arizona</option>
																<option value="AR">Arkansas</option>
																<option value="CA">California</option>
															
																
															</select>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="clearfix"></div>
	<hr class="hr-6">
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div id="patient_list_wrapper" class="grid-wrap col-xs-12 head-primary">
					<table id="revenue-table"></table>
				</div>
				<!-- <div class="col-xs-12 col-lg-3 search-tool">
					<div class="widget-box widget-color-blue light-border">
						<div class="widget-header">
							<i class="ace-icon fa fa-search bigger-130"></i>
							<h5 class="widget-title smaller">Searching tools</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<form class="form-horizontal padding-lr" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Search </label>
										<div class="col-sm-9">
											<input id="q_search" for="search_btn" type="text" class="col-xs-12" placeholder="Search key here..." />
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-12">
											<button id="search_btn" class="btn btn-sm btn-info pull-right" type="button">
												<i class="ace-icon fa fa-search bigger-110"></i>
												Search
											</button>
										</div>
									</div>
								</form>
								<form id="advance_form" class="form-horizontal padding-lr" role="form">
									<div class="space"></div>
									<h3 class="header smaller lighter green">Advance search</h3>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Patient ID </label>
										<div class="col-sm-9">
											<input name="patient_id" type="text" class="col-xs-12" />
										</div>
									</div>	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> First name </label>
										<div class="col-sm-9">
											<input name="first_name" type="text" class="col-xs-12" />
										</div>
									</div>	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Last name </label>
										<div class="col-sm-9">
											<input name="last_name" type="text" class="col-xs-12" />
										</div>
									</div>		
									<div class="form-group">
										<div class="col-sm-12">
											<button id="a_search_btn" class="btn btn-sm btn-info pull-right btn-success" type="button">
												<i class="ace-icon fa fa-search bigger-110"></i>
												Advance search
											</button>
										</div>
									</div>
								</form>									
							</div>
						</div>
					</div>
				</div> -->

			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
<script src="assets/js/date-time/moment.js"></script>
<script src="assets/js/date-time/daterangepicker.js"></script>
<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="assets/js/jqGrid/jquery.jqGrid.src.js"></script>
<script src="assets/js/jqGrid/jquery.jqGrid.preset.js"></script>
<script src="assets/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="assets/js/chosen.jquery.js"></script>

<script type="text/javascript">
		jQuery(function($) {
		$('#revenue-table').wd_jqGrid({
			url: 'reports/jqGrid_ctrl/load_data',
			module: 'patient_list',
			//module_data: {ops:'l_name',status:0},
			colNames: ['Patient ID','Full name','Insurance','Contact info'],
			colModel: [	{name:'patient_id',index:'patient_id', width:60, sorttype:"int"},
						{name:'full_name',index:'full_name',width:150, editable:true},
						{name:'insurance_name',index:'insurance_name', width:150},
						{name:'contact_info',index:'contact_info', width:70, editable: true}, 
					],
			sortname: 'patient_id',
			//editurl: 'developers/jqGrid/actions',
			caption: false,
			height: "100%",
			ondblClickRow: function(rowid){
				alert(rowid);
				/*var rowData = $(this).jqGrid('getRowData',rowid);
				$.post('patient/patient_list/latest_appointment',{id:rowData.patient_id},function(res){
					if( res ){
						$.redirect('patient/session_form', {patient_id: rowData.patient_id, appointment_id: res});
					}else{
						bootbox.alert('No record yet!');
					}
					
				})*/
			}
		});
	});


	$('input[name=date-range-picker]').daterangepicker();
	$('.chosen-select').chosen({allow_single_deselect:true}); 
	



</script>