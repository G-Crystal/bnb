<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helper_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

    // ============= PRE SET FUNCTIONS ============= //
    // This function are for specific application    //
    // that are pre set and intended to be change    //
    // as of per application usage.                  //
    // ==============================================//

    

    // ============= DEPENDENT HELPER FUNCTIONS ============= //
    
	function return_by($ops,$data){
		switch ($ops) {
			case 'json':
				echo json_encode($data);
				break;
			case 'echo':
				echo $data;
				break;
			
			default:
				return $data;
				break;
		}
	}

    // Check row of table if exist return boolean
	function row_exist($where,$table){
		if( is_array($where) ){
			$new_where = 'WHERE ';
			foreach ($where as $key => $value) {
				$new_where .= $key.' = "'.$value.'" ';

                $next = next($where);
				if( ($next || ($next === 0 || $next === '0')) ) :
					$new_where .= ' AND ';
				endif;
			}
			$where = $new_where;
		}
		$query = $this->db->query("SELECT EXISTS(SELECT * FROM $table $where ) as result");
		
        if( $query->row_array()['result'] )
            return true;
            return false;
	}

    //$this->hm->query_table('*','tbl_users','WHERE user_account = "'.$username.'"','row');
	function query_table($select,$table,$where='',$result='',$join=''){
		if( is_array($where) ){
			$new_where = 'WHERE ';
			foreach ($where as $key => $value) {
				$new_where .= $key.' = "'.$value.'"';
				if(next($where)) :
					$new_where .= ' AND ';
				endif;
			}
			$where = $new_where;
		}
        $query = $this->db->query("SELECT $select FROM $table $join $where");
        return $this->queryResult($query,$result,$select);
    }

    function queryResult($query,$result,$select){
        switch($result){
            case 'single':
                $res = explode(' as ', $select);
                if(count($res)>1){
                    return ($query->result())?$query->row()->$res[1]:false;
                }else{
                    return ($query->result())?$query->row()->$select:false;
                }
            break;
            case 'row_num':
                return $query->num_rows();
            break;
            case 'row_array':
                return $query->row_array();
            break;
            case 'row':
                return $query->row();
            break;
            case 'array':
                return $query->result_array();
            break;
            default:
            	return $query->result();
            break;
        }
    }

    function dateLike($field,$date,$format='Y-m-d',$datetype = null){
        
        $res = '';
        if($date){
            $date = ($date=='today')?date($format):$date;
            $res_date = explode(' - ', $date);
            
            if(count($res_date)==2){
                $check_date = explode(' ', $res_date[0]);
                $first = (count($check_date)>1)?'':'00:00:00';
                $second = (count($check_date)>1)?'':'23:59:59';
                $res = $field.' BETWEEN "'.date($format, strtotime($res_date[0])).' '.$first.'" AND "'.date($format, strtotime($res_date[1])).' '.$second.'"';
            }else if(count($res_date)==1){
				if($datetype=='varchar')
					$res = $field.' like "'.date($format, strtotime($res_date[0])).'%"';
				else
					$res = $field.' = "'.date($format, strtotime($res_date[0])).'"';
            }
        }
        
        return $res;
    }

    function searchLike($data,$fields,$ops=''){
        if( ! is_array($fields) )
            $fields = explode(',', $fields);      
        $res = array();
        foreach ($fields as $key => $val) {
            if($ops=='left'){
                $res[] = $val.' LIKE "%'.$data.'"';
            }else if($ops=='right'){
                $res[] = $val.' LIKE "'.$data.'%"';
            }else{
                $res[] = $val.' LIKE "%'.$data.'%"';
            }
        }
        return ' ('.implode(' || ', $res).')';
    }

    function advanceSearchLike($data){
        $res_array = array();
        $result = false;
        foreach ($data as $key => $val) {
            $res_array[] = $val['name'].' LIKE "%'.$val['value'].'%"';
        }
        if( !empty($res_array) )
            $result = '('.implode(' AND ', $res_array).')';

        return $result;
    }
}