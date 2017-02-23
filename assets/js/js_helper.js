(function($, window, document, undefined)
{

	// ============= Independent Function ============= //

	$.localStorage = function(){
		return ('localStorage' in window && window['localStorage'] !== null);
	}

	$.get_localStorage = function(storage,key){
		var settings = false;
		if( $.localStorage ){
			var settings_data = localStorage.getItem(storage);				
			if( settings_data ){
				try{ 
					settings = JSON.parse(settings_data);
					return settings[key];
				}catch(e){}
			}
		}

		return settings;
	}
	$.fn.save_tab = function(tab_name){
		tab_name_get = '/?'+tab_name || '/?tab_name';
		page_url = window.location.href.split('/?')[0];
		var tab_box = $(this),
			ul = tab_box.find('> ul'),
			tab = $.get(tab_name),
			tabs = ul.find('li a').not('li a[class="dropdown-toggle"]');

		$(tabs).click(function(){
			var href = $(this).attr('href').replace('#','');
			window.history.pushState({},'',page_url+tab_name_get+'='+href);
		})

		
		$.each(tab_box,function(){
			var active_box = $(this).find('a[href="#'+tab+'"]'),
				active_content = $(this).find('#'+tab),
				active_list = $(this).find('.active');

			if( tab && active_box[0] ){
				//remove all active class
				$.each(active_list,function(){
					$(this).removeClass('active');
				});
				if( active_box.closest('ul').hasClass('dropdown-menu') ){
					//if dropdown
					active_box.closest('ul').parent().addClass('active');
					active_box.parent().addClass('active');
				}else{
					active_box.parent().addClass('active');
				}

				active_content.addClass('active');
				
			}
		})
	}

	$.numberOnly = function(){
		$('input[numberOnly="true"]').on('keydown',function (e) {	  
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
	}

	$.get = function(name){
	   if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
	      return decodeURIComponent(name[1]);
	}

	$.set_localStorage = function(storage,data){
		if( $.localStorage ){
			if( typeof data === 'object' ){
				var settings_data = localStorage.getItem(storage);
					settings_obj = '';
				if( settings_data ){
					try{
						settings_obj = JSON.parse(settings_data);
					}catch(e){}

					settings = $.extend({},settings_obj,data);
					localStorage.setItem(storage,JSON.stringify(settings));
				}
			}else{
				throw 'ERROR: set_localStorage second argument must be an object.';
			} 
		}

		return true;
	}

	$.getBaseURL = function() {
		var origin = window.location.origin+'/';
		var pathArray = window.location.pathname.split( '/' );
		var base_url = '';
		base_url = origin+pathArray[1];

		return base_url+'/';
	}

	$.getURIstring = function(){
		var pathArray = window.location.pathname.split( '/' ),
			uri = '';
		pathArray.splice(0,2);
		if( pathArray.length > 0 ){
			uri = pathArray.join('/');
		}
		return uri;
	}


	$.getFolder = function( pathname ){
		switch( pathname ){
			case 'base': id = 1; break;
			case 'sub': id = 3; break;
			default: id = 2; break;
		}

		// check if error
		var error = ( (id == 2 && pathname != 'main') && pathname == '' ) ? true:false;
		if( error )
			return false;
		// end check error

		var origin = window.location.origin+'/';
		var pathArray = window.location.pathname.split( '/' );
		
		return pathArray[id];
	}

	$.fn.goToByScroll = function(speed){
		var goToScroll_box = $(this).selector,
			speed = speed || 'slow';
		$( goToScroll_box+' a' ).click(function(e){
			e.preventDefault();
			var anchor = $(this).attr('href');
			speed = speed || 'slow';
		    $('html,body').animate({
		        scrollTop: $(anchor).offset().top},
		        speed);
		})
		
	}

	$.fn.ajaxLoading = function(){
		var loading = $(this);
		$(document).ajaxStart(function () {
           	loading.show();
        });

        $(document).ajaxStop(function () {
            loading.hide();
        });
	}

	$.fn.formItemsValidation = function(){
		var form = $(this),
			importants = form.find('.important'),
			items = [];
		importants.each(function(){
			if( ! $(this).val() ){
				items.push($(this).attr('name'));
			}
		})
		return items;
	}

	$.fn.resetForm = function(){
		$(this).get(0).reset();
	}

	$.dropDown = function( _menu, _selected, _output, _options ){
		var result = '';
		dropDown_data = {
			menu: _menu,
			selected: _selected,
			output: _output,
			options: _options
		};

		$.post( 'helper_ctrl/refresh_dropDown', dropDown_data, function(res){
			console.log(res);
		})
	}
	

	$.fn.refreshDropDown = function( _menu, _selected, _output, _options ){
		d_down_box = $(this);
		dropDown_data = {
			menu: _menu,
			selected: _selected,
			output: _output,
			options: _options
		};

		$.post( 'helper_ctrl/refresh_dropDown', dropDown_data, function(res){
			d_down_box.html(res);				
		})
	}

	$.fn.refreshDropDownChosen = function( _menu, _selected, _output, _options ){
		d_down_cbox = $(this);
		dropDown_data = {
			menu: _menu,
			selected: _selected,
			output: _output,
			options: _options
		};
		$.post( 'helper_ctrl/refresh_dropDown', dropDown_data, function(res){
			d_down_cbox.html(res).trigger("chosen:updated");
		})
	}

	$.fn.removeAutoComplete = function(){
		$.each( this.find('input'), function(){
			$(this).attr('autocomplete', 'off');
		})	
	}

	$.fn.preventDoubleSubmission = function() {
	  $(this).on('submit',function(e){
	    var form = $(this);

	    if (form.data('submitted') === true) {
	      // Previously submitted - don't submit again
	      e.preventDefault();
	    } else {
	      // Mark it so that the next submit can be ignored
	      form.data('submitted', true);
	    }
	  });

	  // Keep chainability
	  return this;
	};

	$.validate_errors = function(data,form){
			$.each(data,function(key,val){
				var input = $(form).find('input[name="'+key+'"]'),
					has_error = $(form).find('div').hasClass('help-block'),					
					parent = $(input).closest('.form-group'),
					error_bottom = $(form).hasClass('error-bottom'),
					error = '<div id="'+key+'-error" class="help-block">'+val+'</div>';
					error = ( error_bottom ) ? $(error).addClass('h-space-2') : error;
					
				$(has_error).remove();				
				parent.removeClass('has-error').addClass('has-error');
				if( error_bottom ){
					input.parent().append(error);
				}else{
					$(error).insertAfter(input.parent());
				}
			})
		}

	$.fn.validateForm = function( options ){

		// Set rules and messages dynamicaly using input with data type validate = true;
		var data_rules = {},
			data_messages = {},
			inputs = this.find('input[validate=true], select[validate=true], textarea[validate=true]'),
			no_message = this.data('message'),
			error_bottom = $(this).hasClass('error-bottom');
		inputs.each(function(){
			var input = $(this),
				name = input.attr('name'),
				message = input.attr('validate-message'),
				minlength = input.attr('minlength'),
				maxlength = input.attr('maxlength'),
				email = ( input.attr('email') == 'true' ) ? true : false,
				equalTo = input.attr('equalTo');
			
			data_rules[name] = { required: true };
			if( minlength )
				data_rules[name] = $.extend( data_rules[name], { minlength: minlength } );
			if( maxlength )
				data_rules[name] = $.extend( data_rules[name], { maxlength: maxlength } );
			if( equalTo )
				data_rules[name] = $.extend( data_rules[name], { equalTo: equalTo } );
			if( email )
				data_rules[name] = $.extend( data_rules[name], { email: email } );

			data_messages[name] = { required: message };
		});



		// END setting rules and messages

		validForm = {
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: data_rules,
			messages: data_messages,
			error_bottom: error_bottom,

			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},

			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},

			errorPlacement: function (error, element) {
				if( no_message != 'disabled' ){
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
					else{
						if( error_bottom ){
							if( element.parent().hasClass('has-addon') )
								element.parent().parent().append(error.addClass('error-addon'));
							else
								element.parent().append(error.addClass('h-space-2'));
						}else{
							error.insertAfter(element.parent());
						}
					}
				}
			}
		};
		if( typeof options === 'object' ){
			validForm = $.extend( {}, validForm, options )
		}else if( typeof options === 'string' && options == 'return' ){
			return validForm;
		}

		this.validate(validForm);
	}

	$.checkIdle = function(options){
		$(document).ready(function () {

		var settings = $.extend({
			idleState : false,
			idleTimer : null,
			setTime : 1200000,
			confirmBox : false,
			confirmTime : 20,
			confirmTimer : null,
			logoutLink : null
			},options);

		var el = document.createElement('div');
			$(el).addClass('idleBox hide');
			$(el).html('<p>\
					<h4>Your session is about to expire.</h4>\
					<hr>\
					You session will be locked in <span class="idleTime">'+settings.confirmTime+'</span> seconds.<br>\
					Do you want to continue your session?\
				</p>');
			$('body').append($(el));

	        $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {
	        	if( settings.confirmBox == false ){
		            clearTimeout(settings.idleTimer);
		            clearTimeout(settings.confirmTimer);
		            settings.idleState = false;
		            settings.idleTimer = setTimeout(function () {
		            	settings.confirmBox = true;

						$('.idleBox').modalBox({
							title: false,
							width: 500,
							button_ok: 'Yes, Keep working',
							button_cancel: 'No, Logout'
						});

						var doUpdate = function() {
						$('.idleTime').each(function() {
						  var count = parseInt($(this).html());
						  if (count !== 0) {
						    $(this).html(count - 1);
						  }else{
						  	if( settings.logoutLink ){
						  		window.location.replace(settings.logoutLink);
						  	}else{
							  	console.log('Add logoutLink');
							  	clearTimeout(settings.confirmTimer);
							  }
						  }
						});
						};

						// Schedule the update to happen once every second
						settings.confirmTimer = setInterval(doUpdate, 1000);

						$('.btn_ok_mdl').click(function(e){
							$('.idleTime').html(settings.confirmTime);
							settings.idleState = true;
							settings.confirmBox = false;
						});	

						$('.btn_cancel_mdl').click(function(e){
							if( settings.logoutLink ){
						  		window.location.replace(settings.logoutLink);
						  	}else{
								console.log('Add logoutLink');
							}
						});		            	
						
						
		            }, settings.setTime);
		        }
	        });
	        $("body").trigger("mousemove");
	    });
	}


	// ========================== Ace Dependent Function ========================== //

	// ========== ALERT OR NOTIFICATION FUNCTIONS ========== //
	$.fn.aceAlert = function( options ) {

		var that = $(this).first(),
			alert_box = 'alert-'+that.attr('class');
		
		if( options == 'remove' ){
			that.find('.'+alert_box).remove();
			return false;
		}
		
		var	settings = $.extend({
				position: 'bottom',
				type: 'danger',
				strong: '',
				text: ' The Alert',
				icon: '',
				remove: true
			}, options )		
			el = document.createElement('div'),
			new_type = 'alert-'+settings.type,
			el_strong = document.createElement('strong');
			
		
		el.className = 'alert '+alert_box;
		box = $(el);
		box.addClass(new_type);

		if( settings.remove ){
			button_view = '<button class="close" data-dismiss="alert" type="button"><i class="ace-icon fa fa-times"></i></button>';
			box.append(button_view);
		}

		strong_box = $(el_strong);

		if( settings.icon ){
			new_icon = '<i class="ace-icon fa '+settings.icon+'"></i>';
			strong_box.append(new_icon);
		}

		if( settings.strong ){
			strong_box.append(settings.strong);
		}

		box.append(strong_box);
		box.append(' '+settings.text);
		box.append('<br>');

		that.find('.'+alert_box).remove();
		if( settings.position == 'bottom' ){
			that.append(box);
		}else if( settings.position == 'top' ){
			that.prepend(box);
		}
	}


	// ========== MODAL FUNCTIONS ==========//

	$.fn.modalBox = function( options ){
		var that = $(this),
			selector = that.selector,
			ajax = ( that.length > 0 ) ? false : true;


		if( ajax && selector == '.ajaxModal' ){
			var el = document.createElement('div');
			modal_box = $(el);			
			modal_box.addClass('ajaxModal');
			$('body').append(modal_box);
			that = modal_box;
		}
		//override dialog's title function to allow for HTML titles
		$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
			_title: function(title) {
				var $title = this.options.title || '&nbsp;'
				if( ("title_html" in this.options) && this.options.title_html == true )
					title.html($title);
				else title.text($title);
			}
		}));	
		
		var	settings = $.extend({
            // Default values.
            modal: true,
            title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> jQuery UI Dialog</h4></div>",
            title_html: true,
            resizable: false,
            draggable: false,
            width: 300,
            position: { my: 'top', at: 'top+150' },
            height: 'auto',
            close: function(event,ui){
            	if( ajax && selector == '.ajaxModal' )
        			$.removeDialog(event,ui,modal_box)
            	else
					$.closeDialog();
			},
			modal_view: '',
			modal_data: '',
			modal_controller: ''
        }, options );

		// Pre set buttons
		var btn_array = [],
			btn_cancel = {},
			btn_ok = {};

		// save buttons in btn_array
		if( settings.buttons ){
			btn_array = $.merge( btn_array,settings.buttons );
		}

		// Pres set buttons for faster call
		if( settings.button_cancel ){
			var btn_color = settings.button_cancel_color || '';
			btn_cancel = {
							text: settings.button_cancel,
							"class" : "btn_cancel_mdl btn btn-minier "+btn_color,
							click: function() {
								$( this ).dialog( "close" ); 
							} 
						}
			btn_array.push(btn_cancel);
		}
		
		if( settings.button_ok ){
			var btn_color = settings.button_ok_color || 'btn-primary';
			btn_ok = {
						text: settings.button_ok,
						"class" : "btn_ok_mdl btn btn-minier "+btn_color,
						click: function() {} 
					}
			btn_array.push(btn_ok);
		}

		// Push buttons to btn_array first to prevent replacement of default or old value in buttons array.
		$.extend(settings, {
			buttons: btn_array
		});
		// END Pre set buttons

		if( ajax && selector == '.ajaxModal' ){
			// if ajaxModal is use
			var controller = ( settings.modal_controller ) ?  settings.modal_controller+'/' : $.getFolder()+'/';
			data_ctrl = {
				modal_data: settings.modal_data,
				modal_view: controller+'modals',
				view: settings.modal_view
			}

	 		$.post( controller+'modal_ctrl', data_ctrl, function(res){
	 			$('.ajaxModal').html(res);
	 		});
	 	}
	 	if( ! settings.title ){
	 		that.dialog(settings).siblings('.ui-dialog-titlebar').remove();
	 	}
        return that.removeClass('hide').dialog(settings);
	}

	$.removeDialog = function(event,ui,modal_box){
		$(modal_box).remove();
		$(".ui.dialog").empty();
		$('.ui-dialog-content').dialog('close');
	}

	$.closeDialog = function(){
		$('.ui-dialog-content').dialog('close');
	}

})(window.jQuery || window.Zepto, window, document);

