<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Login
 *
 * @author elddenmedio
 */
 
 //$this->caching_page();

class Login extends Eldd_Controller {

	function __construct ( ) {
		parent::__construct();
                
                log_message('info', 'Login Controller Initialized');
	}

	/*
	 * Validate Login
	 *
	 * Validate login with form_validation library and DB
         * Create session if login is success
	 *
	 * @access	public
	 */
	public function validate_login ( ) {
            if( $this->form_validation->run()){
                foreach($this->input->post() as $item => $value){
                    ${$item}    = $value;
                }
                
                if( $this->auth->login_user($email, $psw, 'email')){
                    $this->auth->create_session($email, $psw, 'email');
                }
                else{
                    $this->session->set_flashdata('error', '{the username or password are incorrect}.');
                    
                    print_r($this->get_handle_error(4));
                }
            }
            else{
                    $this->session->set_flashdata('error', validation_errors());
                    
                    print_r($this->get_handle_error(4));
            }
        }
        
        /*
         * Insert User
         * 
         * Insert new user
         * 
         * @access  public
         */
        public function insert_user ( ) {
            if( is_numeric($this->auth->insert_user())){
                $this->session->set_flashdata('success', 'A new user was inserted.');
                
                redirect('admin-users', 'refresh');
            }
            else{
                $this->session->set_flashdata('error', 'We have probles.<br>Try again please.');
                
                redirect('admin-new-user', 'refresh');
            }
        }
}

/* End of file Login.php */
/* Location: ./application/controllers/generals/Login.php */
