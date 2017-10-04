<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome/redirect_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
 * ERRORS
 */
$route['get_error/(:num)']      = 'generals/errors/handle_error/$1';

/*
 * SESSIONS
 */
$route['login']                 = 'generals/login/validate_login';
$route['logout']                = 'generals/logout';
$route['insert_user']           = 'generals/login/insert_user';

/*
 * ADMIN
 */
 $route['admin']                 = 'admin/admin/int_route/index';
 /*
$route['admin-(:any)']          = function ( $type = '' ){
                                        if( empty($type) || $type === 'index'){
                                            $_type  = 'index';
                                        }
                                        else{
                                            $_type  = $type;
                                        }

                                        return 'admin/admin/int_route/' . $_type;
                                    };
*/
$route['admin(.+)']				= function ( $type = '' ){
										$type		= ltrim($type, '-');
										
										$pos		= strpos($type, '/');

										if( ! $pos){
											if( empty($type) || $type === 'index'){
                                        	    $_type  = 'index';
                                        	}
                                        	else{
                                        	    $_type  = $type;
                                        	}
                                        	
                                        	return 'admin/admin/int_route/' . $_type;
										}
										else{
											$pos	= explode('/', $type);
											
											if( $pos[0] === 'users' || $pos[0] === 'products'){
                                        		if( $pos[1] === 0){
                                        			$offset	= 1;
                                        		}
                                        		else{
                                        			$offset	= $pos[1];
                                        		}
                                        		
                                        		return 'admin/admin/int_route/' . $pos[0] . '/' . $offset;
                                        	}
										}
                                    };

/*
 * AJAX
 */
$route['autocomplete']          = 'generals/ajax/autocomplete';
$route['add_product']		= 'generals/ajax/add_product';
$route['delete_product']        = 'generals/ajax/delete_product';
$route['activate_product']      = 'generals/ajax/activate_product';
$route['update_product']        = 'generals/ajax/update_product';
$route['get_quotation']         = 'admin/quotation/get_quotation';
$route['get_pdf_quotations']    = 'generals/ajax/get_pdf_quotations';
$route['validate_sku']          = 'generals/ajax/validate_sku';

/*
 * FORMS
 */
$route['update_product']        = 'generals/update_g/update_product';
$route['update_users']          = 'generals/update_g/update_users';
                                    
/*
 * PUBLIC
 */
$route['(:any)']                = 'public/home/routing_pages_local/$1';
