<div class="page-content">
	<div class="page-header">
		<h1>
			Franchise
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				List of all Franchise
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

		$('#grid-table2').wd_jqGrid({
			url: 'admin/jqGrid_ctrl/load_data',
			module: 'franchise',
			module_data: {ops:'l_name',status:0},
			colNames: ['ID','Franchise Name','Actions'],
			colModel: [	{name:'franchise_id',index:'franchise_id', width:30, sorttype:"int"},
						{name:'name',index:'name', width:150, editable: true},
						{name:'actions',index:'actions', width:100, fixed:true, sortable:false, resize:false,
							formatter:'actions', 
							formatoptions:{ 
								keys:true,
								
								delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
								//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
							}
						},
					],
			sortname: 'franchise_id',
			editurl: 'admin/franchise/actions',
			toolbarAdd: true,
			ondblClickRow: function(rowid){
				console.log(this);
			},
			loadComplete: function(data){
				// add custom button in action field
				var grid = $(this);
				setTimeout(function(){
		            styleCheckbox(grid);
		            
		            updateActionIcons(grid);
		            updatePagerIcons(grid);
		            enableTooltips(grid);
		          }, 0);
				var iCol = $.getColumnIndexByName(grid,'actions');
				grid.find(">tbody>tr.jqgrow>td:nth-child(" + (iCol + 1) + ")")
				  .each(function() {
				      $("<div>", {
				          title: "Custom",
				          mouseover: function() {
				              $(this).addClass('ui-state-hover');
				          },
				          mouseout: function() {
				              $(this).removeClass('ui-state-hover');
				          },
				          click: function(e) {
							var rowid = $(e.target).closest("tr.jqgrow").attr("id");
							var rowData = grid.jqGrid('getRowData',rowid);
							window.location.href = "admin/suburbs/index/"+rowid;
				          }
				      }
				    ).css({"margin-left": "10px", float: "left", cursor: "pointer", position: "relative", top: "3px"})
				     .addClass("ui-pg-div ui-inline-custom")
				     .append('<span class="fa fa-share green"></span>')
				     .appendTo($(this).children("div"));
				});
			}
		});


	})

</script>