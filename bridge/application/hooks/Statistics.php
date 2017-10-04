<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Statistics {
	
	public function visit_pages(){
		$CI =& get_instance();
		
		$CI->load->library('user_agent');
		
		$data = array();
		
		$data['user_id']			= ( $CI->session->userdata('id') == 0) ? NULL : $CI->session->userdata('id');
		$data['level']				= ( $CI->session->userdata('level') == 0) ? NULL : $CI->session->userdata('level');
		$data['page']				= $CI->uri->uri_string(); 
		$data['ip']					= $CI->input->ip_address(); 
		$data['client_ip']			= ( ! isset($_SERVER['HTTP_CLIENT_IP'])) ? NULL : $_SERVER['HTTP_CLIENT_IP']; 
		$data['x_forwarded_for']	= ( ! isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? NULL : $_SERVER['HTTP_X_FORWARDED_FOR']; 
		$data['x_forwarded']		= ( ! isset($_SERVER['HTTP_X_FORWARDED'])) ? NULL : $_SERVER['HTTP_X_FORWARDED'];
		$data['forwarded_for']		= ( ! isset($_SERVER['HTTP_FORWARDED_FOR'])) ? NULL : $_SERVER['HTTP_FORWARDED_FOR'];
		$data['forwarded']			= ( ! isset($_SERVER['HTTP_FORWARDED'])) ? NULL : $_SERVER['HTTP_FORWARDED'];
		$data['remote_addr']		= ( ! isset($_SERVER['REMOTE_ADDR'])) ? NULL : $_SERVER['REMOTE_ADDR'];
		$data['user_agent']			= $CI->input->user_agent();
		$data['request_headers']	= '';//$CI->input->request_headers(); 
		$data['get_request_header']	= '';//$CI->input->get_request_header(); 
		$data['class']				= $CI->router->class;
		$data['method']				= $CI->router->method;
		$data['date']				= time(); 
		$data['accept_lang']		= $CI->agent->accept_lang();
		$data['accept_charset']		= $CI->agent->accept_charset();
		$data['referrer']			= $CI->agent->referrer();
		$data['platform']			= $CI->agent->platform();
		$data['robot']				= $CI->agent->robot();
		$data['mobile']				= $CI->agent->mobile();
		$data['browser']			= $CI->agent->browser();
		$data['version']			= $CI->agent->version();
		$data['flag']				= 0;
		
		$CI->db->insert('visit_stats', $data);
	}
	
}
