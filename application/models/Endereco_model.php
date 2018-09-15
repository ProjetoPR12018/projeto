<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco_model extends CI_Model {

	/**
	* @author: Tiago Villalobos
	* Salva um endereço associado à uma pessoa
	*
	*
	* @param integer $id_pessoa
	*/
	public function insert($endereco)
	{
		$this->db->insert('endereco', $endereco);
		$id_endereco = $this->db->insert_id();

		if($id_endereco)
		{
			$this->relatorio->setLog('insert', 'Inserir', 'Endereco', $id_endereco, 'Inseriu o endereço', $id_endereco);
		}
		return $id_endereco;
	}


	public function get(){}


	/**
	* @author: Tiago Villalobos
	* Atualiza um endereço associado à uma pessoa
	*
	*
	*/
	public function update($endereco)
	{
		$this->db->where('endereco.id_pessoa', $endereco['id_pessoa']);
		$this->db->set('endereco.cep',         $endereco['cep']);
		$this->db->set('endereco.bairro',      $endereco['bairro']);
		$this->db->set('endereco.logradouro',  $endereco['logradouro']);
		$this->db->set('endereco.numero',      $endereco['numero']);
		$this->db->set('endereco.complemento', $endereco['complemento']);
		$this->db->set('endereco.cidade',      $endereco['cidade']);
		$this->db->set('endereco.estado',      $endereco['estado']);

		$this->db->update('endereco');
		$this->db->flush_cache();
    
		$this->db->where('endereco.id_pessoa', $endereco['id_pessoa']);
		$id_endereco = $this->db->get('endereco')->row()->id_endereco;

		if($id_endereco)
		{
			$this->relatorio->setLog('update', 'Atualizar', 'Endereco', $id_endereco, 'Atualizou o endereço', $id_endereco);
		}
		return $id_endereco;
	}


	/**
	* @author: Tiago Villalobos
	* Remove um endereço associado à uma pessoa
	*
	*
	* @param integer $id_pessoa
	*/
	public function remove($id_pessoa)
	{
		$this->db->where('id_pessoa', $id_pessoa);
		$id_endereco = $this->db->get('endereco')->row()->id_endereco;
		$this->db->delete('endereco');

		if($id_endereco)
		{
			$this->relatorio->setLog('delete', 'Deletar', 'Endereco', $id_endereco, 'Deletou o endereço', $id_endereco);
		}

		return $id_endereco;

	}

   /**
	* @author Rodrigo
	* Retorna o endereço de uma pessoa
	*
	* @return mixed array de objetos
	*/
	public function findAddress($id){
      $this->db->select('*');
		return $this->db->get_where('endereco', array('id_pessoa' => $id))->result();
   }

}
