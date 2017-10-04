<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Errors
 * 
 * This is the controller that provide all errors
 *
 * @author elddenmedio
 */
 
 //$this->caching_page();

class Errors extends Eldd_Controller {

	function __construct(){
		parent::__construct();
                
                log_message('info', 'Error Controller Initialized');
	}

	/*
	 * Handle Error
	 *
	 * Manage the error by (int) type
	 *
	 * @access	public
	 * @param	number
         * @return      object
	 */
	public function handle_error( $type ){
            $type               = (int) $type;
            $_view              = ( in_array($type, array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17))) ? 1 : $type;
            
            print_r($this->get_handle_error($_view, $type));
	}
}

/* End of file Errors.php */
/* Location: ./application/controllers/generals/Errors.php */
