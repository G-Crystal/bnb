<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample_modal_query_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_employee( $data ){
		$name = $data['name'];
		$this->db->select( 'employee_id,f_name,l_name' );
		$this->db->where( 'f_name',$name );
		$query = $this->db->get( 'sample_employee' );

		return $query->result();
	}

	

}