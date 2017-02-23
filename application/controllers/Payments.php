<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Payments extends CI_Controller
{
	function  __construct() {
		parent::__construct();
		$this->load->library('paypal_lib');
	}

	function index(){
		$res_api = $this->input->post('api_url');
		if( ! $res_api ){
			redirect('site','refresh');
		}
		$order_info = json_decode($res_api);
		//print_r($order_info);exit();
		//Set variables for paypal form
		$returnURL = base_url().'paypal/success'; //payment success url
		$cancelURL = base_url().'paypal/cancel'; //payment cancel url
		$notifyURL = base_url().'paypal/ipn'; //ipn url

		$logo = base_url().'assets/images/codexworld-logo.png';
		
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $order_info->item_name);
		$this->paypal_lib->add_field('item_number', $order_info->item_id);
		$this->paypal_lib->add_field('custom', $order_info->user_id);
		$this->paypal_lib->add_field('amount', $order_info->total);		
		$this->paypal_lib->image($logo);
		
		$this->paypal_lib->paypal_auto_form();
	}
}