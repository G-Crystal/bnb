<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helper_ctrl extends CI_Controller {

	public function refresh_dropDown(){
		$menu = $this->input->post('menu');
		$selected = $this->input->post('selected');
		$output = ($this->input->post('output')) ? $this->input->post('output') : 'option';
		$options = $this->input->post('options');
		return dropDown( $menu, $selected, $output, $options );
	}

	public function activate_localStorage(){
		$this->session->set_userdata('localStorage',true);
	}

	public function get_sidebar_menu(){
		$access_id = $this->session->userdata('user_access');
		$dashboard_access = $this->input->post('dashboard_access');
		$selected = $this->input->post('selected');
		$active_link = $this->input->post('active_link');
		$access = '';


		// check if dashboard access data and localstorage is available.
		if( $dashboard_access = json_decode($dashboard_access) ){

			$access_id = ( $selected && in_array($selected, $access_id) ) ? $selected : $access_id[0];

			// get dashboard data
			foreach ($dashboard_access as $key => $value) {
				if( $value->access_id == $access_id )
					$access = $value->access_value;
			}

			echo json_encode(sidebar_menu_ls($access,$active_link));
		}
	}

}