<div class="page-content">
	<div class="page-header">
		<h1>
			JQuery Modals
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Using Ajax and local files.
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<p>
				<a href="#" id="btn_local_modal" class="btn btn-sm">Default Modal</a>
				<a href="#" id="btn_local_modal2" class="btn btn-primary btn-sm">Custom Modal</a>
			</p>
			<div class="space-16"></div>
			<p>
				<a href="#" id="id_ajax_modal" class="btn btn-purple btn-sm">Ajax Dialog</a>
				<a href="#" id="id_ajax_modal2" class="btn btn-danger btn-sm">Ajax Dialog with Query</a>
			</p>
		</div>
	</div>
</div>

<!-- #dialog-message -->
<div id="local_modal_view" class="hide">
	<p>
		This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.
	</p>

	<div class="hr hr-12 hr-double"></div>

	<p>
		Currently using
		<b>36% of your storage space</b>.
	</p>
</div>

<div id="custom_local_modal_view" class="hide">
	<p>
		Custom Modal
		<hr>
		Width is <i>500px</i><br>
		change title to <i>Custom Modal</i><br>
		pre button OK is set to <i>Submit</i><br>
	</p>
</div>
<!-- #dialog-message -->

<script>
	$( "#btn_local_modal" ).on('click', function(e) {
		e.preventDefault();
		$( "#local_modal_view" ).modalBox();
	});

	$( "#btn_local_modal2" ).on('click', function(e) {
		e.preventDefault();
		$( "#custom_local_modal_view" ).modalBox({
			width: 500,
			title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-cog'></i> Custom Modal</h4></div>",
			button_ok: 'Submit',
			button_ok_color: 'btn-success',
			buttons: [ 
						{
							text: "Cancel",
							"class" : "btn btn-minier",
							click: function() {
								$( this ).dialog( "close" ); 
							} 
						}
					]
		});
	});

	$( "#id_ajax_modal" ).on('click', function(e) {	
		e.preventDefault();

		$('.ajaxModal').modalBox({
			modal_view: 'sample_modal',
			modal_data: {
				test: 'sample data',
				sample: 'new data'
			}
		});
	});

	$( "#id_ajax_modal2" ).on('click', function(e) {	
		e.preventDefault();

		$('.ajaxModal').modalBox({
			modal_view: 'sample_query_modal',
			modal_data: {
				name: 'test'
			}
		});
	});

</script>