<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="header smaller lighter blue">Dropdown Menu from Tables</h3>

					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> Menus </label>
							<div class="col-sm-5">
								<select class="chosen-select form-control" id="menu_list" data-placeholder="Choose a Menu...">
									<?php dropDown('Menus','','',array( 'sort'=>'asc', 'sortby'=>'value' )); ?>
								</select>
							</div>
							<div id="notification" class="col-sm-5 align-right"></div>
						</div>
					</form>
					<div class="hr hr-dotted hr-16"></div>
					<form id="menu_form" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Menu name </label>
							<div class="col-sm-4">
								<input name="menu_name" validate="true" class="width-100" type="text" placeholder="display_name">
							</div>							
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Table name </label>
							<div class="col-sm-4">
								<input name="table_name" validate="true" validate-message="Test required" class="width-100" type="text" placeholder="name_of_table">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Item value </label>
							<div class="col-sm-4">
								<input name="item_value" validate="true" class="width-100" type="text" placeholder="field_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Item name </label>
							<div class="col-sm-4">
								<input name="item_name" validate="true" class="width-100" type="text" placeholder="field_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Condition </label>
							<div class="col-sm-4">
								<input name="menu_where" class="width-100" type="text" placeholder="tbl_name=1,status=0">
							</div>
						</div>
						<div class="space"></div>
						<div class="col-xs-12">
							<div class="form-group col-xs-9 margin-top">
								<a class="red" href="remove_menu" data-action="close">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
									Remove
								</a>
							</div>
							<div class="form-group">
								<button id="btn_save" class="btn btn-sm btn-success pull-right" type="button">
									<i class="ace-icon fa fa-floppy-o bigger-110"></i>
									Save
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-6">
					<h3 class="header smaller lighter green">Custom Dropdown Menu</h3>

					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-2 control-label no-padding-right"> Custom Menus </label>
							<div class="col-sm-5">
								<select id="custom_menu_list" class="form-control chosen-select" data-placeholder="Choose a Menu...">
									<?php dropDown('custom_menu'); ?>
								</select>
							</div>
							<div id="custom_notification" class="col-sm-5 align-right"></div>
						</div>
					</form>
					<div class="hr hr-dotted hr-16"></div>
					<form id="custom_menu_form" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> Menu name </label>
							<div class="col-sm-4">
								<input name="custom_menu_name" validate="true" class="width-100"  type="text" placeholder="display_name">
							</div>							
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right"> List </label>
							<div class="col-sm-9">
								<textarea name="menu_data" class="form-control" placeholder="key|value;" style="height:180px;"></textarea>
							</div>
						</div>
						<div class="space"></div>
						<div class="col-xs-12">
							<div class="form-group col-xs-9 margin-top">
								<a class="red" href="remove_customMenu" data-action="close">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
									Remove
								</a>
							</div>
							<div class="form-group">
								<button id="btn_custom_save" class="btn btn-sm btn-success pull-right" type="button">
									<i class="ace-icon fa fa-floppy-o bigger-110"></i>
									Save
								</button>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="assets/js/jquery.validate.js"></script>
<script src="assets/js/chosen.jquery.js"></script>

<script>

	$('.chosen-select').chosen();

	$('a[href="remove_menu"]').click(function(e){
		e.preventDefault();
		var menu = $('#menu_list').val();
			menuName = $( "#menu_list option:selected" ).text();
		bootbox.confirm("Are you sure you want to delete <i>'"+menuName+"'</i> ?", function(result) {
			if(result){
				$.post( 'developers/dropdown_menus/delete_menu', { data:menu }, function(res){
					// var color = ( res == 'updated' ) ? 'orange' : 'blue';
					// var action = ( res == 'updated' ) ? 'Menu updated' : 'Menu created';
					$("#notification").html( '<h4 class="red" >'+res+'</h4>' ).show();
					$('#notification').delay( 5000 ).fadeOut( 500 );
					$('#menu_list').refreshDropDownChosen( 'Menus' );
				});	
			}
		});
	});

	$('a[href="remove_customMenu"]').click(function(e){
		e.preventDefault();
		var menu = $('#custom_menu_list').val();
			menuName = $( "#custom_menu_list option:selected" ).text();
		bootbox.confirm("Are you sure you want to delete <i>'"+menuName+"'</i> ?", function(result) {
			if(result){
				$.post( 'developers/dropdown_menus/delete_menu', { data:menu }, function(res){
					// var color = ( res == 'updated' ) ? 'orange' : 'blue';
					// var action = ( res == 'updated' ) ? 'Menu updated' : 'Menu created';
					$("#custom_notification").html( '<h4 class="red" >'+res+'</h4>' ).show();
					$('#custom_notification').delay( 5000 ).fadeOut( 500 );
					$('#custom_menu_list').refreshDropDownChosen( 'custom_menu' );
				});	
			}
		});
	})
	
	$('#btn_save').click(function(e){
		e.preventDefault();
		
		$('#menu_form').validateForm();

		if( $('#menu_form').valid() ){
			var form = $('#menu_form');
			var name = form.find('input[name="menu_name"]').val();
			
			$.post( 'developers/dropdown_menus/menu_name_exist', { name: name }, function(res){
				if( res == 'true' ){
					bootbox.confirm("Menu already exist. Do you want to update?", function(result) {
						if(result)
							save_menu( $('#menu_form').serialize() );
					});
				}else{
					save_menu( $('#menu_form').serialize() );
					$('#menu_list').refreshDropDownChosen( 'Menus' );
				}
			});
		}
	});

	$('#btn_custom_save').click(function(e){
		e.preventDefault();
		var form = $('#custom_menu_form');
		$('#custom_menu_form').validateForm();
		if( form.valid() ){
			
			var name = form.find('input[name="custom_menu_name"]').val();
			var data = form.find('textarea[name="menu_data"]').val();

			$.post( 'developers/dropdown_menus/menu_name_exist', { name: name }, function(res){
				if( res == 'true' ){
					bootbox.confirm("Menu already exist. Do you want to update?", function(result) {
						if(result)
							save_custom_menu( form.serialize() );
					});
					
				}else{
					save_custom_menu( form.serialize() );
					$('#custom_menu_list').refreshDropDownChosen( 'custom_menu' );
				}
			});
		}
	})

	$('#menu_list').change(function(){

		$.ajax({
			url: 'developers/dropdown_menus/get_data',
			type: 'POST',
			data: {data:$(this).val()},
			dataType: 'json',
			success: function(res){
				// populate form fields
				var $box = $('#menu_form');
				$.each( res, function( key,value ){
					var input = $box.find('input[name="'+key+'"]');
					input.val( value );
				})
				
			}
		})
	})

	$('#custom_menu_list').change(function(){

		$.ajax({
			url: 'developers/dropdown_menus/get_data',
			type: 'POST',
			data: {data:$(this).val()},
			dataType: 'json',
			success: function(res){
				// populate form fields
				var $box = $('#custom_menu_form');
				$.each( res, function( key,value ){
					var input = $box.find('input[name="'+key+'"]'),
						textarea = $box.find('textarea[name="'+key+'"]');
					input.val( value );
					textarea.val( value );
				})
				
			}
		})
	})

	function save_menu( menu ){
		$.post( 'developers/dropdown_menus/save_menu', { data:menu,type:'table' }, function(res){
			var color = ( res == 'updated' ) ? 'orange' : 'blue';
			var action = ( res == 'updated' ) ? 'Menu updated' : 'Menu created';
			$("#notification").html( '<h4 class="'+color+'" >'+action+'</h4>' ).show();
			$('#notification').delay( 5000 ).fadeOut( 500 );
		});
	}

	function save_custom_menu( menu ){
		$.post( 'developers/dropdown_menus/save_menu', { data:menu,type:'custom' }, function(res){
			var color = ( res == 'updated' ) ? 'orange' : 'blue';
			var action = ( res == 'updated' ) ? 'Menu updated' : 'Menu created';
			$("#custom_notification").html( '<h4 class="'+color+'" >'+action+'</h4>' ).show();
			$('#custom_notification').delay( 5000 ).fadeOut( 500 );
			$(window).scrollTop(form);
		});
	}

</script>