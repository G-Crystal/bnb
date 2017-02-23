<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.css" />

		<link rel="stylesheet" href="assets/css/login-style.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='assets/js/jquery1x.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>

		<script src="assets/js/js_helper.js"></script>
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<!-- <div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Ace</span>
									<span class="gray" id="id-text2">Application</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Company Name</h4>
							</div> -->
							<br><br><br><br><br><br>
							<?php //print_r($errors); ?>
							<div class="space-6"></div>

							<div class="position-relative">
								<?php
									$login_msg = ( $this->session->flashdata('login') ) ? '' : 'hidden';
									$reg_msg = ( $this->session->flashdata('registration') == 'success' ) ? '' : 'hidden';
								?>
								<div id="alert-msg" class="<?php echo $reg_msg ?>">
									<div class="alert alert-success no-margin-bottom">
										<strong>
										<i class="ace-icon fa fa-check"></i>
										Well done!
										</strong>
										Registration Successfull.
									</div>
								</div>
								<div id="alert-msg" class="<?php echo $login_msg ?>">
									<div class="alert alert-danger no-margin-bottom text-center">
										<strong>
										<i class="ace-icon fa fa-exclamation-triangle"></i>
										</strong>
										<?php echo $this->session->flashdata('login'); ?>
									</div>
								</div>
								<div id="login-box" class="login-form a-form widget-box a-box visible no-border">
									<form method="POST" action="login/validate">
										<div class="section-title">
											<h3 class="text-primary">LogIn to your Account</h3>
										</div>
										<fieldset>
											<div class="textbox-wrap form-group focused">
												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input name="username" type="text" validate="true" class="form-control" placeholder="Username" autofocus/>
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>
											</div>
											<div class="textbox-wrap form-group">
												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input name="password" validate="true" type="password" class="form-control" placeholder="Password" />
														<i class="ace-icon fa fa-key"></i>
													</span>
												</label>
											</div>
											<div class="login-form-action clearfix">
												<!-- <label class="remember inline">
													<input type="checkbox" class="ace" />
													<span class="lbl bigger-110 text-muted"> Remember Me</span>
												</label> -->

												<button id="btn_login" data-form="#login-box" type="submit" class="width-35 pull-right btn btn-sm btn-primary">
													<i class="ace-icon fa fa-key"></i>
													<span class="bigger-110">Login</span>
												</button>
											</div>
										</fieldset>
									

										<div class="toolbar clearfix">
											<hr>
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password pull-left">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup pull-right">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</form>
								</div><!-- /.login-box -->

								

								<div id="signup-box" class="login-form a-form widget-box a-box no-border">
									<form>
										<div class="section-title">
											<h3 class="text-primary">New User Registration</h3>
										</div>
										<fieldset class="pull-left">
											<div class="textbox-wrap form-group focused">
												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input name="user_id" pattern="[0-9]*" validate="true" type="text" class="form-control" placeholder="ID number" autofocus/>
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>
											</div>
											<div class="textbox-wrap form-group">
												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input name="fname" validate="true" type="text" class="form-control" placeholder="First Name" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>
											</div>
											<div class="textbox-wrap form-group">
												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input name="lname" validate="true" type="text" class="form-control" placeholder="Last Name" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>
											</div>
										</fieldset>
										<fieldset class="pull-right">
											<div class="textbox-wrap form-group focused">
												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input name="email" email="true" validate="true" type="text" class="form-control" placeholder="Email" autofocus/>
														<i class="ace-icon fa fa-envelope"></i>
													</span>
												</label>
											</div>
											<div class="textbox-wrap form-group">
												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input minlength="5" id="password" name="password" validate="true" type="password" class="form-control" placeholder="Password" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>
											</div>
											<div class="textbox-wrap form-group">
												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input equalTo="#password" name="r_password" validate="true" type="password" class="form-control" placeholder="Repeat password" />
														<i class="ace-icon fa fa-retweet"></i>
													</span>
												</label>
											</div>
										</fieldset>
										<div class="clearfix"></div>
										<div class="registration-form-action clearfix">

											<div class="clearfix pull-right">
												<button type="reset" class="btn btn-sm">
													<i class="ace-icon fa fa-refresh"></i>
													<span class="bigger-110">Reset</span>
												</button>

												<button id="btn_register" data-form="#signup-box" type="button" class="btn btn-sm btn-primary">
													<span class="bigger-110">Register</span>

													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
										</div>
										
										<div class="toolbar clearfix text-center">
											<hr>
												<a href="#" data-target="#login-box" class="back-to-login-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													Back to login
												</a>
										</div>
										
									</form>
								</div><!-- /.signup-box -->

								<div id="forgot-box" class="login-form a-form widget-box a-box no-border">
									<form>
										<div class="section-title">
											<h3 class="text-primary">Retrieve Password</h3>
										</div>
										<div class="t-info text-muted">Enter your email and to receive instructions</div>
										<fieldset>
											<div class="textbox-wrap form-group focused">
												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input name="username" type="text" class="form-control" placeholder="Username" autofocus/>
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>
											</div>
											<div class="forgot-form-action clearfix">
												<button id="btn_reset" data-form="#forgot-box" type="button" class="width-35 pull-right btn btn-sm btn-primary">
													<i class="ace-icon fa fa-key"></i>
													<span class="bigger-110">Reset</span>
												</button>
											</div>
										</fieldset>
									

										<div class="toolbar clearfix">
											<hr>
											<div class="toolbar center">
												<a href="#" data-target="#login-box" class="back-to-login-link">
													Back to login
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</form>
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<script src="assets/js/jquery.validate.js"></script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			localStorage.removeItem("ls_once");

			// set localstorage session to active
			if ('localStorage' in window && window['localStorage'] !== null){
				$.post('helper_ctrl/activate_localStorage');
			}
			
			$('.login-container').removeAutoComplete();

			$(function($) {

				$('form button').prop('disabled', false);
				
				//localStorage.clear();
				
				/*var dum = {test:'data of test',sample:'sample data'};
				var test = JSON.stringify(dum);
				 localStorage.setItem('myCat', test);

				 console.log(JSON.parse(localStorage.getItem('myCat')));*/

			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();

				$('#alert-msg').hide();
				var target = $(this).data('target');
				$('.a-box.visible').removeClass('visible').css('position','fixed');//hide others
				$(target).addClass('visible').css('position','relative');//show target

				$('.textbox-wrap.focused').removeClass('focused');
				$(target).find('input').first().focus().closest('.textbox-wrap').addClass('focused');
				
				$('body').removeClass('light-login-v');
				$('body').removeClass('light-login-b');
				$('body').removeClass('light-login');

				switch( target ){
					case '#signup-box':
						$('.login-container').width(720);
						$('body').addClass('light-login-v');
						break;
					case '#login-box':
						$('.login-container').width(360);
						$('body').addClass('light-login');
						break;
					case '#forgot-box':
						$('.login-container').width(360);
						$('body').addClass('light-login-b');
						break;

				}
			 });
			});

/*			$( ".position-relative fieldset" ).delegate( ".textbox-wrap input", "focus blur", function() {
			  	  var elem = $( this );
			  	  $('.textbox-wrap.focused').removeClass('focused');
				  $.each( elem, function(){
				  	if( $(this).is(':focus') )
				  		$(this).closest('.textbox-wrap').addClass('focused');
				  });
			});*/

			$( ".textbox-wrap input" ).focus(function(){
				$(this).closest('.textbox-wrap').addClass('focused');
			});

			$( ".textbox-wrap input" ).blur(function(){
				$(this).closest('.textbox-wrap').removeClass('focused');
			});

			$('#btn_login').click(function(e){
				var form = $('#login-box form');
				form.validateForm();
				if( form.valid() ){
					form.preventDoubleSubmission();
				}
			});

			

			$('#btn_register').click(function(e){
				var form_id = $(this).data('form'),
					form = $(form_id).find('form').first();

				$(form).validateForm();
				if( form.valid() ){
					//$('form button').prop('disabled', true);
					$.ajax({
						url: 'login/registration',
						type: 'POST',
						data: {formData: form.serialize()},
						dataType: 'json',
						success: function(res){
							if( typeof res === 'string' && res == 'success' ){
								window.location.replace("login");
							}else{
								$('input[name="password"], input[name="r_password"]').val('');
								if( res['user_id'] ){
									$('input[name="user_id"]').closest('.form-group').removeClass('has-info').addClass('has-error');
									$('input[name="user_id"]').closest('label').append(
										'<div id="user_id-error" class="help-block">'+res["user_id"]+'</div>'
										);
								}
								if( res['email'] ){
									$('input[name="email"]').closest('.form-group').removeClass('has-info').addClass('has-error');
									$('input[name="email"]').closest('label').append(
										'<div id="email-error" class="help-block">'+res["email"]+'</div>'
										);
								}
								if( res['user'] ){
									$('input[name="fname"], input[name="lname"]').closest('.form-group').removeClass('has-info').addClass('has-error');
									$('input[name="fname"]').closest('label').append(
										'<div id="fname-error" class="help-block">'+res["user"]+'</div>'
										);
									$('input[name="lname"]').closest('label').append(
										'<div id="lname-error" class="help-block">'+res["user"]+'</div>'
										);
								}
								if( res['pass'] ){
									$('input[name="r_password"]').closest('.form-group').removeClass('has-info').addClass('has-error');
									$('input[name="r_password"]').closest('label').append(
										'<div id="r_password-error" class="help-block">'+res["pass"]+'</div>'
										);
								}
							}
							$('form button').prop('disabled', false);
						}
					});
				}
				

			})

			$("input[name='user_id']").on('keydown',function (e) {	  
		    	var id = $(this).val();
		        // Allow: backspace, delete, tab, escape, enter and .
		        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		             // Allow: Ctrl+A, Command+A
		            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
		             // Allow: home, end, left, right, down, up
		            (e.keyCode >= 35 && e.keyCode <= 40)) {
		                 // let it happen, don't do anything
		                 return;
		        }
		        // Ensure that it is a number and stop the keypress
		        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		            e.preventDefault();
		        }
		    });


		</script>
	</body>
</html>
