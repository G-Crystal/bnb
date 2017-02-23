<div class="page-content">
	<div class="page-header">
		<h1>
			Hosts
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				List of all Host
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div id="grid-name2" class="grid-wrap col-xs-12">
				<table id="grid-table"></table>
				<div id="grid-pager"></div>
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
			url: 'host/jqGrid_ctrl/load_data',
			module: 'list_host',
			module_data: {ops:'l_name',status:0},
			colNames: ['Host ID','Full Name','Email','Contact','Address','Actions'],
			colModel: [	{name:'host_id',index:'host_id', width:30, sorttype:"int"},
						{name:'full_name',index:'full_name', width:150, editable: true},
						{name:'email',index:'email', width:90, editable: true},
						{name:'contact',index:'contact',width:60, editable:true},
						{name:'website',index:'website',width:90, editable:true},
						{name:'actions',index:'actions', width:80, fixed:true, sortable:false, resize:false,
							formatter:'actions', 
							formatoptions:{ 
								keys:true,
								delbutton: false,//disable delete button
								editbutton: false,
								
								delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
								//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
							}
						},
					],
			sortname: 'host_id',
			editurl: 'actions',
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
							window.location.href = "host/profile/index/"+rowid;
				          }
				      }
				    ).css({"margin-left": "5px", float: "left", cursor: "pointer"})
				     .addClass("ui-pg-div ui-inline-custom")
				     .append('<span class="fa fa-share green"></span>')
				     .appendTo($(this).children("div"));
				});
			}
		});


	})

</script>