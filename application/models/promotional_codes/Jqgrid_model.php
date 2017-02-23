<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JqGrid_model extends CI_Model {

	function getAllData($start,$limit,$sidx,$sord,$where,$module,$module_data){
		if($limit != NULL)
	    	$this->db->limit($limit,$start);
	    if($where != NULL)
	        $this->db->where($where,NULL,FALSE);
	    $this->db->order_by($sidx,$sord);

		switch ($module) {
			case 'promotional_codes':
				$this->db->select( 'promotional_id, promotional_id actions, code_name name,discount_percentage discount, from_date, expiry_date' );
				$this->db->where( 'promotional_status', 0 );
				$sql = $this->db->get('req_promotional_codes');
				break;
			/*			
			case 'suburbs':
				$this->db->select( 'id, id actions, fl_name name, fl_code code' );
				$this->db->where( 'fl_status', 0 );
				$this->db->where( 'fl_id', $module_data['franchise'] );
				$sql = $this->db->get('req_franchise_location');
				break;
			case 'cleaning':
				$this->db->select( 'id cleaning_id, id actions, sorting, name, value' );
				$this->db->where( 'franchise_id', $module_data['franchise'] );
				$this->db->where( 'status', 0 );
				$sql = $this->db->get('req_cleaning');
				break;
			*/
		}
		
		$query = $sql;
	    return $query->result();

	}

}