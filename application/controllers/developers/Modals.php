<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Modals extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $data = array(
            'content' => 'developers/modals_view'
            );
        $data['style'][] = 'assets/css/jquery-ui.css';
        $this->load->view('base',$data);
    }

}