<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->driver('cache');
	}

	public function index(){
		$data['style'][] = 'assets/css/ui.jqgrid.css';
		$data['style'][] = 'assets/css/datepicker.css';
		
		$data['content'] = 'admin/messages_view';
		$this->load->view('base',$data);
	}

}