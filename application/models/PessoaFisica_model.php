<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PessoaFisica_model extends CI_Model{

  public $email;
  public $dataNascimento;
  public $sexo;
  public $id_pessoa;

  /**
  * @author: Camila Sales
  * Este método tem como finalidade salvar um registro de pessoa
  * física no banco
  *
  */
  public function insert($data)
  {
    try{
      $this->db->insert('pessoa_fisica', $data);
      $id_pessoa_fisica = $this->db->insert_id();

      if($id_pessoa_fisica)
      {
        $this->relatorio->setLog('insert', 'Inserir', 'Pessoa_fisica', $id_pessoa_fisica, 'Inseriu a pessoa fisica', $id_pessoa_fisica);
      }
      return $id_pessoa_fisica;

    } catch (\Exception $e) {

    }
  }

  /**
  * @author: Rodrigo Alves
  * Retorna todas os registros de pessoa_fisica
  * @return mixed array de objetos
  */
  public function get()
  {
    try {
      $query = $this->db->select("*")->from("pessoa")
      ->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa');
    } catch (\Exception $e) {

    }
    if ($query)
    {
      return $query->get()->result();
    }else{
      echo 'Não existem dados';
      exit;
    }
  }

  /**
  * @author: Camila Sales
  * Este método tem como finalidade atualizar os dados
  * de um registro de pessoa_fisica no banco pelo id do mesmo.
  *
  */
  public function update($id, $data)
  {
    try {
       // $this->db->update('pessoa_fisica', $data, "id_pessoa = ".$id);
      $this->db->update('pessoa_fisica', $data, array('id_pessoa' => $id));
    } catch (\Exception $e) {}
  }

  /**
  * @author: Camila Sales
  * Este método tem como finalidade remover um registro de pessoa_fisica do banco
  * pelo id do mesmo.
  *
  */
  public function remove($id_pessoa_fisica)
  {
    try {
        $this->db->where('id_pessoa', $id_pessoa_fisica);
        $this->db->delete('pessoa_fisica');

        if($id_pessoa_fisica)
        {
          $this->relatorio->setLog('delete', 'Deletar', 'Pessoa_fisica', $id_pessoa_fisica, 'Deletou a pessoa fisica', $id_pessoa_fisica);
        }
        return $id_pessoa_fisica;

    } catch (\Exception $e) {}
  }
}
