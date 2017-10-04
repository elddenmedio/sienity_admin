<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Headere
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
        $data = array(
                        //--
                        //MENU
                        //--
                        //General
                        'top_menu_1'                => 'Users',
                        'top_menu_2'                => 'Products',
                        'top_menu_3'                => 'Quotations',
                        'top_menu_1_1'              => 'All',
                        'top_menu_1_2'              => 'New',
                        //God
            
                        //--
                        //LEVELS
                        //--
                        'level_admin'               => 'Admin',
                        'level_sales'               => 'Sales',
                        
                        //--
                        //MESSAGES
                        //--
                        //error, warning, succes
                        'message_login_error'=>'Email or Username are incorrect',
                        'unvalid_pack'		=> 'The pack selected is invalid',
                        //form validation
                        'domain'			=> 'domain',
                        'username'			=> 'username',
                        'password'			=> 'password',
                        'passconf'			=> 'password confirm',
                        'email'				=> 'email',
                        //general worlds
                        'login'				=> 'Ingresar',
                        'logout'                        => 'Logout',
                        'updated'                       => 'Updated',
                        'update'                        => 'Update',
                        'users'                         => 'Users',
                        'user'                          => 'user',
                        'products'                      => 'Products',
                        'product'                       => 'product',
                        'quotations'                    => 'Quotations',
                        'quotation'                     => 'quotation',
                        'sku'                           => 'SKU',
                        'name'                          => 'name',
                        'picture'                       => 'picture',
                        'description'                   => 'description',
                        'stock'                         => 'stock',
                        'price'                         => 'price',
                        'actions'                       => 'actions',
                        'level'                         => 'level',
                        'email'                         => 'email',
                        'dateup'                        => 'date UP',
                        'make'                          => 'make',
                        'project'                       => 'project',
                        'to'                            => 'to',
                        'phone'                         => 'phone number',
                        'address'                       => 'address',
                        'discount'                      => 'discount',
                        'qty'                           => 'quantity',
                        'purchase'                      => 'purchase',
                        'add'                           => 'add',
                        'shipping_cost'                 => 'shipping cost',
                        'delivery_time'                 => 'delivery time',
                        'of'                            => 'of',
                        'folder'                        => 'folder',
                        'insert'                        => 'insert',
                        'full_name'                     => 'full name',
        				
                    );
        
        return $data;
    }
}
