<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin
 *
 * @author elddenmedio
 */
 
 //$this->caching_page();

class Admin extends Eldd_Controller {

	function __construct ( ) {
		parent::__construct();
                
                log_message('info', 'Admin Controller Initialized');
                
                $this->auth->is_logged();
                
                $this->page_title   = 'Admin';
	}
        
        /*
         * Internal Admin Route
         * 
         * Display URI request page
         * 
         * @access  public
         * @param   string      -uri param page
         */
        public function int_route ( $page, $offset = 0 ) {
            switch( $page){
                case 'quotations':
                    $this->view_data['files']   = array_values(array_diff(scandir(SAVE_PDF), array('.', '..')));
                    break;
                case 'products':
                    $this->view_data['products']= $this->pm->get_all();
                    $this->pagination_type		= 1;
                    $this->offset				= $offset;
                    break;
                case 'users':
                    $this->view_data['users']   = $this->auth->get_users();
                    $this->pagination_type		= 2;
                    $this->offset				= $offset;
                    break;
                case 'index':
                    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
                    $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="mexico, mx")';
                                //"select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22nome%2C%20ak%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
                    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
                    // Make call with cURL
                    $session = curl_init($yql_query_url);
                    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
                    $json = curl_exec($session);
                    // Convert JSON to PHP object
                    $this->view_data['phpObj']  =  ($json);
                    
                    $url        = 'https://www.banamex.com/mobile/convertidor-de-divisas.html';//'https://www.banamex.com/economia-finanzas/es/mercado-de-divisas/';
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_URL, $url);
                    $url_data = curl_exec($ch);
                    curl_close($ch);
                    $this->view_data['currency']= $url_data;
                    break;
            }
            
            $this->render_page($page);
        }
}

/* End of file Admin.php */
/* Location: ./application/controllers/admin/Admin.php */
