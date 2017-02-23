<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audit_trail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('php_functions/audit_trail_model','atm');
    }

    public function index()
    {
        $data = array(
            'content' => 'php_functions/audit_trail_view',
            'audit_list' => $this->get_audits()
            );
        $data['style'][] = 'assets/css/daterangepicker.css';
        $this->load->view('base',$data);
    }

    public function get_audits(){
    	return $this->helper_model->query_table('DISTINCT audit_name','tbl_audit_trail','','array');
    }

    public function get_audit_data(){
    	$audit_data = serializeToArray($this->input->post('data'));
        $user_id = $audit_data['user_id'];
    	$audit_name = $audit_data['audit_name'];
    	$data_id = $audit_data['data_id'];
    	$filter_date = $audit_data['filter_date'];

    	// get login trails
    	$login_trails = ($user_id) ? $this->atm->get_login_trails($user_id) : '';
    	$audit_trails = $this->atm->get_audit_trails($user_id,$data_id,$filter_date,$audit_name);
        //print_r($this->db->last_query());exit();

    	if( array_filter($audit_data) ){
            if( $login_trails ){
                $user_name = $this->helper_model->query_table('CONCAT_WS( ", ", f_name,l_name )','sample_employee',array('employee_id',$user_id),'single');
    		    $res = $this->create_audit_log($user_name,$login_trails,$audit_trails);
            }else {
                $res = $this->create_audit($audit_trails);
            }
    		echo json_encode($res);
    	}else{
    		echo json_encode('No records found.');
    	}
    }

    function create_audit($audit_trails){
        $audit_body = '<ol class="list-unstyled">';
        $date_saver = 0;
        $audit_data = '';
        foreach ($audit_trails as $key => $value) {
            $date_header = explode(' ', $value->audit_date)[0];

            if( $date_header != $date_saver ){
                $audit_data .= '<li>'.date('F j, Y', strtotime($date_header)).$this->auditLogs($date_header,date('Y-m-d', strtotime($date_header. "+1 days")),$audit_trails).'</li>';
                $date_saver = $date_header;
            }
        }
        return $audit_body.$audit_data.'</ol>';
    }

    function auditData($date_header,$audit_trails){

    }

    function create_audit_log($user_name,$login_trails,$audit_trails){
    	$header_name = '<h3 class="header smaller lighter blue no-margin-top text-capitalize">'.$user_name.'</h3>';
    	$log_body = '<ol class="list-unstyled">'.$this->logDates($login_trails,$audit_trails).'</ol>';
    	return $header_name.$log_body;
    }

    function logDates($login_trails,$audit_trails){
    	$login = '';
    	$date_saver = 0;
        // list all login dates
    	foreach ($login_trails as $key => $value) {
    		$date_header = explode(' ', $value->login)[0];
            // check if login has the same date. | only display one login date
    		if( $date_header != $date_saver ){
    			$login .= '<li>'.date('F Y', strtotime($date_header)).$this->logList($date_header,$login_trails,$audit_trails).'</li>';
    			$date_saver = $date_header;
    		}
    	}
    	return $login;
    }

    function logList($date_header,$login_trails,$audit_trails){
		$logs =  '<ul class="list-unstyled h-space-12 spaced">';
        // list all login datetime in every date respectively
		foreach ($login_trails as $key => $value) {
			$date_logs = explode(' ', $value->login)[0];
            // get next login datetime for every audit data to be included on each login date.
			$next_login = ( next($login_trails) ) ? current($login_trails)->login : $date_logs.' 23:59:59';
			if( $date_header == $date_logs ){
				$logs .= '<li>Login: '.date('F j, Y, g:i:s a', strtotime($value->login)).$this->auditLogs($value->login,$next_login,$audit_trails).'</li>';

			}
		}
		return $logs.'</ul>';
    }

    function auditLogs($date_header,$next_login,$audit_trails){
    	$audit_logs = '<ol class="list-unstyled h-space-12 ss">';
        // list all audit data in every login date respectively.
    	foreach ($audit_trails as $key => $val) {
    		$a_date = new DateTime($val->audit_date);
    		$h_date = new DateTime($date_header);
    		$n_date = new DateTime($next_login);
    		switch ($val->audit_type) {
    			case 'insert': $color_class = 'text-success'; break;
    			case 'update': $color_class = 'text-warning-lighter'; break;
    			case 'delete': $color_class = 'text-danger'; break;
    		}

    		$a_data = unserialize($val->audit_data);
    		if( ($a_date > $h_date) && ($a_date < $n_date) ){  

    			$a_data_list = '<div class="well well-sm">';

    			foreach ($a_data as $i => $v) {
	    			if( $val->audit_type == 'insert' ){
	    				$a_data_list .= '<span class="'.$color_class.'">'.$i.': '.$v[0].'</span></br>';
	    			}else{
	    				$a_data_list .= '<span class="'.$color_class.'">'.$i.'_old: '.$v[0].'</span> | '.$i.'_new: '.$v[1].'</br>';
		    		}
		    	}
		    	$a_data_list = $a_data_list.'</div>';
    			$audit_logs .= '<li class="'.$color_class.'"><i class="ace-icon fa fa-caret-right text-muted"></i>
    				<span class="text-uppercase">'.$val->audit_type.'</span> | '.$val->audit_name.' | '.date('F j, Y, g:i:s a', strtotime($val->audit_date)).' </li>
    				'.$a_data_list;
    		}
    		//if( $a_date >= $n_date ) {break;}
    	}
    	return $audit_logs.'</ol>';
    }

}