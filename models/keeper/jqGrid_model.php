<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JqGrid_model extends CI_Model {

	function getAllData($start,$limit,$sidx,$sord,$where,$module,$module_data){
		if($limit != NULL)
	    	$this->db->limit($limit,$start);
	    if($where != NULL)
	        $this->db->where($where,NULL,FALSE);
	    $this->db->order_by($sidx,$sord);

	    $access = hasAccess($access = $this->session->userdata('user_level'),[3,4]); // Keeper, Host

		switch ($module) {
			case 'list_keeper':
				$this->db->select( 'tu.user_id keeper_id, tu.user_id actions, tu.user_fname, tu.user_lname, tu.user_email email, info.contact, tu.user_status status' );
				$this->db->join( 'tbl_user_infos info','info.user_id = tu.user_id','left' );
				$this->db->where( "FIND_IN_SET(3,tu.user_level) >", 0);
				$this->db->where( "FIND_IN_SET(1,tu.user_level) !=", 1);
				$this->db->where( "FIND_IN_SET(2,tu.user_level) !=", 1);
				if( $access ){
					$this->db->where( 'tu.user_status', 0 );
				}else{
					$this->db->where( 'tu.user_status !=', 1 );
				}
				$sql = $this->db->get('tbl_users tu');
				break;
		}
		

		
		$query = $sql;
	    return $query->result();

	}

}