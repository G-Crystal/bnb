<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JqGrid_ctrl extends CI_Controller {
	
	public function __construct()
        {
		parent::__construct();
		$this->load->model('jqGrid_model','jm');
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
		foreach($query as $row){
			$cell = array();
			switch($module){
				case 'viewing_order':
					foreach ( $fields as $val ) {
						switch($val){
							case 'host':
								$cell[$val] = '<a href="host/profile/index/'.$row->host_id.'">'. $row->h_fname.' '.$row->h_lname.'</a>';
							break;
							case 'keeper':
								$cell[$val] = '<a href="host/profile/index/'.$row->keeper_id.'">'.$row->k_fname.' '.$row->k_lname.'</a>';
							break;
							case 'services':
								$cell[$val] = $this->getService($row->$val);
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

	public function getService($services){
		$services = json_decode($services);
		if (($key = array_search('cleaning', $services)) !== false) {
		    unset($services[$key]);
		}
		$ids = implode(',', $services );

		$result = $this->helper_model->query_table('*','req_services',"WHERE service_id IN($ids)");
		$res = array();
		foreach ($result as $service) {
			$res[] = $service->service_name;
		}
		return implode(', ', $res);
	}	
	
}