<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->driver('cache');

		$access = $this->session->userdata('user_level');
		if( ! hasAccess($access,[1,2,4]) )
			redirect('No_access','refresh');
	}

	public function index($id = '')
	{
		$data['style'][] = 'assets/css/jquery-ui.custom.css';
		$data['style'][] = 'assets/css/jquery.gritter.css';
		$data['style'][] = 'assets/css/select2.css';
		$data['style'][] = 'assets/css/datepicker.css';
		$data['style'][] = 'assets/css/bootstrap-editable.css';
		$data['content'] = 'host/profile_view';
		
		$data['can_edit'] = $this->canEdit([1,2,4]);

		$data['users'] = $this->getUserInfo($id);
		if( ! $data['users'] ){
			$data['content'] = 'errors/error_500';
		}

		$this->load->view('base',$data);
	}

	public function update(){
		$name = $this->input->post('name');
		$pk = $this->input->post('pk');
		$value = $this->input->post('value');
		$user_id = $this->input->post('pk');
		$table = $this->input->post('table');


		$table = ( $table == 'tu' ) ? 'tbl_users' : 'tbl_user_infos';

		$row_exist = $this->helper_model->row_exist(array('user_id'=>$user_id),$table);

		$data = array($name=>$value);

		if( $row_exist ){
			$where = array('user_id'=>$user_id);
			$data['updated_by'] = $user_id;
			$res = $this->db->update($table,$data,$where );
		}else{
			$data['user_id'] = $user_id;
			$data['created_at'] = date('Y-m-d H:i:s');
			$res = $this->db->insert($table,$data);
		}

		return $res;
	}

	public function canEdit($array){

		if( empty($array) ){
			return false;
		}else{
			$acceess = $this->session->userdata('user_level');
			if( !empty( array_intersect($acceess, $array) ) )
				return true;
				return false;
		}
	}

	public function getUserInfo($id = ''){
		if( $id != '' ){
			$user_id = $id;
		}else{
			$user_id = $this->session->userdata('user_id');
		}
		$info = $this->helper_model->query_table('*','tbl_users',array('user_id'=>$user_id),'row');

		if( empty($info) ) return false;


		// Check if user login can access $id
		if( hasAccess($this->session->userdata('user_level'),[1,2]) ){

		}else{
			if( $this->session->userdata('user_id') != $info->user_id )
				return false;
		}


		$personal = $this->helper_model->query_table('*','tbl_user_infos',array('user_id'=>$user_id),'row');

		$user_info = compact('info','personal');
		return $user_info;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */