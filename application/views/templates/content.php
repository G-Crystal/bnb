<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
				<?php 

				$dum = array(
					'Settings' => array(
						'test 1','test 2', 'Sample' => array( 'word 1', 'word 2' )
						),
					'Options' => array(
						'menu 1','Sample' => array( 'word 1','word 2' ), 'menu'
						)
					);

				$test = unserialize('a:1:{i:0;a:4:{s:7:"setting";s:7:"general";s:4:"code";s:16:"settings_updated";s:7:"message";s:15:"Settings saved.";s:4:"type";s:7:"updated";}}');

				$sample = array(
					array(
						array('name'=>'Settings','url'=>'sa','icon'=>'ff'),
						array(
							array(
								array('name'=>'Test','url'=>'sa','icon'=>'ff'),
								array(
									array('name'=>' under sa Test','url'=>'sa','icon'=>'ff'),
									array('name'=>' under sa Test 2','url'=>'sa','icon'=>'ff')
									)

								),
							array('name'=>'Test 1','url'=>'sxx','icon'=>'fasdsaf')
							)
						),
					array('name'=>'Options','url'=>'sax','icon'=>'ffd'),
					);

				$sample = serialize($sample);

				print_pre($this->session->userdata('user_id'));

				
				?>
				<i class="ace-icon fa fa-spinner fa-spin orange bigger-225"></i>
			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->

<script type="text/javascript">
	
	$.checkIdle({
		setTime: 20000*60,
		confirmTime: 20,
		logoutLink: 'login/logout'
	});


</script>  
