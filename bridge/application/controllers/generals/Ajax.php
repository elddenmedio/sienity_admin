<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Ajax
 *
 * @author elddenmedio
 */
 
 //$this->caching_page();

class Ajax extends Eldd_Controller {

	function __construct ( ) {
		parent::__construct();
                
                log_message('info', 'Ajax Controller Initialized');
	}
        
        /*
         * Validate SKU
         * 
         * Validate if SKU exist or is new product
         * 
         * @access  public
         */
        public function validate_sku ( ) {
            if( $this->input->is_ajax_request() && $this->input->post('info')){
                $validate   = $this->security->xss_clean($this->input->post('info'));
                
                if( $this->pm->finder($validate, 'sky')){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
        }
        
        /*
         * Auto complete
         * 
         * Search product by typing world by world
         * 
         * @access  public
         * @return onject
         */
        public function autocomplete ( ) {
            if( $this->input->is_ajax_request() && $this->input->post('info')){
                $to_find    = $this->security->xss_clean($this->input->post('info'));
                $type       = $this->security->xss_clean($this->input->post('type'));
                
                $search     = $this->pm->finder($to_find, $type);
                
                if( $search !== FALSE){
                    $data['search'] = $search;
                    
                    switch($type){
                        case 'sku':
                            $_view  = 'products';
                            break;
                        case 'rfc':
                            $_view  = 'rfc';
                            break;
                    }
                    
                    print_r($this->load->view('products/list_' . $_view, $data, TRUE));
                }
            }
        }
        
        /*
         * Add product
         * 
         * Load the add product template
         * 
         * @access  public
         * @return  object
         */
        public function add_product ( ) {
        	$data['sec']	= date("is");
        	
        	print_r($this->load->view('products/new_product', $data, TRUE));
        }
        
        /*
         * Delete Product
         * 
         * Get id product to make logic erase
         * 
         * @access  public
         */
        public function delete_product ( ) {
            if( $this->input->is_ajax_request() && $this->input->post('product_id')){
                $product_id     = $this->security->xss_clean($this->input->post('product_id'));
                
                $product        = $this->pm->delete_activate_product($product_id, 1);
            }
        }
        
        /*
         * Activate Product
         * 
         * Get id product to re-activate
         * 
         * @access  public
         */
        public function activate_product ( ) {
            if( $this->input->is_ajax_request() && $this->input->post('product_id')){
                $product_id     = $this->security->xss_clean($this->input->post('product_id'));
                
                $product        = $this->pm->delete_activate_product($product_id, 0);
            }
        }
        
        /*
         * Update Product
         * 
         * Get all inputs product to update by id
         * 
         * @access  public
         */
        public function update_product ( ) {
            if( $this->input->is_ajax_request()){
                foreach($this->input->post() as $item => $value){
                    ${$item}    = $value;
                }
                var_dump($this->input->post());
                
                
                $update = array(
                                'sku'       => $sku,
                                'name'      => $name,
                                'description'=>$description,
                                'stock'     => $stock,
                                'price'     => $price
                            );
                
                //$this->pm->update_product($id, $update);
            }
        }
        
        /*
         * Get All PDF´s from day
         * 
         * Get All PDF´s from folder selected
         * 
         * @access  public
         * @return  object
         */
        public function get_pdf_quotations ( ) {
            if( $this->input->is_ajax_request() && $this->input->post('quotation_folder')){
                $to_find    = $this->security->xss_clean($this->input->post('quotation_folder'));
                $search     = array_values(array_diff(scandir(SAVE_PDF . '/' . str_replace('-', '', trim($to_find))), array('.', '..')));
                
                if( $search !== FALSE){
                    $data['search'] = $search;
                    $data['day']    = trim($to_find);
                    
                    print_r($this->load->view('quotation/list_quotations', $data, TRUE));
                }
            }
        }
}

/* End of file Ajax.php */
/* Location: ./application/controllers/generals/Ajax.php */
