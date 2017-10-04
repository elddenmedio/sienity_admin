<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Quotation
 *
 * @author elddenmedio
 */
 
 //$this->caching_page();

class Quotation extends Eldd_Controller {

	function __construct ( ) {
		parent::__construct();
                
                log_message('info', 'Quotation Controller Initialized');
	}
        
        /*
         * PDF
         * 
         * Display PDF or HTML-PDF by option
         * 
         * @access  public
         * @param   array       -quotation
         * @param   number      -type to return
         */
        public function pdf_quotation ( $data = array(), $opt ) {
            if( count($data) < 1){
        		$data           = array(
                                    'title'     => 'Quotation',
                                );
            }
            
            if( $opt === 0){
                //echo 'load view quotation';
                //$this->load->view('quotation/view_quotation', $data);
                
                $this->session->set_flashdata('new_quotation', '{You create q new quotation, plase download it to send by email to custome <a href="' . base_url($this->session->userdata('file_download')) . '" download>Download</a>}');
                
                redirect('admin-new-quotation', 'refresh');
            }
            else{
                return $this->load->view('quotation/save_pdf', $data, TRUE);
            }
        }
        
        /*
         * Get Quotation
         * 
         * Validate form inputs
         * If product doesn`t exist save it with picture
         * Save quotation
         * Create Quotation ODF
         */
        public function get_quotation ( ) {
            if( empty($this->session->userdata('id')) || is_null($this->session->userdata('id'))){
                redirect(site_url(), 'refresh');
            }
            
            $this->load->helper('string');
            $this->load->library('upload');
            
            $unique         = 'SCT' . str_pad($this->pm->get_last_id(), 3, 0, STR_PAD_LEFT);//random_string('alnum', 16);
            
            #validate if exist sku
            $project        = $this->input->post('project', TRUE);
            $to             = $this->input->post('to', TRUE);
            $email          = $this->input->post('email', TRUE);
            $_sku           = $this->input->post('sku', TRUE);
            $_stock         = $this->input->post('stock', TRUE);
            $_price         = $this->input->post('price', TRUE);
            $_qty           = $this->input->post('qty', TRUE);
            $_name          = $this->input->post('name', TRUE);
            $_description   = $this->input->post('description', TRUE);
            $rfc_name		= $this->input->post('rfc_name', TRUE);
            $rfc			= $this->input->post('rfc', TRUE);
            $rfc_tel		= $this->input->post('rfc_tel', TRUE);
            $rfc_address	= $this->input->post('rfc_address', TRUE);
            $discount       = $this->input->post('discount', TRUE);
            $delivery		= $this->input->post('delivery', TRUE);
            $shipping_cost	= $this->input->post('shipping', TRUE);
            
            $delivery		= explode(' ', $delivery);
            
            $count_sku      = count($_sku);
            $_files_l       = array();
            
            $files          = $_FILES;
            $cpt            = count($_FILES['userfile']['name']);
            
            for($i=0; $i < $cpt; $i++){           
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

                $this->upload->initialize($this->_set_upload_options());
                $this->upload->do_upload();
                
                $_files_l[$i] = $this->upload->data('file_name');
            }
            
            for($i = 0; $i < $count_sku; $i++){
                if( is_null($this->pm->find_product($_sku[$i]))){#insert product
                    $insert_p   = array(
                                        'sku'           => $_sku[$i],
                                        'name'          => $_name[$i],
                                        'stock'         => ($_stock[$i] - $_qty[$i]),
                                        'price'         => $_price[$i],
                                        'description'   => $_description[$i],
                                        'img'           => $_files_l[$i],
                                        'user'          => $this->session->userdata('id')
                                    );
                    
                    $this->pm->insert_p('product', $insert_p);
                }
                
                #update stock
                $this->pm->update_stock($_sku[$i], $_qty[$i]);
                
                #insert customer info
                #find rfc if it buyed before with us
                $customer       = $this->cm->find_rfc($rfc);
                
                if( ! is_null($customer)){
                    $customer   = $this->cm->get_customer('rfc', trim($rfc))->id;
                }
                else{
                    $customer   = $this->cm->insert_customer($rfc, $rfc_name, $rfc_tel, $rfc_address);
                }
                
                #insert quotation
                    $insert_q   = array(
                    					'fk_customer'	=> $customer,
                                        'unique'        => $unique,
                                        'fk_product'    => $this->pm->find_product($_sku[$i])->id,
                                        'project'       => $project,
                                        'to'            => $to,
                                        'email'         => $email,
                                        'qty'           => $_qty[$i],
                                        'discount'      => ( empty($discount[$i])) ? 0 : $discount[$i],
                                        'delivery'		=> ( empty($delivery[0])) ? '3-5' : $delivery[0],
                                        'delivery_time'	=> ( empty($delivery[1])) ? 'd&iacute;as' : $delivery[1],
                                        'shipping_cost'	=> ( empty($shipping_cost)) ? 0 : $shipping_cost,
                                        'user'          => $this->session->userdata('id'),
                                    );
                    
                    $this->pm->insert_p('quotation', $insert_q);
            }
            
            $quotation      = $this->pm->get_quotation($unique);
            
            $product        = array();
            
            foreach($quotation as $item){
                $_product   = $this->pm->find_product_by_id($item->fk_product);
                
                $product[]  = array(
                                    'sku'       => $_product->sku,
                                    'stock'     => $_product->stock,
                                    'price'     => $_product->price,
                                    'name'      => $_product->name,
                                    'description'=>$_product->description,
                                    'qty'       => $item->qty,
                                    'discount'  => $item->discount,
                                    'img'		=> $_product->img
                                );
            }
            
            if( strlen($rfc_tel) === 10){
                preg_match("/(\d{2})(\d{4})(\d{4})/", $rfc_tel, $matches);
            }
            else{
                preg_match("/(\d{3})(\d{4})(\d{4})/", $rfc_tel, $matches);
            }
            
            $data['unique'] = $unique;
            $data['project']= $project;
            $data['to']     = $to;
            $data['email']  = $email;
            $data['products']=$product;
            $data['title']  = 'Quotation';
            $data['rfc']    = $rfc;
            $data['rfc_name']=$rfc_name;
            $data['rfc_address']=$rfc_address;
            $data['tel']    = $matches;//$rfc_tel;
            $data['delivery']= ( empty($delivery[0])) ? '3-5' : $delivery[0];
            $data['d_time']	= ( empty($delivery[1])) ? 'd&iacute;as' : $delivery[1];
            $data['shipping']= ( empty($shipping_cost)) ? 0 : $shipping_cost;
            $data['customer_n']=$this->cm->get_customer('rfc', trim($rfc))->name;
            $data['user']   = $this->cm->get_user_make_quotation($quotation[0]->user)->name;
            
            $date           = date("Ymd");
            
            $pdf            = $this->_create_pdf($data, $date);

            if( $pdf !== FALSE){
                $this->session->set_flashdata('success', 'the quotation will be DOWNLOAD automaticaly to send to your customer');
                $this->session->set_flashdata('file', UPLOADS_TEMP . $pdf);
            }
            else{
                $this->session->set_flashdata('error', 'Try again because the system has a problem.');
            }
            
            $this->pdf_quotation($data, 0, $pdf);
        }
        
        /*
         * Set Upload Options
         * 
         * @access  protectec
         * @return  array
         */
        protected function _set_upload_options ( ) {   
            //upload an image options
            $config                 = array();
            $config['upload_path']  = UPLOAD_PRODUCTS;
            $config['allowed_types']= '*';//'gif|jpg|png|jpeg|gif|bmp|raw|psd|tiff';
            $config['max_size']     = '0';
            $config['overwrite']    = FALSE;

            return $config;
        }
        
        /*
         * Create PDF
         * 
         * Create quotation and save it
         * 
         * @access  protected
         * @param   array       -quotation info
         * @param   date
         * @return  mixed
         */
        protected function _create_pdf ( $info, $date ) {
                #create folder directory
                if( ! is_dir(SAVE_PDF . '/' . $date)) {
                        mkdir(SAVE_PDF . '/' . $date, DIR_WRITE_MODE, TRUE);
                }

                //Load the library
	    	$this->load->library('html2pdf');
	    
	    	//Set folder to save PDF to
	    	$this->html2pdf->folder(SAVE_PDF . '/' . $date . '/');
	    
	    	//Set the filename to save/download as
	    	$this->html2pdf->filename($info['unique'] . '_' . strtoupper($info['rfc_name']) . '_' . strtoupper(url_title($info['project'], '_', TRUE)) . '.pdf');
	    
	    	//Set the paper defaults
	    	$this->html2pdf->paper('a4', 'portrait');
	    
	    	//Load html view
//                echo '<pre>';
//                var_dump($this->pdf_quotation($info, 1));
//                echo '</pre>';
//                die();
	    	$this->html2pdf->html(utf8_decode($this->pdf_quotation($info, 1)));
	    
	    	if( @$this->html2pdf->create('save')) {
                        $this->session->set_userdata('file_download', DOWNLOAD_PDF . '/' . $date . '/' . $info['unique'] . '_' . strtoupper($info['rfc_name']) . '_' . strtoupper(url_title($info['project'], '_', TRUE)) . '.pdf');
                        
                        $this->_send_mail($info, $date);
                        
	    		return $date . '/' . $info['unique'] . '_' . strtoupper($info['rfc_name']) . '_' . strtoupper(url_title($info['project'], '_', TRUE)) . '.pdf';
                        
	    	}
                else{
                        return FALSE;
                }
        }
        
        /*
         * Send Email
         * 
         * Send PHP Mail with attachment
         * Send quotation to customer
         * 
         * @access  protected
         * @param   array       -quotation info
         * @param   date
         * @return  bool
         */
        protected function _send_mail ( $info, $date ) {
            //    USING PHPMAILER
            //    require_once substr(FCPATH, 0, -8) . "mail_send.php";
            //    
            //    $send_mail  = new PHPMailer();
            //    $send_mail->IsHTML();
            //    $send_mail->IsMail();
            //    $send_mail->From = 'noreplay@elddenmedio.site';
            //    $send_mail->FromName = 'Eldd-System';
            //    $send_mail->AddAddress('jorge.malagon@transidmedia.com');
            //    $send_mail->Subject = 'Quotation';
            //    $send_mail->Body = $this->load->view('mails/send_quotation', '', TRUE);
            //    $mailresult = $send_mail->Send();
            //    $mailconversation = nl2br(htmlspecialchars(ob_get_clean())); //captures the output of PHPMailer and htmlizes it
            //    if ( !$mailresult ) {
            //            echo 'FAIL: ' . $send_mail->ErrorInfo . '<br />' . $mailconversation;
            //            log_message('error', 'Error Sending mail to : ' . $info['email'] . ' with quotation : ');
            //    } else {
            //            echo $mailconversation;
            //            log_message('info', 'Sended maikl to ' . $info['email'] . ' with quotation : ');
            //    }
            //exit;
            
            
            $file = SAVE_PDF . '/' . $date . '/' . $info['unique'] . '_' . strtoupper($info['rfc_name']) . '_' . strtoupper(url_title($info['project'], '_', TRUE)) . '.pdf';
            $content = file_get_contents( $file);
            $content = chunk_split(base64_encode($content));
            $uid = md5(uniqid(time()));
            $name = basename($file);

            $from_name = 'Sienity';
            $from_mail = 'noreplay@elddenmedio.site';
            $replyto   = 'noreplay@elddenmedio.site';
            $bcc       = 'j_orgemp@hotmail.com';
            $mailto    = $info['email'];
            $message   = $this->load->view('mails/quotation_mail', $info, TRUE);//'<html><body>Quotation</body></html>';//'mensaje de cuerpo del mail';
            $filename  = $info['unique'] . '_' . strtoupper($info['rfc_name']) . '_' . strtoupper(url_title($info['project'], '_', TRUE)) . '.pdf';
            $subject   = 'Sienity - Quotation';

            // header
            $header = "From: ".$from_name." <".$from_mail.">\r\n";
            $header .= "Reply-To: ".$replyto."\r\n";
            $header .= "Bcc: ".$bcc."\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
            
            // message & attachment
            $nmessage = "--".$uid."\r\n";
            $nmessage .= "Content-type:text/html; charset=\"utf-8\"\r\n";
            $nmessage .= "X-Priority: 1 (Highest)\n";
            $nmessage .= "X-MSMail-Priority: High\n";
            $nmessage .= "Importance: High\n";
            $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $nmessage .= $message."\r\n\r\n";
            $nmessage .= "--".$uid."\r\n";
            $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
            $nmessage .= "Content-Transfer-Encoding: base64\r\n";
            $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
            $nmessage .= $content."\r\n\r\n";
            $nmessage .= "--".$uid."--";

            if( mail($mailto, $subject, $nmessage, $header)) {
                log_message('info', 'Sended maikl to ' . $info['email'] . ' with quotation : ' . $file);
            }
            else {
              echo 'ERROR MAIL';
              log_message('error', 'Error Sending mail to : ' . $info['email'] . ' with quotation : ' . $file);
            }
        }
}

/* End of file Quotation.php */
/* Location: ./application/controllers/admin/Quotation.php */
