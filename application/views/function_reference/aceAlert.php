<link rel="stylesheet" href="assets/css/prettify.css" />

<div class="page-content">
	<div class="page-header">
		<h1>
			Function Reference
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				$.fn.aceAlert()
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="functions col-xs-9">
			<div>
				<h2 id="description">Description</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space"> An ace dependent function that shows alert or notifacation in specifide div.</p>
			</div>
			<div>
				<h2 id="usage">Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-success h-space"> $('selector').aceAlert( options );</p>
			</div>
			<div>
				<h2 id="parameters">Parameters</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p><b>options</b></p>
				<p class="text-muted h-space"> <span class="orange">(mixed)</span> (optional)</p>
				<ul>
					<li>remove - advance settings use to remove aceAlert.</li>
				</ul>
				<p class="text-muted h-space-12"> pre set options:</p>
				<ul>
					<li>position = 'bottom'</li>
					<li>type = 'danger'</li>
					<li>text = ' The Alert'</li>
					<li>remove = true</li>
				</ul>
			</div>
			<div>
				<h2 class="return_value">Return Values</h2>
				<div class="hr hr-dotted hr-2"></div>
			</div>
			<div>
				<h2 id="example">Examples</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted"> 
					<pre class="prettyprint linenums">&lt;script type="text/javascript"&gt; 
   $('#alertOutput').aceAlert({
      icon: 'fa-exclamation-triangle',
      text: ' Name and Link are important'
   });
&lt;/script&gt;</pre>	
				</p>
			</div>
			<div>
				<h3 id="output" class="h-space">Output: </h3>
				<pre id="alertOutput"></pre>
			</div>
			<div>
				<h2 id="sample_usage" class="h-space">Sample Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space">
					page: <a href="developers/dashboard_settings">Dashboard settings</a><br>
					file: <span class="text-success">application/view/developers/dashboard_settings_view.php</span></p>
				</p>
			</div>
			<div>
				<h2 id="source_code" class="h-space">Source Code</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted">$.fn.aceAlert() is located in <span class="text-success">assest/js/js_helper.js</span></p>
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

		$("#alertOutput").aceAlert({
			icon: 'fa-exclamation-triangle',
			text: ' Name and Link are important'
		});

		window.prettyPrint && prettyPrint();
		$('#id-check-horizontal').removeAttr('checked').on('click', function(){
			$('#dt-list-1').toggleClass('dl-horizontal').prev().html(this.checked ? '&lt;dl class="dl-horizontal"&gt;' : '&lt;dl&gt;');
		});
	
	})
</script>