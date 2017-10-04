<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Update_g
 *
 * @author elddenmedio
 */
 
 //$this->caching_page();

class Update_g extends Eldd_Controller {

	function __construct ( ) {
		parent::__construct();
                
                log_message('info', 'Update_g Controller Initialized');
	}

	/*
         * Update Products
         * 
         * Update Product Info by id
         * 
         * @access  public
         */
        public function update_product ( ) {
            foreach($this->input->post() as $item => $value){
                ${$item}    = $value;
            }
            
            $update         = array(
                                    'sku'       => $sku,
                                    'name'      => $name,
                                    'description'=>$description,
                                    'stock'     => $stock,
                                    'price'     => $price,
                                    'updateUP'  => date("Y-m-d H:i:s"),
                                    'userUD'    => $this->session->userdata('id')
                                );
            
            $this->pm->update_product($id, $update);
            
            $this->session->set_flashdata('update', '{The product} ' . $name . ' {was updated!}');
            redirect('admin-products', 'refresh');
        }
        
        /*
         * Update Users
         * 
         * Update Product Info by id
         * 
         * @access  public
         */
        public function update_users ( ) {
            foreach($this->input->post() as $item => $value){
                ${$item}    = $value;
            }
            
            $update         = array(
                                    'name'      => $name,
                                    'email'     => $email,
                                    'user_up'   => $this->session->userdata('id'),
                                );
            
            $this->cm->update_customer($id, $update);
            
            $this->session->set_flashdata('update', '{The user} ' . $name . ' {was updated!}');
            redirect('admin-users', 'refresh');
        }
}

/* End of file Update_g.php */
/* Location: ./application/controllers/generals/Update_g.php */
