<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JqGrid_model extends CI_Model {

	function getAllData($start,$limit,$sidx,$sord,$where,$module,$module_data){
		if($limit != NULL)
	    	$this->db->limit($limit,$start);
	    if($where != NULL)
	        $this->db->where($where,NULL,FALSE);
	    $this->db->order_by($sidx,$sord);

		switch ($module) {
			case 'viewing_order':
				$this->db->select( 'to.order_id, to.services, to.order_id actions, keeper.user_fname k_fname, keeper.user_lname k_lname, host.user_fname h_fname, host.user_lname h_lname ' );
				$this->db->join( 'tbl_users keeper','keeper.user_id = to.keeper_id','left' );
				$this->db->join( 'tbl_users host','host.user_id = to.user_id','left' );
				$this->db->where( 'status', 0 );
				$sql = $this->db->get('tbl_orders to');
				break;
		}
		

		
		$query = $sql;
	    return $query->result();

	}

}