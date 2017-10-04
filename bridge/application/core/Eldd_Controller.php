<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Elddenmedio Core Controller
 *
 * Core del sistema
 * Desde aqui armamos todas las url´s
 * Desde aqui construimos las paginas que se renderizan
 * Desde aqui construimos el captcha para el login
 * Desde aqui construimos el menu desplegable dependiendo de que tipo de usuario sea
 * Desde aqui cambiamos de idioma
 *
 * Content List
 *
 * 1 - @public		Constructor		-	Overwritte Core Class, Get language
 * 2 - @protected	Directory		-	Get fetch directory
 * 3 - @protected	Class			-	Get Class
 * 4 - @protected	Method			-	Get Method
 * 5 - @public		Uri Segments	-	Get ALL URI SEGMENT
 * 6 - @public		Uri Segment		-	Get specific uri segment
 * 7 - @private		Language		-	Get language
 * 8 - @private		Language		-	Set language(language)
 * 9 - @public		Language		-	Choose language type(language)
 * 10- @private		Redirect		-	Render page with New language(language)
 * 11- @private		Words			-	Load language file
 * 12- @protected	Header			-	Get specific header
 * 13- @protected	Body			-	Get body same name as (/directory/{class.php}/{method}) in path (/views/{class}/{method}.php)
 * 14- @protected	Footer			-	Get specific footer
 * 15- @public		Title			-	Get title page
 * 16- @private		Menu			-	Get specific menu
 * 17- @public		Rand			-	Return random (1 - captcha, 2 - unique)
 * 18- @public		Captcha			-	Get captcha
 * 19- @public		Expire System	-	Get date to expire system (1 - try(30 days), 2 - buy(moths to end))
 * 20- @protected	Page			-	Build page (header, body, footer, data) - auto load alerts
 * 21- @public		Page			-	Render Page
 * 22- @public		User			-	Get user type(email, psw, where, uri)
 *
 * @author elddenmedio
 */

abstract class Eldd_Controller extends CI_Controller {
    
    var $router;
    var $leves				= array();
    
    public $page_title      = NULL;
    public $view_data       = array();
    public $message         = NULL;
    public $pagination_type	= NULL;
    public $offset			= 10;
    
    private $language       = FALSE;
    private $links			= 3;
    private $products_per_page          = 20;
    private $workers_per_page           = 10;
    
    /*
     * CONSTRUCTOR
     */
    function __construct ( ) {
        parent::__construct();
        
        $this->router =& load_class('Router', 'core');
        
        $this->_set_lang_language($this->get_language());
        log_message('debug', 'CORE Elddenmedio Loading');
    }
    
    //under construction
    public function redirect_url_selected ( $url ) {
    	$this->view_data['sub_title']			= 'title_page_3';
		
		$this->render_page();
    }
    
    /*
     * Get Folder
     *
     * Get the current folder to load the specific pages
     *
     * @access	public
     * @return	string
     */
    protected function _get_directory ( ) {
        return $this->router->fetch_directory();
    }
    
    /*
     * Get Class
     *
     * Get the current class
     *
     * @access	public
     * @return	string
     */
    protected function _get_class ( ) {
        return $this->router->fetch_class();
    }
    
    /*
     * Get Method
     *
     * Get current method to know what page the system needs to display
     *
     * @access	public
     * @return	string
     */
    protected function _get_method ( ) {
        return $this->router->fetch_method();
    }
    
    /*
     * Get URL segments
     *
     * Get all segments from url {folder/class/method/param1/param2/.../param(n)}
     *
     * @access	public
     * @return	string
     */
    public function get_uri_segments ( ) {
    	return $this->uri->uri_string();
    }
    
    /*
     * Get URL segment
     *
     * Get a specific segmente from url
     *
     * @access	public
     * @param	number
     * @return	string
     */
    public function get_uri_segment ( $segment = 0 ) {
    	return $this->uri->segment($segment);
    }
    
    /*
     * Get Language
     *
     * Get browser lang or set to default (es)
     *
     * @access	public
     * @return	string
     */
    public function get_language ( ) {
        $this->language		= ( empty($this->session->userdata('language'))) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : $this->session->userdata('language');
        $this->language         = ( empty($this->language)) ? 'en' : $this->language;
        $this->_set_language($this->language);

        return $this->language;
    }
    
    /*
     * Set language
     *
     * Set language in session
     *
     * @access	protected
     * @param	string
     */
    protected function _set_language ( $language ) {
    	$this->session->set_userdata('language', $language);
    	
    	$this->_set_lang_language();
    }
    
    /*
     * Set lang
     *
     * Set lang language
     * Load specific lang from session language
     *
     * @access	protected
     * @param	string
     */
    protected function _set_lang_language ( $language = '' ) {
    	switch($language){
    		case 'en':
    					$new	= 'english';
    					break;
    		case 'es':
    		default:
    					$new	= 'spanish';
    					break;
    	}
    	
    	//$this->lang->load('auth', $new);
    	$this->lang->load('calendar', $new);
    	$this->lang->load('date', $new);
    	$this->lang->load('db', $new);
    	$this->lang->load('email', $new);
    	$this->lang->load('form_validation', $new);
    	$this->lang->load('ftp', $new);
    	$this->lang->load('imglib', $new);
    	$this->lang->load('number', $new);
    	$this->lang->load('profiler', $new);
    	$this->lang->load('unit_test', $new);
    	$this->lang->load('upload', $new);
    }
    
    /*
     * Redirect
     * 
     * UNDER CONSTRUCTION
     *
     * Redirect page to change language page
     *
     * @access	public
     * @param	string
     * @return	array
     */
    public function redirect ( $language = NULL ) {
    	$this->_set_language($language);
    	
    	$uri				= array(
    								'direcotry'		=> $this->_get_directory(),
    								'class'			=> $this->_get_class(),
    								'method'		=> $this->_get_method(),
    								'language'		=> $this->get_language()
    								);

    	return $uri;
    }
    
    /*
     * Get Words
     *
     * Get specific language words to render
     *
     * @access	protected
     * @return	object
     */
    protected function _get_html_words ( ) {
        switch($this->get_language()){
            case 'en':
                        $this->body	= $this->headere->_message() + $this->bodye->_message();
                        break;
            case 'es':
            default:
                        $this->body	= $this->header->_message() + $this->body->_message();
                        break;
        }
        
        return $this->body;
    }
    
    /*
     * Get Header
     *
     * Get header for specific user level
     * The header page is from (views/{$this->get_directory}/header})
     *
     * @access	protected
     * @return	array
     */
    protected function _get_header ( ) {
        return $this->_get_directory() . 'header';
    }
    
    /*
     * Get Body
     *
     * Get specific body for every page to be rendered
     * If the variable $page is empty, it´ll be taken from (views/{$this->get_directory}/{$this->get_method})
     * Else the page will be (views/{$this->get_directory}/{$page})
     *
     * @access	protected
     * @param	string
     * @return	array
     */
    protected function _get_body ( $page = '' ) {
    	if( empty($page)){
        	return $this->_get_directory() . $this->_get_method();
        }
        else{
        	return $this->_get_directory() . $page;
        }
    }
    
    /*
     * Get Footer
     *
     * Get footer for specific user level
     * The footer page is from (views/{$this->get_directory}/footer})
     *
     * @access	protected
     * @return	array
     */
	protected function _get_footer ( ) {
        return $this->_get_directory() . 'footer';
    }
    
    /*
     * Get Title Page
     *
     * Set title page before to be rendered
     * If the method doesn´t be seted it´ll be set to the default
     *
     * @access	public
     * @return	string
     */
    public function _get_title_page ( ) {
        $opt            = ( ! isset($this->page_title)) ? '- Sienity - ' . $this->uri->segment(1) : 'Sienity - ' . $this->page_title;
        
        return $opt;
    }
    
    /*
     * Get Menu
     * 
     * UNDER CONSTRUCTION
     *
     * Get menu from DB to specific user level
     *
     * @access	protected
     * @return	array
     */
    protected function _get_menu ( ) {
    	switch($this->_get_directory()){
    		case 'god/':
    						$menu	= '';//$this->menu->read(LEVEL_GOD, 10);
    						break;
                case 'public/':
    		default:
    						$menu	= '';//$this->menu->read(LEVEL_PUBLIC, 1);
    						break;
    	}
    	
    	return $menu;
    }
    
    /*
     * Get Random
     *
     * Get random (number, alnum, unique, etc)
     * If set in the call method the length it will be seted ELSE the length will be 6
     *
     * @access	public
     * @param	number
     * @param	number
     * @return	string
     */
    public function get_rand ( $type = 0, $length = 6 ) {
    	switch($type){
    		case 2://random system
    				$rand		= random_string('alnum', $length);
    				break;
                case 1://capthca
    		default:
    				$rand		= random_string('alnum', $length);
    				break;
    	}
    	
    	return $rand;
    }
    
    /*
     * Get Page
     *
     * Make all page
     * -Language worlds & data sended from controller
     * -Menu
     * -Title
     * -Config from pagination
     * -Header
     * -Body
     * -Footer
     *
     * @access	protected
     * @param	string
     * @return	object
     */
    protected function _get_page ( $page = '' ) {
        $data           = $this->_get_html_words() + $this->view_data;
        
        //$data['menu']   = $this->_get_menu();
        $data['title']  = $this->_get_title_page();
        
        #UNDER CONSTRUCTION
        if( ! empty($this->pagination_type)){
        	$this->load->library(array('pagination', 'Jquery_pagination', 'table'));
        	$this->load->model('admin/pagination_model');
        	
			$config['base_url']		= base_url('index.php/admin-' . $page . '/');
			$config['div']			= '#pag_content';//asignamos un id al contendor general
			$config['anchor_class']	= 'page_link';
			$config['show_count']	= true;
			$config['total_rows']	= $this->pagination_model->num_rows($this->pagination_type);
			$config['num_links']	= $this->links;
			$config['first_link']	= '<i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i>';//->configuramos 
			$config['next_link']	= '<i class="fa fa-angle-right"></i>';//-------------->los links
			$config['prev_link']	= '<i class="fa fa-angle-left"></i>';//-------------->de anterior
			$config['last_link']	= '<i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>';//--->y siguiente
			$config['cur_tag_open']	= '<li class="active"><a href="#">';
			$config['cur_tag_close']= '</a></li>';
			$config['open_ajax_link']='<ul class="pagination pagination-lg">';
			$config['close_ajax_link']= '</ul>';
			//$config['num_tag_open']	= '';
			//$config['num_tag_close']= '';
        	
        	switch($this->pagination_type){
        		case 1://products
        				$config['per_page'] = $this->products_per_page;
        				$this->table->set_heading('#', '{sku}', '{name}', '{picture}', '{description}', '{stock}', '{price}', ( (int) $this->session->userdata('level') === 120) ? '{actions}' : '');
        				break;
        		case 2://workers
        				$config['per_page'] = $this->workers_per_page;
                                        if( (int) $this->session->userdata('level') === 120){
                                            $this->table->set_heading('#', '{level}', '{name}', '{email}', '{dateup}', '{actions}');
                                        }
                                        else{
                                            $this->table->set_heading('#', '{name}', '{email}', '{dateup}');
                                        }
        				break;
        		default:
        				break;
        	}
        	
        	$this->jquery_pagination->initialize($config);
        	
        	$this->_set_template();
                
                $_select        = ( $this->pagination_type === 2 && (int) $this->session->userdata('level') !== 120) ? 3 : $this->pagination_type;
        	
        	$html			= $this->table->generate($this->pagination_model->paginacion($_select, $config['per_page'], $this->offset)).
			$this->jquery_pagination->create_links();
			
			$data['table_pagination']	= $html;
                        $data['modal']  = $this->pagination_model->paginacion($this->pagination_type, $config['per_page'], $this->offset);
			
			$data['pagination']		= ( empty($data['modal'])) ? 'Lo sentimos por el momento no tiene datos' : $this->parser->parse('admin/list_pagination_' . $page, $data, TRUE);
        }
        
        //if( $this->auth->get_level() == LEVEL_GOD){
        //	$data['today_visitors']	= $this->get_charts->get_total_visitors(substr(time(), 0, 5));
        //}
        
        //$data['user_level'] = $this->auth->get_level();
        
        $this->parser->parse($this->_get_header(), $data);
        //$this->parser->parse('alerts', $data);
        $this->parser->parse($this->_get_body($page), $data);
        $this->parser->parse($this->_get_footer(), $data);
    }
    
    /*
     * Set Tables template
     * 
     * Set table to custom template
     * 
     * @access	protected
     */
    protected function _set_template ( ) {
    	$template		= array(
								'table_open'            => '<table class="table table-bordered">',

								'thead_open'            => '<thead>',
								'thead_close'           => '</thead>',

								'heading_row_start'     => '<tr>',
								'heading_row_end'       => '</tr>',
								'heading_cell_start'    => '<th>',
								'heading_cell_end'      => '</th>',

								'tbody_open'            => '<tbody>',
								'tbody_close'           => '</tbody>',

								'row_start'             => '<tr>',
								'row_end'               => '</tr>',
								'cell_start'            => '<td>',
								'cell_end'              => '</td>',

								'row_alt_start'         => '<tr>',
								'row_alt_end'           => '</tr>',
								'cell_alt_start'        => '<td>',
								'cell_alt_end'          => '</td>',

								'table_close'           => '</table>'
							);

		$this->table->set_template($template);
    }
    
    /*
     * Render Page
     *
     * Public render page
     *
     * @access	public
     * @param	string
     */
    public function render_page( $page = '' ){
		$this->_get_page($page);
    }
    
    /*
     * Caching Page
     *
     * Cache page for sertain seconds time
     *
     * @param	number
     */
    protected function caching_page( $cache_time = 10080 ){
    	$this->output->cache($cache_time);
    }
    
    /*
	 * Get Error
	 * 
	 * Get error page to display
	 * 
	 * @access  public
	 * @param   number      -type error
	 * @param   string      -error message
	 * @return  html
	 */
	public function get_handle_error ( $type = 0, $error = '' ) {
                $data['error']              = $error;

		return $this->load->view('alerts/errors/error_' . $this->session->userdata('language') . '_' . $type, $data, TRUE);
	}
    
    /*
     * UNDER REVISION
     */
    /*
    public function select_user_type( $email = NULL, $psw = NULL, $where = NULL, $uri = NULL ){
    	if( $this->auth->login_user($email, $psw, $where) === TRUE){
    		$this->auth->create_session($email, $psw, $where);
    		
    		//$result = $this->auth->check_system_is_active($this->session->userdata('id'));
    		
    		//if( $result === TRUE){
    		//echo $this->auth->get_level();
    			
    			switch($this->auth->get_level()){
    				case LEVEL_GOD:
    								redirect('god-', 'refresh');
    								break;
    				case LEVEL_SUPPORT:
    								//redirect('admin-support', 'refresh');
    								//break;
    				case LEVEL_MEMBER:
    								redirect('member', 'refresh');
    								break;
    				case LEVEL_BOS:
    				case LEVEL_SELLS:
    				default:
    								break;
    			}
    			
    		//}
    		//else{
    		//	echo 'ha expirado su sistema<br>tengo que checar como hacer esta parte';
    		//}
    	}
    	else{
    		$this->session->set_flashdata('login-e', 'message_login_error');
			
			redirect($this->uri, 'refresh');
		}
    }
    */
}

/* End of file Eldd_Controller.php */
/* Location: ./application/core/Eldd_Controller.php */
