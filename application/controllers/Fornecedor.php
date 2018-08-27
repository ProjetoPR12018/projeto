<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @author: Nikolas Lencioni
* @author Tiago Villalobos
* Controller de fornecedor
* Adequado ao PR_Controller para fins de abstração de código[Tiago Villalobos]
**/
class Fornecedor extends PR_Controller
{

    /**
    * @author Pedro Henrique Guimarães
    * Com a configuração do menu esse controller serve como base para todos os outros controllers
    * onde todos devem seguir essa mesma estrutura mínima no consrutor.
    */
    public function __construct()
    {
        parent::__construct('fornecedor');
    }

    /**
    * @author: Nikolas Lencioni
    * @author Tiago Villalobos
    * Metodo index que chama a view inicial de fornecedores
    **/
    public function index()
    {

        $this->setTitle('Fornecedores');
        $this->addData('fornecedores', $this->fornecedor->get());

        $this->loadIndexDefaultScripts();

        $this->loadView('index');

    }

    /**
    * @author: Nikolas Lencioni
    * @author Tiago Villalobos
    * Metodo create, apresenta o formulario de cadastro, recebe os dados
    * e envia para função insert de Fornecedor_model
    *
    * Se cadastrar com sucesso, redireciona para pagina index de fornecedor
    * Se não, mostra msg de erro e redireciona para a mesma pagina
    *
    **/
    public function create()
    {
        if($this->input->post())
        {
            if($this->form_validation->run('fornecedor'))
            {
                $fornecedor = $this->getFromPost();

                $this->fornecedor->insert($fornecedor);
                $this->redirectSuccess('Fornecedor cadastrado com sucesso');

            }
            else
            {
                $this->redirectError('cadastrar');
            }
        }
        else
        {

            $this->setTitle('Cadastrar Fornecedor');
            $this->addData('estados',  $this->estado->get());

            $this->loadFormDefaultScripts();
            $this->addScripts(['thirdy_party/apicep.js']);

            $this->loadView('cadastrar');

        }
    }

    /**
    * @author: Nikolas Lencioni
    * @author Tiago Villalobos
    * Metodo edit, apresenta o formulario de edição, com os dados do fornecedor a ser editado,
    * recebe os dados e envia para função update de Fornecedor_model
    *
    * Se cadastrar com sucesso, redireciona para pagina index de fornecedor
    * Se não, mostra msg de erro e redireciona para a mesma pagina
    *
    * @param $id int, id do fornecedor
    **/
    public function edit($id_fornecedor)
    {
        if($this->input->post())
        {

            if($this->form_validation->run('fornecedor'))
            {
                $this->fornecedor->update($this->getFromPostEdit($id_fornecedor));

                $this->redirectSuccess('Fornecedor atualizado com sucesso!');
            }
            else
            {
                $this->redirectError('editar/'.$id_fornecedor);
            }
        }
        else
        {
            $this->setTitle('Atualizar Fornecedor');

            $this->loadFormDefaultScripts();
            $this->addScripts(['thirdy_party/apicep.js']);

            $this->addData('fornecedor', $this->fornecedor->find($id_fornecedor));

            $this->loadView('editar');
        }
    }

    /**
    * @author: Nikolas Lencioni
    * @author Tiago Villalobos
    * Metodo delete, chama a funçao delete de Fornecedor_model, passando o id do fornecedores
    * Redireciona para a pagina index de fornecedor
    *
    * @param $id int
    **/
    public function delete($id)
    {   
        $produtos = $this->produto->getByProvider($id);

        if(!$produtos)
        {
            $this->fornecedor->delete($id);
            $this->redirectSuccess('Fornecedor removido com sucesso!');
        }
        else
        {
            $this->redirectError('index', 'Não foi possível Realizar esta operação. Existem produtos relacionados a este fornecedor!');
        }

    }

    /**
    * @author Tiago Villalobos
    * 
    * Retorna um array com os dados pegos por Post
    *
    * @return mixed
    **/
    private function getFromPost()
    {
        return [
            'nome'         => $this->input->post('nome'),
            'email'        => $this->input->post('email'),
            'senha'        => $this->input->post('senha'),
            'senha2'       => $this->input->post('senha2'),
            'razao_social' => $this->input->post('razao_social'),
            'cnpj'         => $this->input->post('cnpj'),
            'telefone'     => $this->input->post('telefone'),
            'estado'       => $this->input->post('estado'),
            'cidade'       => $this->input->post('cidade'),
            'cep'          => $this->input->post('cep'),
            'logradouro'   => $this->input->post('logradouro'),
            'numero'       => $this->input->post('numero'),
            'bairro'       => $this->input->post('bairro'),
            'complemento'  => $this->input->post('complemento')
        ];
    }

    /**
    * @author Tiago Villalobos
    * Adiciona o id aos dados pegos por Post, para fins de edição
    * retornando um array com os dados
    *
    * @return mixed
    **/
    private function getFromPostEdit($id_fornecedor)
    {
        $postData = $this->getFromPost();

        $postData['id_fornecedor'] = $id_fornecedor;

        return $postData;
    }

}
