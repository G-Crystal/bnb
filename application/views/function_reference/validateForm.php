<link rel="stylesheet" href="assets/css/prettify.css" />

<div class="page-content">
	<div class="page-header">
		<h1>
			Function Reference
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				$.fn.validateForm()
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="functions col-xs-9">
			<div>
				<h2 id="description">Description</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space"> A <a href="http://jqueryvalidation.org/validate/">.validate()</a> jquery function with default options and HTML5 data type interface.</p>
				<p class="text-muted h-space"> Using HTML 5 data types <span class="text-success">validate</span> and <span class="text-success">validate-message</span> will activate the rules and messages of <a href="http://jqueryvalidation.org/validate/">.validate()</a> function automaticaly.</p>
				<p class="text-muted h-space"> NOTE: <span class="text-success">validate-message</span> only works when <span class="text-success">validate</span> is equal to true.</p>
			</div>
			<div>
				<h2 id="usage">Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-success h-space"> $('selector').validateForm( options );</p>
			</div>
			<div>
				<h2 id="parameters">Parameters</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p><b>options</b></p>
				<p class="text-muted h-space"> <span class="orange">(mixed)</span> (optional) See pre set settings in <span class="text-success">assest/js/js_helper.js</span>.</p>
			</div>
			<div>
				<h2 class="return_value">Return Values</h2>
				<div class="hr hr-dotted hr-2"></div>
			</div>
			<div>
				<h2 id="example">Examples</h2>
				<div class="hr hr-dotted hr-2"></div>
			</div>
			<div>
				<h3 id="output" class="h-space">Output: </h3>
			</div>
			<div>
				<h2 id="sample_usage" class="h-space">Sample Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space">
					page: <a href="developers/dropdown_menus">Dropdown Menus</a><br>
					file: <span class="text-success">application/view/developers/dropdown_menus_view.php</span></p>
				</p>
			</div>
			<div>
				<h2 id="source_code" class="h-space">Source Code</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted">$.fn.validateForm() is located in <span class="text-success">assest/js/js_helper.js</span></p>
			</div>
		</div>

		<div class="col-xs-3">
			<?php get_view('function_reference/sidebar_contents'); ?>
		</div>

	</div>
</div>

<script src="assets/js/prettify.js"></script>

<script type="text/javascript">
	jQuery(function($) {

		window.prettyPrint && prettyPrint();
		$('#id-check-horizontal').removeAttr('checked').on('click', function(){
			$('#dt-list-1').toggleClass('dl-horizontal').prev().html(this.checked ? '&lt;dl class="dl-horizontal"&gt;' : '&lt;dl&gt;');
		});
	
	})
</script>