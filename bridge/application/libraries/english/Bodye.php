<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bodye
{
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	public function __construct()
	{
		log_message('debug', "HeaderSpanish Class Initialized");
	}
	
    function _message()
    {
        $data = array('test_parse' => 'ingles',
                        //TITLES PAGE (INDICATE IN WHAT PAGE YOU ARE)
                        'title_page_1'		=>	'pricing tables',
                        'title_page_2'		=>	'faq',
                        'title_page_3'		=>	'contact us',
                        
                        /*
                         * Services
                         */
                        //title
                        'services_pack_1'	=>	'enterprise',
                        'services_pack_2'	=>	'professional',
                        'services_pack_3'	=>	'standard',
                        'services_pack_4'	=>	'download',
                        //tags {services}
                        'service_tag_1'		=>	'popular',
                        'service_tag_2'		=>	'new',
                        //type service
                        'service_type_1'	=>	'disk space',
                        'service_type_2'	=>	'monthly bandwidth',
                        'service_type_3'	=>	'email accounts',
                        'service_type_4'	=>	'subdomains',
                        'service_type_5'	=>	'data base',
                        
                    );
        
        return $data;
    }
}
