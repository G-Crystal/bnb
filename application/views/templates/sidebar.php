<div id="sidebar" class="sidebar navbar-collapse collapse">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="ace-icon fa fa-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="ace-icon fa fa-pencil"></i>
			</button>

			<!-- #section:basics/sidebar.layout.shortcuts -->
			<button class="btn btn-warning">
				<i class="ace-icon fa fa-users"></i>
			</button>

			<button class="btn btn-danger">
				<i class="ace-icon fa fa-cogs"></i>
			</button>

			<!-- /section:basics/sidebar.layout.shortcuts -->
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<?php 
		$menu = implode(',', $this->session->userdata('user_access'))[0];
		echo sidebar_menu($menu); 
	?>


	<!-- #section:basics/sidebar.layout.minimize -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>


	<!-- /section:basics/sidebar.layout.minimize -->
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}

		$('.sidebar .db_dDown button').click(function(){
			var expanded = $(this).attr('aria-expanded'),
				expanded = ( typeof expanded === 'undefined' ) ? 'false' : expanded;
			if( expanded == 'false' ){
				$(this).find('span').removeClass('fa-caret-down').addClass('fa-caret-right');
			}else{
				$(this).find('span').removeClass('fa-caret-right').addClass('fa-caret-down');
			}
		});

		$('.nav-list li a[href="appointment"]').click(function(e){
			e.preventDefault();
			$('.ajaxModal').modalBox({
				modal_controller: 'patient',
				modal_view: 'patient_appointment_modal',
				title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-briefcase'></i> Patient appointment</h4></div>",
				width: 400,
				buttons: [
					{
						text: 'Cancel',
						"class" : "appointment_btn_cancel btn btn-minier btn-default",
						click: function() {
							$( this ).dialog( "close" ); 
						}
					},
					{
						text: 'Continue',
						"class" : "appointment_btn_continue btn btn-minier btn-primary",
						click: function() {
						}
					},
					{
						text: 'Submit',
						"class" : "appointment_btn_submit btn btn-minier btn-success hide",
						click: function() {
							//$( this ).dialog( "close" ); 
						}
					}					
				]
			});

		})



		// Create Dashboard
		
		/*if( $.localStorage() ){
			var dashboard_data = false;
			var dashboard_data = {
				dashboard_access: localStorage.getItem('dashboard_access'),
				selected: $.get_localStorage('ls_settings','selected_dashboard'),
				active_link: $.getURIstring()
			}

			$.ajax({
				url: 'helper_ctrl/get_sidebar_menu',
				type: 'POST',
				data: dashboard_data,
				dataType: 'json',
				success: function(res){
					$('#sidebar-shortcuts').after(res);
				}
			}) 
		}*/
		
	</script>
</div>