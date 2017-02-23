<link rel="stylesheet" href="assets/css/prettify.css" />

<div class="page-content">
	<div class="page-header">
		<h1>
			Function Reference
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				get_view();
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="functions col-xs-9">
			<div>
				<h2 id="description">Description</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space"> get part or page view to <span class="text-success">include</span> in page.</p>
			</div>
			<div>
				<h2 id="usage">Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-success h-space"> get_view( location );</p>
			</div>
			<div>
				<h2 id="parameters">Parameters</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p><b>$location</b></p>
				<p class="text-muted h-space"> <span class="orange">(string)</span> (required) - location of view to <span class="text-success">include</span>.</p>
			</div>
			<div>
				<h2 class="return_value">Return Values</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space"> <span class="text-success">(file)</span> - content of the file included.</p>
			</div>
			<div>
				<h2 id="example">Examples</h2>
				<div class="hr hr-dotted hr-2"></div>
			</div>
			<div>
				<h3 id="output" class="h-space">Output: </h3>
				<pre id="alertOutput"></pre>
			</div>
			<div>
				<h2 id="sample_usage" class="h-space">Sample Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space">
					file: <span class="text-success">application/views/base.php</span></p>
				</p>
			</div>
			<div>
				<h2 id="source_code" class="h-space">Source Code</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted">get_view() is located in <span class="text-success">application/helpers/Interface_helper.php</span></p>
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