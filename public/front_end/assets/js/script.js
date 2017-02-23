// Avoid `console` errors in browsers that lack a console.
// (function() {
//     var method;
//     var noop = function () {};
//     var methods = [
//         'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
//         'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
//         'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
//         'timeStamp', 'trace', 'warn'
//     ];
//     var length = methods.length;
//     var console = (window.console = window.console || {});

//     while (length--) {
//         method = methods[length];

//         // Only stub undefined methods.
//         if (!console[method]) {
//             console[method] = noop;
//         }
//     }
// }());

// Place any jQuery/helper plugins in here.


$(document).ready(function() {
	// $(document).bind("contextmenu",function(e) {
	// 	e.preventDefault();
	// });
	//console.log('common script is ready');
	var burl = $('#hidden_base_url').text();
	var fran = $('#hidden_franchise').text();
	var selected_services_array = new Array();
	var selected_services_id_array = new Array();
	var dt = new Date();
	var time = dt.getHours();
	var date = $.datepicker.formatDate('yy/mm/dd', new Date());
	var final_time = date+" "+time+":00";
	////console.log(share);
	$('#datetimepicker3').datetimepicker({value:final_time});

	// TASKS ON LOAD

	if(Cookies.get('order_selected_services_list')==null){
		////console.log('list null');
	}else{
		////console.log('list not null');
		selected_services_array = Cookies.get('order_selected_services_list');
		selected_services_array = JSON.parse(selected_services_array);
	}

	if(Cookies.get('order_selected_services_id_list')==null){

	}else{
		selected_services_id_array = Cookies.get('order_selected_services_id_list');
		selected_services_id_array = JSON.parse(selected_services_id_array);
		////console.log('loaded: '+selected_services_id_array);
	}

	////console.log('service array');
	////console.log(selected_services_array);
	var service_no = selected_services_array.length;
	////console.log(service_no);
	////console.log('service id array');
	////console.log(selected_services_id_array);
	$('.sidebar_services').show();

	if(Cookies.get('keeper_selected_name')==null){

	}else{
		$('#'+Cookies.get('keeper_selected_id')).addClass('selected');
		$('#order_at_selected_keeper').append("<p id='sidebar_info_keeper_selected'>"+'<img width="40px" src="'+Cookies.get('keeper_selected_img')+'" class="img-circle"> &nbsp;'+Cookies.get('keeper_selected_name')+"</p>");
		$('.sidebar_keeper').show();
	}

	if(Cookies.get('order_selected_services_list')==null){

	}else{
		var fill_services = Cookies.get('order_selected_services_list');
		var fill_services_id = Cookies.get('order_selected_services_id_list');
		fill_services = JSON.parse(fill_services);
		fill_services_id = JSON.parse(fill_services_id);
		for(var counter = 0; counter < fill_services.length; counter++){
			//console.log('sc test: '+Cookies.get(fill_services[counter]+'_value'));
			var toinsert = Cookies.get(fill_services[counter]+'_value');
			if(toinsert == 'Cleaning + Laundry'){
				toinsert = "Laundry";
			}
			$('#order_at_selected_services').append("<p style='font-size:15px' id='"+fill_services_id[counter]+"'>"+toinsert+" ($"+Cookies.get(fill_services[counter]+'_price')+")</p>");
			var order_2_sel_service = "";
			//console.log('toinsert: '+toinsert);
			if(toinsert == 'Check-In'){
				order_2_sel_service = 'order_service_checkin';
			}else if(toinsert == 'Checkout'){
				order_2_sel_service = 'order_service_checkout';
			}else if(toinsert == 'Cleaning'){
				order_2_sel_service = 'order_service_cleaning';
			}else if(toinsert == 'Laundry'){
				order_2_sel_service = 'order_service_cleaning_and_laundry';
			}
			//console.log('left_sel_service: '+order_2_sel_service);
			change_service_background_color(order_2_sel_service, 'select_service');
		}
	}

	
	show_hide_sidebar_service();
	load_sidebar_info();

	function load_sidebar_info(){
		// Loading Address
		if($('#order_at_address').length > 0){
			var address_one = Cookies.get('order_venue_address_name');
			var address_two = Cookies.get('order_venue_address_locality');
			var address_three = Cookies.get('order_venue_address_administrative_area');
			var address_four = Cookies.get('order_venue_address_postal_code');
			var address_five = Cookies.get('order_venue_address_country');
			$('#order_at_address').empty();
			$('#order_at_address').append(address_one);
			$('#order_at_address').append(", ");
			$('#order_at_address').append(address_two+" ");
			$('#order_at_address').append(address_three+" ");
			$('#order_at_address').append(address_four+", ");
			$('#order_at_address').append(address_five);
		}

		// Loading House Size
		if($('#order_at_size').length > 0){
		////console.log('size exists');
		var size = Cookies.get('order_venue_size');
		var flat_size = 0;
		if(size == 1){
			flat_size = "< 20";
		}else if(size == 2){
			flat_size = "20-40";
		}else if(size == 3){
			flat_size = "41-70";
		}else if(size == 4){
			flat_size = "71-100";
		}else if(size == 5){
			flat_size = "101-150";
		}else if(size == 6){
			flat_size = "151-200";
		}else if(size == 7){
			flat_size = "> 200";
		}
		if(size != null){
			$('#order_at_size').text(flat_size);
			$('#sidebar_flat_size_block').show();
		}
	}

		// Printing Total
		if($('#order_at_total').length > 0){
			print_and_set_total_price();
		}

		// Load Holiday Booking
		if(Cookies.get('order_additional_charge_holiday_booking') == 'y'){
			$('#order_at_additional_Charge_holiday_booking').empty();
			lhb_percentage = Cookies.get('order_additional_charge_holiday_percentage');
			var lhb_day = "";
			if(lhb_percentage == '20'){
				lhb_day = "Saturday";
			}else if(lhb_percentage == '40'){
				lhb_day = "Sunday";
			}
			$('#order_at_additional_Charge_holiday_booking').html("Booking on "+lhb_day+"("+lhb_percentage+"%): $"+get_percentage_on_total_price(lhb_percentage)+"<br>");
		}

		// Load Last Minute Booking
		if(Cookies.get('order_additional_charge_last_minute_booking') == 'y'){
			$('#order_at_additional_Charge_last_minute_booking').empty();
			$('#order_at_additional_Charge_last_minute_booking').html(Cookies.get('order_additional_charge_last_minute_booking_message')+"<br>");
		}

		// Load Booking Time
		if($('#order_at_selected_time').length > 0){
			var time = Cookies.get('order_time');
			$('#order_at_selected_time').text(time);
			$('.sidebar_time').show();
		}

		// Load Night Booking
		if(Cookies.get('order_additional_charge_nightbooking') == 'y'){
			$('#order_at_additional_Charge_night_booking').empty();
			$('#order_at_additional_Charge_night_booking').html('Night Booking: $10<br>');
		}

		// Load Public Holiday Booking
		if(Cookies.get('order_additional_charge_public_holiday_booking') == 'y'){
			$('#order_at_additional_Charge_public_holiday_booking').empty();
			$('#order_at_additional_Charge_public_holiday_booking').html('<span>Booking on Public Holiday(80%): $'+get_percentage_on_total_price(80)+'</span><br>');
		}
	}

	// TASKS ON LOAD


	$('.collapse').on('show.bs.collapse', function() {
		var id = $(this).attr('id');
		$('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
		$('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-minus"></i>');
	});
	$('.collapse').on('hide.bs.collapse', function() {
		var id = $(this).attr('id');
		$('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
		$('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-plus"></i>');
	});

	// signup starts
	$('input[id^="signup_"]').focusout(function(){
		var id_selector = $(this)['context']['id'];
		//console.log(id_selector);
		if(id_selector == "signup_first_name"){
			if($(this).val() == ""){
				$('#signup_first_name_validation_message').show();
			}else{
				$('#signup_first_name_validation_message').hide();
			}
		}

		if(id_selector == "signup_last_name"){
			if($(this).val() == ""){
				$('#signup_last_name_validation_message').show();
			}else{
				$('#signup_last_name_validation_message').hide();
			}
		}

		if(id_selector == "signup_email"){
			if(!isValidEmailAddress($(this).val()) || $('#signup_email').val() == ""){
				$('#signup_email_validation_message').show();
			}else{
				$('#signup_email_validation_message').hide();
			}
		}
		if(id_selector == "signup_password_confirmation"){
			var one_has_error = "no";
			var two_has_error = "no";
			var message = "";
			if($('#signup_password').val() != $(this).val()){
				one_has_error = "yes";
			}else{
				one_has_error = "no";
			}

			if($('#signup_password').val() == "" || $('#signup_password_confirmation').val() == ""){
				two_has_error = "yes";
			}else{
				two_has_error = "no";
			}

			if(two_has_error == "yes"){
				message = 'Please enter both passwords';
			}else if(one_has_error == "yes"){
				message = "Password doesn't match";
			}

			if(one_has_error == "yes" || two_has_error == "yes"){
				$('#signup_password_validation_confirmation_message').empty();
				$('#signup_password_validation_confirmation_message').append(message);
				$('#signup_password_validation_confirmation_message').show();
			}else{
				$('#signup_password_validation_confirmation_message').hide();
			}
		}
	});

$('#signup_button').click(function(){
		//console.log('signup called');
		var first_name = $('#signup_first_name').val();
		var last_name = $('#signup_last_name').val();
		var email_address = $('#signup_email').val();
		var password = $('#signup_password').val();
		var password_confirmation = $('#signup_password_confirmation').val();
		if(first_name == ""){
			$('#signup_first_name_validation_message').show();
		}
		if(last_name == ""){
			$('#signup_last_name_validation_message').show();
		}
		if(email_address == "" || !isValidEmailAddress(email_address)){
			$('#signup_email_validation_message').show();
		}
		if(password != password_confirmation){
			$('#signup_password_validation_confirmation_message').empty();
			$('#signup_password_validation_confirmation_message').append("Password doesn't match");
			$('#signup_password_validation_confirmation_message').show();
		}
		if(password == "" || password_confirmation == ""){
			$('#signup_password_validation_confirmation_message').empty();
			$('#signup_password_validation_confirmation_message').append("Please enter both password fields.");
			$('#signup_password_validation_confirmation_message').show();
		}
		// ajax
		var _data = {}
		_data.fname = first_name;
		_data.lname = last_name;
		_data.email = email_address;
		_data.password = password;
		_data.r_password = password_confirmation;
		//console.log(">> start ajax. url: "+_url+"; data :"+_data);

		var data_response;
		$.ajax({
			url:'login/registration',
			data:_data,
			type:'POST',
			dataType: "json",
			async: false,
			success: function(response){
				if(response == "success"){
					$('#signup_validation_message').html('Account Created. Plese Login to access your dashboard');
					$('#signup_validation_message').removeClass('alert-danger');
					$('#signup_validation_message').addClass('alert-success');
					$('#signup_validation_message').show();
				}else{
					$('#signup_validation_message').html('Email already in use.');
					$('#signup_validation_message').removeClass('alert-danger');
					$('#signup_validation_message').addClass('alert-danger');
					$('#signup_validation_message').show();
				}
			}
		});
		// ajax
	});
	// signup ends

	// signin starts
	$('#signin_button').click(function(){
		//console.log('signin button clicked');
		var email_address = $('#signin_email').val();
		var password = $('#signin_password').val();
		// ajax
		//var _url = burl+'aj/usi';
		var _data = {}
		_data.username = email_address;
		_data.password = password;
		//console.log(">> start ajax. url: "+_url+"; data :"+_data);

		var data_response;
		$.ajax({
			url:'login/validate_ajax',
			data:_data,
			type:'POST',
			dataType: "json",
			async: false,
			success: function(response){
				//console.log('unique testing response: '+response);
				if(response['success']){
					$('#signin_validation_message').html('Login Successful');
					$('#signin_validation_message').removeClass('alert-danger');
					$('#signin_validation_message').addClass('alert-success');
					$('#signin_validation_message').show();
					setTimeout(function(){ window.location.href = response['link']; }, 2000);
				}else{
					$('#signin_validation_message').html('Login Failed');
					$('#signin_validation_message').removeClass('alert-success');
					$('#signin_validation_message').addClass('alert-danger');
					$('#signin_validation_message').show();
				}

			}
		});
		// ajax
	});
	// signin ends

	// geocomplete starts
	$("input#geocomplete").geocomplete({
		details: "geodetails",
		geocodeAfterResult: false
	});
	// geocomplete ends

	// book_now_step_one
	$('#book_now_one').click(function(){
		var geo_address = $('.book_now_one').val();
		if(geo_address == ""){

		}else{
			book_now_step_one(geo_address);
		}
	});
	$('#book_now_two').click(function(){
		var geo_address = $('.book_now_two').val();
		if(geo_address == ""){

		}else{
			book_now_step_one(geo_address);
		}
	});
	$('#book_now_three').click(function(){
		var geo_address = $('.book_now_three').val();
		if(geo_address == ""){

		}else{
			book_now_step_one(geo_address);
		}
	});
	function book_now_step_one(){

		//console.log('its vora');
		//console.log('book now step one');
		var order_name = $('#order_name').val();
		var franchise_id = $('#franchise_id').val();
		var order_route = $('#order_route').val();
		var order_street_number = $('#order_street_number').val();
		var order_postal_code = $('#order_postal_code').val();
		var order_locality = $('#order_locality').val();
		var order_sublocality = $('#order_sublocality').val();
		var order_country = $('#order_country').val();
		var order_country_short = $('#order_country_short').val();
		var order_administrative_area_level_1 = $('#order_administrative_area_level_1').val();
		var order_formatted_address = $('#order_formatted_address').val();
		//console.log('order_name: '+order_name);
		//console.log('order_route: '+order_route);
		//console.log('order_street_number: '+order_street_number);
		//console.log('order_postal_code: '+order_postal_code);
		//console.log('order_locality: '+order_locality);
		//console.log('order_sublocality: '+order_sublocality);
		//console.log('order_country: '+order_country);
		//console.log('order_country_short: '+order_country_short);
		//console.log('order_administrative_area_level_1: '+order_administrative_area_level_1);
		if(order_country == "Australia"){
			Cookies.set('address',
			{
				franchise 				: franchise_id,
				address_name			: order_name,
				address_route 			: order_route,
				address_street_number 	: order_street_number,
				address_postal_code		: order_postal_code,
				address_locality 		: order_locality,
				address_sublocality		: order_sublocality,
				address_country 		: order_country,
				address_code 			: order_country_short,
				address_administrative_area : order_administrative_area_level_1,
				address_formatted_address : order_formatted_address

			},
			{
				expires: 2

			});
			window.location = 'order/steps';
		}else{
			var inst = $('[data-remodal-id=invalid-address]').remodal();
			inst.open();
		}

		
	}
	// book_now_step_one

	// book_now_step_two
	////console.log('address selector availability' + $('#order_at_address').length);
	

	
	// sidebar_load
	
	// book_now_step_two

	// order page next
	$('#next_order_page_1').click(function(){
		//console.log('page 1 next clicked');
		// house adding process starts
		var first_name = $('#order_step_1_first_name').val();
		//console.log(first_name);
		var last_name = $('#order_step_1_last_name').val();
		var phone = $('#order_step_1_phone').val();
		var email = $('#order_step_1_email').val();
		console.log('email: '+email);
		var size = $( "#order_home_size" ).val();
		var beds = $('#order_no_of_beds').val();
		var bathrooms = $('#order_no_of_bathrooms').val();
		var unit_no = $('#order_step_1_unit').val();
		var digit_code = $('#order_step_1_digit_code').val();
		var wifi = $('input[name=order_step_1_wifi]:checked').val();
		var wifi_name = $('#order_wifi_network').val();
		var wifi_password = $('#order_wifi_password').val();
		var garbage = $('input[name=order_step_1_garbage]:checked').val();
		var garbage_location = $('#order_chute_location').val();
		var amenities = $('input[name="amenities"]:checked').serialize();
		var instruction = $('#order_step_1_specific_instruction').val();
		var street_address = Cookies.get('order_venue_address_name');
		var city = Cookies.get('order_venue_address_locality');
		var state = Cookies.get('order_venue_address_administrative_area');
		var zipcode = Cookies.get('order_venue_address_postal_code');
		var user_id = 0;

		// //console.log('first_name: '+first_name);
		// //console.log('first_name: '+first_name);
		// //console.log('phone: '+phone);
		// //console.log('email: '+email);
		// //console.log('size: '+size);
		// //console.log('beds: '+beds);
		// //console.log('bathrooms: '+bathrooms);
		// //console.log('unit_no: '+unit_no);
		// //console.log('digit_code: '+digit_code);
		// //console.log('wifi: '+wifi);
		// //console.log('wifi_name: '+wifi_name);
		// //console.log('wifi_password: '+wifi_password);
		// //console.log('garbage: '+garbage);
		// //console.log('garbage_location: '+garbage_location);
		// //console.log('amenities: '+amenities);
		// //console.log('instruction: '+instruction);
		// //console.log('street_address: '+street_address);
		// //console.log('city: '+city);
		// //console.log('state: '+state);
		// //console.log('zipcode: '+zipcode);

		// Host Starts
		if($('#not_dynamic_name').length > 0){
			console.log('first name field exists');
			// ajax
			var _url = burl+'aj/usu';
			var _data = {}
			_data.fname = first_name;
			_data.lname = last_name;
			_data.email = email;
			_data.password = '123456';
			//console.log(">> start ajax. url: "+_url+"; data :"+_data);

			var data_response;
			$.ajax({
				url:_url,
				data:_data,
				type:'POST',
				dataType: "text",
				async: false,
				success: function(response){
					var msg = "";
					console.log('unique testing response: '+response);
					if(response == "person_addition_successful"){
						user_id = create_session_of_user(email);
						if(user_id > 0){
							Cookies.set('person_id', user_id, {expires: 2});
						}
					}
				}
			});
		// ajax
	}else{
		console.log('first name doesnt exist');

	}

		// Host Ends

		// ajax
		var _url = burl+'aj/danh';
		var _data = {}
		_data.house_name = first_name;
		_data.house_phone = phone;
		_data.house_email = email;
		_data.house_size = size;
		_data.house_beds = beds;
		_data.house_bathrooms = bathrooms;
		_data.house_unit_no = unit_no;
		_data.house_digit_code = digit_code;
		_data.house_wifi = wifi;
		_data.house_wifi_network = wifi_name;
		_data.house_wifi_password = wifi_password;
		_data.house_garbage = garbage;
		_data.house_garbage_chute_location = garbage_location;
		_data.house_amenities = amenities;
		_data.house_instruction = instruction;
		_data.house_street_address = street_address;
		_data.house_city = city;
		_data.house_state = state;
		_data.house_zipcode = zipcode;
		//console.log(">> start ajax. url: "+_url+"; data :"+_data);
		var one_numeric = 0;
		var data_response;
		$.ajax({
			url:_url,
			data:_data,
			type:'POST',
			dataType: "text",
			async: false,
			success: function(response){
				var msg = "";
				console.log(response);
				//console.log('unique testing response: '+response);
				if(response > 0){
					Cookies.set('house_id', response, {expires: 2});
					one_numeric = 1;
					console.log('one_numeric: '+one_numeric);
				}else{
					Cookies.remove('house_id');
					one_numeric = 0;
					console.log('one_numeric: '+one_numeric);
				}

			}
		});
		//house adding process ends
		Cookies.set('order_venue_size', size, {expires: 2});
		Cookies.set('order_venue_host_name', name, {expires: 2});
		Cookies.set('order_venue_host_phone', phone, {expires: 2});
		Cookies.set('order_venue_host_email', email, {expires: 2});
		Cookies.set('order_venue_beds', beds, {expires: 2});
		Cookies.set('order_venue_unit_no', unit_no, {expires: 2});
		Cookies.set('order_venue_digit_code', digit_code, {expires: 2});
		Cookies.set('order_venue_wifi', wifi, {expires: 2});
		Cookies.set('order_venue_garbage', garbage, {expires: 2});
		Cookies.set('order_venue_instruction', instruction, {expires: 2});
		Cookies.set('order_venue_street_address', street_address, {expires: 2});
		Cookies.set('order_venue_city', city, {expires: 2});
		Cookies.set('order_venue_state', state, {expires: 2});
		Cookies.set('order_venue_zipcode', zipcode, {expires: 2});
		Cookies.set('order_venue_wifi_network', wifi_name, {expires: 2});
		Cookies.set('order_venue_wifi_password', wifi_password, {expires: 2});
		Cookies.set('order_venue_bathroom', bathrooms, {expires: 2});
		Cookies.set('order_venue_garbage_location', garbage_location, {expires: 2});

		if(one_numeric == 1){
			console.log('one_numeric: '+one_numeric);
			Cookies.set('order_page_1_passing', 'y', {expires: 2});
			window.location = burl+fran+'/order/step/2';
		}else{
			Cookies.set('order_page_1_passing', 'n', {expires: 2});
		}
		
	});

function create_session_of_user(email){
	var toReturn = -1;
		// ajax
		var _url = burl+'aj/acs';
		var _data = {}
		_data.email = email;
			//console.log(">> start ajax. url: "+_url+"; data :"+_data);

			var data_response;
			$.ajax({
				url:_url,
				data:_data,
				type:'POST',
				dataType: "text",
				async: false,
				success: function(response){
					var msg = "";
					console.log('unique testing response: '+response);
					toReturn = response;
				}
			});
		// ajax
		return toReturn;
	}

	// Service Selection PROCESS

	function change_service_background_color(service_selected, task){
		if(service_selected == 'order_service_checkin'){
			if(task == "select_service"){
				$('#1').addClass('selected');
			}
			else if(task == "deselect_service")
			{
				$('#1').removeClass('selected');
			}
		}else if(service_selected == 'order_service_checkout'){
			if(task == "select_service"){
				$('#2').addClass('selected');
			}
			else if(task == "deselect_service")
			{
				$('#2').removeClass('selected');
			}
		}else if(service_selected == 'order_service_cleaning'){
			if(task == "select_service"){
				$('#3').addClass('selected');
			}
			else if(task == "deselect_service")
			{
				$('#3').removeClass('selected');
			}
		}else if(service_selected == 'order_service_cleaning_and_laundry'){
			if(task == "select_service"){
				$('#4').addClass('selected');
			}
			else if(task == "deselect_service")
			{
				$('#4').removeClass('selected');
			}
		}
	}

	$('button[id^="order_service"]').click(function(){

		var service_selected = $(this)['context']['id'];
		var service_value = $(this).data( "value" );
		var service_price = 0;
		if(service_selected == 'order_service_checkin'){
			service_price = $(this).data( "price" );
		}else if(service_selected == 'order_service_checkout'){
			service_price = $(this).data( "price" );
		}else if(service_selected == 'order_service_cleaning'){
			var flatsize = Cookies.get('order_venue_size');
			if(flatsize == 1){
				service_price = 40;
			}else if(flatsize == 2){
				service_price = 60;
			}else if(flatsize == 3){
				service_price = 80;
			}else if(flatsize == 4){
				service_price = 100;
			}else if(flatsize == 5){
				service_price = 120;
			}else if(flatsize == 6){
				service_price = 140;
			}else if(flatsize == 7){
				service_price = 140;
			}
			//console.log('syeed is testing');
			//console.log("bathroom: "+Cookies.get('order_venue_bathroom'));
			var ss_bathroom = Cookies.get('order_venue_bathroom');
			ss_bathroom = ss_bathroom-1;
			var ss_bathroom_price = ss_bathroom*20;
			//console.log("bathroom extra: "+ss_bathroom_price);
			//console.log("bed: "+Cookies.get('order_venue_beds'));
			var ss_beds = Cookies.get('order_venue_beds');
			ss_beds = ss_beds-1;
			var ss_beds_price = ss_beds*10;
			//console.log("bed extra: "+ss_beds_price);
			service_price = service_price+ss_bathroom_price+ss_beds_price;
		}else if(service_selected == 'order_service_cleaning_and_laundry'){
			var ss_beds = Cookies.get('order_venue_beds');
			service_price = $(this).data( "price" );
			price = parseFloat(service_price);
			service_price = price * ss_beds;
			price = service_price.toFixed(2);
			service_price = price;
			
		}
		//console.log(service_selected);
		//console.log(service_value);
		//console.log(service_price);
		var insert = 0;
		if(Cookies.get(service_selected+"_selected")==null){
			insert = 1;
		}else{
			if(Cookies.get(service_selected+"_selected") == 'y'){
				Cookies.set(service_selected+"_selected", 'n', {
					expires: 2
				});
				var service_to_remove = service_selected;
				var service_id_to_remove = 'sidebar_info_service_'+service_selected;
				var index = selected_services_array.indexOf(service_to_remove);
				//console.log('before delete: '+selected_services_array);
				if(index > -1){
					selected_services_array.splice(index, 1);
				}

				//console.log('after delete: '+selected_services_array);

				index = selected_services_id_array.indexOf(service_id_to_remove);
				//console.log('before delete: '+selected_services_id_array);
				if(index > -1){
					selected_services_id_array.splice(index, 1);
				}
				//console.log('after delete: '+selected_services_id_array);

				var selected_services_array_seri = JSON.stringify(selected_services_array);
				var selected_services_id_array_seri = JSON.stringify(selected_services_id_array);

				Cookies.set("order_selected_services_list", selected_services_array_seri, {
					expires: 2
				});
				Cookies.set("order_selected_services_id_list", selected_services_id_array_seri, {
					expires: 2
				});

				$('#sidebar_info_service_'+service_selected).remove();
				var order_service_current_price = $('#order_at_total').text();
				order_service_current_price = parseFloat(order_service_current_price)-service_price;
				order_service_current_price = order_service_current_price;
				$('#order_at_total').empty();
				$('#order_at_total').text(order_service_current_price);
				Cookies.set("order_service_total_price", order_service_current_price, {
					expires: 2
				});
				service_no--;
				change_service_background_color(service_selected, 'deselect_service');
			}else{
				//console.log('exists and no');
				insert = 1;
			}

		}
		if(insert == 1){
			Cookies.set(service_selected+"_selected", 'y', {
				expires: 2
			});
			Cookies.set(service_selected+"_id", service_selected, {
				expires: 2
			});
			Cookies.set(service_selected+"_value", service_value, {
				expires: 2
			});
			Cookies.set(service_selected+"_price", parseFloat(service_price).toFixed(2), {
				expires: 2
			});
			selected_services_array.push(service_selected);
			selected_services_id_array.push('sidebar_info_service_'+service_selected);
			//selected_services_array = selected_services_array.serialize();
			// //console.log(selected_services_array);
			// //console.log(selected_services_id_array);
			var selected_services_array_seri = JSON.stringify(selected_services_array);
			var selected_services_id_array_seri = JSON.stringify(selected_services_id_array);
			Cookies.set("order_selected_services_list", selected_services_array_seri, {
				expires: 2
			});
			Cookies.set("order_selected_services_id_list", selected_services_id_array_seri, {
				expires: 2
			});
			if(service_value == "Cleaning + Laundry"){
				service_value = "Laundry";
			}
			$('#order_at_selected_services').append("<p style='font-size:15px' id='sidebar_info_service_"+service_selected+"'>"+service_value+" ($"+service_price+")</p>");
			var order_service_current_price = $('#order_at_total').text();
			order_service_current_price = parseFloat(order_service_current_price)+service_price;
			order_service_current_price = parseFloat(order_service_current_price).toFixed(2);
			$('#order_at_total').empty();
			$('#order_at_total').text(order_service_current_price);
			Cookies.set("order_service_total_price", order_service_current_price, {
				expires: 2
			});
			service_no++;
			// selected
			change_service_background_color(service_selected, 'select_service');
		}
		//console.log($('order_at_selected_services').text());
		load_sidebar_info();
		print_and_set_total_price();
		show_hide_sidebar_service();
	});
	// show/hide server
	function show_hide_sidebar_service(){
		if(service_no > 0){
			$('.sidebar_services').show();
		}else{
			$('.sidebar_services').hide();
		}
	}
	// Service Selection PROCESS
	$('#next_order_page_2').click(function(){
		var page_3_continue = 0;
		selected_services_array = Cookies.get('order_selected_services_list');
		selected_services_array = JSON.parse(selected_services_array)
		var p6_sa_selected = new Array();

		for(var c = 0; c < selected_services_array.length; c++){
			//console.log(selected_services_array[c]);
			p6_sa_selected[c] = Cookies.get(selected_services_array[c]+'_selected');
			if(p6_sa_selected[c] == "y"){
				page_3_continue = 1;
			}
		}

		if(page_3_continue == 1){
			console.log('continue');
			Cookies.set('order_page_2_passing', 'y', {expires: 2});
			window.location = burl+fran+'/order/step/3';
		}else{
			Cookies.set('order_page_2_passing', 'n', {expires: 2});
			console.log('stick');
		}
		
		
	});
	var time_changed = 0;
	$('#next_order_page_3').click(function(){
		if(time_changed == 0){
			Cookies.set('order_page_3_passing', 'n', {expires: 2});
			console.log('time not changed');
		}else{
			Cookies.set('order_page_3_passing', 'y', {expires: 2});
			console.log('time changed');
			Cookies.set('order_time', $('#datetimepicker3').val(), {
				expires: 2
			});
			$('#order_at_selected_time').text($('#datetimepicker3').val());
			window.location = burl+fran+'/order/step/4';
		}
		console.log($('#datetimepicker3').val());
		
	});
	// date time picker task
	$('#datetimepicker3').change(function(){
		time_changed = 1;
		var toProcess = $(this).val();
		$('#order_at_selected_time').html(toProcess);
		//console.log('-------- date: '+toProcess);
		var toProcessBySpace = toProcess.split(" ");
		var datepart = toProcessBySpace[0];
		var timepart = toProcessBySpace[1];
		datepart = datepart.split("/");
		var year = datepart[0];
		var month = datepart[1];
		var date = datepart[2];
		timepart = timepart.split(":");
		var hour = timepart[0];
		var order_selected_date = new Date(year, month-1, date, hour, 0, 0, 0);
		var current_date = new Date();
		var hour_diff = parseInt(Math.abs(order_selected_date - current_date) / 36e5);
		console.log('hours difference: '+hour_diff);

		var baar = order_selected_date.getDay();

		if(baar == 0){

		}else if(baar == 1){

		}else if(baar == 2){

		}else if(baar == 3){

		}else if(baar == 4){

		}else if(baar == 5){

		}else if(baar == 6){

		}
		$('#order_page_3_validation').empty();
		if(hour_diff > 6){
			add_additional_charge_holiday(baar);
			add_additional_charge_night_booking(hour);
			add_additional_charge_last_minute_booking(hour_diff);
			add_additional_charge_public_holiday(date, month, year);
			$('#next_order_page_3').show();
		}else{
			$('#order_page_3_validation').html("<div class='col-md-10 col-md-offset-1'><p style='color:red'>Difference between Order time & service order time cannot be less than 6 hours.</p><div>");
			$('#next_order_page_3').hide();
		}
		
	});

function add_additional_charge_public_holiday(date, month, year){
		//console.log('public holiday called');
		// ajax
		var _url = burl+'aj/check_if_holiday';
		var _data = {}
		_data.date = date;
		_data.month = month;
		_data.year = year;
		_data.franchise = fran;
		//console.log(">> start ajax. url: "+_url+"; data :"+_data);

		var data_response;
		$.ajax({
			url:_url,
			data:_data,
			type:'POST',
			dataType: "text",
			async: false,
			success: function(response){
				var msg = "";
				//console.log('unique testing response: '+response);
				if(response == 'yes'){
					Cookies.set("order_additional_charge_public_holiday_booking", 'y', {expires: 2});
					$('#order_at_additional_Charge_public_holiday_booking').empty();
					$('#order_at_additional_Charge_public_holiday_booking').html('<span>Booking on Public Holiday(80%): $'+get_percentage_on_total_price(80)+'</span><br>');
				}else{
					Cookies.set("order_additional_charge_public_holiday_booking", 'n', {expires: 2});
					$('#order_at_additional_Charge_public_holiday_booking').empty();
				}
				print_and_set_total_price();
			}
		});
		// ajax
	}

	function add_additional_charge_last_minute_booking(hour_diff){
		if(hour_diff < 24){
			var aaclmb_case = 1;
		}else if(hour_diff < 72){
			var aaclmb_case = 2;
		}else{
			var aaclmb_case = 3;
		}
		//console.log('last minute booking called');
		aaclmb_booking_exists = Cookies.get('order_additional_charge_last_minute_booking');
		aaclmb_booking_exists_for = Cookies.get('order_additional_charge_last_minute_booking_for_hours');
		if(aaclmb_booking_exists == 'y'){
			if(aaclmb_booking_exists_for == aaclmb_case){
				// do nothing
			}else{
				add_last_minute_booking(aaclmb_case);
			}
		}else{
			add_last_minute_booking(aaclmb_case);
		}
	}

	function add_last_minute_booking(case_scenario){
		Cookies.set("order_additional_charge_last_minute_booking", 'y', {expires: 2});
		Cookies.set("order_additional_charge_last_minute_booking_for_hours", case_scenario, {expires: 2});
		var almb_price = 0;
		var almb_message = "";
		if(case_scenario == 1){
			almb_price = 20;
			almb_message = "Last Minute Booking: $20";
		}else if(case_scenario == 2){
			almb_price = 10;
			almb_message = "Last Minute Booking: $10";
		}
		Cookies.set("order_additional_charge_last_minute_booking_price", almb_price, {expires: 2});
		Cookies.set("order_additional_charge_last_minute_booking_message", almb_message, {expires: 2});
		$('#order_at_additional_Charge_last_minute_booking').empty();
		$('#order_at_additional_Charge_last_minute_booking').html(almb_message+"<br>");
		print_and_set_total_price();
	}
	function remove_last_minute_booking(){
		Cookies.set("order_additional_charge_last_minute_booking", 'n', {expires: 2});
		$('#order_at_additional_Charge_last_minute_booking').empty();
		print_and_set_total_price();
	}

	function add_additional_charge_night_booking(hour){
		//console.log('called: add_additional_charge_night_booking');
		var aacnb_total = get_total_price_of_selected_services();
		aacnb_total = roundToTwo(aacnb_total);
		//console.log('total: '+aacnb_total);
		if(hour < 7 || hour > 19){
			//console.log('night booking needed');
			if(Cookies.get('order_additional_charge_nightbooking') == 'y'){
				//console.log('night booking already setup');
			}else{
				//console.log('night booking setup started, need to add');
				aacnb_total = aacnb_total+10;
				Cookies.set("order_additional_charge_nightbooking", 'y', {expires: 2});
				//console.log('night booking after adding $10: '+aacnb_total);
				$('#order_at_additional_Charge_night_booking').empty();
				$('#order_at_additional_Charge_night_booking').html('Night Booking: $10<br>');
				print_and_set_total_price();
			}
		}else{
			//console.log('night booking not needed');
			if(Cookies.get('order_additional_charge_nightbooking') == 'y'){
				//console.log('night booking alread setup, need to remove');
				aacnb_total = aacnb_total-10;
				//console.log('night booking after subtracting $10: '+aacnb_total);
				Cookies.set("order_additional_charge_nightbooking", 'n', {expires: 2});
				$('#order_at_additional_Charge_night_booking').empty();
				print_and_set_total_price();

			}else{
				//console.log('night booking setup not needed and isnt already there');
			}
		}
	}

	function get_total_price_of_selected_services(){
		//console.log('get total price called');
		var toReturn = 0;
		for(var i = 0; i < selected_services_array.length; i++){
			toReturn = toReturn+parseFloat(Cookies.get(selected_services_array[i]+'_price'));
			toReturn = roundToTwo(toReturn);
		}
		console.log('service price: '+toReturn);
		if(Cookies.get('order_additional_charge_nightbooking') == 'y'){
			toReturn = toReturn+10;
		}
		if(Cookies.get('order_additional_charge_holiday_booking') == 'y'){
			toReturn = toReturn+parseFloat(Cookies.get('order_additional_charge_holiday_percentage'));
		}
		//console.log('returning: '+toReturn);
		return toReturn;
	}
	function print_and_set_total_price(){
		//console.log('print_and_set_total_price');
		var toReturn = 0;
		for(var i = 0; i < selected_services_array.length; i++){

			toReturn = toReturn+parseFloat(Cookies.get(selected_services_array[i]+'_price'));
			toReturn = roundToTwo(toReturn);
		}
		if(Cookies.get('order_additional_charge_nightbooking') == 'y'){
			toReturn = toReturn+10;
		}
		if(Cookies.get('order_additional_charge_holiday_booking') == 'y'){
			toReturn = toReturn + parseFloat(get_percentage_on_total_price(parseInt(Cookies.get('order_additional_charge_holiday_percentage'))));
		}
		if(Cookies.get('order_additional_charge_last_minute_booking') == 'y'){
			toReturn = toReturn + parseFloat(Cookies.get('order_additional_charge_last_minute_booking_price'));
		}

		if(Cookies.get('order_additional_charge_public_holiday_booking') == 'y'){
			toReturn = toReturn + parseFloat(get_percentage_on_total_price(80));
		}

		if(Cookies.get('order_promocode_status') == '1'){
			var pc_value = Cookies.get('order_promocode_value');
			var pc_limit = Cookies.get('order_promocode_limit');
			var pc_type = Cookies.get('order_promocode_type'); // 1 means percentage, 2 means fixed
			var pc_services_total = get_services_only_price_of_selected_services();
			if(pc_type == 2){
				console.log('total: '+toReturn);
				toReturn = toReturn - pc_limit;
				console.log('deducted: '+pc_limit);
				console.log('final total: '+toReturn);
				Cookies.set('order_promocode_reduced', pc_limit, {expires: 2});
				$('#promocode_validation_message').append('-$'+pc_limit);
			}else{
				console.log('total: '+toReturn);
				toReduce = parseFloat(get_percentage_on_total_price(pc_value));
				if(toReduce > pc_limit){
					console.log('reduce by calculation: '+toReduce);
					console.log('limit: '+pc_limit);
					toReduce = pc_limit;
				}
				toReturn = toReturn- toReduce;
				console.log('deducted: '+toReduce);
				console.log('final total: '+toReturn);
				Cookies.set('order_promocode_reduced', toReduce, {expires: 2});
				$('#promocode_validation_message').append('-$'+toReduce);
			}
		}
		var n = toReturn.toFixed(2);
		//console.log('total: '+toReturn);
		$('#order_at_total').empty();
		$('#order_at_total').text(n);
		Cookies.set("order_service_total_price", n, {expires: 2});
	}
	function get_services_only_price_of_selected_services(){
		//console.log('get services only price called');
		var toReturn = 0;
		for(var i = 0; i < selected_services_array.length; i++){

			toReturn = toReturn+parseFloat(Cookies.get(selected_services_array[i]+'_price'));
			toReturn = roundToTwo(toReturn);
		}
		//console.log('returning: '+toReturn);
		return toReturn;
	}
	function roundToTwo(num) {
		return +(Math.round(num + "e+2")  + "e-2");
	}
	function get_percentage_on_total_price(percentage){
		//console.log('get percentage on total price called');
		var total = get_services_only_price_of_selected_services();
		console.log('get percentage > total: '+total);
		var additional_charge = (total*percentage)/100;
		//console.log('percentage: '+percentage);
		additional_charge = roundToTwo(additional_charge);
		//console.log('returning: '+additional_charge);
		return additional_charge;
	}
	function set_addtional_charge_holiday(baar){
		//console.log('set additional charge holiday called for day: '+baar);

		var aach_percentage = 0;
		var aach_text = "";
		if(baar == 0){
			aach_percentage = 40;
			aach_text = "Booking on Sunday(40%) $"+get_percentage_on_total_price(aach_percentage);

		}else{
			aach_percentage = 20;
			aach_text = "Booking on Saturday(20%) $"+get_percentage_on_total_price(aach_percentage);

		}
		$('#order_at_additional_Charge_holiday_booking').empty();
		$('#order_at_additional_Charge_holiday_booking').html(aach_text+"<br>");
		Cookies.set("order_additional_charge_holiday_booking", 'y', {expires: 2});
		Cookies.set("order_additional_charge_holiday_day", baar, {expires: 2});
		Cookies.set("order_additional_charge_holiday_percentage", aach_percentage, {expires: 2});
		Cookies.set("order_additional_charge_holiday_text", aach_text, {expires: 2});
		print_and_set_total_price();
	}
	function remove_addtional_charge_holiday(){
		//console.log('remove additional_charge called');
		Cookies.set("order_additional_charge_holiday_booking", 'n', {expires: 2});
		print_and_set_total_price();
		$('#order_at_additional_Charge_holiday_booking').empty();
	}

	function add_additional_charge_holiday(baar){
		//console.log('add additional charge called for '+baar);
		if(baar == 0 || baar == 6){
			if(Cookies.get('order_additional_charge_holiday_booking') == null || Cookies.get('order_additional_charge_holiday_booking') == 'n'){
				set_addtional_charge_holiday(baar);
			}else{
				if(Cookies.get('order_additional_charge_holiday_day') == baar){
				}else{
					set_addtional_charge_holiday(baar);
				}
			}
		}else{
			remove_addtional_charge_holiday();
		}
	}
	// date time picker task
	// keeper selection
	
	$('button[id^="order_keeper_selection_"]').click(function(){
		var keeper_selected = $(this)['context']['id'];
		//console.log(keeper_selected);
		$('.bnbkeeper-compact-item').removeClass('selected');
		$(this).addClass('selected');
		var ui = $(this).data('ui');
		//console.log('name: '+$("#"+keeper_selected+"_name").text());
		var order_keeper_img_src = $("#"+keeper_selected+"_img").attr('src');
		Cookies.set("keeper_selected_name", $("#"+keeper_selected+"_name").text(), {expires: 2});
		Cookies.set("keeper_selected_ui", ui, {expires: 2});
		Cookies.set("keeper_selected_img", order_keeper_img_src, {expires: 2});
		Cookies.set("keeper_selected_id", keeper_selected, {expires: 2});
		Cookies.set("keeper_set", 'y', {expires: 2});
		$('#order_at_selected_keeper').empty();
		$('#order_at_selected_keeper').append("<p id='sidebar_info_keeper_selected'>"+'<img width="40px" src="'+$("#"+keeper_selected+"_img").attr('src')+'" class="img-circle"> &nbsp;'+$("#"+keeper_selected+"_name").text()+"</p>");
		$('.sidebar_keeper').show();
	});
	// keeper selection
	$('#next_order_page_4').click(function(){
		//console.log('page 4 next clicked');
		if(Cookies.get("keeper_set") == "y" ){
			Cookies.set('order_page_4_passing', 'y', {expires: 2});
			window.location = burl+fran+'/order/step/5';
		}else{
			Cookies.set('order_page_4_passing', 'n', {expires: 2});
			

		}
		
	});

	$('#next_order_page_5').click(function(){
		//console.log('page 5 next clicked');
		var guest_first_name = $('#guest_info_first_name').val();
		var guest_last_name = $('#guest_info_last_name').val();
		var guest_nationality = $('#guest_info_nationality').val();
		var guest_phone = $('#guest_info_phone').val();
		var guest_email = $('#guest_info_email').val();
		var guest_flight_or_train = $('#guest_info_flight_or_train').val();
		var guest_no_of_guest = $('#guest_info_no_of_guests').val();
		var guest_additional_information = $('#guest_additional_information').val();
		guest_first_name = guest_first_name.trim();
		guest_last_name = guest_last_name.trim();
		guest_nationality = guest_nationality.trim();
		guest_phone = guest_phone.trim();
		guest_email = guest_email.trim();
		guest_flight_or_train = guest_flight_or_train.trim();
		guest_no_of_guest = guest_no_of_guest.trim();
		guest_additional_information = guest_additional_information.trim();
		guest_flight_or_train = guest_flight_or_train.trim();
		guest_no_of_guest = guest_no_of_guest.trim();
		if(guest_first_name!="" && guest_last_name!="" && guest_nationality!="" && guest_phone!="" && guest_flight_or_train!="" && guest_no_of_guest!=""){
			// ajax
			var _url = burl+'aj/agu';
			var _data = {}
			_data.first_name = guest_first_name;
			_data.last_name = guest_last_name;
			_data.nationality = guest_nationality;
			_data.phone = guest_phone;
			_data.email = guest_email;
			_data.flight_train_no = guest_flight_or_train;
			_data.no_of_guest = guest_no_of_guest;
			_data.additional_info = guest_additional_information;
			console.log(">> start ajax. url: "+_url+"; data :"+_data);

			var data_response;
			$.ajax({
				url:_url,
				data:_data,
				type:'POST',
				dataType: "text",
				async: false,
				success: function(response){
					var msg = "";
					console.log('unique testing response: '+response);
					if(response > 0){
						console.log('response is greater than 0');
						Cookies.set("guest_id", response, {expires: 2});
					}
					
				}
			});
			// ajax
			Cookies.set("guest_first_name", guest_first_name, {expires: 2});
			Cookies.set("guest_last_name", guest_last_name, {expires: 2});
			Cookies.set("guest_nationality", guest_nationality, {expires: 2});
			Cookies.set("guest_phone", guest_phone, {expires: 2});
			Cookies.set("guest_email", guest_email, {expires: 2});
			Cookies.set("guest_flight_or_train", guest_flight_or_train, {expires: 2});
			Cookies.set("guest_no_of_guest", guest_no_of_guest, {expires: 2});
			Cookies.set("guest_additional_information", guest_additional_information, {expires: 2});
			Cookies.set('order_page_5_passing', 'y', {expires: 2});
			window.location = burl+fran+'/order/step/6';
			
		}
	});


$('#next_order_page_6').click(function(){
	// WORKING
		//console.log('page 6 next clicked');
		// need to add item
		selected_services_array = Cookies.get('order_selected_services_list');
		selected_services_array = JSON.parse(selected_services_array);
		var p6_sa_name = new Array();
		var p6_sa_selected = new Array();
		var p6_sa_price = new Array();

		console.log(selected_services_array);
		for(var c = 0; c < selected_services_array.length; c++){
			console.log(selected_services_array[c]);
			p6_sa_name[c] = Cookies.get(selected_services_array[c]+'_value');
			p6_sa_selected[c] = Cookies.get(selected_services_array[c]+'_selected');
			p6_sa_price[c] = Cookies.get(selected_services_array[c]+'_price');
		}
		
		// console.log(p6_selected_service_array);
		// p6_selected_service_array = JSON.stringify(p6_selected_service_array);
		// fetch house info
		var p6_sa_administrative_area = Cookies.get('order_venue_address_administrative_area');
		var p6_sa_country = Cookies.get('order_venue_address_country');
		var p6_sa_country_short = Cookies.get('order_venue_address_country_short');
		var p6_sa_formatted_address = Cookies.get('order_venue_address_formatted_address');
		var p6_sa_locality = Cookies.get('order_venue_address_locality');
		var p6_sa_a_name = Cookies.get('order_venue_address_name');
		var p6_sa_a_postcode = Cookies.get('order_venue_address_postal_code');
		var p6_sa_a_route = Cookies.get('order_venue_address_route');
		var p6_sa_a_street_no = Cookies.get('order_venue_address_street_number');
		var p6_sa_a_sublocality = Cookies.get('order_venue_address_sublocality');
		var p6_sa_a_bathroom = Cookies.get('order_venue_bathroom');
		var p6_sa_a_beds = Cookies.get('order_venue_beds');
		var p6_sa_a_city = Cookies.get('order_venue_city');
		var p6_sa_a_digit = Cookies.get('order_venue_digit_code');
		var p6_sa_a_garbage = Cookies.get('order_venue_garbage');
		var p6_sa_a_g_location = Cookies.get('order_venue_garbage_location');
		var p6_sa_h_email = Cookies.get('order_venue_host_email');
		var p6_sa_h_name = Cookies.get('order_venue_host_name');
		var p6_sa_h_phone = Cookies.get('order_venue_host_phone');
		var p6_sa_h_instruction = Cookies.get('order_venue_instruction');
		var p6_sa_v_size = Cookies.get('order_venue_size');
		var p6_sa_v_state = Cookies.get('order_venue_state');
		var p6_sa_street_address = Cookies.get('order_venue_street_address');
		var p6_sa_unit_no = Cookies.get('order_venue_unit_no');
		var p6_sa_wifi = Cookies.get('order_venue_wifi');
		var p6_sa_wifi_network = Cookies.get('order_venue_wifi_network');
		var p6_sa_wifi_password = Cookies.get('order_venue_wifi_password');
		var p6_sa_zipcode = Cookies.get('order_venue_zipcode');
		var p6_sa_k_address = Cookies.get('order_key_position');
		var p6_sa_k_from = Cookies.get('order_key_from');
		var p6_sa_k_to = Cookies.get('order_key_to');
		var p6_sa_g_id = Cookies.get('guest_id');
		var p6_sa_p_id = Cookies.get('person_id');
		var p6_sa_h_id = Cookies.get('house_id');
		var p6_sa_k_id = Cookies.get('keeper_selected_ui');
		var p6_sa_o_time = Cookies.get('order_time');
		var p6_sa_k_time_from = Cookies.get('order_key_from');
		var p6_sa_k_time_from = Cookies.get('order_key_to');
		var p6_sa_k_address = Cookies.get('order_key_position');


		// fetch additional charges
		var p6_ac_holiday_booking = new Array();
		p6_ac_holiday_booking[0] = Cookies.get('order_additional_charge_holiday_booking');
		p6_ac_holiday_booking[1] = Cookies.get('order_additional_charge_holiday_day');
		p6_ac_holiday_booking[2] = Cookies.get('order_additional_charge_holiday_percentage');
		p6_ac_holiday_booking[3] = Cookies.get('order_additional_charge_holiday_text');

		var p6_ac_last_minute_booking = new Array();
		p6_ac_last_minute_booking[0] = Cookies.get('order_additional_charge_last_minute_booking');
		p6_ac_last_minute_booking[1] = Cookies.get('order_additional_charge_last_minute_booking_for_hours');
		p6_ac_last_minute_booking[2] = Cookies.get('order_additional_charge_last_minute_booking_message');
		p6_ac_last_minute_booking[3] = Cookies.get('order_additional_charge_last_minute_booking_price');

		var p6_ac_nightbooking = Cookies.get('order_additional_charge_nightbooking');
		var p6_ac_public_holiday_booking = Cookies.get('order_additional_charge_public_holiday_booking');



		// fetch selected keeper
		var p6_keeper = new Array();
		p6_keeper[0] = Cookies.get('keeper_selected_id');
		p6_keeper[1] = Cookies.get('keeper_selected_img');
		p6_keeper[2] = Cookies.get('keeper_selected_name');
		p6_keeper[3] = Cookies.get('keeper_selected_ui');


		p6_sa_name = JSON.stringify(p6_sa_name);
		p6_sa_selected = JSON.stringify(p6_sa_selected);
		p6_sa_price = JSON.stringify(p6_sa_price);
		p6_ac_holiday_booking = JSON.stringify(p6_ac_holiday_booking);
		p6_ac_last_minute_booking = JSON.stringify(p6_ac_last_minute_booking);
		p6_keeper = JSON.stringify(p6_keeper);

		// ajax
		var _url = burl+'aj/new_order';
		var _data = {};
		_data.s_name = p6_sa_name;
		_data.s_selected = p6_sa_selected;
		_data.s_price = p6_sa_price;
		_data.s_holiday_booking = p6_ac_holiday_booking;
		_data.s_lastminute_booking = p6_ac_last_minute_booking;
		_data.s_keeper = p6_keeper;
		_data.administrative_area = p6_sa_administrative_area;
		_data.country = p6_sa_country;
		_data.country_short = p6_sa_country_short;
		_data.formatted_address = p6_sa_formatted_address;
		_data.locality = p6_sa_locality;
		_data.a_name = p6_sa_a_name;
		_data.a_postcode = p6_sa_a_postcode;
		_data.a_route = p6_sa_a_route;
		_data.a_street_no = p6_sa_a_street_no;
		_data.a_sublocality = p6_sa_a_sublocality;
		_data.a_bathroom = p6_sa_a_bathroom;
		_data.a_beds = p6_sa_a_beds;
		_data.a_city = p6_sa_a_city;
		_data.a_digit = p6_sa_a_digit;
		_data.a_garbage = p6_sa_a_garbage;
		_data.a_g_location = p6_sa_a_g_location;
		_data.h_email = p6_sa_h_email;
		_data.h_name = p6_sa_h_name;
		_data.h_phone = p6_sa_h_phone;
		_data.h_instruction = p6_sa_h_instruction;
		_data.v_size = p6_sa_v_size;
		_data.v_state = p6_sa_v_state;
		_data.street_address = p6_sa_street_address;
		_data.unit_no = p6_sa_unit_no;
		_data.wifi = p6_sa_wifi;
		_data.wifi_network = p6_sa_wifi_network;
		_data.wifi_password = p6_sa_wifi_password;
		_data.zipcode = p6_sa_zipcode;
		_data.key_address = p6_sa_k_address;
		_data.key_from = p6_sa_k_from;
		_data.key_to = p6_sa_k_to;
		_data.guest_id = p6_sa_g_id;
		_data.house_id = p6_sa_h_id;
		_data.person_id = p6_sa_p_id;
		_data.keeper_id = p6_sa_k_id;
		_data.order_time = p6_sa_o_time;
		_data.keypickup_from = p6_sa_k_time_from;
		_data.keypickup_to = p6_sa_k_time_from;
		_data.keypickup_address = p6_sa_k_address;
		_data.total_price = Cookies.get('order_service_total_price');
		_data.public_holiday_booking = p6_ac_public_holiday_booking;
		_data.night_booking = p6_ac_nightbooking;
		console.log(">> start ajax. url: "+_url+"; data :"+_data);
		var numeric = 0;
		$.ajax({
			url:_url,
			data:_data,
			type:'POST',
			dataType: "text",
			async: false,
			success: function(response){

				console.log(response);
				if($.isNumeric(response)){
					Cookies.set("order_id", response, {expires: 2});
					numeric = 1;
				}else{
					Cookies.remove('order_id');
					numeric = 0;
				}
				
			}
		});
		// ajax
		if(numeric == 1){
			Cookies.set('order_page_6_passing', 'y', {expires: 2});
			window.location = burl+fran+'/order/step/7';
		}else{
			Cookies.set('order_page_6_passing', 'n', {expires: 2});

		}
		
	});
$('#next_order_page_7').click(function(){
		//console.log('page 7 next clicked');
		//window.location = burl+fran+'/order/step/8';
	});
	// order page next

	function isValidEmailAddress(emailAddress) {
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		return pattern.test(emailAddress);
	};

	$('#orde_key_pickup_save').click(function(){
		var from = $('#datepicker-from-pickup').val();
		var to = $('#datepicker-to-pickup').val();
		var value = $('#order_key_pickup_address').val();
		if(value == ""){
			$('#orde_key_pickup_save').before('<span style="color:red">No Address Inserted</span><br>');
			$('#k1').removeClass('selected');
			$('#k2').removeClass('selected');
		}else{
			Cookies.set("order_key_pickup_selection", 1, {expires: 2});
			Cookies.set("order_key_position", value, {expires: 2});
			Cookies.set("order_key_from", from, {expires: 2});
			Cookies.set("order_key_to", to, {expires: 2});
			//$('#pick-up-modal').modal('hide');
			$('#entered_address').text(value);
			var inst = $('[data-remodal-id=pick-up-modal]').remodal();
			inst.close();
			//$('#orde_key_pickup_save').before('<span style="color:green">Address Added.</span><br>');
			$('#k1').addClass('selected');
			$('#k2').removeClass('selected');
		}

	});

	$('#order_key_drop_save').click(function(){
		var from = $('#datepicker-from-dropoff').val();
		var to = $('#datepicker-to-dropoff').val();
		var value = $('#order_key_dropoff_address').val();
		if(value == ""){
			$('#order_key_drop_save').before('<span style="color:red">No Address Inserted</span><br>');
			$('#k1').removeClass('selected');
			$('#k2').removeClass('selected');
		}else{
			Cookies.set("order_key_pickup_selection", 2, {expires: 2});
			Cookies.set("order_key_position", value, {expires: 2});
			Cookies.set("order_key_from", from, {expires: 2});
			Cookies.set("order_key_to", to, {expires: 2});
			//$('#pick-up-modal').modal('hide');
			$('#entered_address_2').text(value);
			var inst = $('[data-remodal-id=drop-off-modal]').remodal();
			inst.close();
			//$('#orde_key_pickup_save').before('<span style="color:green">Address Added.</span><br>');
			$('#k1').removeClass('selected');
			$('#k2').addClass('selected');
		}
	});

	$('#order_step_1_email').focusout(function(){
		var value = $('#order_step_1_email').val();
		// ajax
		var _url = burl+'aj/cue';
		var _data = {}
		_data.email = value;
		//console.log(">> start ajax. url: "+_url+"; data :"+_data);

		var data_response;
		$.ajax({
			url:_url,
			data:_data,
			type:'POST',
			dataType: "text",
			async: false,
			success: function(response){
				var msg = "";
				//console.log('unique testing response: '+response);
				if(response){
					$('#order_step_1_email_message').empty();
					$('#order_step_1_email_message').html('Your Account will be created');
				}else{
					$('#order_step_1_email_message').empty();
					$('#order_step_1_email_message').html('Your Account already exists');
				}
			}
		});
		// ajax
	});

	$('#coupon_apply').click(function(){
		console.log('coupon applied');
		var coupon_promocode = $('#promocode_code').val();
		// ajax
		var _url = burl+'aj/promocode';
		var _data = {}
		_data.promocode = coupon_promocode;
		//console.log(">> start ajax. url: "+_url+"; data :"+_data);

		var data_response;
		$.ajax({
			url:_url,
			data:_data,
			type:'POST',
			dataType: "json",
			async: false,
			success: function(response){
				//var response = JSON.parse(response);
				console.log(response);
				console.log(response['details']);
				if(response['status'] == "-1"){
					// error returned
					$('#promocode_validation_message').empty();
					$('#promocode_validation_message').addClass('alert-danger');
					$('#promocode_validation_message').removeClass('alert-success');
					$('#promocode_validation_message').html(response['message']);
				}else{
					$('#promocode_validation_message').empty();
					$('#promocode_validation_message').removeClass('alert-danger');
					$('#promocode_validation_message').addClass('alert-success');
					$('#promocode_validation_message').html(response['details']['code']+" Applied");
					$('#promocode_input_box').hide();
					$('#coupon_apply').hide();
				}
				Cookies.set('order_promocode_status', response['status'], {expires: 2});
				Cookies.set('order_promocode_code', response['details']['code'], {expires: 2});
				Cookies.set('order_promocode_value', response['details']['value'], {expires: 2});
				Cookies.set('order_promocode_limit', response['details']['limit'], {expires: 2});
				Cookies.set('order_promocode_type', response['details']['type'], {expires: 2});
				print_and_set_total_price();
			}
		});
		// ajax
	});
});
