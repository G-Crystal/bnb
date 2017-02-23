<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="space"></div>
		<form id="application-form" class="form-horizontal big-input vertical" method="POST" role="form">
			<input type="hidden" name="franchise" value="1" data-code="au" data-franchise="Sydney">
			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">What is your name?</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">Ex: John Smith</label>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="user_fname" class="col-xs-12" placeholder="First Name" />
						</div>
						<div class="col-sm-6">
							<input type="text" name="user_lname" class="col-xs-12" placeholder="Last Name" />
						</div>
					</div>	
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">What is your email address?</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">Please give the one that you want to use for your Bnbkeeper.com account. </label>
					<div class="col-xs-12 no-padding">
						<input type="email" name="email" validate="true" class="col-xs-12" placeholder="Email" />
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">Please provide a password for your account</label>
					<div class="row">
						<div class="col-sm-12">
							<input type="password" name="password" id="password" class="col-md-6" placeholder="Password" />
						</div>
						<div class="col-sm-12">
							<input type="password" name="c_password" class="col-md-6" placeholder="Confirm Password" />
						</div>
					</div>	
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">What is your complete address?</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">Give us the one where you live</label>
					<div class="row multi ">
						<div class="col-sm-6">
							<input type="text" name="location" class="col-xs-12" placeholder="Street Adress" />
						</div>
						<div class="col-sm-6">
							<input type="text" name="zip" class="col-xs-12" placeholder="Zip Code" />
						</div>
						<div class="col-sm-6">
							<input type="text" name="state" class="col-xs-12" placeholder="State" />
						</div>
						<div class="col-sm-6">
							<input type="text" name="locality" class="col-xs-12" placeholder="Locality" />
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">I certify that</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">1. I have a smartphone</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter"> 2. I have the right to work in my country</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter"> 3. I speak english</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter"> 4. I have more than 18 years old </label>
					<div class="col-xs-12 no-padding">
						<label>
							<input name="certify" class="ace ace-switch ace-switch-5" type="checkbox" />
							<span class="lbl"></span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">In which city do you want to become a concierge (keeper)?</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">You can only choose one answer </label>
					<div class="col-xs-12 no-padding">
						<select class="chosen-select form-control" id="keeper_location" name="keeper_location" data-placeholder="Select suburb">
							<?php dropDown('Franchise'); ?>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">In addition to English, which other languages do you speak?</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">Basic conversational or more. </label>
					<div class="col-xs-12 no-padding">
						<div class="checkbox">
							<label>
								<input name="languages[]" value="French" type="checkbox" class="ace" />
								<span class="lbl"> French</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Italian" type="checkbox" class="ace" />
								<span class="lbl"> Italian</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Spanish" type="checkbox" class="ace" />
								<span class="lbl"> Spanish</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Portuguese" type="checkbox" class="ace" />
								<span class="lbl"> Portuguese</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Russian" type="checkbox" class="ace" />
								<span class="lbl"> Russian</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Mandarin" type="checkbox" class="ace" />
								<span class="lbl"> Mandarin</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Cantonese" type="checkbox" class="ace" />
								<span class="lbl"> Cantonese</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Japanese" type="checkbox" class="ace" />
								<span class="lbl"> Japanese</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Hindi" type="checkbox" class="ace" />
								<span class="lbl"> Hindi</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Arabic" type="checkbox" class="ace" />
								<span class="lbl"> Arabic</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="languages[]" value="Bengali" type="checkbox" class="ace" />
								<span class="lbl"> Bengali</span>
							</label>
						</div>					

					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">How many hours per week are you available?</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">Don't forget that you can choose when you want to work. </label>
					<div class="row multi ">
						<div class="radio">
							<label>
								<input name="availability" value="Less than 15 hours" type="radio" class="ace" />
								<span class="lbl"> Less than 15 hours</span>
							</label>
						</div>
					</div>
					<div class="row multi ">
						<div class="radio">
							<label>
								<input name="availability" value="Between 15 and 25 hours" type="radio" class="ace" />
								<span class="lbl"> Between 15 and 25 hours</span>
							</label>
						</div>
					</div>
					<div class="row multi ">
						<div class="radio">
							<label>
								<input name="availability" value="More than 25 hours" type="radio" class="ace" />
								<span class="lbl"> More than 25 hours</span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">How would you travel from your place to your host’s property?</label>
					<div class="col-xs-12 no-padding">
						<div class="checkbox">
							<label>
								<input name="way_of_travel[]" value="Walk" type="checkbox" class="ace" />
								<span class="lbl"> Walk</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="way_of_travel[]" value="Bike" type="checkbox" class="ace" />
								<span class="lbl"> Bike</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="way_of_travel[]" value="Bus" type="checkbox" class="ace" />
								<span class="lbl"> Bus</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="way_of_travel[]" value="Train" type="checkbox" class="ace" />
								<span class="lbl"> Train</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="way_of_travel[]" value="Ferry" type="checkbox" class="ace" />
								<span class="lbl"> Ferry</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="way_of_travel[]" value="Other" type="checkbox" class="ace" />
								<span class="lbl"> Other</span>
							</label>
						</div>

					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger">Are you a member of any vacation rental websites?</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">Host or travellers on Airbnb, Misterbnb, Stayz, HomeAway, Booking etc...</label>
					<div class="col-xs-12 no-padding">
						<div class="checkbox">
							<label>
								<input name="member_rental_website" class="ace ace-switch ace-switch-5" type="checkbox" />
								<span class="lbl"></span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">Could you tell us more about yourself?</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">Choose as many as you want</label>
					<div class="col-xs-12 no-padding">
						<div class="checkbox">
							<label>
								<input name="about[]" value="I am a professional concierge" type="checkbox" class="ace" />
								<span class="lbl"> I am a professional concierge</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="about[]" value="I am working in hospitality" type="checkbox" class="ace" />
								<span class="lbl"> I am working in hospitality</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="about[]" value="I help my friends and families in their short term rentals" type="checkbox" class="ace" />
								<span class="lbl"> I help my friends and families in their short term rentals</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="about[]" value="I work/worked in a travel company" type="checkbox" class="ace" />
								<span class="lbl"> I work/worked in a travel company</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="about[]" value="I am just a travel addict" type="checkbox" class="ace" />
								<span class="lbl"> I am just a travel addict</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="about[]" value="I am a frequent user of short term rentals" type="checkbox" class="ace" />
								<span class="lbl"> I am a frequent user of short term rentals</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="about[]" value="None of the above" type="checkbox" class="ace" />
								<span class="lbl"> None of the above</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="about[]" value="Other" type="checkbox" class="ace" />
								<span class="lbl"> Other</span>
							</label>
						</div>

					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">What is your visa situation?</label>
					<div class="col-xs-12 no-padding">
						<div class="radio">
							<label>
								<input name="visa_situation" value="Australian/NZ citizen" type="radio" class="ace" />
								<span class="lbl"> Australian/NZ citizen</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="visa_situation" value="Permanent resident" type="radio" class="ace" />
								<span class="lbl"> Permanent resident</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="visa_situation" value="Working holiday visa" type="radio" class="ace" />
								<span class="lbl"> Working holiday visa</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="visa_situation" value="Student visa" type="radio" class="ace" />
								<span class="lbl"> Student visa</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="visa_situation" value="Other" type="radio" class="ace" />
								<span class="lbl"> Other</span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">Introduce yourself... briefly!</label>
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left lighter">Tell us about your professional and personal experience, your relevant trainings, your interests, your motivation to become a keeper... We want to know everything about you!</label>
					<div class="col-xs-12 no-padding">
						<textarea name="introduction" type="radio" class="col-xs-12" /></textarea>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger important">How did you hear about bnbkeeper.com?</label>
					<div class="col-xs-12 no-padding">
						<div class="radio">
							<label>
								<input name="source" value="Google" type="radio" class="ace" />
								<span class="lbl"> Google</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="Facebook" type="radio" class="ace" />
								<span class="lbl"> Facebook</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="Newspaper" type="radio" class="ace" />
								<span class="lbl"> Newspaper</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="Radio" type="radio" class="ace" />
								<span class="lbl"> Radio</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="Job Websites" type="radio" class="ace" />
								<span class="lbl"> Job Websites</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="Television" type="radio" class="ace" />
								<span class="lbl"> Television</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="Email" type="radio" class="ace" />
								<span class="lbl"> Email</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="Fliers" type="radio" class="ace" />
								<span class="lbl"> Fliers</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="Friends" type="radio" class="ace" />
								<span class="lbl"> Friends</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="I know someone who is keeper" type="radio" class="ace" />
								<span class="lbl"> I know someone who is keeper</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="source" value="I know a customer" type="radio" class="ace" />
								<span class="lbl"> I know a customer</span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<h1 class="text-center">Here are few questions to test if you know who we are!</h1>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger">bnbkeeper.com is</label>
					<div class="col-xs-12 no-padding">
						<div class="radio">
							<label>
								<input name="question_1" value="1" type="radio" class="ace" />
								<span class="lbl"> The most innovative company who provides services for short term rentals</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="question_1" value="2" type="radio" class="ace" />
								<span class="lbl"> An online marketplace to rent his property</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="question_1" value="3" type="radio" class="ace" />
								<span class="lbl"> A real estate agent</span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger">What kind of services do concierges provide on Bnbkeeper.com?</label>
					<div class="col-xs-12 no-padding">
						<div class="checkbox">
							<label>
								<input name="question_2[]" value="1" type="checkbox" class="ace" />
								<span class="lbl"> Check-in</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="question_2[]" value="2" type="checkbox" class="ace" />
								<span class="lbl"> Check-out</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="question_2[]" value="3" type="checkbox" class="ace" />
								<span class="lbl"> Breakfasts</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="question_2[]" value="4" type="checkbox" class="ace" />
								<span class="lbl"> Property management</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="question_2[]" value="5" type="checkbox" class="ace" />
								<span class="lbl"> Laundry</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="question_2[]" value="6" type="checkbox" class="ace" />
								<span class="lbl"> Cleaning</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="question_2[]" value="7" type="checkbox" class="ace" />
								<span class="lbl"> Babysitting</span>
							</label>
						</div>
						
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger">Who chooses the right concierge for a service?</label>
					<div class="col-xs-12 no-padding">
						<div class="radio">
							<label>
								<input name="question_3" value="1" type="radio" class="ace" />
								<span class="lbl"> Hosts</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="question_3" value="2" type="radio" class="ace" />
								<span class="lbl"> Bnbkeepers</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="question_3" value="3" type="radio" class="ace" />
								<span class="lbl"> Concierges</span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger">Is it possible for you to choose when you are available?</label>
					<div class="col-xs-12 no-padding">
						<label>
							<input name="question_4" class="ace ace-switch ace-switch-5" type="checkbox" />
							<span class="lbl"></span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label class="col-xs-12 control-label no-padding-left no-padding-right align-left bigger">Who will review your mission? </label>
					<div class="col-xs-12 no-padding">
						<div class="radio">
							<label>
								<input name="question_5" value="1" type="radio" class="ace" />
								<span class="lbl"> Hosts</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="question_5" value="2" type="radio" class="ace" />
								<span class="lbl"> Guests</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="question_5" value="3" type="radio" class="ace" />
								<span class="lbl"> Bnbkeeper.com</span>
							</label>
						</div>
						<div class="radio">
							<label>
								<input name="question_5" value="4" type="radio" class="ace" />
								<span class="lbl"> Other</span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button id="btn-submit" class="btn btn-info pull-right" type="button">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Submit
					</button>
				</div>
			</div>

		</form>
	</div>
</div>

<script src="assets/js/fuelux/fuelux.wizard.js"></script>
<script src="assets/js/jquery.validate.js"></script>
<script src="assets/js/additional-methods.js"></script>
<script src="assets/js/bootbox.js"></script>
<script src="assets/js/jquery.maskedinput.js"></script>
<script src="assets/js/select2.js"></script>
<script src="assets/js/fuelux/fuelux.spinner.js"></script>
<script src="assets/js/ace/elements.spinner.js"></script>
<script src="assets/js/chosen.jquery.js"></script>

<script src="assets/js/ace/elements.wizard.js"></script>

<script>
	jQuery(function($) {

		$('.chosen-select').chosen();

		$('#application-form').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			onsubmit: false,
			focusInvalid: false,
			ignore: "",
			rules: {
				user_fname: {required: true, },
				user_lname: {required: true, },
				email: {
					required: true,
					email:true,
					remote: {url: "order/steps/checkEmail", type : "post"}
				},
				password: {
					required: true,
					minlength: 5
				},
				c_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				location: {required: true, },
				state: {required: true, },
				locality: {required: true, },
				certify: {required: true, },
				keeper_location: {required: true, },
				'languages[]': {required: true, },
				'way_of_travel[]': {required: true, },
				member_rental_website: {required:false , },
				availability: {required: true, },
				'about[]': {required: true, },
				visa_situation: {required: true, },
				introduction: {required: true, },
				source: {required: true, },
			},

			messages: {
				email: {
					required: "Please provide a valid email.",
					email: "Please provide a valid email.",
					remote: 'Email already in use.'
				},
				password: {
					required: "Please specify a password.",
					minlength: "Please specify a secure password."
				},
				user_fname: "&nbsp;",
				user_lname: "&nbsp;",
				location: "&nbsp;",
				state: "&nbsp;",
				locality: "&nbsp;",
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

		$('#btn-submit').click(function(e){
			e.preventDefault();
			var form = $('#application-form');
			if( form.valid() ){
				$.post('keeper/application/process',form.serialize())
				.done(function(data) {
					if( data == 'success' ){
						bootbox.dialog({
							message: "Thank you! Your information was successfully saved!", 
							buttons: {
								"success" : {
									"label" : "OK",
									"className" : "btn-sm btn-primary"
								}
							}
						});
						setTimeout(function(){ window.location.href = "login"; }, 2000);
					}else{
						bootbox.dialog({
							message: data, 
							buttons: {
								"success" : {
									"label" : "OK",
									"className" : "btn-sm btn-primary"
								}
							}
						});
					}
				},'json');
			}else{
				bootbox.alert('Please Fill all required fields.')
			}
		});
	});
</script>