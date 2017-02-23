<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class No_access extends CI_Controller {

	public function index() {
		$this->load->view('base',array('content'=>'no_access_view'));
	}
}