<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Localstorage_ctrl extends CI_Controller {

	public function get_access(){
		$access = $this->helper_model->query_table( 'access_id,access_name,access_value','req_access' );
		if( is_array($access) )
			echo json_encode($access);
		else
			echo json_encode('false');
	}

}