<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home
 * 
 * This is the controller that provide all public webs pages
 *
 * @author elddenmedio
 */
 
 //$this->caching_page();

class Home extends Eldd_Controller {

	function __construct(){
		parent::__construct();
                
                log_message('info', 'HOME Controller Initialized');
	}

	/*
	 * Render Publics Pages
	 *
	 * If param is empty render the index page
	 * Else, render the page comes from URL
	 *
	 * @access	public
	 * @param	string
	 */
	public function routing_pages_local( $page = 'index' ){
		$this->render_page(( empty($page) || $page === 'public') ? 'index' : $page);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/public/Home.php */
