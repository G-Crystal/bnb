<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JqGrid_model extends CI_Model {

	function getAllData($start,$limit,$sidx,$sord,$where,$module,$module_data){
		if($limit != NULL)
	    	$this->db->limit($limit,$start);
	    if($where != NULL)
	        $this->db->where($where,NULL,FALSE);
	    $this->db->order_by($sidx,$sord);


		switch ($module) {
			case 'sample_jqgrid':
				$this->db->select( 'employee_id actions,employee_id,f_name,l_name,status' );
				$sql = $this->db->get('sample_employee');
				break;
			case 'sample_user':
				$this->db->select( 'user_id,user_id actions,user_fname,user_lname,user_email,middle_name' );
				$this->db->join( 'tbl_patients','patient_id = user_id','left' );
				$sql = $this->db->get('sample_user');
				break;
		}
		

		
		$query = $sql;
	    return $query->result();

	}

}