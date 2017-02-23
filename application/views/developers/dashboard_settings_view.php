<div class="page-content">
	<div class="page-header">
		<h1>
			Dashboard Settings
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				create dashboard here.
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php //print_pre($menu) ?>
			<div class="row">
				<div class="col-lg-3">
					<div class="widget-box widget-color-blue light-border">
						<div class="widget-header">
							<i class="ace-icon fa fa-cogs bigger-130"></i>
							<h5 class="widget-title smaller">Menu Settings</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<div>
									<select class="form-control" id="menu_list" >									
										<?php dropDown( 'main_dashboard','main_dashboard','',array( 'default'=>'NULL' ) ); ?>								
									</select>
								</div>
								<div class="space-6"></div>								
								<p class="align-right">
									<button id="btn_menu_select" class="btn btn-xs btn-primary "><i class="ace-icon fa fa-check-square-o bigger-110"></i>Select</button>
									 or <a id="create_menu" class="bigger-110" href="#">create a new menu</a>
								</p>
								<hr>
								<form id="menu_item">
									<div class="well well-sm has_alert">
										<p class="input-group no-padding-right">
											<label>Name</label>
											<input name="name" class="pull-right input-sm col-xs-8 important" type="text" placeholder="link name">
										</p>
										<p class="input-group no-padding-right">
											<label>Link</label>
											<input name="link" class="pull-right input-sm col-xs-8 important" type="text" placeholder="location">
										</p>
										<p class="input-group no-padding-right">
											<label>Icon</label>
											<input name="icon" class="pull-right input-sm col-xs-8" type="text" placeholder="fa-check">
										</p>
										<div class="space-6"></div>
										<p class="align-right">
											<button id="btn_add_to_menu" class="btn btn-sm btn-success">
												<i class="ace-icon fa fa-plus bigger-110"></i>
												Add to Menu
											</button>
										</p>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="widget-box widget-color-blue light-border">
						<div class="widget-header menu_header">
							<h5 class="widget-title smaller">Menu name: </h5>
							<input id="menu_name" data="<?php echo ($this->input->get('menu_name')) ? $this->input->get('menu_name') : get_settings('main_dashboard') ?>" class="input-sm" type="text" value="<?php the_settings('main_dashboard') ?>">
							<div class="widget-toolbar no-border">
								<button class="btn_save_menu btn btn-xs btn-success">
									Save Menu
								</button>
							</div>
						</div>

						<div class="widget-body clearfix">
							<div id="loading-container" class="col-xs-12">
								<div id="loading" class="no-display">
									<div id="loading-wrapper">
										<i class="ace-icon fa fa-spinner fa-spin orange bigger-225"></i>
									</div>
								</div>
								<div class="widget-main">
										<div class="dd dd-draghandle" id="nestable">
											<?php echo $menu; ?>
										</div>								
								</div>
							</div>
						</div>
						<div class="widget-header">
							<div class="remove_menu widget-toolbar no-padding no-border pull-left">
								<ul class="list-unstyled"><li><a id="remove_menu" href="#" class="white"><i class="ace-icon fa fa-trash-o bigger-130 white"></i> Remove menu</a></li></ul>
							</div>
							<div class="widget-toolbar no-border">
								<button class="btn_save_menu btn btn-xs btn-success">
									Save Menu
								</button>
							</div>
						</div>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->




<!-- page specific plugin scripts -->
<script src="assets/js/jquery.nestable.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">

	jQuery(function($){
		$('#loading').ajaxLoading();
		$('.dd').nestable();
	
		$('.dd-handle a').on('mousedown', function(e){
			e.stopPropagation();
		});

		var menu = <?php echo json_encode($this->input->get('menu_name')); ?>;
		if( menu == 'create_menu' )
			$('.remove_menu').hide();

	});

	$('.nav-user-photo').click(function(e){
		e.preventDefault();
		var _data = $('.dd').nestable('serialiseWidget');
		console.log(_data);
	})

	//Menu Settings Action
	$('#btn_add_to_menu').click(function(e){
		e.preventDefault();

		if( $('#menu_item').formItemsValidation().length > 0 ){
			$(".widget-main").aceAlert({
				icon: 'fa-exclamation-triangle',
				text: ' Name and Link are important',
				remove: false
			});
		}else{
			add_to_menu();
			$(".widget-main").aceAlert('remove');
			$('#menu_item').resetForm();
		}
	});

	$('#btn_menu_select').click(function(){
		var menuName = $('#menu_list').val();		

		$.post('developers/dashboard_settings/get_listWidget/echo', {menu_name:menuName}, function(res){
			$('#menu_name').val(menuName).attr("data",menuName);
			$('#nestable').html(res);
			$('.dd').nestable('re_init');
			$('.dd-handle a').on('mousedown', function(e){
				e.stopPropagation();
			});

			// send data to uri to prevent refresh bug.
			history.pushState({}, '', $.getURIstring()+'?menu_name='+menuName);
		})

		$('.remove_menu').show();
		$('.menu_header').removeClass('with-warning');
	})

	$('#create_menu').click(function(e){
		e.preventDefault();

		$('.remove_menu').hide();

		$('#menu_name').val('').attr("data",'create_menu').focus();
		history.pushState({}, '', $.getURIstring()+'?menu_name=create_menu');

		var menu = $('.dd-list').first();
		menu.html('');
	})

	$('#remove_menu').click(function(e){
		e.preventDefault();
		var _menuName = $('#menu_name').attr('data');
		bootbox.confirm("<i class='ace-icon fa fa-exclamation-triangle orange bigger-130'></i> <b class='orange'>Warning !</b> This will remove "+_menuName+" and cannot be retrieve.", function(result) {
			if(result) {
				

				$.post( 'developers/dashboard_settings/remove_menu', {menu_name:_menuName}, function(res){
					if( res == ' Something went wrong!' ){
						$('.page-content').aceAlert({
							icon: 'fa-exclamation-triangle',
							text: res,
							position: 'top'
						});
					}else if( res == 'removed' ){
						$('.page-content').aceAlert({
							icon: 'fa-exclamation-triangle',
							text: ' '+_menuName+' menu has been successfully deleted.',
							type: 'success',
							position: 'top'
						});
						$('#menu_list').refreshDropDown('main_dashboard');
						$('#menu_name').val('');
						var menu = $('.dd-list').first();
						menu.html('');
					}
				})
			}
		});
	})

	// Menu Drag and Drop Action
	$('.btn_save_menu').click(function(){
		var _data = $('.dd').nestable('serialiseWidget');
		var _newMenuName = $('#menu_name').val();
		var _menuName = $('#menu_name').attr('data');
		var action = ( _menuName == 'create_menu' ) ? 'create_menu' : 'update_menu';
		if( ! _newMenuName ){
			$('.menu_header').addClass('with-warning');
		}else{
			$.ajax({
				url: 'developers/dashboard_settings/'+action+'/echo',
				type: 'POST',
				data: {menu_name:_menuName,new_menu_name:_newMenuName,menuData:_data},
				success: function(res){

					if( res == ' Something went wrong!' ){
						$('.page-content').aceAlert({
							icon: 'fa-exclamation-triangle',
							text: res,
							position: 'top'
						});
					}else if( res == ' already exist.' ){
						$('.page-content').aceAlert({
							icon: 'fa-exclamation-triangle',
							text: ' Menu name '+_newMenuName+res,
							position: 'top',
						});
					}else{
						$('.page-content').aceAlert({
							icon: 'fa-check',
							text: _menuName+' Save successful.',
							position: 'top',
							type: 'success'
						});

						$('#nestable').html(res);
						$('.dd').nestable('re_init');
						$('.dd-handle a').on('mousedown', function(e){
							e.stopPropagation();
						});

						//change uri and menu_name data-type value to new name updated.
						$('#menu_name').attr('data',_newMenuName);
						history.pushState({}, '', $.getURIstring()+'?menu_name='+_newMenuName);

						$('#menu_list').refreshDropDownChosen('main_dashboard',_newMenuName);

						$('.remove_menu').show();
						
					}
				}
			});
		}
	});

	//Menu Settings Functions
	function add_to_menu(){
		var menu = $('.dd-list').first(),
			data_item = $('#menu_item').serialize();
			data_id = $('.dd').nestable('last_id')+1;

		$.ajax({
			url: 'developers/dashboard_settings/add_to_menu',
			type: 'POST',
			data: {item:data_item,id:data_id},
			success: function(res){
				menu.append(res);
				$('.dd-handle a').on('mousedown', function(e){
					e.stopPropagation();
				});
			}
		})
		
	}

</script>