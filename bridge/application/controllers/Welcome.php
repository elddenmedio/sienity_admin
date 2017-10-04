<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Eldd_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('public/index');
		$this->load->view('welcome_message');
	}
        
        /*
         * REDIRECT HOME
         */
        public function redirect_home ( ) {
            redirect('public');
        }
        
        /*
         * TESTING MAIL
         * 
         * Display mail template with test variables
         * 
         * @access  public
         */
        public function vew_mail ( ) {
            $data       = array(
                                'to_name'       => utf8_encode('tania mendoza garcia'),
                                'ammount'       => 12887.48,
                                'expire_time'   => '7 de octubre del 2017',
                                'delivery'      => '3|5|días',
                            );
            
            $this->load->view('mails/quotation_mail', $data);
        }
}
