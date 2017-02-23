<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// that() is declared in Interface_helper.php

function get_settings( $setting ){
	$result = that()->helper_model->query_table( 'settings_value','tbl_settings','WHERE settings_name = "'.$setting.'"','single' );
	return $result;
}

function the_settings( $setting ){
	$result = that()->helper_model->query_table( 'settings_value','tbl_settings','WHERE settings_name = "'.$setting.'"','single' );
	echo $result;
}

function jqGridDataToArray($data,$type='json'){
	if( $data != '' ){
		return ( $type == 'serialize' ) ? serializeToArray($data) : (array)json_decode($data);
	}else 
		return false;
}


function serializeToArray($ser,$separator='|'){ 
	if($ser){
	    $data = explode('&', $ser);
	    $data_array = array();
	    foreach ($data as $key => $value) {
	        $res = explode('=', $value);
	        $trimed = trim(urldecode($res[1]));
	        if(strpos($res[0],'%5B%5D') !== false) {
	            $holder = str_replace("%5B%5D","",$res[0]);
	            if(@$data_array[$holder]){
	                @$data_array[$holder] .= $separator.$trimed;
	            }else{
	                @$data_array[$holder] .= $trimed;
	            }
	        }else{
	            @$data_array[$res[0]] = $trimed;
	        }
	    }
	    return $data_array;
	}else return false;
}

function hasAccess($needle, $haystack){
	
	if( is_array($needle) ){
		if( !is_array($haystack) ) return '2nd parameter must be also an array';
		
		$access = array_intersect($needle,$haystack);
		if( empty($access) )
			return false;
			return true;
	}else{
		if( !is_array($haystack) ) return '2nd parameter must be an array';

		if( in_array($needle, $haystack) )
			return true;
			return false;
	}

	
}

	//normalize data of FORM Submit with array values to string value
	//For database Format
function normalizeFormArray($data,$separator='|'){
	if($data){
	    $data_array = array();
	    foreach ($data as $key => $val) {
	        if(is_array($val)){
	        	if( $separator == 'array' ){
		            $data_array[$key] = json_encode($val);
		        }else{
		        	foreach ($val as $res => $value) {
		                if($res!=0){
		                    @$data_array[$key] .= $separator.$value;
		                }else @$data_array[$key] .= $value;
		            }
		        }
	        }else $data_array[$key] = $val;
	    }
	    return $data_array;
	}else return false;
}

function audit_trail($params){
	$name = ( isset($params['name']) ) ? $params['name'] : '' ;
	$data_id = ( isset($params['data_id']) ) ? $params['data_id'] : '' ;
	$data = ( isset($params['data']) ) ? $params['data'] : '' ;
	$old_data = ( isset($params['old_data']) ) ? $params['old_data'] : '' ;
	$method = ( isset($params['method']) ) ? $params['method'] : '' ;
	if( $method == 'del' || $method == 'delete' ){
		$method = 'delete';
	}else if( $method == 'edit' || $method == 'update' ){
		$method = 'update';
	}else if( $method == 'add' || $method == 'insert' ){
		$method = 'insert';
	}else{
		echo 'Audit trail - No such method:' . $method;
		return false;
	}

	$data = array_diff_assoc($data,$old_data);
	$data_old = array_intersect_key($old_data,$data);
	$affected_data = array();

	foreach ($data as $key => $val) {
		if( $method == 'insert' ){
			$affected_data[$key] = array($val);
		}else{
			$affected_data[$key] = array($data_old[$key], $val );
		}
	}
	$audit_data = array(
		'audit_name'=> $name,
		'audit_data_id'=> $data_id,
		'audit_data'=> serialize($affected_data),
		'audit_by'=> that()->session->userdata['user_id'],
		'audit_type'=> $method
	);
	that()->db->insert('tbl_audit_trail',$audit_data);
}

function get_audit_trail($name){
	return that()->helper_model->query_table('*','tbl_audit_trail',array('audit_name'=>$name),'row_array');
}

function add_prefix($array,$prefix,$position='left'){
	if( is_array( $array ) ){
		foreach ($array as $k => $v)
		{
			if( $position == 'left' ){
				$array[$prefix.$k] = $v;				
			}else if( $position == 'right' ){
				$array[$k.$prefix] = $v;
			}
			unset($array[$k]);
		}
		return $array;
	}else{
		echo 'add_prefix: First argument must be an array';
		return false;
	}
}

//for jqGrid filter Function
function get_filter($filters){
	$where = $group = "";
	if($filters) {
		$fil = json_decode($filters,true); 
		if($fil["rules"]!=null) { 

			foreach ( $fil["rules"] as $rule_key => $rule) {
				$searchField = $rule["field"];
				$searchOper = $rule["op"];
				$searchString = $rule["data"];
				if($rule_key != 0) $groupOp = $fil["groupOp"];
				
				if ($_POST['_search'] == 'true') {
			        $ops = array(
			        'eq'=>'=', 
			        'ne'=>'<>',
			        'lt'=>'<', 
			        'le'=>'<=',
			        'gt'=>'>', 
			        'ge'=>'>=',
			        'bw'=>'LIKE',
			        'bn'=>'NOT LIKE',
			        'in'=>'LIKE', 
			        'ni'=>'NOT LIKE', 
			        'ew'=>'LIKE', 
			        'en'=>'NOT LIKE', 
			        'cn'=>'LIKE', 
			        'nc'=>'NOT LIKE' 
			        );
			        foreach ($ops as $key=>$value){
			            if ($searchOper==$key) {
			                $ops = $value;
			            }
			        }
			        if($searchOper == 'eq' ) $searchString = $searchString;
			        if($searchOper == 'bw' || $searchOper == 'bn') $searchString .= '%';
			        if($searchOper == 'ew' || $searchOper == 'en' ) $searchString = '%'.$searchString;
			        if($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni') $searchString = '%'.$searchString.'%';

			        $where .= $groupOp;
					
			        //$where .= "$searchField $ops '$searchString'"; 
					$where .= " $searchField $ops '".$searchString."' "; 

			    }
			}
		} 
	}
	return $where;
}

function issetor($var,$param1,$param2='',$default=false){
	if( $param2 )
		return ( isset($var[$param1][$param2]) ) ? $var[$param1][$param2] : $default;
	else
		return ( isset($var[$param1]) ) ? $var[$param1] : $default;
}

function issetor2($var,$param1,$param2='',$default=false){
	return ( isset($var[$param1][$param1.'_'.$param2][$param2]) ) ? $var[$param1][$param1.'_'.$param2][$param2] : $default;
}

function issetorObj($var,$param,$default=false){
	return ( isset( $var->$param ) ) ? $var->$param : $default;
}

