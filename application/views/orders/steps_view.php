<?php //print_r($user_info);exit(); ?>
<div class="order-wrap margin-top-40">
	<div id="fuelux-wizard-container">
		<div>
			<!-- #section:plugins/fuelux.wizard.steps -->
			<ul class="steps">
				<li data-step="1" class="active">
					<span class="step">1</span>
					<span class="title">Personal Info</span>
				</li>

				<li data-step="2">
					<span class="step">2</span>
					<span class="title">Services</span>
				</li>

				<li data-step="3">
					<span class="step">3</span>
					<span class="title">Select your keeper</span>
				</li>

				<li data-step="4">
					<span class="step">4</span>
					<span class="title">More info</span>
				</li>

				<li data-step="5">
					<span class="step">5</span>
					<span class="title">Key Set</span>
				</li>

				<li data-step="6">
					<span class="step">6</span>
					<span class="title">Payment</span>
				</li>
			</ul>

			<!-- /section:plugins/fuelux.wizard.steps -->
		</div>

		<hr />

		<div class="step-content pos-rel">
			
			<div class="step-pane active" data-step="1">
			<form class="form-horizontal" id="personal_info-form" method="get">
				<h3 class="text-center green">Give us more information regarding your place</h3>
				<p class="text-center col-sm-6 col-sm-offset-3">To best serve you, you need to tell us the size of your accommodation. Please provide the actual surface and not the one calculated according to housing laws.</p>
				
				<div class="clearfix"></div>
				<div class="space"></div>
				<div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="first_name">First Name</label>

							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<?php if( $user_info ) { ?>
									<input type="text" class="col-xs-12 col-sm-6" disabled="disabled" value="<?php echo (isset($user_info->user_fname)) ? $user_info->user_fname : ''; ?>" />
									<?php }else{ ?>
									<input type="text" name="first_name" id="first_name"  class="col-xs-12 col-sm-6" />
									<?php } ?>
								</div>
								
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="surname">Surname</label>

							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<?php if( $user_info ) { ?>
									<input type="text" class="col-xs-12 col-sm-6" disabled="disabled" value="<?php echo (isset($user_info->user_lname)) ? $user_info->user_lname : ''; ?>" />
									<?php }else{ ?>
									<input type="text" name="surname" id="surname" class="col-xs-12 col-sm-6" />
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="phone">Phone Number</label>

							<div class="col-xs-12 col-sm-9">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="ace-icon fa fa-phone"></i>
									</span>

									<?php if( $user_info ) { ?>
									<input type="tel" class="col-xs-12 col-sm-4" disabled="disabled" value="<?php echo (isset($user_info->contact)) ? $user_info->contact : ''; ?>" />
									<?php }else{ ?>
									<input type="tel" id="phone"  name="phone" />
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="email">Email Address</label>

							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<?php if( $user_info ) { ?>
									<input type="text" class="col-xs-12 col-sm-6" disabled="disabled" value="<?php echo (isset($user_info->user_email)) ? $user_info->user_email : ''; ?>" />
									<?php }else{ ?>
									<input type="email" name="email" id="email"  class="col-xs-12 col-sm-6" />
									<?php } ?>
								</div>
							</div>
						</div>
						<?php if( !$user_info ) { ?>
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="email">Password</label>

							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<input type="password" name="password" id="password" class="col-xs-12 col-sm-6" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="email">Confirm Password</label>

							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<input type="password" name="r_password" id="r_password"  class="col-xs-12 col-sm-6" />
								</div>
							</div>
						</div>
						<?php } ?>

						<div class="hr hr-dotted"></div>
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="property_size">Size of the property</label>

							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<select class="input-medium" id="property_size" name="property_size">
										<?php foreach ($properties as $property) {?>
										<option value="<?php echo $property->id ?>"><?php echo $property->name ?></option>
										<?php } ?>
									</select>
									<input type="hidden" id="property_size_value" name="property_size_value" value="">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="number_of_beds">Number of beds</label>

							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<input type="text" name="number_of_beds" id="number_of_beds"  class="col-xs-12 col-sm-6" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="number_of_bathrooms">Number of bathrooms</label>

							<div class="col-xs-12 col-sm-9">
								<div class="clearfix">
									<input type="text" name="number_of_bathrooms" id="number_of_bathrooms" class="col-xs-12 col-sm-6" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="unit_number">Unit number / floor</label>

							<div class="col-xs-12 col-sm-3">
								<div class="clearfix">
									<input type="text" name="unit_number" id="unit_number"  class="col-xs-12 col-sm-6" />
								</div>
							</div>
						</div>
						
						<div class="hr hr-dotted"></div>
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="digit_code">Digit code</label>

							<div class="col-xs-12 col-sm-5">
								<div class="clearfix">
									<input type="text" name="digit_code" id="digit_code" class="col-xs-12 col-sm-6"  />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Wifi">Wifi</label>

							<div class="col-xs-12 col-sm-1">
								<div class="clearfix">
									<label>
										<input id="wifi" name="wifi" class="ace ace-switch ace-switch-5 pos-t-5" type="checkbox" />
										<span class="lbl"></span>
									</label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-2">
								<div class="clearfix">
									<input type="text" name="wifi_name" id="wifi_name" class="col-xs-12" placeholder="Network Name" disabled="disabled" />
								</div>
							</div>
							<div class="col-xs-12 col-sm-2">
								<div class="clearfix">
									<input type="text" name="wifi_password" id="wifi_password" class="col-xs-12" placeholder="Password" disabled="disabled" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="garbage_chute">Garbage chute </label>

							<div class="col-xs-12 col-sm-1">
								<div class="clearfix">
									<label>
										<input id="garbage_chute" name="garbage_chute" class="ace ace-switch ace-switch-5 pos-t-5" type="checkbox" />
										<span class="lbl"></span>
									</label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4">
								<div class="clearfix">
									<input type="text" name="garbage_chute_location" id="garbage_chute_location" class="col-xs-12" placeholder="Location of garbage chute" disabled="disabled" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="first_name">Amenities</label>
							
							<div class="row">
							<div class="col-xs-6">
								<div class="checkbox col-xs-12 col-sm-6">
									<label class="display-block">
										<input name="amenities[]" value="Rooftop" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Rooftop</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="BBQ" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> BBQ</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Washing machine" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Washing machine</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Dryer" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Dryer</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Dish washer" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Dish washer</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Coffee machine" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Coffee machine</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Hairdryer" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Hairdryer</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Iron" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Iron</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Air conditioning" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Air conditioning</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Heater" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Heater</span>
									</label>
								</div>
								<div class="checkbox col-xs-12 col-sm-6">
									<label class="display-block">
										<input name="amenities[]" value="Parking" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Parking</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Gym" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Gym</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Lift" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Lift</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Smoke detector" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Smoke detector</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="First aid kit" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> First aid kit</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Fire extinguisher" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Fire extinguisher</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Smoking allowed" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Smoking allowed</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Pets allowed" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Pets allowed</span>
									</label>
									<label class="display-block">
										<input name="amenities[]" value="Wheelchair accessible" class="ace ace-checkbox-2" type="checkbox" />
										<span class="lbl"> Wheelchair accessible</span>
									</label>
								</div>
							</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first_name">Specific instructions</label>

							<div class="col-xs-12 col-sm-6">
								<div class="clearfix">
									<textarea id="instructions" name="instructions" class="form-control"  placeholder="Instruction here..."></textarea>
								</div>
							</div>
						</div>

						<input type="hidden" name="promo_code" id="input_promo_code"/>
					
				</div>
			</form>
			</div>
			<div class="step-pane active" data-step="2">
			<form class="form-horizontal" id="services-form" method="get">
				<h3 class="text-center blue">Make a booking </h3>
				<p class="text-center col-sm-6 col-sm-offset-3">Choose the service(s) requested</p>
				
				<div class="clearfix"></div>
				<div class="space"></div>
				<div class="col-xs-12 col-sm-8 col-sm-offset-2">
					<div class="col-xs-6 col-sm-3 pricing-box">
						<div class="widget-box widget-color-dark">
							<?php $check_in_data = getService('Check In',$services); ?>
							<input type="checkbox" data-price="<?php echo $check_in_data->service_price ?>" name="services[]" id="check_in" value="<?php echo $check_in_data->service_id ?>" class="hide">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter"></h5>
							</div>

							<div class="widget-body text-center">
								<div class="widget-main bg-dark">
									<i class="ace-icon fa fa-key bigger-500"></i>
									<hr />
									<div class="price">
										$ <?php echo $check_in_data->service_price ?>
									</div>
								</div>

								<div>
									<a href="#check_in" class="btn_services btn btn-block btn-inverse">
										<h3><?php echo $check_in_data->service_name ?></h3>
									</a>
								</div>
							</div>
						
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 pricing-box">
						<div class="widget-box widget-color-orange">
							<?php $check_out_data = getService('Check Out',$services) ?>
							<input type="checkbox" data-price="<?php echo $check_out_data->service_price ?>" name="services[]" id="check_out" value="<?php echo $check_out_data->service_id ?>" class="hide">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter"></h5>
							</div>

							<div class="widget-body text-center">
								<div class="widget-main bg-orange">
									<i class="ace-icon fa fa-shopping-cart bigger-500 orange"></i>
									<hr />
									<div class="price">
										$ <?php echo $check_out_data->service_price ?>
									</div>
								</div>

								<div>
									<a href="#check_out" class="btn_services btn btn-block btn-warning">
										<h3><?php echo $check_out_data->service_name ?></h3>
									</a>
								</div>
							</div>

						</div>
					</div>
					<div class="col-xs-6 col-sm-3 pricing-box">
						<div class="widget-box widget-color-blue">
							<?php $cleaning = getService('Cleaning',$services) ?>
							<input type="checkbox" data-price="<?php echo $check_out_data->service_price ?>" name="services[]" id="cleaning" value="cleaning" class="hide">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter"></h5>
							</div>

							<div class="widget-body text-center">
								<div class="widget-main bg-blue">
									<i class="ace-icon fa fa-home bigger-500 blue"></i>
									<hr />
									<div id="cleaning_price" class="price">
										
									</div>
								</div>

								<div>
									<a href="#cleaning" class="btn_services btn btn-block btn-primary">
										<h3>Cleaning</h3>
									</a>
								</div>
							</div>

						</div>
					</div>
					<div class="col-xs-6 col-sm-3 pricing-box">
						<div class="widget-box widget-color-green">
							<?php $loundry = getService('Loundry',$services) ?>
							<input type="checkbox" data-price="<?php echo $loundry->service_price ?>" name="services[]" id="loundry" value="<?php echo $loundry->service_id ?>" class="hide">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter"></h5>
							</div>

							<div class="widget-body text-center">
								<div class="widget-main bg-green">
									<i class="ace-icon fa fa-flask bigger-500 green"></i>
									<hr />
									<div class="price">
										$ <?php echo $loundry->service_price ?>
									</div>
								</div>

								<div>
									<a href="#loundry" class="btn_services btn btn-block btn-success">
										<h3><?php echo $loundry->service_name ?></h3>
									</a>
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-4 col-sm-offset-4 text-center">
							<h3>Service date</h3>
							<div class="input-group">
								<input id="service_date" name="service_datetime" class="form-control" type="text">
								<span class="input-group-addon">
									<i class="fa fa-clock-o bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

				</div>
			</form>
			</div>

			<div class="step-pane active" data-step="3">
			<form class="form-horizontal" id="keeper-form" method="get">
				<h3 class="text-center orange"> Select your keeper </h3>
				<p class="text-center col-sm-6 col-sm-offset-3">It is time to choose the right keeper. We picked a few profiles. Rest assured: they all know what hospitality is about</p>
				<div class="space"></div>
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 keeper_list">
    	
				</div>
			</form>
			</div>



			<div class="step-pane active" data-step="4">
			<form class="form-horizontal" id="more_info-form" method="get">
				<h3 class="text-center purple">More information about your guests </h3>
				
				<div class="clearfix"></div>
				<div class="space"></div>
				<div class="col-xs-12 col-sm-8 col-sm-offset-2">
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="guest_first_name">First Name</label>

						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" name="guest_first_name" id="guest_first_name" class="col-xs-12 col-sm-6" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="guest_surname">Surname</label>

						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" name="guest_surname" id="guest_surname" class="col-xs-12 col-sm-6" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="guest_email">Email Address</label>

						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="email" name="guest_email" id="guest_email"  class="col-xs-12 col-sm-6" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="guest_phone">Phone Number</label>

						<div class="col-xs-12 col-sm-9">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="ace-icon fa fa-phone"></i>
								</span>

								<input type="tel" id="guest_phone" name="guest_phone"  />
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="number_of_guests">Number of guests</label>

						<div class="col-xs-12 col-sm-9">
							<div class="clearfix">
								<input type="text" name="number_of_guests" id="number_of_guests" class="col-xs-12 col-sm-6" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="guest_nationality">Nationality</label>

						<div class="col-xs-12 col-sm-6">
							<div class="clearfix">
								<input type="text" name="guest_nationality" id="guest_nationality" class="col-xs-12 col-sm-6" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="guest_flight_number">Flight / Train Number</label>

						<div class="col-xs-12 col-sm-6">
							<div class="clearfix">
								<input type="text" name="guest_flight_number" id="guest_flight_number" value="1" class="col-xs-12 col-sm-6" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right important-left" for="guest_info">Addional Information</label>

						<div class="col-xs-12 col-sm-4">
							<div class="clearfix">
								<textarea id="guest_info" name="guest_info" class="form-control" value="asdf" placeholder="Information here..."></textarea>
							</div>
						</div>
					</div>
					
				</div>
			</form>
			</div>

			<div class="step-pane active" data-step="5">
			<form class="form-horizontal" id="key_set-form" method="get">
				<h3 class="text-center blue"> Key Set </h3>
				<p class="text-center col-sm-6 col-sm-offset-3">Let's move to picking the right service: we designed for you à-la-carte services tailored to your accommodation. </p>
				
				<div class="clearfix"></div>
				<div class="space"></div>
				
				<div class="col-xs-12 col-md-8 col-md-offset-2">
					<div class="row">
						<!-- <div class="col-xs-12 col-sm-4 col-sm-offset-4 text-center">
							<h3>Pick up date</h3>
							<div class="input-group">
								<input id="pick_up_date" name="pick_up_date" type="text" class="form-control" />
								<span class="input-group-addon">
									<i class="fa fa-clock-o bigger-110"></i>
								</span>
							</div>
						</div> -->
					</div>
					<div class="space"></div>
					<div class="col-xs-6 col-sm-3 col-sm-offset-3 pricing-box">
						<div class="widget-box widget-color-blue">
							<input type="radio" name="key_set" value="pick_up" class="hide">
							<div class="widget-body text-center">
								<div class="widget-key-set widget-main bg-blue">
									<i class="ace-icon fa fa-briefcase bigger-500 blue"></i>
									<hr />
									<div class="price">
										Pick up at home/office
									</div>
								</div>
								<div>
									<a href="#pick_up" id="key_pick_up" class="btn_key_set btn btn-block btn-primary">
										<h5>1st PICK-UP is PREE</h5>
									</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 pricing-box">
						<div class="widget-box widget-color-blue">
							<input type="radio" name="key_set" value="drop_off" class="hide">
							<div class="widget-body text-center">
								<div class="widget-key-set widget-main bg-blue">
									<i class="ace-icon fa fa-list-ul bigger-500 blue"></i>
									<hr />
									<div class="price">
										Drop off at our office in Darlinghurst
									</div>
								</div>
								<div>
									<a href="#drop_off" id="key_drop_off" class="btn_key_set btn btn-block btn-primary">
										<h5>FREE</h5>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>

			<div class="step-pane active" data-step="6">
			<form class="form-horizontal" id="key_set-form" method="get">
				<h3 class="text-center blue"> Total </h3>
				<p class="text-center col-sm-6 col-sm-offset-3"> </p>
				
				<div class="clearfix"></div>
				<div class="space"></div>
				
				<div class="col-xs-12 col-md-8 col-md-offset-2">
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"> Address </div>

							<div class="profile-info-value">
								<span class="" id="info_address"><?php echo $address->address_formatted_address; ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Keeper </div>

							<div class="profile-info-value">
								<span id="info_keeper"></span>
							</div>
						</div>

						<div class="prices profile-info-row hide">
							<div class="profile-info-name"> Check In </div>

							<div class="profile-info-value">
								<span id="info_check_in"></span>
							</div>
						</div>

						<div class="prices profile-info-row hide">
							<div class="profile-info-name"> Check Out </div>

							<div class="profile-info-value">
								<span id="info_check_out"></span>
							</div>
						</div>

						<div class="prices profile-info-row hide">
							<div class="profile-info-name"> Cleaning </div>

							<div class="profile-info-value">
								<span id="info_cleaning"></span>
							</div>
						</div>

						<div class="prices profile-info-row hide">
							<div class="profile-info-name"> Loundry </div>

							<div class="profile-info-value">
								<span id="info_loundry"></span>
							</div>
						</div>

						<div class="prices profile-info-row hide">
							<div class="profile-info-name"> Saturdays </div>

							<div class="profile-info-value">
								<span id="info_saturdays"></span>
							</div>
						</div>

						<div class="prices profile-info-row hide">
							<div class="profile-info-name"> Sundays </div>

							<div class="profile-info-value">
								<span id="info_sundays"></span>
							</div>
						</div>

						<div class="prices profile-info-row hide">
							<div class="profile-info-name"> Night Bookings </div>

							<div class="profile-info-value">
								<span id="info_night_bookings"></span>
							</div>
						</div>

						<div class="prices profile-info-row hide">
							<div class="profile-info-name"> Last Minute Booking </div>

							<div class="profile-info-value">
								<span id="info_last_minute_booking"></span>
							</div>
						</div>

						<div class="profile-info-row" id="promo_code_applied"></div>
						
						<div class="profile-info-row">
							<div class="profile-info-name"> <strong>Total</strong> </div>

							<div class="profile-info-value">
								<span id="info_total"></span>
							</div>
						</div>

						
					</div>
					<div class="pull-right" style="padding-right: 15px;"><a href="javascript:void(0);" id="promo_code">Promotional Code</a></div>

					<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Promotional Code</h4>
					      </div>
					      <div class="modal-body">
					        	<div class="form-group">
									<!-- <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="guest_first_name">Promotional Code</label> -->
									<div class="col-xs-9 col-sm-9">
										<div class="clearfix">
											<input type="text" name="promotional_code" id="promotional_code" class="col-xs-12 col-sm-6 form-control" placeholder="Coupon Code">
											<small style="color:red" id="promotional_err"></small>
										</div>
									</div>
									<div class="col-xs-3 col-sm-3">
										<a href='javascript:void(0)' onclick="check_coupon_code($('#promotional_code').val());" style="position: relative;top: 15px;"><b>Verify</b></a>
									</div>
								</div>								
						  </div>
					      <div class="modal-footer">
					      	<span id="promo_apply"></span>
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>

					  </div>
					</div>

				</div>
			</form>
			</div>

			
		</div>

	</div>
	<div class="clearfix"></div>
	<hr />
	<div class="wizard-actions">
		<button class="btn btn-prev">
			<i class="ace-icon fa fa-arrow-left"></i>
			Prev
		</button>

		<button class="btn btn-success btn-next" data-last="Finish">
			Next
			<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
		</button>
	</div>
</div>

<div id="drop_off_modal" class="hide">
	<h2 class="text-center">Select your drop-off time at our office</h2>
	<p class="text-center">71/220 Goulburn St, DARLINGHURST NSW 2010</p>
	<p class="text-center">Monday to Friday, from 8am to 6pm</p>
	<hr>
	
	<form id="key_drop_off-form" data-id="key_drop_off">
		<div class="row">
			<div class="col-xs-12">
				<label for="id-date-range-picker-1">Drop off time</label>
				<div class="input-group no-padding-right">
					<input type="text" style="width: 0; height: 0; top: -100px; position: absolute;"/>
					<input id="key_drop_off_date" name="key_drop_off_date" type="text" class="form-control" />
					<span class="input-group-addon">
						<i class="fa fa-clock-o bigger-110"></i>
					</span>
				</div>
			</div>
			<div class="col-xs-12">
				<label>Address</label>
				<textarea id="key_drop_off_details" name="key_drop_off_details" class="form-control" placeholder="Details here..."></textarea>
			</div>
		</div>
	</form>
</div>

<div id="pick_up_modal" class="hide">
	<h2 class="text-center">Where will you leave your keys?</h2>
	<p class="text-center">Make sure to write down all the details to help your Keeper</p>
	<hr>
	
	<form id="key_pick_up-form" data-id="key_pick_up" >
		<div class="row">
			<label class="col-xs-12" for="id-date-range-picker-1">Date Range</label>
			<div class="col-sm-6">
				<div class="input-group">
					<input type="text" style="width: 0; height: 0; top: -100px; position: absolute;"/>
					<input id="key_pick_up_from" name="key_pick_up_from" type="text" class="form-control" />
					<span class="input-group-addon">
						<i class="fa fa-calendar bigger-110"></i>
					</span>					
				</div>
			</div>
			<div class="col-sm-6">
				<div class="input-group">
					<input id="key_pick_up_to" name="key_pick_up_to" type="text" class="form-control" />
					<span class="input-group-addon">
						<i class="fa fa-calendar bigger-110"></i>
					</span>
				</div>
			</div>
			<div class="col-xs-12 margin-top-10">
				<textarea id="key_pick_up_details" name="key_pick_up_details" class="form-control" placeholder="Details here..."></textarea>
			</div>
		</div>
	</form>
</div>

<?php 
	function getService($search,$services){
		$item = null;
		foreach($services as $service) {
		    if ($search == $service->service_name) {
		        $item = $service;
		        break;
		    }
		}
		return $item;
	}
?>



<script src="assets/js/fuelux/fuelux.wizard.js"></script>
<script src="assets/js/jquery.validate.js"></script>
<script src="assets/js/additional-methods.js"></script>
<script src="assets/js/bootbox.js"></script>
<script src="assets/js/jquery.maskedinput.js"></script>
<script src="assets/js/select2.js"></script>
<script src="assets/js/fuelux/fuelux.spinner.js"></script>
<script src="assets/js/ace/elements.spinner.js"></script>
<script src="assets/js/date-time/moment.js"></script>
<!-- <script src="assets/js/date-time/bootstrap-datetimepicker.js"></script>
<script src="assets/js/date-time/daterangepicker.js"></script> -->
<script src="assets/js/date-time/jquery.datetimepicker.full.min.js"></script> 	
<script src="public/front_end/inc/cookiejs/js.cookie.js"></script>

<script src="assets/js/ace/elements.wizard.js"></script>
<script src="assets/js/jquery.rateyo.min.js"></script>

<script type="text/javascript">

	jQuery(function($) {
		_currency = '$';
		_address = Cookies.getJSON('address');
		if( ! _address ){
			window.location = 'site';
		}
		

		$('#property_size').change(function(){
			setPropertyValue($(this).val());
		});
		
		function setPropertyValue(property_val){
			var properties = <?php echo json_encode($properties); ?>;
			res = '';
			$.each(properties,function(i,v){
				if( property_val == v.id )
					res = v.value;
			});
			bed_num = $('#number_of_beds').val()*1;
			bath_num =$('#number_of_bathrooms').val()*1;
			fee_bed_cost = bed_num-1;
			fee_bath_cost = bath_num -1;
			total_clean_fee = fee_bed_cost*10 + fee_bath_cost*20;
			res = res*1+total_clean_fee;
			$('#cleaning_price').html(_currency+res);
			$('#property_size_value').val(res);
		}
		Time_rate = [
			'00:00', '00:15','00:30','00:45',
			'01:00', '01:15','01:30','01:45',
			'02:00', '02:15','02:30','02:45',
			'03:00', '03:15','03:30','03:45',
			'04:00', '04:15','04:30','04:45',
			'05:00', '05:15','05:30','05:45',
			'06:00', '06:15','06:30','06:45',
			'07:00', '07:15','07:30','07:45',
			'08:00', '08:15','08:30','08:45',
			'09:00', '09:15','09:30','09:45',
			'10:00', '10:15','10:30','10:45',
			'11:00', '11:15','11:30','11:45',
			'12:00', '12:15','12:30','12:45',
			'13:00', '13:15','13:30','13:45',
			'14:00', '14:15','14:30','14:45',
			'15:00', '15:15','15:30','15:45',
			'16:00', '16:15','16:30','16:45',
			'17:00', '17:15','17:30','17:45',
			'18:00', '18:15','18:30','18:45',
			'19:00', '19:15','19:30','19:45',
			'20:00', '20:15','20:30','20:45',
			'21:00', '21:15','21:30','21:45',
			'22:00', '22:15','22:30','22:45',
			'23:00', '23:15','23:30','23:45',
			]
		$('#pick_up_date').datetimepicker({
			allowTimes:Time_rate,
			format:'d/m/Y H:i',
			minDate: moment().add(1, 'days')
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

		$('#key_drop_off_date').datetimepicker({
			allowTimes:Time_rate,
			format:'d/m/Y H:i',
			minDate: moment().add(1, 'days')
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

		$('#service_date').datetimepicker({
			allowTimes:Time_rate,
			format:'d/m/Y H:i',
			minDate: moment().add(1, 'days')
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

		$('[data-rel=tooltip]').tooltip();

		$(".select2").css('width','200px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		});

		$('#number_of_beds').ace_spinner({value:1,min:1,max:8,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
		.closest('.ace-spinner')
		.on('changed.fu.spinbox', function(){
			//alert($('#spinner1').val())
		}); 

		$('#number_of_guests').ace_spinner({value:1,min:1,max:100,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
		.closest('.ace-spinner')
		.on('changed.fu.spinbox', function(){
			//alert($('#spinner1').val())
		}); 

		$('#number_of_bathrooms').ace_spinner({value:1,min:1,max:8,step:1, btn_up_class:'btn-success' , btn_down_class:'btn-success'})
		.closest('.ace-spinner')
		.on('changed.fu.spinbox', function(){
			//alert($('#spinner1').val())
		}); 

		$('input[name=service_datetime]').blur(function(){
			var dateTIme = ($('#services-form input[name=service_datetime]').val());
			dateTIme = moment(dateTIme).format("YYYY-MM-DD HH:mm");
			var postData = {"dateTime" : dateTIme};
			$.ajax({
				url: 'order/steps/getKeepersList',
				data: postData,
				dataType: 'json',
				type: 'post',
				success: function(res){
					if(res && res.length)
					{
						//$('.keeper_list').html("");
						var html = '';
						for(var j = 0; j < res.length; j++)
						{	
							res[j].about=res[j].about.replace(/\[/g, '');
							res[j].about=res[j].about.replace(/\]/g, '');
							res[j].languages=res[j].languages.replace(/\[/g, '');
							res[j].languages=res[j].languages.replace(/\]/g, '');
							console.log(res[j]);
        					html +='<div class="mt-element-overlay">';
							html +='    <div class="">';
							html +='        <div data-id="keeper-'+res[j]['user_id']+'" class="keeper padding-10 col-xs-6 col-sm-3 center margin-bottom-10">';
							html +=			'<input class="hide" type="radio" data-fullname="'+res[j]['user_fname']+' '+ res[j]['user_lname']+'" 				name="keeper_id" id="keeper-'+res[j]['user_id']+'" value="'+res[j]['user_id']+'">';
							html +='            <div class="mt-overlay-3 mt-overlay-3-icons"><span class="profile-picture">';
							html +='                <img alt="No Picture" src="'+res[j]['avatar']+'">';
							html +='                <div class="mt-overlay">';
							html +='                    <ul class="mt-info">';
							html +='                        <li>';
							html +='                            <p>Description:'+res[j]['about']+'</p>';
							html +='                        </li>';
							html +='                        <li>';
							html +='                            <p>Languages spoken:'+res[j]['languages']+'</p>';
							html +='                        </li>';
							html +='                        <li>';
							html +='                           <div class="rateYo" data-value="'+res[j]['user_level']+'"></div>';
							html +='                        </li>';


							html +='                    </ul>';
							html +='                </div>';
							html +='            </span>	<div class=" margin-bottom-5 width-90 label label-info label-xlg arrowed-in arrowed-in-right"><div class="inline position-relative"><a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown"><span class="white">'+res[j]['user_fname']+' '+ res[j]['user_lname']+'</span></a></div</div></div>';
							html +='        </div>';
							html +='    </div>';
							html +='</div>  ';

							// html += '<div data-id="keeper-'+res[j]['user_id'] class=" keeper padding-10 col-xs-6 col-sm-3 center margin-bottom-10">'+
							// 		'<input class="hide" type="radio" data-fullname="'+res[j]['user_fname']+' '+ res[j]['user_lname']+'" name="keeper_id" id="keeper-'+res[j]['user_id']+'" value="'+res[j]['user_id']+'">'+
							// 		'<span class="profile-picture">'+
							// 			'<img id="avatar" class="editable img-responsive" alt="Alexs Avatar" src="assets/uploads/default-avatar.jpg" />'+
							// 		'</span>'+
							// 		'<div class="space-4"></div>'+
									// '<div class="width-90 label label-info label-xlg arrowed-in arrowed-in-right">'+
									// 	'<div class="inline position-relative">'+
									// 		'<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">'+
									// 			'<span class="white">'+res[j]['user_fname']+' '+ res[j]['user_lname']+'</span>'+
									// 		'</a>'+
									// 	'</div>'+
									// '</div>'+
							// 	'</div>';
						}
					}
					else{
						html =  '<div class="col-xs-12 text-center text-danger bigger-120">No Keepers Available right Now! <br> <a href="site#contact-us" class="btn btn-primary">Contact us</a></div>';
					}
					$('.keeper_list').html(html);
					$('.rateYo').each(function(){
						var star_rate = $(this).data('value');
						$(this).rateYo({
						rating: star_rate,
						readOnly: true
					});	
					})
					// $('.keeper').popover();
				}
			});
		})	

		
		$('#fuelux-wizard-container')
		.ace_wizard({
			//step: 2 //optional argument. wizard will jump to step "2" at first
			//buttons: '.wizard-actions:eq(0)'
		})
		.on('actionclicked.fu.wizard' , function(e, info){

			/*$.post('order/steps/addOrder',$('#personal_info-form').serialize())
			.done(function(data) {
				console.log(data);
			},'json');*/
			if(info.step == 1 && info.direction == 'next') {				
				if(!$('#personal_info-form').valid()){
				e.preventDefault();
				} 
				setPropertyValue($('#property_size').val());
			}else if(info.step == 2 && info.direction == 'next'){
				
				if(!$('#services-form').valid())
				{
					
					e.preventDefault();
				}
				else
				{
					
				}
			}else if(info.step == 3 && info.direction == 'next'){
				//if( $('#keeper_id').val() ){
					if(!$('#keeper-form').valid()) e.preventDefault();
				/*}else{
					e.preventDefault();
					bootbox.dialog({
						message: "We are sorry! No Keepers Available right Now.", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}*/
			}else if(info.step == 4 && info.direction == 'next'){
				if(!$('#more_info-form').valid()) e.preventDefault();
			}else if(info.step == 5 && info.direction == 'next'){
				var total = 0;
				$('.prices').addClass('hide');

				if( $('#check_in').is(":checked")  ){
					$('#info_check_in').html( _currency+ $('#check_in').data('price') );
					$('#info_check_in').closest('.profile-info-row').removeClass('hide');
					total += parseFloat($('#check_in').data('price'));
				}

				if( $('#check_out').is(":checked")  ){
					$('#info_check_out').html( _currency+ $('#check_out').data('price') );
					$('#info_check_out').closest('.profile-info-row').removeClass('hide');
					total +=  parseFloat($('#check_out').data('price'));
				}

				if( $('#cleaning').is(":checked")  ){
					$('#info_cleaning').html( _currency+ $('#property_size_value').val() );
					$('#info_cleaning').closest('.profile-info-row').removeClass('hide');
					total +=  parseFloat($('#property_size_value').val());
				}

				if( $('#loundry').is(":checked")  ){
					$('#info_loundry').html( _currency+ $('#loundry').data('price') );
					$('#info_loundry').closest('.profile-info-row').removeClass('hide');
					total +=  parseFloat($('#loundry').data('price'));
				}

				var pickup = new Date($('#pick_up_date').val());
				<?php date_default_timezone_set('Australia/Sydney'); ?>
				var currentTime = "<?php echo date('F j Y h:i:s A'); ?>";
				var nowTime = new Date( currentTime);
				// var pickup_time = Math.abs(( pickup - new Date() ) / 36e5);
				var pickup_time = Math.abs(( pickup - nowTime ) / 36e5);

				// Last minute Booking
				if( pickup_time < 24 ){
					var _last_minute_booking24 = <?php echo json_encode( getService('Last Minute Booking less than 24h',$services) ); ?>;
					$('#info_last_minute_booking').html(_currency+_last_minute_booking24.service_price);
					$('#info_last_minute_booking').closest('.profile-info-row').removeClass('hide');
					total +=  parseFloat(_last_minute_booking24.service_price);
				}else if( pickup_time < 72 ){
					var _last_minute_booking72 = <?php echo json_encode( getService('Last Minute Booking less than 72h',$services) ); ?>;
					$('#info_last_minute_booking').html(_currency+_last_minute_booking72.service_price);
					$('#info_last_minute_booking').closest('.profile-info-row').removeClass('hide');
					total +=  parseFloat(_last_minute_booking72.service_price);
				}

				// Weekend Booking
				
				if( pickup.getDay() == 0 ){ // Sunday
					var _sundays = <?php echo json_encode( getService('Sundays',$services) ); ?>;
					$('#info_sundays').html(_currency+_sundays.service_price);
					$('#info_sundays').closest('.profile-info-row').removeClass('hide');
					total +=  parseFloat(_sundays.service_price);
				}else if( pickup.getDay() == 6 ){ // Saturday
					var _saturdays = <?php echo json_encode( getService('Saturdays',$services) ); ?>;
					$('#info_saturdays').html(_currency+_saturdays.service_price);
					$('#info_saturdays').closest('.profile-info-row').removeClass('hide');
					total +=  parseFloat(_saturdays.service_price);
				}
				console.log(pickup.getHours());
				// Night Booking
				if( pickup.getHours() > 6 && pickup.getHours() < 18  ){ //7:00am to 7:00pm
					var _night_bookings = <?php echo json_encode( getService('Night Bookings',$services) ); ?>;
					$('#info_night_bookings').html(_currency+_night_bookings.service_price);
					$('#info_night_bookings').closest('.profile-info-row').removeClass('hide');
					total +=  parseFloat(_night_bookings.service_price);
				}
				
				$('#info_total').html(_currency+total.toFixed(2));
				$('#info_total').data('total',total.toFixed(2));
				$('#info_keeper').html($('input[name=keeper_id]:checked').data('fullname'));

				//promo code
				if($('#input_promo_code').val().length > 0){
					apply_coupon($('#input_promo_code').val());
				}
			}
		})
		.on('finished.fu.wizard', function(e) {
			if(!$('#key_set-form').valid() && $('#pick_up_date').val() ){
				e.preventDefault();
			}else{
				var $personal_info = $('#personal_info-form').serialize(),
					$services = $('#services-form').serialize(),
					$keeper = $('#keeper-form').serialize(),
					$more_info = $('#more_info-form').serialize(),
					$key_set = $('#key_set-form').serialize(),
					$key_set_val = $('input[name=key_set]:checked').val(),
					$address = JSON.stringify( Cookies.getJSON('address') );

				

				$key_set_date = $('#key_'+$key_set_val+'-form').serialize();
				var form = $personal_info+'&'+$services+'&'+$keeper+'&'+$more_info+'&'+$key_set+'&'+$key_set_date+'&address='+$address+'&total='+$('#info_total').data('total');
				$('.btn-next').prop('disabled',true);
				$.ajax({
					url: 'order/steps/addOrder',
					data: form,
					dataType: 'json',
					type: 'post',
					success: function(res){
						var payer_data = JSON.stringify(res['data']);
						if( res['success'] ){
							var url = 'payments';
							var v_form = $('<form action="' + url + '" method="post">' +
							  '<input type="text" name="api_url" value="" />' +
							  '</form>');
							$('body').append(v_form);
							$('input[name=api_url]').val(payer_data);
							v_form.submit();
						}else{
							bootbox.dialog({
								message: res, 
								buttons: {
									"success" : {
										"label" : "OK",
										"className" : "btn-sm btn-primary"
									}
								}
							});
							$('.btn-next').prop('disabled',false);
						}
					}
				});
			}
		}).on('stepclick.fu.wizard', function(e){
			//e.preventDefault();//this will prevent clicking and selecting steps
		});


		//jump to a step
		/**
		var wizard = $('#fuelux-wizard-container').data('fu.wizard')
		wizard.currentStep = 3;
		wizard.setState();
		*/

		//determine selected step
		//wizard.selectedItem().step



		//documentation : http://docs.jquery.com/Plugins/Validation/validate
	
		$('#keeper-form').on('click','.keeper', function() {
			var id = $(this).data('id');
			var keeper_box = $(this).closest('.keeper');
			var checkBoxes = $('#'+id);
			checkBoxes.prop("checked", true);

			$('.keeper').removeClass('active');
			keeper_box.addClass('active');
		});

		$.mask.definitions['~']='[+-]';
		$('#phone, #guest_phone').mask('(049) 999-9999');

		jQuery.validator.addMethod("phone", function (value, element) {
			return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
		}, "Enter a valid phone number.");

				
		
		
		$('#modal-wizard-container').ace_wizard();
		$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
		
		
		$(document).one('ajaxloadstart.page', function(e) {
			//in ajax mode, remove remaining elements before leaving page
			$('[class*=select2]').remove();
		});

		//STEP 1
		$('#wifi').click(function(e){
			if( $(this).is(":checked") ){
				$('#wifi_name, #wifi_password').prop('disabled',false);
			}else{
				$('#wifi_name, #wifi_password').prop('disabled',true);
			}
		});

		$('#garbage_chute').click(function(e){
			if( $(this).is(":checked") ){
				$('#garbage_chute_location').prop('disabled',false);
			}else{
				$('#garbage_chute_location').prop('disabled',true);
			}
		});

		$('#personal_info-form').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				first_name: {
					required: true
				},
				password: {
					required: true,
					minlength: 5
				},
				r_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email:true,
					remote: {url: "order/steps/checkEmail", type : "post"}
				},
				surname: {
					required: true
				},
				phone: {
					required: true,
					phone: 'required'
				},
				property_size: {
					required: true,
				},
				number_of_beds: {
					required: true,
				},
				number_of_bathrooms: {
					required: true,
				},
				'amenities[]': {
					required: true
				}
			},

			messages: {
				email: {
					required: "Please provide a valid email.",
					email: "Please provide a valid email.",
					remote: "Email already in use!"
				},
				password: {
					required: "Please specify a password.",
					minlength: "Please specify a secure password."
				},
				state: "Please choose state",
				subscription: "Please choose at least one option",
				gender: "Please choose gender",
				agree: "Please accept our policy"
			},


			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},

			errorPlacement: function (error, element) {
				if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
					var controls = element.closest('div[class*="col-"]');
					if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
					else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
				}
				else if(element.is('.select2')) {
					error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
				}
				else if(element.is('.chosen-select')) {
					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
				}
				else error.insertAfter(element.parent());
			},

			submitHandler: function (form) {
			},
			invalidHandler: function (form) {

			}
		});


		// STEP 2
		$('.btn_services').click(function(e){
			e.preventDefault();
			var id = $(this).attr('href');
			var widget_box = $(this).closest('.widget-box');
			var datepick = widget_box.find('input[type="text"]');
			var checkBoxes = $(id);
			checkBoxes.prop("checked", !checkBoxes.prop("checked"));

			if( checkBoxes.is(":checked") ){
				widget_box.addClass('active');
				if(datepick.val() == '' || datepick.val() == null || datepick.val() == undefined){
					datepick.focus();
					datepick.attr('required','required');
				}
			}else{
				widget_box.removeClass('active');
				datepick.val('');
				datepick.removeAttr('required');
			}
			

		});

		$('#services-form').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				'services[]': {
					required: true
				},
				'service_datetime': {
					required: true
				},
			},

			messages: {
				service_datetime: {
					required: "Please specify a Service date.",
				},
			},

			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				
				
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},

			errorPlacement: function (error, element) {
				if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
					var controls = element.closest('div[class*="col-"]');
					if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
					else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
				}
				else if(element.is('.select2')) {
					error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
				}
				else if(element.is('.chosen-select')) {
					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
				}
				else error.insertAfter(element.parent());
			},

			submitHandler: function (form) {
				alert('hi')
			},
			invalidHandler: function (form, validator) {
				if(validator.errorList[0].message.trim() == 'Please specify a Service date.'){
					bootbox.dialog({
						message: "Please select service date", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}else if(validator.errorList[0].message.trim() == 'This field is required.'){
					bootbox.dialog({
						message: "Please select atleast 1 of the services", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}else{
					bootbox.dialog({
						message: "Please select atleast 1 of the services and select service date.", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}
			}
		});

		//Step 3
		$('#keeper-form').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				keeper_id : {
					required: true
				},
			},


			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},

			errorPlacement: function (error, element) {
				if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
					var controls = element.closest('div[class*="col-"]');
					if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
					else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
				}
				else if(element.is('.select2')) {
					error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
				}
				else if(element.is('.chosen-select')) {
					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
				}
				else error.insertAfter(element.parent());
			},

			submitHandler: function (form) {
			},
			invalidHandler: function (form) {
				bootbox.dialog({
					message: "Please select your keeper", 
					buttons: {
						"success" : {
							"label" : "OK",
							"className" : "btn-sm btn-primary"
						}
					}
				});
			}
		});

		

		// STEP 4
		$('#more_info-form').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				guest_first_name: {
					required: true
				},
				guest_surname: {
					required: true
				},
				guest_email: {
					required: true,
					email:true
				},
				guest_phone: {
					required: true
				},
				number_of_guests: {
					required: true
				},
				guest_nationality: {
					required: true
				},
				guest_flight_number: {
					required: true
				},
				guest_info: {
					required: true
				},
			},

			messages: {
				guest_email: {
					required: "Please provide a valid email.",
					email: "Please provide a valid email."
				},
				password: {
					required: "Please specify a password.",
					minlength: "Please specify a secure password."
				},
				guest_nationality: "Please choose nationality",
				subscription: "Please choose at least one option",
				gender: "Please choose gender",
				agree: "Please accept our policy"
			},


			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},

			errorPlacement: function (error, element) {
				if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
					var controls = element.closest('div[class*="col-"]');
					if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
					else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
				}
				else if(element.is('.select2')) {
					error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
				}
				else if(element.is('.chosen-select')) {
					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
				}
				else error.insertAfter(element.parent());
			},

			submitHandler: function (form) {
			},
			invalidHandler: function (form) {
			}
		});

		// STEP 5
		
		$('.btn_key_set').click(function(e){
			e.preventDefault();
			var id = $(this).attr('href');
			var key_set_box = $(this).closest('.widget-box');
			var checkBoxes = key_set_box.find('input[name=key_set]');
			var form_id = $(this).attr('id');
			$( id+'_modal' ).modalBox({
				width: 500,
				title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-cog'></i> Key Set</h4></div>",
				buttons: [ 
							{
								text: "Cancel",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" ); 
								} 
							},
							{
								text: "OK",
								"class" : "btn btn-primary btn-minier",
								click: function() {									
									var form = $('#'+form_id+'-form').closest('form');
									
										if( form_id == 'key_pick_up' ){
											if( $('#'+form_id+'_from').val() && $('#'+form_id+'_to').val() && $('#'+form_id+'_details').val() ){
												$( this ).dialog( "close" );
												checkBoxes.prop("checked", true);
												$('.widget-box').removeClass('active');
												key_set_box.addClass('active');
											}else{
												alert("Please fill all fields");
											}
										}else{
											if( $('#'+form_id+'_date').val() ){
												$( this ).dialog( "close" );
												checkBoxes.prop("checked", true);
												$('.widget-box').removeClass('active');
												key_set_box.addClass('active');
											}else{
												alert("Please input dated");
											}
										}
									//$( this ).dialog( "close" ); 
								} 
							}
						]
			});

			$('#key_pick_up_from').datetimepicker({
				allowTimes:Time_rate,
				format:'d/m/Y H:i',
				minDate: moment().add(1, 'days')
			}).next().on(ace.click_event, function(){
				$(this).prev().focus();
			});

			$('#key_pick_up_to').datetimepicker({
				allowTimes:Time_rate,
				format:'d/m/Y H:i',
				minDate: moment().add(1, 'days')
			}).next().on(ace.click_event, function(){
				$(this).prev().focus();
			});

			/*$("#key_pick_up_to").on("dp.change", function (e) {
	        	$('#key_pick_up_to').datetimepicker({
					minDate: e.date
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
	        });*/

		});

		$('#key_set-form').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				key_set: {
					required: true
				}
			},

			messages: {
				email: {
					required: "Please provide a valid email.",
					email: "Please provide a valid email."
				},
				password: {
					required: "Please specify a password.",
					minlength: "Please specify a secure password."
				},
				state: "Please choose state",
				subscription: "Please choose at least one option",
				gender: "Please choose gender",
				agree: "Please accept our policy"
			},


			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},

			errorPlacement: function (error, element) {
				if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
					var controls = element.closest('div[class*="col-"]');
					if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
					else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
				}
				else if(element.is('.select2')) {
					error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
				}
				else if(element.is('.chosen-select')) {
					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
				}
				else error.insertAfter(element.parent());
			},

			submitHandler: function (form) {
			},
			invalidHandler: function (form) {
				bootbox.dialog({
					message: "Please Fill required fields", 
					buttons: {
						"success" : {
							"label" : "OK",
							"className" : "btn-sm btn-primary"
						}
					}
				});
			}
		});

		$('#promo_code').click(function(){
			// $(this).after().html();
			$('#myModal').modal('show');
		});
	});

	function check_coupon_code(promo_code){
		if(promo_code == '' || promo_code == null || promo_code == undefined){
			$('#promotional_err').html('* This field is required');
			$("#promo_apply").html('');
		}else{
			$('#promotional_err').html('');
			$.post('order/steps/verify_promotional_code/'+promo_code,
				{promo_code:promo_code},
				function(res){
					if(res == false){
						$('#promotional_err').html('* Invalid promotional code or code get expired !!!');
						$("#promo_apply").html('');
					}else{
						var discount;
						$.each(JSON.parse(res),function(key,value){
							discount = value['discount_percentage'];
						});
						$('#promotional_err').html('<span style="color:#428BCA"> * You have got '+discount+'% discount</span>');
						$("#promo_apply").html('<button type="button" class="btn btn-primary" onclick="apply_coupon(\''+promo_code+'\');">Apply</button>');
					}
			});
		}
	}

	function apply_coupon(promo_code){
		$('#input_promo_code').val(promo_code);
		
		var get_total_amount = $('#info_total').text();	
		var _currency = '$';
		var total_amount = get_total_amount.replace(_currency, "");
		var discount=0;

		$.post('order/steps/verify_promotional_code/'+promo_code,
			{promo_code:promo_code},
			function(res){
				if(res == false){
					$('#promotional_err').html('* Invalid promotional code or code get expired !!!');
					$("#promo_apply").html('');
				}else{
					
					$.each(JSON.parse(res),function(key,value){
						discount = value['discount_percentage'];
					});

					var discounted_amount = ((total_amount*discount) / 100).toFixed(2);
					var updated_total_amount = (total_amount-((total_amount*discount) / 100)).toFixed(2);
					
					$('#promo_code_applied').html('<div class="profile-info-name"> Promotional Code </div><div class="profile-info-value">'+_currency+discounted_amount+' &emsp;('+discount+'% of '+_currency+total_amount+')</div>');
					$('#myModal').modal('hide');
					$('#info_total').text(_currency+updated_total_amount);
					$('#info_total').data('total',updated_total_amount);
				}
		});


	}
	</script>