<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class jQgrid extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->driver('cache');
		$this->load->model( 'developers/sample_modal_query_model', 'smqm' );
	}

	public function index()
	{
		$data = array(
			'content'=>'developers/jqGrid_view'
			);
		$data['style'][] = 'assets/css/ui.jqgrid.css';
		$data['style'][] = 'assets/css/datepicker.css';
		$this->load->view('base',$data);
	}

	public function actions(){
		$oper = $this->input->post('oper');
		$id = $this->input->post('id');
		$old_data = serializeToArray($this->input->post('old_data'));

		$data = array();
		switch ($oper) {
			case 'add':
				$this->add_action();
				break;
			case 'del':
				$this->delete_action();
				break;
			case 'edit':
				$data = array(
					'f_name' => $this->input->post('f_name'),
					'l_name' => $this->input->post('l_name'),
					'status' => $this->input->post('status')
				);
				
				$deff = array_diff_assoc($data,$old_data);
				if( ! empty($deff) ){ // check if has difference.
					// Update database
					$this->db->trans_start();
					$this->db->update('sample_employee',$data,array('employee_id'=>$id));
					//$this->db->update('tbl_patients',);
					$this->db->trans_complete();

					if ( $this->db->trans_status() ){ // check if transaction is successfull.
						// create trail data elements.
						$trail_data = array(
							'name' => 'sample_employee',
							'data_id' => $id, // ID of data modified.
							'data' => $data,
							'old_data' => $old_data,
							'method' => $oper // action or method use of this transaction.
						);
						audit_trail($trail_data);
					}
				}
				break;
		}
	}

	function actions_sample_user(){
		$oper = $this->input->post('oper');
		$id = $this->input->post('id');
		$old_data = jqGridDataToArray($this->input->post('old_data'),$this->input->post('old_data_type'));

		$data = array();
		switch ($oper) {
			case 'add':
				$this->add_action();
				break;
			case 'del':
				$this->delete_action();
				break;
			case 'edit':
				$data = array(
					'user_fname' => $this->input->post('user_fname'),
					'user_lname' => $this->input->post('user_lname'),
					'user_email' => $this->input->post('user_email')
				);

				// ============================================ //
				// Only do merge if action use 2 or more table  //
				$secondary_data = array(
					'middle_name' => $this->input->post('middle_name')
				);

				$audit_data = array_merge($data,$secondary_data);
				// ============================================ //
				
				$deff = array_diff_assoc($audit_data,$old_data);
				if( ! empty($deff) ){ // check if has difference.

					// Update database
					$this->db->trans_start();
					$this->db->update('sample_user',$data,array('user_id'=>$id));
					$this->db->update('tbl_patients',$secondary_data,array('patient_id'=>$id));
					$this->db->trans_complete();

					// ==================== START =================== //
					// Audit Trail Call or use                        //
					// Always check if trasaction status is complete  //

					if ( $this->db->trans_status() ){ // check if transaction is successfull.
						// create trail data elements.
						$trail_data = array(
							'name' => 'sample_user',
							'data_id' => $id, // ID of data modified.
							'data' => $audit_data, // use data direcly if no join or other table use in action
							'old_data' => $old_data,
							'method' => $oper // action or method use of this transaction.
						);
						audit_trail($trail_data);
					}

					// ==================== END ===================== //
				}
				break;
		}
	}

	public function add_action(){
		echo 'Add function here.';
	}

	public function delete_action(){
		echo 'Delete function here.';
	}

}