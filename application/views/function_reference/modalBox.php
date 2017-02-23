<link rel="stylesheet" href="assets/css/prettify.css" />

<div class="page-content">
	<div class="page-header">
		<h1>
			Function Reference
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				$.fn.modalBox()
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="functions col-xs-9">
			<div>
				<h2 id="description">Description</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space"> An ace dependent modal function that alow local or ajax data.</p>
			</div>
			<div>
				<h2 id="usage">Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-success h-space"> $('selector').modalBox( options );</p>
				<p class="text-muted h-space"> Note: To activate ajax function set <span class="text-success">selector</span> to <span class="text-success">'.ajaxModal'.</span></p>
				<p class="text-muted h-space-32"> When using ajax functionality the controller is always be located in controllers folder named after its views location folder name. </p>
				<p class="text-muted h-space-32"> Example: if the view or page where the <span class="text-success">$.fn.modalBox()</span> is use is in <span class="text-primary">http://site_name/controller_folder/modal_view</span> the controllers folder of the <span class="text-success">$.fn.modalBox()</span> ajax post target location will be <span class="text-success">controller_folder</span>.</p>
				<p class="text-muted h-space-32"> Note: that you must have same folder name in both controllers and view for any module to let <span class="text-success">$.fn.modalBox()</span> function communicate with your controller and view.</p>
			</div>
			<div>
				<h2 id="parameters">Parameters</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p><b>options</b></p>
				<p class="text-muted h-space"> <span class="orange">(array)</span> (optional)</p>
				<p class="text-muted h-space-12"> pre set options: see <a href="https://jqueryui.com/dialog/">jQuery Dialog</a> for reference</p>
				<ul>
					<li>modal = true</li>
					<li>title = an HTML tag see <span class="text-success">assest/js/js_helper.js</span> for reference</li>
					<li>title_html = true</li>
					<li>resizable = true</li>
					<li>draggable = false</li>
					<li>width = 300</li>
					<li>height = 'auto'</li>
					<li>modal_view = <span class="orange">(string) </span>(required) - view filename without <span class="text-success">.php</span> extention.
						<p class="h-space">Note: must be in a folder named <span class="text-success">modals</span></p>
					</li>
					<li>modal_data = <span class="orange">(string/array) </span>(optional) - variable use to send post data for ajax.</li>
					<li>button_cancel = <span class="orange">(string) </span>(optional) - pre set button for easy call of cancel button.
						<p class="h-space">Note: data inserted will be use as button cancel name.</p>
					</li>
					<li>button_ok = <span class="orange">(string) </span>(optional) - pre set button for easy call of ok button.
						<p class="h-space">Note: data inserted will be use as button ok name.</p>
					</li>
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
   $('#button_id').on('click', function(e){
      $('#outputID').modalBox({
         width: 500,
         button_ok: ' button name'
      });
   });
&lt;/script&gt;</pre>	
				</p>
			</div>
			<div>
				<h3 id="output" class="h-space">Output: </h3>
				<p class="h-space-12"> See <a href="developers/modals">JQuery Modals</a> for sample output.</p>
			</div>
			<div>
				<h2 id="sample_usage" class="h-space">Sample Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space">
					page: <a href="developers/modals">jQuery Modals</a><br>
					file: <span class="text-success">application/view/developers/modal_view.php</span></p>
				</p>
			</div>
			<div>
				<h2 id="source_code" class="h-space">Source Code</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted">$.fn.modalBox() is located in <span class="text-success">assest/js/js_helper.js</span></p>
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