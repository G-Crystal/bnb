<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

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
		$data['style'][] = 'assets/css/jquery.gritter.css';

		$data['title'] = 'BNB - Services';
		$data['content'] = 'admin/services_view';
		$data['check_in'] = $this->getServices(1,'Check in');
		$data['check_out'] = $this->getServices(1,'Check out');
		$data['loundry'] = $this->getServices(1,'Loundry');
		$this->load->view('base',$data);
	}

	public function getAllServices()
	{
		$id = $this->input->post('franchise');
		$res = $this->helper_model->query_table("*","req_services","WHERE franchise_id = $id");
		echo json_encode($res);
	}

	public function getServices($franchise,$service)
	{
		return $this->helper_model->query_table("service_id,service_price","req_services","WHERE franchise_id = $franchise AND service_name = '$service'","row");
	}

	public function updateServices()
	{
		$msg = '';
		$service_id = $this->input->post('service_id');
		
		$service_price = preg_replace("/[^0-9,.]/", "", $this->input->post('service_price'));

		if( $service_id != '' ){
			if( $this->db->update('req_services',array('service_price'=>$service_price),array('service_id'=>$service_id)) ){
				$msg = 'success';
			}else{
				$msg = 'Service is unavailable. Please try again.';
			}
		}else{
			$data['service_name'] = $this->input->post('service_name');
			$data['service_price'] = $service_price;
			$data['franchise_id'] = $this->input->post('franchise_id');

			if( $this->db->insert('req_services',$data) ){
				$msg = 'success';
			}else{
				$msg = 'Service is unavailable. Please try again.';
			}
			
		}
		echo $msg;
	}

	public function actions(){
		$oper = $this->input->post('oper');
		$id = $this->input->post('id');

		$data = array();
		switch ($oper) {
			case 'add':
				$data = array(
					'franchise_id' => $this->input->get('franchise'),
					'name' => $this->input->post('name'),
					'sorting' => $this->input->post('sorting'),
					'value' => preg_replace("/[^0-9,.]/", "", $this->input->post('value')),
					'updated_by' => $this->session->userdata('user_id'),
					'created_date' => date('Y-m-d H:i:s')
				);
				$this->db->insert('req_cleaning',$data);
				break;
			case 'del':
				$data = array(
					'status' => 1,
					'updated_by' => $this->session->userdata('user_id')
				);
				$this->db->update('req_cleaning',$data,array('id'=>$id));
				break;
			case 'edit':
				$data = array(
					'franchise_id' => $this->input->get('franchise'),
					'name' => $this->input->post('name'),
					'sorting' => $this->input->post('sorting'),
					'value' => preg_replace("/[^0-9,.]/", "", $this->input->post('value')),
					'updated_by' => $this->session->userdata('user_id'),
					'created_date' => date('Y-m-d H:i:s')
				);
				$this->db->update('req_cleaning',$data,array('id'=>$id));
				break;
		}
	}

}