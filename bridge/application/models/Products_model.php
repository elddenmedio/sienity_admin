<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * MODEL Products
 * 
 * $this->db->last_query();
 */
class Products_model extends CI_Model{
	/*
	 * private delete
	 */
	private $delete			= 1;
	
	/*
	 * private permited joins
	 */
	private $permited_joins	= array('product', 'download', 'stats', 'too', 'send', 'customer');
	
        /*
         * Find by param
         * 
         * Search param by type
         * 
         * @access  public
         * @param   string      -find
         * @param   string      -type
         * @return  array
         */
        public function finder( $to_find, $type ) {
            switch($type){
                case 'sku':
                    $_col   = 'sku';
                    $_pos   = 0;
                    break;
                case 'rfc':
                    $_col   = 'rfc';
                    $_pos   = 5;
                    break;
            }
            
            $this->db->where('erased', 0);
            $this->db->like($_col, $to_find, 'after');
            $result     = $this->db->get($this->permited_joins[$_pos], 12);
            
            if( $result->num_rows() > 0){
                return $result->result();
            }
            else{
                return FALSE;
            }
        }
        
        public function find_product ( $to_find ) {
            return $this->db->get_where($this->permited_joins[0], array('sku' => $to_find, 'erased' => 0))->row();
        }
        
        public function find_product_by_id ( $to_find ) {
            return $this->db->get_where($this->permited_joins[0], array('id' => $to_find, 'erased' => 0))->row();
        }
        
        public function insert_p ( $table, $product ) {
            $this->db->insert($table, $product);
            
            return $this->db->insert_id();
        }
        
        public function get_quotation ( $unique ) {
            return $this->db->get_where('quotation', array('unique' => $unique, 'erased' => 0))->result();
        }
        
        public function get_all ( ) {
            return $this->db->get($this->permited_joins[0])->result();
        }
        
        public function update_stock ( $sku, $qty ) {
            $stock      = $this->db->get_where($this->permited_joins[0], array('sku' => $sku, 'erased' => 0))->row();
            
            $new_stock  = (int) $stock->stock - (int) $qty;
            
            $this->db->set('stock', $new_stock);
            $this->db->where('sku', $sku);
            $this->db->update($this->permited_joins[0]);
        }
        
        public function get_last_id ( ) {
            $maxid = 0;
            
            $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `quotation`')->row();
            
            if ($row) {
                $maxid = $row->maxid; 
            }
            
            return $maxid;
        }
        
        public function delete_activate_product ( $product_id, $action ) {
            $this->db->where('id', $product_id);
            $this->db->update($this->permited_joins[0], array('erased' => $action));
        }
        
        public function update_product( $id, $update ) {
            $this->db->where('id', $id);
            $this->db->update($this->permited_joins[0], $update);
        }
}
