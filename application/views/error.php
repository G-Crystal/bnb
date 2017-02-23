<?php
	//Check if user still have session if not redirect to login.
/*	if( $this->session->userdata('user_id') == '' )
		redirect('login','refresh');*/
?>


<?php get_view('templates/head'); ?>
	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<?php //get_view('templates/sidebar'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<?php //get_view('templates/breadcrumbs'); ?>
					<?php get_view($content); ?>					
				</div>
			</div>

			<?php get_view('templates/footer'); ?>

			<!-- /.main-container -->
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
		<!-- Main scripts -->
		<script src="assets/js/ace/elements.scroller.js"></script>
		<script src="assets/js/ace/ace.js"></script>
		<script src="assets/js/ace/ace.sidebar.js"></script>
		<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
		
		<script src="docs/assets/js/rainbow.js"></script>
		<script src="docs/assets/js/language/generic.js"></script>
		<script src="docs/assets/js/language/html.js"></script>
		<script src="docs/assets/js/language/css.js"></script>
		<script src="docs/assets/js/language/javascript.js"></script>

	</body>
</html>
