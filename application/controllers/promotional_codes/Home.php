<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->driver('cache');
		$access = $this->session->userdata('user_level');
		if( ! hasAccess($access,[1,2]) )
			redirect('No_access','refresh');
	}

	public function index(){
		// die('asd');
		$data['style'][] = 'assets/css/ui.jqgrid.css';
		$data['style'][] = 'assets/css/datepicker.css';

		/*
		$this->db->select( 'promotional_id, promotional_id actions, code_name name' );
				$this->db->where( 'promotional_status', 0 );
				$sql = $this->db->get('req_promotional_codes');

				print_pre($sql->result());*/

		$data['content'] = 'promotional_codes/promo_view';
		$this->load->view('base',$data);
	}

	public function actions(){
		$oper = $this->input->post('oper');
		$id = $this->input->post('id');

		$data = array();
		switch ($oper) {
			case 'add':
				$data = array(
					'code_name' => $this->input->post('name'),
					'discount_percentage' => $this->input->post('discount'),
					'from_date' => $this->input->post('from_date'),
					'expiry_date' => $this->input->post('expiry_date'),
					'created_date' => date('Y-m-d H:i:s')
				);
				$this->db->insert('req_promotional_codes',$data);
				break;
			case 'del':
				$data = array(
					'promotional_status' => 1,
					'updated_by' => $this->session->userdata('user_id')
				);
				$this->db->update('req_promotional_codes',$data,array('promotional_id'=>$id));
				break;
			case 'edit':
				$data = array(
					'code_name' => $this->input->post('name'),
					'discount_percentage' => $this->input->post('discount'),
					'from_date' => $this->input->post('from_date'),
					'expiry_date' => $this->input->post('expiry_date'),
					'updated_by' => $this->session->userdata('user_id')
				);
				$this->db->update('req_promotional_codes',$data,array('promotional_id'=>$id));
				break;
		}
	}

	public function verify_promotional_code($promo_code){
		echo $promo_code;
	}

}