<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suburbs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->driver('cache');
		$access = $this->session->userdata('user_level');
		if( ! hasAccess($access,[1,2]) )
			redirect('No_access','refresh');
	}

	public function index($id = ''){
		$data['style'][] = 'assets/css/ui.jqgrid.css';
		$data['style'][] = 'assets/css/datepicker.css';
		$data['franchise'] = $id;
		$data['content'] = 'admin/suburbs_view';
		
		if( empty($id) ){
			$data['content'] = 'errors/error_500';
		}

		if( hasAccess($this->session->userdata('user_level'),[2]) ){
			$data['franchise'] = $this->getFranchiseId($this->session->userdata('user_id'));
			$data['content'] = 'admin/suburbs_view';
		}

		$this->load->view('base',$data);
	}

	public function getFranchiseId($id)
	{
		return $this->helper_model->query_table('user_franchise','tbl_users',array('user_id'=>$id),'single');
	}

	public function actions(){
		$oper = $this->input->post('oper');
		$id = $this->input->post('id');
		$data = array();
		switch ($oper) {
			case 'add':
				$data = array(
					'fl_id' => $this->input->get('franchise'),
					'fl_name' => $this->input->post('name'),
					'fl_code' => $this->input->post('code'),
					'created_date' => date('Y-m-d H:i:s')
				);
				$this->db->insert('req_franchise_location',$data);
				break;
			case 'del':
				$data = array(
					'fl_status' => 1,
					'updated_by' => $this->session->userdata('user_id')
				);
				$this->db->update('req_franchise_location',$data,array('id'=>$id));
				break;
			case 'edit':
				$data = array(
					'fl_name' => $this->input->post('name'),
					'fl_code' => $this->input->post('code'),
					'updated_by' => $this->session->userdata('user_id')
				);
				$this->db->update('req_franchise_location',$data,array('id'=>$id));
				break;
		}
	}

}