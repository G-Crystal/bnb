<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$data['style'][] = 'assets/css/jquery-ui.custom.css';
		$data['style'][] = 'assets/css/jquery.gritter.css';
		$data['style'][] = 'assets/css/select2.css';
		$data['style'][] = 'assets/css/datepicker.css';
		$data['style'][] = 'assets/css/bootstrap-editable.css';
		$data['content'] = 'keeper/profile_view';
		$data['users'] = $this->getUserInfo();
		$this->load->view('base',$data);
	}

	public function update(){
		$name = $this->input->post('name');
		$pk = $this->input->post('pk');
		$value = $this->input->post('value');
		$user_id = $this->session->userdata('user_id');


		$table = ( $pk == 'tu' ) ? 'tbl_users' : 'tbl_user_infos';

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

	public function getUserInfo(){
		$user_id = $this->session->userdata('user_id');
		$info = $this->helper_model->query_table('*','tbl_users',array('user_id'=>$user_id),'row');
		$personal = $this->helper_model->query_table('*','tbl_user_infos',array('user_id'=>$user_id),'row');

		$user_info = compact('info','personal');
		return $user_info;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */