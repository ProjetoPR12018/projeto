<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller 
{

	/**
	 * @author Pedro Henrique Guimarães
	 * Com a configuração do menu esse controller serve como base para todos os outros controllers
	 * onde todos devem seguir essa mesma estrutura mínima no consrutor.
	 */
	// public function __construct()
	// {
	//   	parent::__construct();
	//     $user_id = $this->session->userdata('user_login');
	//     $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
	//     $this->usuario->hasPermission($user_id, $currentUrl);
	// }


	/**
	* @author: Tiago Villalobos
	* Formulário para cadastro de pedidos
	*
	*/
  	public function create()
  	{
  		if($this->input->post())
  		{
  			if($this->form_validation->run('pedido'))
  			{
  				$pedido = array(
  					'id_cliente' => $this->input->post('id_cliente'),
  					'descricao'  => $this->input->post('descricao'),
  					'tipo'       => $this->input->post('tipo')
  				);

  				$id_pedido = $this->pedido->insert($pedido);

  				$andamento = array(
  					'data'      => date('Y-m-d H:i:s'),
  					'situacao'  => $this->input->post('situacao'),
  					'id_pedido' => $id_pedido
  				);

  				$this->andamento->insert($andamento);

  				foreach($this->input->post('id_produto') as $index => $id_produto)
  				{
	  				$pedidoProduto = array(
	  					'id_pedido'  => $id_pedido,
	  					'id_produto' => $id_produto,
	  					'quantidade' => $this->input->post('qtd_produto')[$index]
	  				);

	  				$this->pedido->insertProducts($pedidoProduto);
  					
  				}

  			}
  			else
  			{
  				$this->session->set_flashdata('errors', $this->form_validation->error_array());
	            $this->session->set_flashdata('old_data', $this->input->post());
	            redirect('pedido/cadastrar');
  			}
  		}
  		else
  		{
	  		$data['title'] = 'Pedido';

	  		$data['clientes'] = $this->cliente->get();
	  		$data['produtos'] = $this->produto->get();

	  		$data['errors']          = $this->session->flashdata('errors');
	  		$data['success_message'] = $this->session->flashdata('success');
	  		$data['error_message']   = $this->session->flashdata('danger');
	  		$data['old_data']        = $this->session->flashdata('old_data');

			loadTemplate(
				'includes/header',
				'pedido/cadastrar',
				'includes/footer',
				$data
			);
  		}
  	


  	}

}
