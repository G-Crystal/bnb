<link rel="stylesheet" href="assets/css/prettify.css" />

<div class="page-content">
	<div class="page-header">
		<h1>
			Function Reference
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				dropDown();
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="functions col-xs-9">
			<div>
				<h2 id="description">Description</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-muted h-space"> A list of items or data that are use in creating dropdown menu.</p>
				<p class="text-muted h-space"> Use <a href="developers/dropdown_menus">Dropdown menus page</a> to create menus from table or a custom menu.</p>
				<p class="text-muted h-space-12"> Note: there are 2 type of menu <span class="text-success">custom</span> and <span class="text-success">local</span> menu.</p>
				<p class="text-muted h-space-12"> <span class="text-success">Custom</span> menu are made from string of list, while <span class="text-success">Local</span> menu are made from tables in the database.</p>
			</div>
			<div>
				<h2 id="usage">Usage</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p class="text-success h-space reference-code"> <?php highlight_string('<?php dropDown( $name, $selected, $output, $options ); ?>'); ?></p>
			</div>
			<div>
				<h2 id="parameters">Parameters</h2>
				<div class="hr hr-dotted hr-2"></div>
				<p><b>$name</b></p>
				<p class="text-muted h-space"> <span class="orange">(string)</span> (required) - name of the menu. can be found in <a href="developers/dropdown_menus">Dropdown menus page</a></p>
				<p><b>$selected</b></p>
				<p class="text-muted h-space"> <span class="orange">(string)</span> (optional) - select or highlight the item in the list. this must be the value of the item in the list.</p>
				<p><b>$output</b></p>
				<p class="text-muted h-space"> <span class="orange">(string)</span> (optional) - return type.
					<ul>
						<li>option - returns a select option tag format.
							<p class="h-space-22">Example output: <span class="text-danger">&lt;option value="<span class="text-warning">data_value</span>" &gt; <span class="text-warning">data_name</span> &lt;/option&gt;</span></p>
						</li>
						<li>list - returns a list tag format.
							<p class="h-space-22">Example output: <span class="text-danger">&lt;li&gt;&lt;a href="<span class="text-warning">data_value</span>"&gt; <span class="text-warning">data_name</span> &lt;/a&gt;&lt;/li&gt; </p>
						</li>
						<li>list - returns a list tag format while using data type for holding data_value.
							<p class="h-space-22">Example output: <span class="text-danger"> &lt;li data-value="<span class="text-warning">data_value</span>"&gt; <span class="text-warning">data_name</span> &lt;/li&gt; </p>
						</li>
						<li>grid - returns a set type of list only use for jqGrid dropdown menus function.
							<p class="h-space-22">Example output: <span class="text-danger"> <span class="text-warning">data_value</span>:<span class="text-warning">data_name</span> </p>
						</li>
					</ul>
				</p>
				<p class="text-muted h-space-22">Default: 'option'</p>
				<p><b>$options</b></p>
				<p class="text-muted h-space"> <span class="orange">(array)</span> (optional)
					<ul>
						<li>filter - exclude selected items in the list. items must be separated with comma ",".</li>
						<li>default - blank or first item in the list.</li>
						<p class="text-muted h-space-12">Default: <span class="text-danger">&lt;option value=""&gt;&lt;/option&gt;</span></p>
							<p class="text-muted h-space-12">Note: this default only apply if <span class="text-success">$output = option</span> and to remove this pre set default just input NULL or null.</p>
						<li>separator - use to separate name.</li>
						<p class="text-muted h-space-12">Default: ', '</p>
						<p class="text-muted h-space-12">Note: this variable can only be use if the menu is <span class="text-success">local</span>.</p>
						<li>sort - sorts the menu.
							<ul>
								<li>asc - sorts menu in ascending order.</li>
								<li>desc - sorts menu in descending order.</li>
								<p class="text-muted h-space-12">Default: none</p>
							</ul>
						</li>
						<li>sortby - defines how to sort the menu.
							<ul>
								<li>key - sorts menu using key of its array.</li>
								<li>value - sorts menu using value of its array.</li>
								<p class="text-muted h-space-12">Default: value</p>
								<p class="text-muted h-space-12">Note: sortby will not activate if sort is not set to any value.</p>
							</ul>
						</li>
					</ul>
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
				<p class="text-muted">dropDown() is located in <span class="text-success">application/helpers/Interface_helper.php</span></p>
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