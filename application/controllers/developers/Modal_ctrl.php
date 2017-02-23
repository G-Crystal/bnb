<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Modal_ctrl extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model( 'developers/sample_modal_query_model', 'smqm' );
	}

	public function index()
	{
		$modal_view = $this->input->post('modal_view');
		$modal_data = $this->input->post('modal_data');
		$view = $this->input->post('view');
		$data = $this->getModalData( $view, $modal_data );
		$this->load->view( $modal_view.'/'.$view, $data );
	}

	public function getModalData( $view, $data ){
		// Modal folder must be in its current Module folder.
		// sample: Models/developers/modals
		$result = array();
		switch ($view) {
			case 'sample_modal':
					$result = array(
						'test' => $data,
						'new' => 'old'
						);
				break;
			case 'sample_query_modal':
					$result = array(
						'employee' => $this->smqm->get_employee($data),
						);
				break;
			
			default:
				$result['result'] = $data;
				break;
		}
		
		return $result;

	}

}