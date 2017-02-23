<div class="page-content">
	<div class="page-header">
		<h1>
			Suburbs
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				List of all suburb
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div id="grid-name2" class="grid-wrap col-xs-12">
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
		console.log($('#grid-table2').wd_jqGrid());
		
		//$('#grid-table').wd_jqGrid('afterSubmit','xxxx','fff');
		//$('#grid-table').jqGrid('navGrid','#grid-pager',{edit:true});
	})
	
	jQuery(function($) {
		franchise = <?php echo json_encode($franchise); ?>;
		$('#grid-table2').wd_jqGrid({
			url: 'admin/jqGrid_ctrl/load_data',
			module: 'suburbs',
			module_data: {franchise:franchise},
			colNames: ['ID','Suburbs Name','Suburbs Code','Actions'],
			colModel: [	{name:'id',index:'id', width:30, sorttype:"int"},
						{name:'name',index:'name', width:150, editable: true},
						{name:'code',index:'code', width:150, editable: true},
						{name:'actions',index:'actions', width:80, fixed:true, sortable:false, resize:false,
							formatter:'actions', 
							formatoptions:{ 
								keys:true,
								
								delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
								//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
							}
						},
					],
			sortname: 'id',
			editurl: 'admin/suburbs/actions?franchise='+franchise,
			toolbarAdd: true,
			ondblClickRow: function(rowid){
				console.log(this);
			}
		});


	})

</script>