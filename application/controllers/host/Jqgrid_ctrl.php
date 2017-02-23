<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JqGrid_ctrl extends CI_Controller {
	
	public function __construct()
        {
		parent::__construct();
		$this->load->model('host/jqGrid_model','jm');
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

		$where = get_filter($filters); // call from function helper
		$query = $this->jm->getAllData($start,NULL,$sidx,$sord,$where,$module,$module_data);
		    $count = count($query); 
		    if( $count > 0 ) 
		        $total_pages = ceil($count/$limit);
		    else
		    	$total_pages = 0;
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
	    //print_r($this->db->last_query());exit();
		foreach($query as $row){
			$cell = array();
			switch($module){
				case 'list_host':
					foreach ( $fields as $val ) {
						switch($val){
							case 'full_name':
								$cell[$val] = $row->user_fname.' '.$row->user_lname;
							break;
							default: $cell[$val] = $row->$val; break;
						}
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

	
	
}