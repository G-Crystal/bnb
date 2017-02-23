<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audit_trail_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_login_trails( $user_id ){
		
		$this->db->where('user_id',$user_id);

		$query = $this->db->get('tbl_audit_login');
		return $query->result();
	}

	public function get_audit_trails( $user_id,$data_id,$filter_date ){

		if( $user_id )
			$this->db->where('audit_by',$user_id);
		if( $data_id )
			$this->db->where('audit_data_id',$data_id);
		if( $filter_date )
			$this->db->where($this->helper_model->dateLike('audit_date',$filter_date));

		$this->db->order_by('audit_date','asc');
		$query = $this->db->get('tbl_audit_trail');
		return $query->result();
	}

	

}