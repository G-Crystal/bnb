<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Franchise extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->driver('cache');
		$access = $this->session->userdata('user_level');
		if( ! hasAccess($access,[1,2]) )
			redirect('No_access','refresh');
	}

	public function index(){
		$data['style'][] = 'assets/css/ui.jqgrid.css';
		$data['style'][] = 'assets/css/datepicker.css';
		
		$data['content'] = 'admin/franchise_view';
		$this->load->view('base',$data);
	}

	public function actions(){
		$oper = $this->input->post('oper');
		$id = $this->input->post('id');

		$data = array();
		switch ($oper) {
			case 'add':
				$data = array(
					'franchise_name' => $this->input->post('name'),
					'created_date' => date('Y-m-d H:i:s')
				);
				$this->db->insert('req_franchise',$data);
				break;
			case 'del':
				$data = array(
					'franchise_status' => 1,
					'updated_by' => $this->session->userdata('user_id')
				);
				$this->db->update('req_franchise',$data,array('franchise_id'=>$id));
				break;
			case 'edit':
				$data = array(
					'franchise_name' => $this->input->post('name'),
					'updated_by' => $this->session->userdata('user_id')
				);
				$this->db->update('req_franchise',$data,array('franchise_id'=>$id));
				break;
		}
	}

}