<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JqGrid_model extends CI_Model {

	function getAllData($start,$limit,$sidx,$sord,$where,$module,$module_data){
		if($limit != NULL)
	    	$this->db->limit($limit,$start);
	    if($where != NULL)
	        $this->db->where($where,NULL,FALSE);
	    $this->db->order_by($sidx,$sord);

		switch ($module) {
			case 'list_host':
				$this->db->select( 'tu.user_id host_id, tu.user_id actions, tu.user_fname, tu.user_lname, tu.user_email email, info.contact, info.website' );
				$this->db->join( 'tbl_user_infos info','info.user_id = tu.user_id','left' );
				$this->db->where( "FIND_IN_SET(4,tu.user_level) >", 0);
				$this->db->where( "FIND_IN_SET(1,tu.user_level) !=", 1);
				$this->db->where( "FIND_IN_SET(2,tu.user_level) !=", 1);
				$this->db->where( 'tu.user_status', 0 );
				$sql = $this->db->get('tbl_users tu');
				break;
		}
		

		
		$query = $sql;
	    return $query->result();

	}

}