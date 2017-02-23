<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->

			<div class="space"></div>

			<div class="row">
				<div class="col-sm-4" id="default-buttons">
					<h3 class="header smaller lighter purple no-margin-top">Audit Trail</h3>
					<form id="audit_form" class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-xs-4 control-label no-padding-right" for="user_id"> User ID </label>
							<div class="col-xs-8">
								<input type="text" name="user_id" class="col-xs-12" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Audit Name </label>
							<div class="col-sm-8">
								<select name="audit_name" class="chosen-select form-control" id="audit_name" data-placeholder="Choose a Menu...">
									<option value="">&nbsp;</option>
									<?php 
										@$audit_list = ( isset($audit_list) ) ? $audit_list : '';
										foreach ($audit_list[0] as $key => $value) {
											echo '<option value="'.$value.'">'.$value.'</option>';
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label no-padding-right" for="data_id"> Data ID </label>
							<div class="col-xs-8">
								<input type="text" name="data_id" class="col-xs-12" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-4 control-label no-padding-right" for="filter_date"> Filter Date </label>
							<div class="col-xs-8">
								<input name="filter_date" type="text" class="date_range-picker col-xs-12" />
							</div>
						</div>
						<button id="btn_audit" class="btn btn-sm btn-primary pull-right">
							<i class="ace-icon glyphicon glyphicon-search align-top bigger-125"></i>
							Search
						</button>
					</form>
				</div><!-- /.col -->

				<div class="col-sm-8">
					<div class="widget-box">
						<div class="widget-header widget-header-flat">
							<h4 class="widget-title">Audit Logs</h4>
							<div class="widget-toolbar">
								<span class="btn_insert c-pointer badge badge-success">Insert</span>
								<span class="btn_update c-pointer badge badge-warning">Update</span>
								<span class="btn_delete c-pointer badge badge-danger">Delete</span>
							</div>
						</div>
						<div class="widget-body">
							<div class="widget-main padding-12">
								<div id="audit_logs" class="scrollable" data-height="400">
								</div>
							</div>
						</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
<script src="assets/js/chosen.jquery.js"></script>
<script src="assets/js/date-time/moment.js"></script>
<script src="assets/js/date-time/daterangepicker.js"></script>
<script src="assets/js/ace/elements.scroller.js"></script>
<script src="assets/js/ace/ace.js"></script>
<script src="assets/js/wd_jquery/jquery-listSlide.js"></script>
<script>

	$('.chosen-select').chosen();	

	//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
    $('.date_range-picker').daterangepicker({
        'applyClass' : 'btn-sm btn-success',
        'cancelClass' : 'btn-sm btn-default',
        locale: {
            applyLabel: 'Apply',
            cancelLabel: 'Cancel',
        },
        format: 'YYYY/MM/DD'
    })
    
	$('#btn_audit').click(function(e){
		e.preventDefault();
		var log_box = $('#audit_logs');
			elements = $('#audit_form').serialize();
		
		log_box.listSlide();
		$.ajax({
			url: 'php_functions/audit_trail/get_audit_data',
			type: 'POST',
			data: { data: elements },
			dataType: 'json',
			success: function(res){
				log_box.empty();
				log_box.html(res);				
				log_box.listSlide('re_init');
				scrolableDiv();	
			}
		})
	})

	function scrolableDiv(){
		// scrollables
		$('.scrollable').each(function () {
			var $this = $(this);
			$(this).ace_scroll({
				size: $this.data('height') || 100,
				//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
			});
		});
		
	}
	

</script>