<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sac_model extends CI_Model {
  /**
  * @author: Rodrigo Alves
  * Este método inserção de dados
  *
  */
  public function insert($dados) {    
    $this->db->insert('sac', $dados);
    return $this->db->insert_id();
  }
    
  /**
  * @author: Rodrigo Alves
  * listar todas as ordens
  *
  */
  public function get() {    
    $query = $this->db->select('*')->from('sac');
    return $query->get()->result();
  }
    
  /**
  * @author: Rodrigo Alves
  * listar todas as ordens que o cliente abriu
  *
  */
  public function getClient($id) {    
    $query = $this->db->select('*')->from('sac')->where('id_cliente', $id);
    return $query->get()->result();
  }

  /**
  * @author: Rodrigo Alves
  * Este método atualiza as informações da ordem do sac referenciado pelo id
  *
  */
  public function update($data, $id_sac) {
    $this->db->where('id_sac', $id_sac);
    $this->db->update('sac', $data);
  }
    
  /**
  * @author: Rodrigo Alves
  * Apagar uma ordem sac do banco
  *
  */
  public function remove($id_sac) {
    $this->db->where('id_sac', $id_sac);
    $this->db->delete('sac');
  }
    
}