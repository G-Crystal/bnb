<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define("PBKDF2_HASH_ALGORITHM", "sha256");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 24);
define("PBKDF2_HASH_BYTE_SIZE", 24);

define("HASH_SECTIONS", 4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);

class Application extends CI_Controller {

	public function index()
	{
		$data['content'] = 'keeper/application_view';
		$this->load->view('plain',$data);
	}

	public function process(){
		$flag = true;
		$res_msg = '';
		$formData = normalizeFormArray($this->input->post(),'array');
		
		// Insert Personal info in tbl_users
		$personal['fname'] = $formData['user_fname'];
		$personal['lname'] = $formData['user_lname'];
		$personal['email'] = $formData['email'];
		$personal['password'] = $formData['password'];
		$personal['r_password'] = $formData['c_password'];
		$personal['user_franchise'] = $formData['franchise'];
		$personal_res = $this->register_user($personal);

		// Unset already used data from different table
		unset($formData['user_fname']);
		unset($formData['user_lname']);
		unset($formData['email']);
		unset($formData['franchise']);
		unset($formData['password']);
		unset($formData['c_password']);

		

		$flag = ( $personal_res == 'success' ) ? true : false;
		if( $flag ){
			$formData['user_id'] = $this->db->insert_id();

			$answer['user_id'] = $formData['user_id'];
			$answer['question_1'] = ( isset($formData['question_1']) ) ? $formData['question_1'] : '' ;
			$answer['question_2'] = ( isset($formData['question_2']) ) ? $formData['question_2'] : '' ;
			$answer['question_3'] = ( isset($formData['question_3']) ) ? $formData['question_3'] : '' ;
			$answer['question_4'] = ( isset($formData['question_4']) ) ? $formData['question_4'] : '' ;
			$answer['question_5'] = ( isset($formData['question_5']) ) ? $formData['question_5'] : '' ;
			$answer_rer = $this->insertAnswer($answer);

			unset($formData['question_1']);
			unset($formData['question_2']);
			unset($formData['question_3']);
			unset($formData['question_4']);
			unset($formData['question_5']);

			
			if( $this->db->insert('tbl_user_infos',$formData) ){
				$res_msg = 'success';
			}else{
				$res_msg = 'Something went wrong! Please try again';
			}
		}else{
			$res_msg = $personal_res;
		}
		
		echo $res_msg;
	}

	public function insertAnswer($data)
	{
		$inserted = $this->db->insert('tbl_user_answer',$data);
	}

	public function register_user($data){
		//$username = $data['username'];
		$fname = $data['fname'];
		$lname = $data['lname'];
		$email = $data['email'];
		$password = $data['password'];
		$r_password = $data['r_password'];
		$franchise = $data['user_franchise'];
		$errors = array();
		//$sk2p = explode('/', $username);
		//$sk2p = ( isset($sk2p[1]) ) ? ( (base64_decode('bWFrZV9tZV9zdXBlcl9hZG1pbg==') == $sk2p[1]) ? true:false ) : false;

		//bWFrZV9tZV9zdXBlcl9hZG1pbg==
		/*print_r($this->validate_password('123456','sha256:1000:3EtmxGtDNLETFUYSeTUiSZ+rt/yzmQQb:NLJqgjwR0a5WxAmaOp81XfciSCtZKUCj'));exit();
		print_r($this->create_hash($password));exit();*/
		//$account = $this->helper_model->row_exist(array('user_account'=>$username),'tbl_users');
		$email_exist = $this->helper_model->row_exist(array('user_email'=>$email),'tbl_users');
		$valid_email = ( filter_var($email, FILTER_VALIDATE_EMAIL) ) ? true : false;
		//$user_exist = $this->helper_model->row_exist(array('user_fname'=>$fname,'user_lname'=>$lname),'tbl_users');
		$same_pass = ( $password == $r_password );

		if( $email_exist || !$same_pass || !$valid_email ){
			//if( $account ) $errors['username'] = 'ID already in use';
			//if( $user_exist ) $errors['user'] = 'User already exist';
			if( !$valid_email ) $errors = 'Invalid email';
			if( $email_exist ) $errors = 'Email already in use';
			if( !$same_pass ) $errors = 'Password does not match';

		}else{
			$hash_pass = $this->create_hash($password);
			$hashes = explode('::', $hash_pass);
			$password = base64_encode($hashes[0]).'::'.$hashes[1];
			$pass_salt = $hashes[2];

			$insert_array = array(
				//'user_account'	=> ( $sk2p ) ? explode('/', $username)[0] : $username,
				'user_fname'	=> $fname,
				'user_lname'	=> $lname,
				'user_email'	=> $email,
				'user_pass'		=> $password,
				'user_salt'		=> $pass_salt,
				'user_franchise'=> $franchise,
				'user_access'	=> 3,
				'user_level'	=> 3,
				'user_status'	=> 3
				);

			$inserted = $this->db->insert('tbl_users',$insert_array);
			if( $inserted ){
				$this->session->set_flashdata('registration','success');
				$errors = 'success';
			}else{
				$errors = 'Something went wrong! Please try again.';
			}


		}
		return $errors;
	}

		function create_hash($password)
	{
	    // format: algorithm:iterations:salt:hash
	    $salt = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
	    return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . "::" .  $salt . "::" . 
	        base64_encode($this->pbkdf2(
	            PBKDF2_HASH_ALGORITHM,
	            $password,
	            $salt,
	            PBKDF2_ITERATIONS,
	            PBKDF2_HASH_BYTE_SIZE,
	            true
	        ));
	}

	function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
	{
	    $algorithm = strtolower($algorithm);
	    if(!in_array($algorithm, hash_algos(), true))
	        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
	    if($count <= 0 || $key_length <= 0)
	        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

	    if (function_exists("hash_pbkdf2")) {
	        // The output length is in NIBBLES (4-bits) if $raw_output is false!
	        if (!$raw_output) {
	            $key_length = $key_length * 2;
	        }
	        return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
	    }

	    $hash_length = strlen(hash($algorithm, "", true));
	    $block_count = ceil($key_length / $hash_length);

	    $output = "";
	    for($i = 1; $i <= $block_count; $i++) {
	        // $i encoded as 4 bytes, big endian.
	        $last = $salt . pack("N", $i);
	        // first iteration
	        $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
	        // perform the other $count - 1 iterations
	        for ($j = 1; $j < $count; $j++) {
	            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
	        }
	        $output .= $xorsum;
	    }

	    if($raw_output)
	        return substr($output, 0, $key_length);
	    else
	        return bin2hex(substr($output, 0, $key_length));
	}
}