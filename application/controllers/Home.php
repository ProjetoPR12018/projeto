<?php
class Home extends CI_Controller
{
  /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function __construct()
  {
    parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      $this->usuario->hasPermission($user_id, $currentUrl);
  }


  /**
   * @author Matheus Ladislau
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function index()
	{
    $user_id = $this->session->userdata('user_login');
    $id_grupo_acesso = $this->usuario->getUserAccessGroup($user_id); 
    $grupo_acesso = $this->grupo->find($id_grupo_acesso);


      // alterado o data da view home_fornecedor para testar na branch home_fornecedor
    switch ($id_grupo_acesso) {

      case $id_grupo_acesso == 1:
       $data['admin'] = $this->getAdminHomeConfigs();
      
      case $id_grupo_acesso == 3:
       $data['fornecedor'] = $this->getFornecedorHomeConfigs($user_id);
      
      default:
        # code...
        break;
    }
      

      $data['title'] = 'Dashboard';
      $data['assets'] = [
        'js' => [
           'chartjs.min.js',
           'cliente/home-charts.js'
        ]
      ];

  		loadTemplate(
          'includes/header',
          'home/home_'.$grupo_acesso[0]->nome,
          'includes/footer',
          $data
        );
  	
  }

  /**
   * @author Pedro Henrique Guimarães
   * Método responsável por buscar as configurações a serem exibidas na view
   *
   * @param void
   * @return mixed
   */
  public function getAdminHomeConfigs()
  {
    $data = [];

    //CRM
    $data['clientes']           = $this->cliente->count();
    $data['fornecedores']       = $this->fornecedor->count();
    $data['produtos']           = $this->produto->count();
    $data['last_sac']           = $this->sac->getLastSac();

    //HRM
    $data['funcionarios']       = $this->funcionario->count();
    $data['cargos']             = $this->cargo->count();
    $data['vagas']              = $this->vaga->count();
    $data['job_opportunity']    = $this->vaga->getLastJobOpportunity(3);
    $data['processos_seletivos']= $this->processo_seletivo->getUltimos();
    foreach ($data['processos_seletivos'] as $key => $value) {
      $data['processos_seletivos'][$key]->data_fim = switchDate($data['processos_seletivos'][$key]->data_fim);
    }

    return $data;
  }


  public function getFornecedorHomeConfigs($user_id)
  {

    $data = [];
    //
    $data['produtos']  = $this->produto->getProdutosFornecedorLogado($user_id);
    $data['last_sac']  = $this->sac->getLastSac();

    return $data;

  }


}
