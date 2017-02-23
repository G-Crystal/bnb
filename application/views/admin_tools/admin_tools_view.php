<div class="page-content">
	<div class="page-header">
		<h1>
			Admin Tools
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Admin settings and functionalities.
			</small>
		</h1>
	</div>
	
	<div class="row">
		<div class="col-lg-8 col-md-offset-4">
			<form id="register_form" class="form-horizontal error-bottom" role="form">
				<div class="form-group">
					<h2 class="col-sm-6 no-padding-left">Create user</h2>
				</div>
				<div class="form-group ">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-6 no-padding-left">
								<input type="text" name="f_name" validate="true" validate-message="First name is required." placeholder="First Name" class="col-xs-12" />
							</div>
							<div class="col-xs-6 no-padding-left">
								<input type="text" name="l_name" validate="true" validate-message="Last name is required." placeholder="Last Name" class="col-xs-12" />
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6 no-padding-left">
						<input type="text" name="email" validate="true" email="true" validate-message="Email is required." placeholder="Email" class="col-xs-12" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6 no-padding-left">
						<input type="password" name="password" id="password" validate-message="Please create a password." validate="true" minlength="5" placeholder="Password" class="col-xs-12" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6 no-padding-left">
						<input type="password" name="r_password" equalTo="#password" placeholder="Re-password" class="col-xs-12" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 no-padding-left">
						<select class="form-control" id="access" name="access" validate="true" >
							<option class="center" value="">-- Access --</option>
							<?php dropDown( 'access','','',array( 'filter'=>'1' ) ); ?>								
						</select>
					</div>
					<?php if( hasAccess($this->session->userdata('user_level'),[1]) ) { ?>
					<div class="col-sm-3 no-padding-left">
						<select class="form-control" id="franchise" name="franchise" validate="true" >
							<option class="center" value="">-- Franchise --</option>
							<?php dropDown( 'Franchise','','' ); ?>								
						</select>
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-sm-6 no-padding-left">
						<button id="register_submit" class="btn btn-info pull-right" type="button">
							<i class="ace-icon fa fa-check bigger-110"></i>
							Register
						</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6 no-padding-left">
						<div class="register_alert_message">
							<!-- register alert error here -->
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div><!-- /.page-content -->

<script src="assets/js/jquery.validate.js"></script>

<script>
	$(function() {
		$('.tabbable').save_tab('tab_name');
	});
	
	$('#register_submit').click(function(e){
		var form = $('#register_form');
		$(form).validateForm();
		
		if( $(form).valid() ){
			$.ajax({
				url: 'login/register_user',
				type: 'POST',
				data: {formData: form.serialize()},
				dataType: 'json',
				success: function(res){
					if( typeof res === 'string' && res == 'success' ){
						$('.register_alert_message').aceAlert({
							icon: 'fa-check',
							text: 'Register Successful',
							position: 'top',
							type: 'success'
						});
						form.find("input[type=text], textarea").val("");
					}else{
						$(".register_alert_message").aceAlert('remove');
						$.validate_errors(res,form);
					}
				}
			})
		}
	})

</script>