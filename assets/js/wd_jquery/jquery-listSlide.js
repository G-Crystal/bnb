;(function ( $, window, document, undefined ) {

	function Plugin(element, options){
        this.w  = $(window);
        this.el = $(element);
        this.init();
    }

    Plugin.prototype = {
    	init: function(){
    		var list = this;
    		$.each(list.el.find('.ss'), function(k,el){
    			list.setHolder($(el));
    			list.setInfo($(el));
    		});
    		list.el.on('click', '.expand, .collapsed', function(e){
    			e.preventDefault();
    			var action = $(this).hasClass('expand') ? 'show' : 'hide',
    				box = $(this).next('div').first();
    			list.slide($(this),box,action);
    		})
    		$('.btn_insert, .btn_update, .btn_delete').click(function(e){
    			var button = $(this),
    				icon_class = $(button).attr('class').match(/badge\-(.*)/)[1].split(' ')[0],
    				icon_class = ( icon_class == 'warning' ) ? 'warning-lighter':icon_class,
    				action = ( $(button).hasClass('badge-muted') ) ? 'show' : 'hide';
    			$.each(list.el.find('li.text-'+icon_class), function(){
    				var item = $(this),
    					box = item.next('div');
    				if( action == 'show' ){
    					item.slideDown(250);
    					box.show();
    					button.removeClass('badge-muted');
    				}else{
    					item.slideUp(200);
    					box.hide();
    					button.addClass('badge-muted');
    				}
    			})
    			list.re_init();
    		})
    	},
    	setHolder: function(li){
    		$.each( li.find('li'), function(i,item) {
    			$(item).addClass('expand').css('cursor','pointer');
    		});
    	},
    	setInfo: function(li){
    		$.each( li.find('div'), function(i,div) {
    			$(div).hide();
    		});
    	},
    	slide: function(list,box,action){
    		var icon = list.find(ace.vars['.icon']).eq(0);
    		if( action == 'show' ){
    			list.removeClass('expand').addClass('collapsed');
    			$(icon).removeClass('fa-caret-right').addClass('fa-caret-down');
    			box.slideDown(250);
    		}else{
    			list.removeClass('collapsed').addClass('expand');
    			$(icon).removeClass('fa-caret-down').addClass('fa-caret-right');
    			box.slideUp(200);
    		}
    	},
    	re_init: function(){
    		var list = this;
    		$.each(list.el.find('.ss'), function(k,el){
    			list.setHolder($(el));
    			list.setInfo($(el));
    		});
    	}
    }

	$.fn.listSlide = function(params)
	{
	    var lists  = this,
	        retval = this;
	    lists.each(function()
	    {
	        var plugin = $(this).data("listSlide");
	        if (!plugin) {
	            $(this).data("listSlide", new Plugin(this, params));
	            $(this).data("listSlide-id", new Date().getTime());
	        } else {
	            if (typeof params === 'string' && typeof plugin[params] === 'function') {
	                retval = plugin[params]();
	            }
	        }
	    });
	    return retval || lists;
	};

})( jQuery, window, document );
