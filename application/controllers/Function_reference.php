<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Function_reference extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'content'=>'function_reference/index',
			'functions'=>$this->helper_model->query_table( '*','tbl_function_reference','WHERE status = "0"','array' )
			);
		$this->load->view( 'base',$data );
	}

	public function code( $view ){
		$data = array(
			'title'=> 'Function Reference - '.$view,
			'content'=>'function_reference/'.$view,
			);
		$this->load->view( 'base',$data );
	}

}