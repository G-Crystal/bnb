<div class="page-content">
	<div class="page-header">
		<h1>
			Javascript and jQuery
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Function for developers by developers.
			</small>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<ul class="list-unstyled spaced">
				<h4>js_helper.js functions</h4>
				<?php 
					// sort functions
					usort($functions, sort_array('function_name'));

					// Js_helper.js functions
					foreach ($functions as $key => $value) {
						if( $value['function_location'] == 'js_helper.js' ){
				?>				
				<li>
					<i class="ace-icon fa fa-caret-right blue"></i>
					<a href="function_reference/code/<?php echo $value['function_link'] ?>"><?php echo $value['function_name'] ?></a>
				</li>
				<?php 
						}// foreach close
					} // if close
				?>
			</ul>
		</div>
		<div class="col-xs-4">
			<ul class="list-unstyled spaced">
				<h4>Interface_helper.php functions</h4>
				<?php 
					// sort functions
					usort($functions, sort_array('function_name'));

					// Js_helper.js functions
					foreach ($functions as $key => $value) {
						if( $value['function_location'] == 'interface_helper.php' ){
				?>				
				<li>
					<i class="ace-icon fa fa-caret-right blue"></i>
					<a href="function_reference/code/<?php echo $value['function_link'] ?>"><?php echo $value['function_name'] ?></a>
				</li>
				<?php 
						}// foreach close
					} // if close
				?>
			</ul>
		</div>
	</div>
</div>

<script>

</script>