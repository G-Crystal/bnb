<div class="page-content">
	<div class="page-header">
		<h1>
			Host Profile
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- <div id="user-profile-2" class="user-profile">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-18">
						<li class="active">
							<a data-toggle="tab" href="#home">
								<i class="green ace-icon fa fa-user bigger-120"></i>
								Profile
							</a>
						</li>
			
						<li>
							<a data-toggle="tab" href="#feed">
								<i class="orange ace-icon fa fa-rss bigger-120"></i>
								Activity Feed
							</a>
						</li>
					</ul> -->

					<div class="tab-content no-border padding-24">
						<div id="home" class="tab-pane in active">
							<div class="row">
								<div class="col-xs-12 col-sm-3 center">
									<span class="profile-picture">
										<img id="avatar" data-pk="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo ( isset($users['personal']->avatar) && $users['personal']->avatar != '' ) ? $users['personal']->avatar: 'assets/avatars/profile-pic.jpg'; ?>" />
									</span>

									<div class="space space-4"></div>
									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<span id="firstname" class="middle white no-style"><?php echo isset($users['info']->user_fname) ? $users['info']->user_fname: ''; ?></span>
											<span id="lastname" class="middle white no-style"><?php echo isset($users['info']->user_lname) ? $users['info']->user_lname: ''; ?></span>
										</div>
									</div>
									<div class="space space-4"></div>
									<div class="profile-contact-info">
										<div class="profile-contact-links align-left">
											<a href="#" class="btn btn-link">
												<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
												Find me on Facebook
											</a>

											<a href="#" class="btn btn-link">
												<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
												Follow me on Twitter
											</a>
										</div>

										<div class="space-6"></div>
									</div>
								</div><!-- /.col -->

								<div class="col-xs-12 col-sm-9">
									<!-- <h4 class="blue">
										<span id="firstname" class="middle"><?php echo isset($users['info']->user_fname) ? $users['info']->user_fname: ''; ?></span>
										<span id="lastname" class="middle"><?php echo isset($users['info']->user_lname) ? $users['info']->user_lname: ''; ?></span>
									
										<span class="label label-purple arrowed-in-right">
											<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
											Keeper
										</span>
									</h4> -->

									<div class="profile-user-info">

										<div class="profile-info-row">
											<div class="profile-info-name"> Location </div>

											<div class="profile-info-value">
												<i class="fa fa-map-marker light-orange bigger-110"></i>
												<span id="state"><?php echo isset($users['personal']->state) ? $users['personal']->state: ''; ?></span>
												<span id="location"><?php echo isset($users['personal']->location) ? $users['personal']->location: ''; ?></span>
												<span id="zip"><?php echo isset($users['personal']->zip) ? $users['personal']->zip: ''; ?></span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Contact </div>

											<div class="profile-info-value">
												<span id="contact"><?php echo isset($users['personal']->contact) ? $users['personal']->contact: ''; ?></span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Language </div>

											<div class="profile-info-value">
												<span id="languages"><?php echo isset($users['personal']->languages) ? arrayToList($users['personal']->languages,', ',true): ''; ?></span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Email </div>

											<div class="profile-info-value">
												<span id="email"><?php echo isset($users['info']->user_email) ? $users['info']->user_email: ''; ?></span>
											</div>
										</div>
									</div>

									<div class="hr hr-8 dotted"></div>

									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> Website </div>

											<div class="profile-info-value">
												<a href="#" id="website"><?php echo isset($users['personal']->website) ? $users['personal']->website: ''; ?></a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> About me </div>

											<div class="profile-info-value padding-left-20">
												<span id="introduction"><?php echo ( isset($users['personal']->introduction) && $users['personal']->introduction != '' ) ? $users['personal']->introduction: 'Say something'; ?></span>
											</div>
										</div>
									</div>

									<div class="profile-user-info">
										
									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->

							<div class="space-20"></div>
						</div><!-- /#home -->

						<div id="feed" class="tab-pane">
							<div class="profile-feed row">
								<div class="col-sm-6">
									<div class="profile-activity clearfix">
										<div>
											<img class="pull-left" alt="Alex Doe's avatar" src="assets/avatars/avatar5.png" />
											<a class="user" href="#"> Alex Doe </a>
											changed his profile photo.
											<a href="#">Take a look</a>

											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												an hour ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>

									<div class="profile-activity clearfix">
										<div>
											<img class="pull-left" alt="Susan Smith's avatar" src="assets/avatars/avatar1.png" />
											<a class="user" href="#"> Susan Smith </a>

											is now friends with Alex Doe.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												2 hours ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>

									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-check btn-success no-hover"></i>
											<a class="user" href="#"> Alex Doe </a>
											joined
											<a href="#">Country Music</a>

											group.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												5 hours ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>

									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-picture-o btn-info no-hover"></i>
											<a class="user" href="#"> Alex Doe </a>
											uploaded a new photo.
											<a href="#">Take a look</a>

											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												5 hours ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>

									<div class="profile-activity clearfix">
										<div>
											<img class="pull-left" alt="David Palms's avatar" src="assets/avatars/avatar4.png" />
											<a class="user" href="#"> David Palms </a>

											left a comment on Alex's wall.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												8 hours ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>
								</div><!-- /.col -->

								<div class="col-sm-6">
									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-pencil-square-o btn-pink no-hover"></i>
											<a class="user" href="#"> Alex Doe </a>
											published a new blog post.
											<a href="#">Read now</a>

											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												11 hours ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>

									<div class="profile-activity clearfix">
										<div>
											<img class="pull-left" alt="Alex Doe's avatar" src="assets/avatars/avatar5.png" />
											<a class="user" href="#"> Alex Doe </a>

											upgraded his skills.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												12 hours ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>

									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
											<a class="user" href="#"> Alex Doe </a>

											logged in.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												12 hours ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>

									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-power-off btn-inverse no-hover"></i>
											<a class="user" href="#"> Alex Doe </a>

											logged out.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												16 hours ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>

									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
											<a class="user" href="#"> Alex Doe </a>

											logged in.
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												16 hours ago
											</div>
										</div>

										<div class="tools action-buttons">
											<a href="#" class="blue">
												<i class="ace-icon fa fa-pencil bigger-125"></i>
											</a>

											<a href="#" class="red">
												<i class="ace-icon fa fa-times bigger-125"></i>
											</a>
										</div>
									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->

							<div class="space-12"></div>

							<div class="center">
								<button type="button" class="btn btn-sm btn-primary btn-white btn-round">
									<i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
									<span class="bigger-110">View more activities</span>

									<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
								</button>
							</div>
						</div><!-- /#feed -->
					</div>
				</div>
			<!-- </div> --> <!-- End Tabbable -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->

<script src="assets/js/jquery-ui.custom.js"></script>
<script src="assets/js/jquery.ui.touch-punch.js"></script>
<script src="assets/js/jquery.gritter.js"></script>
<script src="assets/js/bootbox.js"></script>
<script src="assets/js/jquery.easypiechart.js"></script>
<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="assets/js/jquery.hotkeys.js"></script>
<script src="assets/js/bootstrap-wysiwyg.js"></script>
<script src="assets/js/select2.js"></script>
<script src="assets/js/fuelux/fuelux.spinner.js"></script>
<script src="assets/js/x-editable/bootstrap-editable.js"></script>
<script src="assets/js/x-editable/ace-editable.js"></script>
<script src="assets/js/jquery.maskedinput.js"></script>

<script src="assets/js/ace/elements.scroller.js"></script>
<script src="assets/js/ace/elements.colorpicker.js"></script>
<script src="assets/js/ace/elements.fileinput.js"></script>
<script src="assets/js/ace/elements.typeahead.js"></script>
<script src="assets/js/ace/elements.wysiwyg.js"></script>
<script src="assets/js/ace/elements.spinner.js"></script>
<script src="assets/js/ace/elements.treeview.js"></script>
<script src="assets/js/ace/elements.wizard.js"></script>
<script src="assets/js/ace/elements.aside.js"></script>
<script src="assets/js/ace/ace.js"></script>
<script src="assets/js/ace/ace.ajax-content.js"></script>
<script src="assets/js/ace/ace.touch-drag.js"></script>
<script src="assets/js/ace/ace.sidebar.js"></script>
<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="assets/js/ace/ace.submenu-hover.js"></script>
<script src="assets/js/ace/ace.widget-box.js"></script>
<script src="assets/js/ace/ace.settings.js"></script>
<script src="assets/js/ace/ace.settings-rtl.js"></script>
<script src="assets/js/ace/ace.settings-skin.js"></script>
<script src="assets/js/ace/ace.widget-on-reload.js"></script>
<script src="assets/js/ace/ace.searchbox-autocomplete.js"></script>

<script type="text/javascript">
	jQuery(function($) {
		host_id = <?php echo json_encode($users['info']->user_id); ?>;
		//editables on first profile page
		/*$.fn.editable.defaults.mode = 'inline';
		$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
	    $.fn.editableform.buttons = '<button type="submit" id="btn_edit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
	                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';*/
		
		//editables 
		
		//text editable
	    $('#firstname')
		.editable({
			type: 'text',
			name: 'user_fname',
			pk: host_id,
			params: function(params) {
	            params.table = 'tu';
	            return params;
	        },
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	    $('#lastname')
		.editable({
			type: 'text',
			name: 'user_lname',
			pk: host_id,
			params: function(params) {
	            params.table = 'tu';
	            return params;
	        },
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	    $('#state')
		.editable({
			type: 'text',
			name: 'state',
			pk: host_id,
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
			
	    });

	    $('#location')
		.editable({
			type: 'text',
			name: 'location',
			pk: host_id,
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
			
	    });

	    $('#zip')
		.editable({
			type: 'text',
			name: 'zip',
			pk: host_id,
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
			
	    });

	    $('#contact')
		.editable({
			type: 'tel',
			name: 'contact',
			pk: host_id,
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	     var languages = [];
	    $.each({ "English":"English", "French":"French", "Italian":"Italian", "Spanish":"Spanish", "Russian":"Russian", "Mandarin":"Mandarin", "Cantonese":"Cantonese", "Japanese":"Japanese", "Hindi":"Hindi", "Arabic":"Arabic", "Bengali":"Bengali" }, function(k, v) {
	        languages.push({id: k, text: v});
	    });

	    $('#languages')
		.editable({
			type: 'select2',
			value: 'English',
			name: 'languages',
			source: languages,
			select2: {
				'multiple': true,
				'width': 200
			},
			pk: host_id,
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	    $('#email')
		.editable({
			type: 'text',
			name: 'user_email',
			pk: host_id,
			params: function(params) {
	            params.table = 'tu';
	            return params;
	        },
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	    var availability = [];
	    $.each({ "Less than 15 hours": "Less than 15 hours", "Between 15 and 25 hours": "Between 15 and 25 hours", "More than 25 hours": "More than 25 hours", }, function(k, v) {
	        availability.push({id: k, text: v});
	    });

	    $('#availability')
		.editable({
			type: 'select2',
			name: 'availability',
			pk: host_id,
			source: availability,
			select2: {
				'width': 200
			},		
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	    var travel = [];
	    $.each({ "Walk":"Walk", "Bike":"Bike", "Bus":"Bus", "Train":"Train", "Ferry":"Ferry", "Other":"Other" }, function(k, v) {
	        travel.push({id: k, text: v});
	    });

	    $('#travel')
		.editable({
			type: 'select2',
			name: 'way_of_travel',
			pk: host_id,
			source: travel,
			select2: {
				multiple: true,
				'width': 200
			},		
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	    $('#website')
		.editable({
			type: 'text',
			name: 'website',
			pk: host_id,
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	    $('#visa')
		.editable({
			type: 'text',
			name: 'visa_situation',
			pk: host_id,
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	    $('#introduction')
		.editable({
			type: 'text',
			name: 'introduction',
			pk: host_id,
			url: 'keeper/profile/update',
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
	    });

	    $('#about').editable({
			mode: 'inline',
	        type: 'wysiwyg',
			name : 'about',
			pk: host_id,
			url: 'keeper/profile/update',
			wysiwyg : {
				//css : {'max-width':'300px'}
			},
			success: function(response, newValue) {
				console.log(response);
			},
			error: function(response, newValue) {
	            if(response.status === 500) {
	                return 'Service unavailable. Please try later.';
	            }
	        }
		});
		
		
		// *** editable avatar *** //
		try {//ie8 throws some harmless exceptions, so let's catch'em
	
			//first let's add a fake appendChild method for Image element for browsers that have a problem with this
			//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
			try {
				document.createElement('IMG').appendChild(document.createElement('B'));
			} catch(e) {
				Image.prototype.appendChild = function(el){}
			}
	
			var last_gritter
			$('#avatar').editable({
				type: 'image',
				name: 'avatar',
				value: null,
				image: {
					//specify ace file input plugin's options here
					btn_choose: 'Change Avatar',
					droppable: true,
					maxSize: 110000,//~100Kb
	
					//and a few extra ones here
					name: 'avatar',//put the field name here as well, will be used inside the custom plugin
					on_error : function(error_type) {//on_error function will be called when the selected file has a problem
						if(last_gritter) $.gritter.remove(last_gritter);
						if(error_type == 1) {//file format error
							last_gritter = $.gritter.add({
								title: 'File is not an image!',
								text: 'Please choose a jpg|gif|png image!',
								class_name: 'gritter-error gritter-center'
							});
						} else if(error_type == 2) {//file size rror
							last_gritter = $.gritter.add({
								title: 'File too big!',
								text: 'Image size should not exceed 100Kb!',
								class_name: 'gritter-error gritter-center'
							});
						}
						else {//other error
						}
					},
					on_success : function() {
						$.gritter.removeAll();
					}
				},
			    url: function(params) {
					//this is similar to the file-upload.html example
					//replace the code inside profile page where it says ***UPDATE AVATAR HERE*** with the code below

					// ***UPDATE AVATAR HERE*** //
					var distination = 'assets/uploads/'
					var submit_url = distination+'file-upload.php';//please modify submit_url accordingly
					var deferred = null;
					var avatar = '#avatar';

					//if value is empty (""), it means no valid files were selected
					//but it may still be submitted by x-editable plugin
					//because "" (empty string) is different from previous non-empty value whatever it was
					//so we return just here to prevent problems
					var value = $(avatar).next().find('input[type=hidden]:eq(0)').val();
					if(!value || value.length == 0) {
						deferred = new $.Deferred
						deferred.resolve();
						return deferred.promise();
					}

					var $form = $(avatar).next().find('.editableform:eq(0)')
					var file_input = $form.find('input[type=file]:eq(0)');
					var pk = $(avatar).attr('data-pk');//primary key to be sent to server

					var ie_timeout = null


					if( "FormData" in window ) {
						var formData_object = new FormData();//create empty FormData object
						
						//serialize our form (which excludes file inputs)
						$.each($form.serializeArray(), function(i, item) {
							//add them one by one to our FormData 
							formData_object.append(item.name, item.value);							
						});
						//and then add files
						$form.find('input[type=file]').each(function(){
							var field_name = $(this).attr('name');
							var files = $(this).data('ace_input_files');
							if(files && files.length > 0) {
								formData_object.append(field_name, files[0]);
							}
						});

						//append primary key to our formData
						formData_object.append('pk', pk);

						deferred = $.ajax({
									url: submit_url,
								   type: 'POST',
							processData: false,//important
							contentType: false,//important
							   dataType: 'json',//server response type
								   data: formData_object
						})
					}
					else {
						deferred = new $.Deferred

						var temporary_iframe_id = 'temporary-iframe-'+(new Date()).getTime()+'-'+(parseInt(Math.random()*1000));
						var temp_iframe = 
								$('<iframe id="'+temporary_iframe_id+'" name="'+temporary_iframe_id+'" \
								frameborder="0" width="0" height="0" src="about:blank"\
								style="position:absolute; z-index:-1; visibility: hidden;"></iframe>')
								.insertAfter($form);
								
						$form.append('<input type="hidden" name="temporary-iframe-id" value="'+temporary_iframe_id+'" />');
						
						//append primary key (pk) to our form
						$('<input type="hidden" name="pk" />').val(pk).appendTo($form);
						
						temp_iframe.data('deferrer' , deferred);
						//we save the deferred object to the iframe and in our server side response
						//we use "temporary-iframe-id" to access iframe and its deferred object

						$form.attr({
								  action: submit_url,
								  method: 'POST',
								 enctype: 'multipart/form-data',
								  target: temporary_iframe_id //important
						});

						$form.get(0).submit();

						//if we don't receive any response after 30 seconds, declare it as failed!
						ie_timeout = setTimeout(function(){
							ie_timeout = null;
							temp_iframe.attr('src', 'about:blank').remove();
							deferred.reject({'status':'fail', 'message':'Timeout!'});
						} , 30000);
					}


					//deferred callbacks, triggered by both ajax and iframe solution
					deferred
					.done(function(result) {//success
						var res = result[0];//the `result` is formatted by your server side response and is arbitrary
						
						if( res.status == 'OK' ){							
							$.post('keeper/profile/update',{pk:'tui',name:'avatar',value:distination+res.file_name})
							.done(function(data) {
								if(res.status == 'OK') $(avatar).get(0).src = res.url;
								else alert(res.message);
							},'json');
						}
					})
					.fail(function(result) {//failure
						alert("There was an error");
					})
					.always(function() {//called on both success and failure
						if(ie_timeout) clearTimeout(ie_timeout)
						ie_timeout = null;	
					});

					return deferred.promise();
					// ***END OF UPDATE AVATAR HERE*** //
				},
				
				success: function(response, newValue) {
				}
			})
		}catch(e) {}
		
		/**
		//let's display edit mode by default?
		var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
		if(blank_image) {
			$('#avatar').editable('show').on('hidden', function(e, reason) {
				if(reason == 'onblur') {
					$('#avatar').editable('show');
					return;
				}
				$('#avatar').off('hidden');
			})
		}
		*/
	
		//another option is using modals
		$('#avatar2').on('click', function(){
			var modal = 
			'<div class="modal fade">\
			  <div class="modal-dialog">\
			   <div class="modal-content">\
				<div class="modal-header">\
					<button type="button" class="close" data-dismiss="modal">&times;</button>\
					<h4 class="blue">Change Avatar</h4>\
				</div>\
				\
				<form class="no-margin">\
				 <div class="modal-body">\
					<div class="space-4"></div>\
					<div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
				 </div>\
				\
				 <div class="modal-footer center">\
					<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
					<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				 </div>\
				</form>\
			  </div>\
			 </div>\
			</div>';
			
			
			var modal = $(modal);
			modal.modal("show").on("hidden", function(){
				modal.remove();
			});
	
			var working = false;
	
			var form = modal.find('form:eq(0)');
			var file = form.find('input[type=file]').eq(0);
			file.ace_file_input({
				style:'well',
				btn_choose:'Click to choose new avatar',
				btn_change:null,
				no_icon:'ace-icon fa fa-picture-o',
				thumbnail:'small',
				before_remove: function() {
					//don't remove/reset files while being uploaded
					return !working;
				},
				allowExt: ['jpg', 'jpeg', 'png', 'gif'],
				allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
			});
	
			form.on('submit', function(){
				if(!file.data('ace_input_files')) return false;
				
				file.ace_file_input('disable');
				form.find('button').attr('disabled', 'disabled');
				form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");
				
				var deferred = new $.Deferred;
				working = true;
				deferred.done(function() {
					form.find('button').removeAttr('disabled');
					form.find('input[type=file]').ace_file_input('enable');
					form.find('.modal-body > :last-child').remove();
					
					modal.modal("hide");
	
					var thumb = file.next().find('img').data('thumb');
					if(thumb) $('#avatar2').get(0).src = thumb;
	
					working = false;
				});
				
				
				setTimeout(function(){
					deferred.resolve();
				} , parseInt(Math.random() * 800 + 800));
	
				return false;
			});
					
		});
	
		
	
		//////////////////////////////
		$('#profile-feed-1').ace_scroll({
			height: '250px',
			mouseWheelLock: true,
			alwaysVisible : true
		});
	
		$('a[ data-original-title]').tooltip();
	
		$('.easy-pie-chart.percentage').each(function(){
		var barColor = $(this).data('color') || '#555';
		var trackColor = '#E2E2E2';
		var size = parseInt($(this).data('size')) || 72;
		$(this).easyPieChart({
			barColor: barColor,
			trackColor: trackColor,
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: parseInt(size/10),
			animate:false,
			size: size
		}).css('color', barColor);
		});
	
	
		////////////////////
		//change profile
		$('[data-toggle="buttons"] .btn').on('click', function(e){
			var target = $(this).find('input[type=radio]');
			var which = parseInt(target.val());
			$('.user-profile').parent().addClass('hide');
			$('#user-profile-'+which).parent().removeClass('hide');
		});
		
		
		
		/////////////////////////////////////
		$(document).one('ajaxloadstart.page', function(e) {
			//in ajax mode, remove remaining elements before leaving page
			try {
				$('.editable').editable('destroy');
			} catch(e) {}
			$('[class*=select2]').remove();
		});
	});
</script>