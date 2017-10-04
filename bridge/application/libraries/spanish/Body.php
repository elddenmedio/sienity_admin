<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Body
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
        $data = array(  'test_parse' => 'español',
        				
                        //TITLES PAGE (INDICATE IN WHAT PAGE YOU ARE)
                        'title_page_1'		=>	'lista de precios',
                        'title_page_2'		=>	'preguntas frecuentes',
                        'title_page_3'		=>	'contáctanos',
                        
                        /*
                         * Services
                         */
                        //title
                        'services_pack_1'	=>	'empresa',
                        'services_pack_2'	=>	'profesional',
                        'services_pack_3'	=>	'estándar',
                        'services_pack_4'	=>	'descargable',
                        //tags {services}
                        'service_tag_1'		=>	'popular',
                        'service_tag_2'		=>	'nuevo',
                    	//type service
                        'service_type_1'	=>	'espacio en disco',
                        'service_type_2'	=>	'ancho de banda mensual',
                        'service_type_3'	=>	'cuentas de email',
                        'service_type_4'	=>	'subdominios',
                        'service_type_5'	=>	'base de datos',
                        
                    );
        
        return $data;
    }
}