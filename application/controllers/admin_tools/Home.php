<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->driver('cache');

		$access = $this->session->userdata('user_level');
		if( ! hasAccess($access,[1,2]) )
			redirect('No_access','refresh');
	}

	public function index()
	{
		$data = array('content'=>'admin_tools/admin_tools_view');
		$this->load->view('base',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */