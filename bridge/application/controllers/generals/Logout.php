<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Logout
 *
 * @author elddenmedio
 */
 
 //$this->caching_page();

class Logout extends Eldd_Controller {

	function __construct ( ) {
		parent::__construct();
                
                log_message('info', 'Logout Controller Initialized');
	}

	/*
	 * Logout
	 *
	 * Close session
         * DEstroy session
	 *
	 * @access	public
	 */
	public function index ( ) {
            $this->auth->logout();
        }
}

/* End of file Logout.php */
/* Location: ./application/controllers/generals/Logout.php */
