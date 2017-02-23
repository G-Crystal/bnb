<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JqGrid_ctrl extends CI_Controller {

	public function __construct()
        {
		parent::__construct();
		$this->load->model('developers/jqGrid_model','jm');
	}
        

	public function load_data(){
		$module = $this->input->post('module'); // module use for case
		$module_data = $this->input->post('module_data'); // data of each module
		$page = $this->input->post('page'); // get the requested page
		$loadonce = $this->input->post('loadonce'); // get loadonce
		$limit = $this->input->post('rows'); // get how many rows we want to have into the grid
		$sidx = $this->input->post('sidx'); // get index row - i.e. user click to sort
		$sord = $this->input->post('sord'); // get the direction
		$sortname = $this->input->post('sortname'); // get the direction
		$fields = $this->input->post('fields'); // index of fields
		$start = $limit*$page - $limit; 
	    $start = ($start<0)?0:$start; 
		$filters = $this->input->post('filters'); // get filters
		$where = $this->get_filter($filters);

		$query = $this->jm->getAllData($start,NULL,$sidx,$sord,$where,$module,$module_data);
		
		    $count = count($query); 
		    if( $count > 0 ) 
		        $total_pages = ceil($count/$limit);

		    if ($page > $total_pages) 
		        $page=$total_pages;
		if( $loadonce != 'true' ){
			$query = $this->jm->getAllData($start,$limit,$sidx,$sord,$where,$module,$module_data);
			
		}
		$responce = new stdClass();
		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
	    $i=0; 
	    $flag = true;
		foreach($query as $row){
			$cell = array();
			switch($module){
				case 'tbl_request':
					foreach ( $fields as $val ) {
						switch($val){
							case 'start_date':
								$cell[$val] = 'xxx';
							break;
							default: $cell[$val] = $row->$val; break;
						}
						$cell['training_request_name'] = 'zx';
					}
					
					$responce->rows[$i]['id']=$row->$sortname;
					$responce->rows[$i++]['cell']=$cell;
				break;
				default:
					foreach ( $fields as $val ) {
						switch($val){
							default: $cell[$val] = $row->$val; break;
						}
					}
					$responce->rows[$i]['id']=$row->$sortname;
					$responce->rows[$i++]['cell']=$cell;
				break;
			}
			
		}
		echo json_encode($responce);
	
	}

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
	
}