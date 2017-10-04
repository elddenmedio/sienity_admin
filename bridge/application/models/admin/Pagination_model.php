<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_model extends CI_Model{
	var		$table		= array('', 'product', 'login');//1-products, 2-workers
	var		$select		= array('', 'id, sku, name, img, description, stock, price', 'id, level, name, email, dateUP', 'id, name, email, dateUP');

	public function __construct ( ) {
		parent::__construct();
	}

	//obtenemos el total de filas para hacer la paginación
	/*
	 * Get Num Rows
	 * 
	 * @access	public
	 * @param	number		-id type
	 * @return	number
	 */
	public function num_rows ( $pagination_type )  {
		$consulta		= $this->db->get($this->table[$pagination_type]);
		
        return $consulta->num_rows();
    }

	//obtenemos todos los posts a paginar con la función
	//total_posts_paginados pasando lo que buscamos, la cantidad por página y el segmento
	//como parámetros de la misma
	/*
	 * Get Pagination Info
	 * 
	 * Get pagination info by offset
	 * 
	 * @access	public
	 * @param	number		-id type
	 * @param	number
	 * @param	number
	 * @return	array
	 */
	public function paginacion ( $pagination_type, $limit, $offset ) {
            $return     = array();
            
		$this->db->select($this->select[$pagination_type]);
                if( $this->table[( $pagination_type === 3 && (int) $this->session->userdata('level') !== 120)]){
                    $this->db->where('id !=', 1);
                }
		$consulta = $this->db->get($this->table[( $pagination_type === 3 && (int) $this->session->userdata('level') !== 120) ? 2 : $pagination_type], $limit, $offset)->result();

		//if( $consulta->num_rows() > 0) {
		//	$return = $consulta->result();
                //}
                $select     = explode(',', $this->select[$pagination_type]);
                
                for($i = 0; $i < count($consulta); $i++){
                    if( $pagination_type === 1){
                        $return[]   = array(
                                            trim($select[0])    => $consulta[$i]->{trim($select[0])},
                                            trim($select[1])    => $consulta[$i]->{trim($select[1])},
                                            trim($select[2])    => '<p style="white-space: nowrap; width: 20em;  overflow: hidden; text-overflow: ellipsis;" title="' . $consulta[$i]->{trim($select[2])} . '">' . $consulta[$i]->{trim($select[2])} . '</p>',
                                            trim($select[3])    => '<img src="../../resources/products/' . $consulta[$i]->{trim($select[3])} . '" width="100%">',
                                            trim($select[4])    => $consulta[$i]->{trim($select[4])},
                                            trim($select[5])    => ( $consulta[$i]->{trim($select[5])} < 0) ? '<p style="color: red;">' . $consulta[$i]->{trim($select[5])} . '</p>' : '<p>' . $consulta[$i]->{trim($select[5])} . '</p>',
                                            trim($select[6])    => '$ ' . number_format($consulta[$i]->{trim($select[6])}, 2),
                                            'u_d'               => ( $this->session->userdata('level') === '120') ? '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#updateModal' . $consulta[$i]->{trim($select[0])} . '">{update}</button>' : FALSE
                                        );
                    }
                    else{
                        //$return = $consulta->result_array();
                        if( $pagination_type === 3 && $this->session->userdata('level') !== '120'){
                            $return[]   = array(
                                                trim($select[0])    => $consulta[$i]->{trim($select[0])},
                                                trim($select[1])    => $consulta[$i]->{trim($select[1])},
                                                trim($select[2])    => $consulta[$i]->{trim($select[2])},
                                                trim($select[3])    => $consulta[$i]->{trim($select[3])},
                                            );
                        }
                        else{
                            $return[]   = array(
                                                trim($select[0])    => $consulta[$i]->{trim($select[0])},
                                                trim($select[1])    => $consulta[$i]->{trim($select[1])},
                                                trim($select[2])    => $consulta[$i]->{trim($select[2])},
                                                trim($select[3])    => $consulta[$i]->{trim($select[3])},
                                                trim($select[4])    => $consulta[$i]->{trim($select[4])},
                                                'u_d'               => ( $this->session->userdata('level') === '120' && (int) $consulta[$i]->{trim($select[0])} !== 1) ? '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#updateModal' . $consulta[$i]->{trim($select[0])} . '">{update}</button>' : FALSE
                                            );
                        }
                    }
                }
                return $return;
	}
}

/*
 * end application/models/admin/Pagination_model.php
 */
