<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <?php if($this->session->flashdata('success')): ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('danger')): ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                    <?php echo $this->session->flashdata('danger'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <h1 class="margin20">Meus Dados  </h1> 
                            <br>
                            <table class="table">
                                <tbody>
                                    <tr>
                                       <td>
                                          <b>Nome</b><br>
                                          <?=$pessoa[0]->nome;?>
                                       </td>
                                       <td colspan="2">
                                          <b>E-mail</b><br>
                                          <?=$pessoa[0]->email;?>
                                       </td>                                
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                           <b>Endereço</b><br>
                                           <?=$endereco[0]->logradouro;?>, <?=$endereco[0]->numero;?> - <?=$endereco[0]->bairro;?>                                       
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <b>Complemento</b><br>
                                          <?=$endereco[0]->complemento;?>
                                       </td>
                                        <td>
                                           <b>CEP</b>
                                          <?=$endereco[0]->cep;?>
                                       </td>
                                        <td>
                                           <b>Cidade</b>
                                          <?=$endereco[0]->cidade;?> -  <?=$endereco[0]->estado;?>
                                       </td>
                                    </tr>

                                    <form method="POST" action="<?php echo base_url('perfil/upload'); ?>" enctype="multipart/form-data">
                                    <tr>
                                      <td>
                                        <b>Enviar curriculum</b> <br>
                                           <input type="file" name="curriculum">
                                       </td>
                                       <td><br><input type="submit" class="btn btn-sm btn-primary" value="Enviar curriculum"></td>
                                       <td></td>
                                    </tr>
                                    </form>

                                </tbody>                            
                            </table>
                           <a href="<?=site_url('perfil/editar/')?>" class="btn btn-primary btn-sm">Alterar Dados</a>
                           <a href="<?=site_url('perfil/alterar-senha/')?>" class="btn btn-primary btn-sm">Alterar Senha</a>
                        
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>