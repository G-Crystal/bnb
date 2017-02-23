<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard_settings extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->driver('cache');

		$access = $this->session->userdata('user_access');
		if( ! hasAccess($access,[1]) )
			$this->load->view('base',array('content'=>'no_access_view'));
	}

	public function index()
	{
		$menu_name =  $this->input->get('menu_name');
		$data = array(
			'content'=>'developers/dashboard_settings_view',
			'menu' => $this->display_listWidget($this->get_menu($menu_name)),
			//'menu_list' => $this->helper_model->dropDown('sample_employee')
			);
		$this->load->view('base',$data);
	}


	// Menu Drag and Drop
	function update_menu($ops=null){
		$menuData = serialize($this->input->post('menuData'));
		$menu_name = $this->input->post('menu_name');
		$new_menu_name = $this->input->post('new_menu_name');

		$menu_exist = $this->helper_model->row_exist(array('access_name'=>$menu_name),'req_access');

		if( $menu_exist ){
			// check main_dashboard settings and update.
			if( $menu_name == get_settings('main_dashboard') ){
				$this->db->update( 'tbl_settings',array('settings_value'=>$new_menu_name),array('settings_name'=>'main_dashboard') );
			}
			$this->db->update('req_access',array('access_name'=>$new_menu_name,'access_value'=>$menuData),array('access_name'=>$menu_name));
			return $this->helper_model->return_by( $ops,$this->display_listWidget($this->get_menu($new_menu_name)) );		
		}else echo ' Something went wrong!';
	}

	function create_menu($ops=null){
		$menuData = serialize($this->input->post('menuData'));
		$new_menu_name = $this->input->post('new_menu_name');

		$menu_exist = $this->helper_model->row_exist(array('access_name'=>$new_menu_name,'access_status'=>0),'req_access');

		if( ! $menu_exist ){
			$this->db->insert('req_access',array('access_name'=>$new_menu_name,'access_value'=>$menuData));
			return $this->helper_model->return_by( $ops,$this->display_listWidget($this->get_menu($new_menu_name)) );
		}else echo ' already exist.';
	}

	function remove_menu(){
		$menu_name = $this->input->post('menu_name');
		$menu_exist = $this->helper_model->row_exist(array('access_name'=>$menu_name,'access_status'=>0),'req_access');
		if( $menu_exist ){
			$this->db->update('req_access',array('access_status'=>1),array('access_name'=>$menu_name));
			echo 'removed';
		}else echo ' Something went wrong!';
	}

	function get_listWidget($ops=null){
		$menu_name = $this->input->post('menu_name');
		return $this->helper_model->return_by( $ops,$this->display_listWidget($this->get_menu($menu_name)) );
	}

	function get_menu($menu_name=null,$ops=null){
		$menu_name = ( empty($menu_name) ) ? get_settings('main_dashboard') : $menu_name;
		$query = $this->helper_model->query_table('access_value','req_access',array('access_name'=>$menu_name),'single');
		$result = unserialize($query);
		return $this->helper_model->return_by($ops,$result);
	}

	function display_listWidget($list){
		if( ! empty($list) )
			return '<ol class="dd-list">'.$this->listWidget($list).'</ol>';
		else
			return '<ol class="dd-list"></ol>';
	}

	function listWidget($list){
		$data = '';
		foreach ($list as $key => $value) {
			$id = ( isset($value['id']) ) ? $value['id'] : '';
			$name = ( isset($value['name']) ) ? $value['name'] : '';
			$link = ( isset($value['link']) ) ? $value['link'] : '';
			$icon = ( isset($value['icon']) ) ? $value['icon'] : '';
			$data .= str_replace("</li>", "" , $this->list_item($id,$name,$link,$icon));
			if( isset($value['children']) ) :
				$data .= '<ol class="dd-list">'.$this->listWidget($value['children']).'</ol>';
			endif;
		}
		return $data.'</li>';
	}

	function add_to_menu(){
		$id = $this->input->post('id');
		$item = $this->input->post('item');
		$item_array = serializeToArray($item);
		$name = $item_array['name'];
		$link = $item_array['link'];
		$icon = $item_array['icon'];

		echo $this->list_item($id,$name,$link,$icon);
	}


	function list_item($id,$name,$link,$icon){
		$list = '<li class="dd-item collapsed" data-id="'.$id.'">
					<div class="dd-handle">
						<i class="normal-icon ace-icon fa '.$icon.' blue bigger-150"></i>&nbsp;&nbsp;
						<span class="title">'.$name.'</span>
						<div class="pull-right action-buttons">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-down" ></i>
							</a>
						</div>
					</div>
					<div class="dd-body">
						<div class="costum-form">
							<div class="col-lg-6">
								<label class="control-label no-padding-right"> Navigation Label </label>
								<div>
									<input data-name="'.$name.'" class="form-control" type="text" value="'.$name.'">
								</div>
							</div>
							<div class="col-lg-6">
								<label class="control-label no-padding-right"> Icon </label>
								<div>
									<input data-icon="'.$icon.'" class="form-control" type="text" value="'.$icon.'" placeholder="fa-check">
								</div>
							</div>
							<div class="col-lg-12">
								<label class="control-label no-padding-right"> Link </label>
								<div>
									<input data-link="'.$link.'" class="form-control" type="text" value="'.$link.'">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="space-8"></div>
								<a class="red" data-action="close" href="#">
								<i class="ace-icon fa fa-trash-o bigger-130"></i>
								Remove
								</a>
							</div>
						</div>
					</div>
				</li>';

		return $list;
	}

}