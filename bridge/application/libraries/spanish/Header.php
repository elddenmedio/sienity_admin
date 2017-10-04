<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header
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
                        'top_menu_1'                => 'Ususarios',
                        'top_menu_2'                => 'Productos',
                        'top_menu_3'                => 'Cotizaciones',
                        'top_menu_1_1'              => 'Todos',
                        'top_menu_1_2'              => 'Nuevo',
                        //God
            
                        //--
                        //LEVELS
                        //--
                        'level_admin'               => 'Administrator',
                        'level_sales'               => 'Ventas',
                        
                        //--
                        //MESSAGES
                        //--
                        //error, warning, succes
                        'message_login_error'=>'El usuario o Email ingresado no existe',
                        'unvalid_pack'		=> 'El paquete que ha seleccionado es invalido',
                        //form validation
                        'domain'			=> 'dominio',
                        'username'			=> 'usuario',
                        'password'			=> 'contraseña',
                        'passconf'			=> 'confirmar contraseña',
                        'email'				=> 'email',
                        //general worlds
                        'login'				=> 'Ingresar',
                        'logout'                        => 'Salir',
                        'updated'                       => 'Actualizado',
                        'update'                        => 'Actualizar',
                        'users'                         => 'Usuarios',
                        'user'                          => 'usuario',
                        'products'                      => 'Productos',
                        'product'                       => 'producto',
                        'quotations'                    => 'Cotizaciones',
                        'quotation'                     => 'cotizacion',
                        'sku'                           => 'SKU',
                        'name'                          => 'nombre',
                        'picture'                       => 'imagen',
                        'description'                   => 'descripcion',
                        'stock'                         => 'stock',
                        'price'                         => 'precio',
                        'actions'                       => 'acciones',
                        'level'                         => 'permisos',
                        'email'                         => 'email',
                        'dateup'                        => 'date UP',
                        'make'                          => 'realizar',
                        'project'                       => 'proyecto',
                        'to'                            => 'para',
                        'phone'                         => 'teléfono',
                        'address'                       => 'dirección',
                        'discount'                      => 'descuento',
                        'qty'                           => 'cantidad',
                        'purchase'                      => 'pedido',
                        'add'                           => 'agregar',
                        'shipping_cost'                 => 'costo de envio',
                        'delivery_time'                 => 'tiempo de entrega',
                        'of'                            => 'de',
                        'folder'                        => 'carpeta',
                        'insert'                        => 'registrar',
                        'full_name'                     => 'nombre completo',
        				
                    );
        
        return $data;
    }
}
