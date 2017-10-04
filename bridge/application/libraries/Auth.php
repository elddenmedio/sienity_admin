<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth{
	protected	$CI;
	
	public		$sess_array 		= array();
        
        var             $tables                 = array('login');
        var             $column_table           = array('level', 'email', 'name', 'erased', 'id', 'password');


        /*
         * CONSTRUCTOR
         */
	public function __construct(){
		$this->CI =& get_instance();
	}
	
	/**
	 * Login
         * 
         * Validate if the data from form are correct or not
         * 
         * @access public
         * @param string $usr Username to login
         * @param strign $psw Password to login
         * @param string $where Column to validate username
         * @return bool
	 */
	public function login_user( $usr = '', $psw = '', $where = NULL ){

		$result = $this->CI->db->get_where($this->tables[0], array($where => $usr, $this->column_table[5] => $psw))->row();
		
		return ($result) ? TRUE : FALSE;
	}
	
	/**
	 * Create Session
         * 
         * Create session when the user exist
         * Create cookie
         * 
         * @access public
         * @param string $usr Username to login
         * @param strign $psw Password to login
         * @param string $where Column to validate username
	 */
	public function create_session( $usr = '', $psw = '', $where = NULL ){
		
                $result		= $this->CI->db->get_where($this->tables[0], array($where => $usr, $this->column_table[5] => $psw))->row();
		
    	$this->CI->session->set_userdata('id', $result->id);
    	$this->CI->session->set_userdata('email', $usr);
    	$this->CI->session->set_userdata('level', $result->level);
        $this->CI->session->seT_userdata('name', $result->name);
    	
    	$cookie		= array(
							'name'   => 'sienity_session',
							'value'  => '57',
							'expire' => '86500',
							'domain' => '.' . base_url(),
							'path'   => '/',
							'prefix' => '',
							'secure' => TRUE
						);

		$this->CI->input->set_cookie($cookie);
	}
	
	/**
	 * Is Logged
         * 
         * Detect if the user how can access some Controller is legged
         * 
         * @access public
	 */
	public function is_logged(){
		if( empty($this->CI->session->userdata('id')) ){
			redirect(site_url(), 'refresh');
		}
	}
        
        /*
         * Get Users
         * 
         * Get All Users
         * 
         * @access  public
         * @return  array
         */
        public function get_users ( ) {
            return $this->CI->db->get_where($this->tables[0], array($this->column_table[3] => 0))->result();
        }
	
	/**
	 * Get Level (permissions)
	 */
	public function get_level(){
		return ( empty($this->CI->session->userdata('level'))) ? LEVEL_PUBLIC : $this->CI->session->userdata('level');
	}
	
	/**
	 * Has Permissions
	 */
	public function has_permission( $level = '' ){
		if($this->get_level() != $level){
        	redirect(base_url(), 'refresh');
        }
	}
	
	/**
	 * Register User
         * 
         * Insert New User
         * 
         * @access  public
         * @return  number
	 */
	public function insert_user(  ){
                foreach($this->CI->input->post() as $item => $value){
                    ${$item}        = $value;
                }
                
                $insert     = array(
                                    'level'     => $level,
                                    'email'     => $email,
                                    'name'      => $name,
                                    'password'  => $password,
                                    'user_up'	=> $this->CI->session->userdata('id')
                                );
                
                $this->CI->db->insert('login', $insert);
                
                return $this->CI->db->insert_id();
    }
	
	/**
	 * Logout
         * 
         * Close session
         * Destroy session
         * Redirect to main page
         * 
         * @access public
	 */
	public function logout(){
		//$this->ci->session->unset_userdata(array('email', 'password'));
		$this->CI->session->sess_destroy();	
		//$this->CI->session->sess_create(); 
		$this->CI->session->set_flashdata('cerrada','La sessión se ha cerrado correctamente.');
		redirect(site_url(),'refresh');	
        }
}

/*
 * end libraries/Auth.php
 */
