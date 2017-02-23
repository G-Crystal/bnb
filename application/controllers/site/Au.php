<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Au extends CI_Controller {

	public function index()
	{
		/*$page = $this->input->get('page');
		$this->load->view('pages/bnbkeeper/au/'.$page);*/

		$page = $this->input->get('page');
		$data['content'] = 'pages/bnbkeeper/au/'.$page;
		$this->load->view('page',$data);
	}

}