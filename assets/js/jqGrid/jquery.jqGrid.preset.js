;(function ( $, window, document, undefined ) {

  $.searchOnGrid = function(url,table,gridData){
    $('#'+table).jqGrid('setGridParam',{postData:gridData,datatype:'json',url:url+"/load_data"}).trigger("reloadGrid");
  }

  $.getColumnIndexByName = function(gr,columnName) {
      var cm = gr.jqGrid('getGridParam','colModel');
      for (var i=0,l=cm.length; i<l; i++) {
          if (cm[i].name===columnName) {
              return i; // return the index
          }
      }
      return -1;
  };

  var defaults = {
    mtype   : "post",
    datatype: "json",
    rowNum: 10,
    rowList:[10,20,30],
    viewrecords: true,
    sortorder: "asc",
    sortname: "id",
    loadonce: true,
    scrollrows: true,
    autowidth: true,
    autoresize: true,
    height: 300,
    gridview: true,
    toolbarEdit: false, // added settings for easy access of Pager edit tool
    toolbarAdd: false, // added settings for easy access of Pager add tool
    toolbarDel: false, // added settings for easy access of Pager delete tool
    toolbarSearch: false, // added settings for easy access of Pager search tool
    toolbarRefresh: false, // added settings for easy access of Pager refresh tool
    toolbarView: false, // added settings for easy access of Pager view tool,
    closeAfterEdit: true,
    closeOnEscape: true
  }

  function Plugin( element, options ) {
    this.elem = element;
    this.table = $(this.elem);
    this.pager_id = '#'+$(this.elem).next().attr('id');
    this.options = $.extend( {}, defaults, options) ;
    this.gridSize = $(this.elem).data('size');
    this.w = $(window);
    this.doc = $(document);
    this.init();
    $this = this;
  }

  Plugin.prototype ={
  	init: function() {
  		var _colModel = this.options.colModel,
					_sortname = this.options.sortname,
					_gridSize = this.gridSize,
					_pager = this.pager_id || false,
					_index = [],
					table = $(this.elem);

			this.autoResizeGrid(table,_gridSize);
			// create index
			$.each(_colModel, function(i,v){
				_index.push(v['index']);
			})

			grid_params = $.extend({
        postData: {
          fields: _index,
          sortname:_sortname,          
          module: this.options.module,
          module_data: this.options.module_data,
          loadonce:this.options.loadonce,
        },
        pager:_pager,
        onSelectRow: function(rowid){
          /*var $self = $(this);
          $self.jqGrid("saveRow", rowid, {
              keys: false,
              aftersavefunc: function (rowid) {
                console.log(rowid);
              }
          });*/
        },
        loadComplete: function(data){
          var lc_table = this;
          setTimeout(function(){
            styleCheckbox(lc_table);
            
            updateActionIcons(lc_table);
            updatePagerIcons(lc_table);
            enableTooltips(lc_table);
          }, 0);
        }
	    },this.options);
	    // construct grid
      //console.log(grid_params);
	    table.jqGrid(grid_params);
	    this.w.triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size

	    // call navButtons ace Dependent function
      this.navButtonsGrid(table,_colModel);
    },  
   	navButtonsGrid: function(table,_colModel){
   		table.jqGrid('navGrid',this.pager_id,
        {   //navbar options
          edit: this.options.toolbarEdit,
          editicon : 'ace-icon fa fa-pencil blue',
          add: this.options.toolbarAdd,
          addicon : 'ace-icon fa fa-plus-circle purple',
          del: this.options.toolbarDel,
          delicon : 'ace-icon fa fa-trash-o red',
          search: this.options.toolbarSearch,
          searchicon : 'ace-icon fa fa-search orange',
          refresh: this.options.toolbarRefresh,
          refreshicon : 'ace-icon fa fa-refresh green',
          view: this.options.toolbarView,
          viewicon : 'ace-icon fa fa-search-plus grey'
        },
        {
          //edit record form
          closeAfterEdit: this.options.closeAfterEdit,
          closeOnEscape: this.options.closeOnEscape,
          //width: 700,
          recreateForm: true,
          beforeShowForm : function(e) {

            var table = $(this),
                form = $(e[0]),
                form_id = '#'+e[0].id;
            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_edit_form(form,_colModel);
            jqGridSerializeWithCheckbox();// include checkbox in serialize();
            $oldData_edit = $(form_id).serialize();
          },
          onclickSubmit: function(options,formid){
            // include old value for audit trail.
            return {old_data_type:'serialize',old_data: $oldData_edit}
          },
          afterSubmit: function(response,postdata){
            $this.afterSubmit.apply(table,[response,postdata]);
            return [response,postdata];
          }
        },
        {
          //new record form
          //width: 700,
          closeAfterAdd: this.options.closeAfterEdit,
          closeOnEscape: this.options.closeOnEscape,
          recreateForm: true,
          viewPagerButtons: false,
          beforeShowForm : function(e) {
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
            .wrapInner('<div class="widget-header" />')
            style_edit_form(form,_colModel);
          },
          afterSubmit: function(response,postdata){
            $this.afterSubmit.apply(table,[response,postdata]);
            return [response,postdata];
          }
        },
        {
          //delete record form
          closeAfterAdd: this.options.closeAfterEdit,
          closeOnEscape: this.options.closeOnEscape,
          recreateForm: true,
          beforeShowForm : function(e) {
            var form = $(e[0]);
            if(form.data('styled')) return false;
            
            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_delete_form(form);
            
            form.data('styled', true);
          },
          afterSubmit: function(response,postdata){
            $this.afterSubmit.apply(table,[response,postdata]);
            return [response,postdata];
          }
        },
        {
          //search form
          recreateForm: true,
          closeAfterAdd: this.options.closeAfterEdit,
          closeOnEscape: this.options.closeOnEscape,
          afterShowSearch: function(e){
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            style_search_form(form);
          },
          afterRedraw: function(){
            style_search_filters($(this));
          },
          afterSubmit: function(response,postdata){
            $this.afterSubmit.apply(table,[response,postdata]);
            return [response,postdata];
          },
          multipleSearch: true,
          /**
          multipleGroup:true,
          showQuery: true
          */
        },
        {
          //view record form
          recreateForm: true,
          closeAfterAdd: this.options.closeAfterEdit,
          closeOnEscape: this.options.closeOnEscape,
          beforeShowForm: function(e){
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
          },
          afterSubmit: function(response,postdata){
            $this.afterSubmit.apply(table,[response,postdata]);
            return [response,postdata];
          }
        }
      )
   	},
   	afterSubmit: function(response,postdata){
   		$this.reloadGrid.apply(this);
   	},
   	reloadGrid: function(){
   		this.jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
   	},
   	autoResizeGrid: function(element,size){
   		var table = element,
   				_gridSize = size;
   		if( this.options.autoresize){
        var parent_column = $(table).closest('[class*="col-"]');
			   //resize to fit page size
        this.w.on('resize.jqGrid', function () {
          grid_size = ( _gridSize ) ? _gridSize : parent_column.width();
          table.jqGrid( 'setGridWidth', grid_size );
        });

        //resize on sidebar collapse/expand
        
        this.doc.on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {

          if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
            //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
            console.log(table.width());
            setTimeout(function() {
              table.jqGrid( 'setGridWidth', parent_column.width() );
            }, 0);
          }
        });
			}
   	}
  };

  // A really lightweight plugin wrapper around the constructor, 
  // preventing against multiple instantiations
  $.fn.wd_jqGrid = function ( options ) {
    var table = this,
        name = ( this.length > 0 ) ? this.get(0).id : '',
        pluginName = 'plugin_'+name,
        plugin = $(this).data(pluginName);
    if (typeof options === 'string') {
      if( typeof plugin[options] ==='function' ){
        var args = $.makeArray(arguments).slice(1),
            fn = plugin[options];    
        return fn.apply(this,args);
      }else throw ( "wd_jqGrid - No such method: " + options );
    }
    return this.each(function(){
      if(this.length = 0){return;}
      if (!plugin) {
        $(this).data(pluginName, new Plugin(this, options));
        $(this).data(pluginName+"-id", new Date().getTime());
      }
    });
  }

  /*$.fn.wd_jqGrid = function ( options ) {
  	var pluginName = 'plugin_'+this.get(0).id;
    console.log($(this));
    return this.each(function () {
      if (!$.data(this, pluginName)) {
        $.data(this, pluginName, 
        new Plugin( this, options ));
      }
    });
  }*/

})( jQuery, window, document );

//switch element when editing inline
function aceSwitch( cellvalue, options, cell ) {
  setTimeout(function(){
    $(cell) .find('input[type=checkbox]')
      .addClass('ace ace-switch ace-switch-5')
      .after('<span class="lbl"></span>');
  }, 0);
}
//enable datepicker
function pickDate( cellvalue, options, cell ) {
  var dateFormat = options['colModel']['dateFormat'] || 'yyyy-dd-mm';
  setTimeout(function(){
    $(cell) .find('input[type=text]')
        .datepicker({format:dateFormat , autoclose:true}); 
  }, 0);
}

function style_edit_form(form,colModel) {
  $(colModel).each(function(){
    if( typeof this['unformat'] === 'function' && this['unformat'].name == 'pickDate' ){
      var dateFormat = this['dateFormat'] || 'yyyy-dd-mm';
      form.find('input[name='+this['name']+']').datepicker({format:dateFormat , autoclose:true});
    }
  })
  //enable datepicker on "sdate" field and switches for "stock" field
  //form.find('input[name=l_name]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
    form.find('input[role=checkbox]')
      .addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
         //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
        //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');

      
  //update buttons classes
  var buttons = form.next().find('.EditButton .fm-button');
  buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
  buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
  buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')
  
  buttons = form.next().find('.navButton a');
  buttons.find('.ui-icon').hide();
  buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
  buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');   
}

function style_delete_form(form) {
  var buttons = form.next().find('.EditButton .fm-button');
  buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
  buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
  buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
}

function style_search_filters(form) {
  form.find('.delete-rule').val('X');
  form.find('.add-rule').addClass('btn btn-xs btn-primary');
  form.find('.add-group').addClass('btn btn-xs btn-success');
  form.find('.delete-group').addClass('btn btn-xs btn-danger');
}
function style_search_form(form) {
  var dialog = form.closest('.ui-jqdialog');
  var buttons = dialog.find('.EditTable')
  buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
  buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
  buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
}

function beforeDeleteCallback(e) {
  var form = $(e[0]);
  if(form.data('styled')) return false;
  
  form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
  style_delete_form(form);
  
  form.data('styled', true);
}

function beforeEditCallback(e) {
  var form = $(e[0]);
  form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
  style_edit_form(form,_colModel);
}



//it causes some flicker when reloading or navigating grid
//it may be possible to have some custom formatter to do this as the grid is being created to prevent this
//or go back to default browser checkbox styles for the grid
function styleCheckbox(table) {
/**
  $(table).find('input:checkbox').addClass('ace')
  .wrap('<label />')
  .after('<span class="lbl align-top" />')


  $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
  .find('input.cbox[type=checkbox]').addClass('ace')
  .wrap('<label />').after('<span class="lbl align-top" />');
*/
}


//unlike navButtons icons, action icons in rows seem to be hard-coded
//you can change them like this in here if you want
function updateActionIcons(table) {
  var replacement = 
  {
    'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
    'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
    'ui-icon-disk' : 'ace-icon fa fa-check green',
    'ui-icon-cancel' : 'ace-icon fa fa-times red',

  };
  $(table).find('.ui-pg-div span.ui-icon').each(function(){
    var icon = $(this);
    var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
    if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
  })
  
}

//replace icons with FontAwesome icons like above
function updatePagerIcons(table) {
  var replacement = 
  {
    'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
    'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
    'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
    'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
  };
  $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
    var icon = $(this);
    var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
    
    if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
  })
}

function enableTooltips(table) {
  $('.navtable .ui-pg-button').tooltip({container:'body'});
  $(table).find('.ui-pg-div').tooltip({container:'body'});
}

//var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

$(document).one('ajaxloadstart.page', function(e) {
  $(grid_selector).jqGrid('GridUnload');
  $('.ui-jqdialog').remove();
});

function reload(table){
  table.jqGrid('setGridParam',{datatype:'json'}).trigger('reloadGrid');
  console.log(1);
}

function getFunctionParams(functionName){
  var reg = /\(([\s\S]*?)\)/;
      var params = reg.exec(functionName);
      if (params) 
           var param_names = params[1].split(',');

    return param_names;
}

function jqGridSerializeWithCheckbox(){
  var originalSerializeArray = $.fn.serializeArray;
  $.fn.extend({
    serializeArray: function () {
        var brokenSerialization = originalSerializeArray.apply(this);
        var checkboxValues = $(this).find('input[type=checkbox]').map(function () {
            cValue = ( this.checked ) ? this.value : $(this).attr('offval');
            return { 'name': this.name, 'value': cValue };
        }).get();
        var checkboxKeys = $.map(checkboxValues, function (element) { return element.name; });
        var withoutCheckboxes = $.grep(brokenSerialization, function (element) {
            return $.inArray(element.name, checkboxKeys) == -1;
        });

        return $.merge(withoutCheckboxes, checkboxValues);
    }
  });
}
