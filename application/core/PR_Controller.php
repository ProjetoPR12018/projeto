<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @author: Tiago Villalobos
* Este controller tem como função agrupar métodos para evitar reescrita de código
*/
class PR_Controller extends CI_Controller 
{

	protected $data = array();
	protected $viewDirectory;

	/**
	* @author: Tiago Villalobos
	* Construtor que recebe o diretório padrão das views que serão utilizadas pelo controller filho
	* Inicializa os assets (js e css)
	* Define as permissões do usuário com base em seu grupo de acesso
	* 
	* @param: $viewDirectory string
	*/ 
	public function __construct($viewDirectory)
	{
		parent::__construct();
		
		$this->data['assets']['js']  = array();
		$this->data['assets']['css'] = array();

		$this->viewDirectory = $viewDirectory;

		$user_id    = $this->session->userdata('user_login');
      	$currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      	$this->usuario->hasPermission($user_id, $currentUrl);
		
		$this->addData('menus', $this->menu->getUserMenu($user_id));

	}

	/**
	* @author: Tiago Villalobos
	* Carrega a view especificada do diretório padrão, definido no construtor
	* Redireciona para a view as mensagens definidas por flashdata e demais dados
	* 
	* @param: $view string
	*/ 
	protected function loadView($view)
	{
		$this->setFlashMessages();

		$this->load->view('includes/header', $this->data);
		$this->load->view($this->viewDirectory.'/'.$view);
		$this->load->view('includes/footer');
	}	

	/**
	* @author: Tiago Villalobos
	* Adiciona um novo dado para o atributo data
	* Associando o nome ao valor, que pode ser um array
	* 
	* @param: $dataName  string
	* @param: $dataValue mixed
	*/ 
	protected function addData($dataName, $dataValue)
	{
		$this->data[$dataName] = $dataValue;
	}

	/**
	* @author: Tiago Villalobos
	* Permite a definição do título da página
	* 
	* @param: $title string
	*/ 
	protected function setTitle($title)
	{
		$this->data['title'] = $title;
	}

	/**
	* @author: Tiago Villalobos
	* Adiciona novos javascripts ao assets, por meio de um array
	* 
	* @param: $scripts mixed
	*/ 
	protected function addScripts($scripts)
	{
		foreach($scripts as $script)
		{
			array_push($this->data['assets']['js'], $script); 
		}

	}

	/**
	* @author: Tiago Villalobos
	* Adiciona novos folhas de estilo ao assets, por meio de um array
	* 
	* @param: $styles mixed
	*/ 
	protected function addStyles($styles)
	{
		foreach($styles as $style)
		{
			array_push($this->data['assets']['css'], $style); 
		}

	}

	/**
	* @author: Tiago Villalobos
	* Carrega javascripts padrão que são utilizados em todas as views de listagem
	*/ 
	protected function loadIndexDefaultScripts()
	{
		$this->addScripts(
		    array(
		        'lib/data-table/datatables.min.js',
		        'lib/data-table/dataTables.bootstrap.min.js',
		        'datatable.js',
		        'confirm.modal.js'
		    )
		);
	}

	/**
	* @author: Tiago Villalobos
	* Carrega javascripts padrão que são utilizados em todas as views com formulário
	*/ 
	protected function loadFormDefaultScripts()
	{
		$this->addScripts(
		    array(
		        'validate.js'
		    )
		);
	}

	/**
	* @author: Tiago Villalobos
	* Redireciona o usuário para a view padrão do diretório com uma mensagem de sucesso
	*/ 
	protected function redirectSuccess($message, $subView = null)
	{
		$this->session->set_flashdata('success', $message);
		
		$path = is_null($subView) ? $this->viewDirectory : $this->viewDirectory.'/'.$subView;   

		redirect($path);
	}

	/**
	* @author: Tiago Villalobos
	* Redireciona o usuário para uma view do diretório 
	* Juntamente com as mensagens de erro e dados antigos do formulário
	* 
	* @param $view string
	* @param $message string
	*/ 
	protected function redirectError($view, $message = 'Não foi possível realizar a operação')
	{
		$this->session->set_flashdata('danger', $message);
		$this->session->set_flashdata('errors',   $this->form_validation->error_array());
        $this->session->set_flashdata('old_data', $this->input->post());
		
		if($view !== 'index')
		{
			redirect($this->viewDirectory.'/'.$view);
		}
		else
		{
			redirect($this->viewDirectory);
		}
        
	}

	/**
	* @author: Tiago Villalobos
	* Define as mensagens de alerta assim como recupera os erros e dados antigos do formulário
	*/ 
	private function setFlashMessages()
	{
		$this->data['success_message'] = $this->session->flashdata('success');
        $this->data['error_message']   = $this->session->flashdata('danger');
        $this->data['errors']          = $this->session->flashdata('errors');
		$this->data['old_data']        = $this->session->flashdata('old_data');
	}

}