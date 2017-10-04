<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * MODEL Customer
 * 
 * $this->db->last_query();
 */
class Customer_model extends CI_Model{
	/*
	 * private delete
	 */
	private $table			= 'customer';
	
	/*
	 * private permited joins
	 */
	private $permited	= array('name', 'rfc');
	
        public function find_rfc ( $rfc ) {
            return $this->db->get_where($this->table, array($this->permited[1] => $rfc, 'erased' => 0))->row();
        }
        
        public function get_customer ( $type, $param ) {
            return $this->db->get_where($this->table, array($type => $param))->row();
        }
        
        public function insert_customer( $rfc, $rfc_name, $rfc_tel, $rfc_address ) {
            $insert     = array(
                                'name'  => $rfc_name, 
                                'rfc'   => strtoupper($rfc), 
                                'address'=>$rfc_address, 
                                'tel'   => $rfc_tel, 
                                'fk_user'=>$this->session->userdata('id')
                            );

            $this->db->insert($this->table, $insert);

            $result = $this->db->insert_id();

            return $result;
        }
        
        public function update_customer ( $id, $update ) {
            $this->db->where('id', $id);
            $this->db->update('login', $update);
        }
        
        public function get_user_make_quotation ( $usr_id ) {
            return $this->db->get_where('login', array('id' => $usr_id))->row();
        }
}
