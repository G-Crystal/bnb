
<div class="page-content">
	<div class="page-header">
		<h1>
			jqGrid
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<table id="grid-table1"></table>
			<div id="grid-pager1"></div>

			<div id="grid-name" class="grid-wrap col-xs-6">
				<table id="grid-table"></table>
			</div>
			<div id="grid-name2" class="grid-wrap col-xs-6">
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

<script type="text/javascript">
	$('.nav-user-photo').click(function(e){
		e.preventDefault();
		console.log($('#grid-table').wd_jqGrid());
		
		//$('#grid-table').wd_jqGrid('afterSubmit','xxxx','fff');
		//$('#grid-table').jqGrid('navGrid','#grid-pager',{edit:true});
	})
	
	jQuery(function($) {

		$('#grid-table').wd_jqGrid({
			url: 'developers/jqGrid_ctrl/load_data',
			module: 'sample_jqgrid',
			module_data: {ops:'l_name',status:0},
			colNames: ['Actions','Employee ID','First Name','Last Name','Status'],
			colModel: [	{name:'actions',index:'actions', width:80, fixed:true, sortable:false, resize:false,
							formatter:'actions', 
							formatoptions:{ 
								keys:true,
								//delbutton: false,//disable delete button
								
								delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
								//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
							}
						},					
						{name:'employee_id',index:'employee_id', width:60, sorttype:"int"},
						{name:'f_name',index:'f_name',width:90, editable:true},
						{name:'l_name',index:'l_name', width:150, editable: true,unformat: pickDate, dateFormat: 'yyyy-mm-dd'},
						{name:'status',index:'status', width:70, editable: true,edittype:"checkbox",editoptions: {value:"1:0"},unformat: aceSwitch}, 
					],
			sortname: 'employee_id',
			toolbarEdit: true,
			toolbarAdd: true,
			toolbarDel: true,
			toolbarSearch: true,
			toolbarRefresh: true,
			toolbarView: true,
			editurl: 'developers/jqGrid/actions',
			caption: 'Employee',
			height: "100%",
			ondblClickRow: function(rowid){
				console.log(this);
			}
		});

		$('#grid-table2').wd_jqGrid({
			url: 'developers/jqGrid_ctrl/load_data',
			module: 'sample_user',
			module_data: {ops:'l_name',status:0},
			colNames: ['Actions','User ID','FIrst Name','Last Date','User Email','Middle Name'],
			colModel: [	{name:'actions',index:'actions', width:80, fixed:true, sortable:false, resize:false,
							formatter:'actions', 
							formatoptions:{ 
								keys:true,
								//delbutton: false,//disable delete button
								
								delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
								//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
							}
						},					
						{name:'user_id',index:'user_id', width:60, sorttype:"int"},
						{name:'user_fname',index:'user_fname',width:90, editable:true},
						{name:'user_lname',index:'user_lname', width:150, editable: true},
						{name:'user_email',index:'user_email', width:70, editable: true},
						{name:'middle_name',index:'middle_name', width:70, editable: true}
					],
			sortname: 'user_id',
			editurl: 'developers/jqGrid/actions_sample_user',
			caption: 'Sample User',
			toolbarEdit: true,
			toolbarDel: true,
		});


	})

</script>