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

      switch ($id_grupo_acesso) {
        case '1':// home ADMINISTRADOR
          $grupo_acesso = $this->grupo->find($id_grupo_acesso);

            $data['admin'] = $this->getAdminHomeConfigs();
          break;

        case '3':// FORNECEDOR
          $grupo_acesso = $this->grupo->find($id_grupo_acesso);
            $data['fornecedor'] = $this->getFornecedorHomeConfigs($user_id);

        case '4'://CLIENTE
          $grupo_acesso = $this->grupo->find($id_grupo_acesso);
            $data['cliente'] = $this->getCustomerHomeConfigs($user_id);
          break;

        case '5'://CANDIDATO
          $grupo_acesso = $this->grupo->find($id_grupo_acesso);
            $data['admin'] = $this->getAdminHomeConfigs();

        case '6'://FUNCIONARIO
          $grupo_acesso = $this->grupo->find($id_grupo_acesso);
            $data['admin'] = $this->getAdminHomeConfigs();

        default:
          $grupo_acesso = $this->grupo->find($id_grupo_acesso);
            $data['admin'] = $this->getAdminHomeConfigs();
          break;
      }
    $data['title'] = 'Dashboard';
    $data['assets'] = [
      'js' => [
         'chartjs.min.js',
         'cliente/home-charts.js',
         'cliente/home-sac.js'
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
  private function getAdminHomeConfigs()
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


  private function getCustomerHomeConfigs($user_id)
  {

    $data = [];
    $data['produtos']     = $this->produto->get();
    $data['calls']        = $this->sac->getCustomerCalls($user_id);
    $data['orders']       = $this->pedido->getCustomerTotalOrders($user_id);
    $data['last_sac']     = $this->sac->getCustomerSac($user_id);
    return $data;
  }



  public function getFornecedorHomeConfigs($user_id)
  {

    $data = [];
    //
    $data['produtos']  = $this->produto->countProdutosFornecedorLogado($user_id);
    $data['last_sac']  = $this->sac->getLastSacFornecedorLogado($user_id);

    return $data;

  }



}
