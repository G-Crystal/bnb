<link rel="stylesheet" href="assets/css/prettify.css" />

<div class="page-content">
	<div class="page-header">
		<h1>
			Function Reference
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				$.fn.goToByScroll()
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="functions col-xs-9">
			<div>
				<h2 id="description">Description</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space"> Go to or scroll to an anchor in same page.</p>
			</div>
			<div>
				<h2 id="usage">Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-success h-space"> $.( <span class="text-warning">'selector'</span> ).goToByScroll( speed );</p>
			</div>
			<div>
				<h2 id="parameters">Parameters</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p><b>speed</b></p>
				<p class="text-muted h-space"> <span class="orange">(string or integer)</span> (optional) Scrolling speed</p>
				<p class="text-muted h-space-22"> slow, fast, 300</p>
				<p class="text-muted h-space">
					See: <a href="https://api.jquery.com/scrollTop/" target="_blank"> .scrollTop()</a> for reference 
				</p>
				<p class="text-muted h-space"> Default: slow </p>
			</div>
			<div>
				<h2 id="return_value">Return Values</h2>
				<div class="hr hr-dotted hr-2"></div>
			</div>
			<div>
				<h2 id="example">Examples</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted"> 
					<pre class="prettyprint linenums">&lt;div id="links"&gt;
   &lt;a href="#first_link"&gt;First link&lt;a&gt;
&lt;/div&gt;

&lt;section id="first_link"&gt;
   content...
&lt;/section&gt;</pre>	

				<p class="text-muted"> 
					<pre class="prettyprint linenums">&lt;script type="text/javascript"&gt; 
   $('#links').goToByScroll('fast');
&lt;/script&gt;</pre>	
				</p>
			</div>
			<div>
				<h3 id="output" class="h-space">Output: </h3>
				<div class="hr hr-dotted hr-2"></div>
			</div>
			<div>
				<h2 id="sample_usage" class="h-space">Sample Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space">
					page: <a href="function_reference/code/goToByScroll">goToByScroll</a><br>
					file: <span class="text-success">application/view/function_reference/sidebar_contents</span></p>
				</p>
			</div>
			<div>
				<h2 id="source_code" class="h-space">Source Code</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted">$.fn.goToByScroll() is located in <span class="text-success">assest/js/js_helper.js</span></p>
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