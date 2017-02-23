<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller 
{
	 function  __construct(){
		parent::__construct();
		$this->load->library('paypal_lib');
		$this->load->model('product');
	 }
	 
	 function success(){
        $data['content'] = 'paypal/success';
		$this->load->view('plain',$data);
	 }
	 
	 function cancel(){
        $data['content'] = 'paypal/cancel';
		$this->load->view('plain',$data);
	 }

	 public function ipnd()
	 {
	 	$paypalInfo = $this->input->post();
	 	$paypalURL = $this->paypal_lib->paypal_url;
	 	$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);

	 	if(preg_match("/VERIFIED/i",$result) && $paypalInfo['payer_status'] == 'verified' ){
		 	$data = array(
	 			'user_id'	=>	$paypalInfo['payer_id'],
	 			'txn_id'	=>	$paypalInfo['txn_id'],
	 			'payment_status' =>	$paypalInfo['payment_status'],
	 			'payment_gross'	=>	$paypalInfo['mc_gross'],
	 			'currency_code'	=>	$paypalInfo['mc_currency'],
	 			'payer_email'	=>	$paypalInfo['payer_email'],
	 			'payment_data'	=>	$result,
	 		);
	 		$this->db->trans_start();
	 		$this->product->insertTransaction($data);
	 		$this->db->trans_complete();
	 	}
	 }
	 
	 function ipn(){
	 	$paypalInfo = $this->input->post();
	 	$paypalURL = $this->paypal_lib->paypal_url;
	 	
	 	$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);

	 	$exist = $this->helper_model->row_exist(array('txn_id'=>$paypalInfo['txn_id']),'payments');

	 	if(preg_match("/VERIFIED/i",$result) && $paypalInfo['payer_status'] == 'verified' && ($exist == false) ){
	 		$data = array(
	 			'user_id'	=>	$paypalInfo['custom'],
	 			'txn_id'	=>	$paypalInfo['txn_id'],
	 			'payment_status' =>	$paypalInfo['payment_status'],
	 			'payment_gross'	=>	$paypalInfo['mc_gross'],
	 			'currency_code'	=>	$paypalInfo['mc_currency'],
	 			'payer_email'	=>	$paypalInfo['payer_email'],
	 			'payment_data'	=>	json_encode($paypalInfo),
	 		);
	 		$this->db->trans_start();
	 		$this->product->insertTransaction($data);
	 		$this->db->trans_complete();

	 		if ( $this->db->trans_status() ){ // check if transaction is successfull.
	 			$this->db->update('tbl_orders',array('status'=>0),array('order_id'=>$paypalInfo['item_number']));
	 			$this->db->update('tbl_users',array('user_status'=>0),array('user_id'=>$paypalInfo['custom']));
	 		}
	 	}
    }
}