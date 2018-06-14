<?php
/*
------------------ EXEMPLO ------------------
$config = array(
        'signup' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'passconf',
                        'label' => 'Password Confirmation',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required'
                )
        ),
        'email' => array(
                array(
                        'field' => 'emailaddress',
                        'label' => 'EmailAddress',
                        'rules' => 'required|valid_email'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|alpha'
                ),
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'message',
                        'label' => 'MessageBody',
                        'rules' => 'required'
                )
        )
);

*/

$config = array(

    'produto' =>
    array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]'
        ),
        array(
            'field' => 'lote',
            'label' => 'Lote',
            'rules' => 'required'
        ),
        array(
            'field' => 'codigo',
            'label' => 'Codigo',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'fabricacao',
            'label' => 'Fabricacao',
            'rules'  => 'required|validDate',
            'errors' => array(
                'validDate' => 'O campo {field} deve conter uma data válida'
            ),
        ),
        array(
            'field' => 'validade',
            'label' => 'Validade',
            'rules'  => 'required|validDate',
            'errors' => array(
                'validDate' => 'O campo {field} deve conter uma data válida',
            ),
        ),
        array(
            'field' => 'recebimento',
            'label' => 'Recebimento',
            'rules'  => 'required|validDate',
            'errors' => array(
                'validDate' => 'O campo {field} deve conter uma data válida'
            ),
        ),

    ),
    'pessoa' => array(

        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required'
        ),

        array(
            'field' => 'email',
            'label' => 'E-Mail',
            'rules' => 'required|valid_email'
        ),

        array(
            'field' => 'cep',
            'label' => 'CEP',
            'rules' => 'required'
        ),

        array(
            'field' => 'estado',
            'label' => 'Estado',
            'rules' => 'required|integer'
        ),

        array(
            'field' => 'cidade',
            'label' => 'Cidade',
            'rules' => 'required|integer'
        ),

        array(
            'field' => 'bairro',
            'label' => 'Bairro',
            'rules' => 'required'
        ),

        array(
            'field' => 'logradouro',
            'label' => 'Logradouro',
            'rules' => 'required'
        ),

        array(
            'field' => 'numero',
            'label' => 'Número',
            'rules' => 'required'
        ),

        array(
            'field' => 'telefone',
            'label' => 'Telefone',
            'rules' => 'required'
        ),

        array(
            'field' => 'cpf',
            'label' => 'CPF',
            'rules' => requiredIf('tipo_pessoa', 'pf')
        ),

        array(
            'field' => 'cnpj',
            'label' => 'CNPJ',
            'rules' => requiredIf('tipo_pessoa', 'pj')
        ),

        array(
            'field' => 'estado',
            'label' => 'Estado',
            'rules' => 'required'
        ),

        array(
            'field' => 'cidade',
            'label' => 'Cidade',
            'rules' => 'required'
        ),

        array(
            'field' => 'bairro',
            'label' => 'Bairro',
            'rules' => 'required'
        ),

    ),

  // @Beto Cadilhe
  'fornecedor' => array(
          array(
                  'field' => 'nome',
                  'label' => 'Nome',
                  'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]',
                  'rules' => 'required|min_length[1]',
                  'rules' => 'required|max_length[45]'
          ),

          array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email'
          ),

          array(
                  'field' => 'razao_social',
                  'label' => 'Razão Social',
                  'rules' => 'required',
                  'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
          ),

          /* array(
            'field' => 'cnpj',
            'label' => 'CNPJ',
            'rules' => requiredIf('tipo_pessoa', 'pj')
        ), */

          array(
            'field' => 'telefone',
            'label' => 'Telefone',
            'rules' => 'required'
        ),

        array(
            'field' => 'estado',
            'label' => 'Estado',
            'rules' => 'required|integer'
        ),

        array(
            'field' => 'cidade',
            'label' => 'Cidade',
            'rules' => 'required|integer'
        ),

        array(
            'field' => 'cep',
            'label' => 'CEP',
            'rules' => 'required'
        ),

        array(
            'field' => 'logradouro',
            'label' => 'Logradouro',
            'rules' => 'required',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        ),

        array(
            'field' => 'numero',
            'label' => 'Número',
            'rules' => 'required'
        ),

        array(
            'field' => 'bairro',
            'label' => 'Bairro',
            'rules' => 'required',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
       ),

),
        'login' => array(
                array(
                        'field' => 'email',
                        'label' => 'E-mail',
                        'rules' => 'required|valid_email'
                ),
                array(
                        'field' => 'senha',
                        'label' => 'senha',
                        'rules' => 'required'
                )
        ),
        'setor' => array(
                array(
                        'field' => 'nome',
                        'label' => 'nome',
                        'rules' => 'required'
                )
        ),

       'vaga' => array(

        array(
            'field' => 'id_cargo',
            'label' => 'Cargo',
            'rules' => 'required|integer'
        ),

        array(
            'field'  => 'data_oferta',
            'label'  => 'Data da Oferta',
            'rules'  => 'required|validDate',
            'errors' => array(
                'validDate' => 'O campo {field} deve conter uma data válida'
            ),
        ),

        array(
            'field' => 'quantidade',
            'label' => 'Quantidade',
            'rules' => 'required|integer|greater_than[0]'
        ),

        array(
            'field' => 'requisitos',
            'label' => 'Requisitos',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        ),
        ),

      'sac' => array(

        array(
            'field' => 'titulo',
            'label' => 'Assunto',
            'rules' => 'required'
        ),

        array(
            'field'  => 'id_produto',
            'label'  => 'Produto',
            'rules'  => 'required|integer'
        ),

        array(
            'field' => 'id_cliente',
            'label' => 'Cliente',
            'rules' => 'required|integer'
        ),

        array(
            'field' => 'descricao',
            'label' => 'Descrição',
            'rules' => 'required'
        )
    ),

    'pedido' => array(

        array(
            'field' => 'id_pessoa',
            'label' => 'Cliente',
            'rules' => 'required'
        ),

        array(
            'field' => 'id_produto[]',
            'label' => 'Produto',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Selecione ao menos um Produto/Serviço'
            ),
        ),

        array(
            'field' => 'situacao',
            'label' => 'Situação',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        ),

        array(
            'field' => 'tipo',
            'label' => 'Tipo do Pedido',
            'rules' => 'required'
        ),

        array(
            'field' => 'descricao',
            'label' => 'Descrição',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        )

    ),
    'processo_seletivo' => array(
            array(
                    'field' => 'nome',
                    'label' => 'Nome',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'codigo',
                    'label' => 'Codigo',
                    'rules' => 'required|numeric'
            ),
            array(
                    'field' => 'descricao',
                    'label' => 'Descrição etapas',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'data_inicio',
                    'label' => 'Data de inicio',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'data_fim',
                    'label' => 'Data termino',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'id_vaga',
                    'label' => 'Vaga',
                    'rules' => 'required|numeric'
            ),
            // array(
            //         'field' => 'vagas',
            //         'label' => 'Numero de vagas',
            //         'rules' => 'required|numeric'
            // ),
      ),
      'processo_seletivo_info' => array(
              array(
                      'field' => 'nome',
                      'label' => 'Nome',
                      'rules' => 'required'
              ),
              array(
                      'field' => 'descricao',
                      'label' => 'Descricao etapas',
                      'rules' => 'required'
              ),
         ),
         'fornecedor' => array(
            array(
                    'field' => 'nome',
                    'label' => 'Nome',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'razao_social',
                    'label' => 'Razão Social',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'cnpj',
                    'label' => 'CNPJ',
                    'rules' => 'required'
            ),
        ),
        'cargo' => array(
          array(
                  'field' => 'nome',
                  'label' => 'Nome',
                  'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]'
          ),

          array(
            'field' => 'descricao',
            'label' => 'Descrição',
            'rules' => 'required|max_length[200]',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
          ),
          array(
                  'field' => 'salario',
                  'label' => 'Salário',
                  'rules' => 'required'
          ),
          array(
            'field' => 'id_setor',
            'label' => 'Setor',
            'rules' => 'required|numeric'
            ),
          ),

    'pedido_fornecedor' => array(

        array(
            'field' => 'situacao',
            'label' => 'Situação',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        ),

        array(
            'field' => 'descricao',
            'label' => 'Descrição',
            'rules' => 'required|regex_match[/^[0-9-a-zA-ZÀ-Úà-ú\s\p{P} ]+$/]'
        )

    ),
      'usuario' =>
      array(
          array(
              'field' => 'nome',
              'label' => 'nome completo',
              'rules' => 'required'
          ),
          array(
              'field' => 'email',
              'label' => 'email',
              'rules' => 'required'
          ),
          // array(
          //     'field' => 'data_nascimento',
          //     'label' => 'data de nascimento',
          //     'rules' => 'required|validDate',
          //     'errors' => array(
          //         'validDate' => 'O campo data de nascimento deve conter uma data válida'
          //     ),
          // ),
          array(
              'field' => 'sexo',
              'label' => 'sexo',
              'rules' => 'required'
          ),
          array(
              'field' => 'cpf',
              'label' => 'cpf',
              'rules' => 'required'
          ),
          array(
              'field' => 'tel',
              'label' => 'telefone',
              'rules' => 'required'
          ),
          array(
              'field' => 'cep',
              'label' => 'cep',
              'rules' => 'required'
          ),
          array(
              'field' => 'estado',
              'label' => 'estado',
              'rules' => 'required'
          ),
          array(
              'field' => 'cidade',
              'label' => 'cidade',
              'rules' => 'required'
          ),
          array(
              'field' => 'bairro',
              'label' => 'bairro',
              'rules' => 'required'
          ),
          array(
              'field' => 'logradouro',
              'label' => 'endereço',
              'rules' => 'required'
          ),
          array(
              'field' => 'numero',
              'label' => 'número',
              'rules' => 'required|numeric'
          ),
          array(
              'field' => 'senha',
              'label' => 'senha',
              'rules' => 'required'
          ),
          array(
              'field' => 'senha2',
              'label' => 'confirmar senha',
              'rules' => 'required'
          ),
      ),
);

/**
* @author: Tiago Villalobos
* Método para tratar a validação de cpf ou cnpj
*/
function requiredIf($field, $value)
{
    if(isset($_POST[$field]))
    {
        if($_POST[$field] == $value)
        {
            return 'required';
        }
    }


}


/**
* @author: Tiago Villalobos
* Verifica se uma data é válida
*
* Recebe uma data no formato padrão enviado por post, sem inversão Ex: 21/04/2018
*
* @param: string $date
*/
function validDate($date)
{
    return date('d/m/Y', strtotime(str_replace('/', '-', $date))) === $date ? true : false;
}
