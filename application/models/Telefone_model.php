<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telefone_model extends CI_Model {

	public $numero;
	public $id_pessoa;

	/**
	* @author: Tiago Villalobos
	* Salva telefone associado à pessoa.
	*
	* @param integer $id_pessoa
	*/
	public function insert($telefone)
	{
		$this->db->insert('telefone', $telefone);
		$id_telefone = $this->db->insert_id();

		if($id_telefone)
		{
			$this->relatorio->setLog('insert', 'Inserir', 'Telefone', $id_telefone, 'Inseriu o telefone', $id_telefone);
		}
		return $id_telefone;
	}

	public function get(){}


	/**
	* @author: Tiago Villalobos
	* Permite atualização de telefone associado à uma pessoa
	*
	*
	*/
	public function update($telefone)
	{
		$this->db
		->where('telefone.id_pessoa', $telefone['id_pessoa'])
		->set('telefone.numero', $telefone['numero'])
		->update('telefone');

		$this->db->flush_cache();

		$id_telefone = $this->db
		->where('telefone.id_pessoa', $telefone['id_pessoa'])
		->get('telefone')
		->row()
		->id_telefone;

		if($id_telefone)
		{
			$this->relatorio->setLog('update', 'Atualizar', 'Telefone', $id_telefone, 'Atualizou o telefone', $id_telefone);
		}
		return $id_telefone;
	}


	/**
	* @author: Tiago Villalobos
	* Remove o telefone associado à uma pessoa
	*
	* @param integer $id_pessoa
	*/
	public function remove($id_pessoa)
	{
		$this->db->where('id_pessoa', $id_pessoa);
		$id_telefone = $this->db->get('telefone')->row()->id_telefone;
		$this->db->delete('telefone');

		if($id_telefone)
		{
			$this->relatorio->setLog('delete', 'Deletar', 'Telefone', $id_telefone, 'Deletou o telefone', $id_telefone);
		}
		return $id_telefone;

	}

}
