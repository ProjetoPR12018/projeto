<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Atualizar Candidato</strong>
            </div>
            <form action="<?php site_url('candidato/edit'.$id); ?>" id_usuario ="<?php echo $candidato[0]->id_usuario;?>" method="POST" class="form-horizontal" id="form_candidato">
                <div class="card-body card-block">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($candidato[0]->nome)?>" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email-input" class=" form-control-label"><red>*</red>Email</label>
                            <input type="text" id="email" name="email" value="<?= htmlspecialchars($candidato[0]->email)?>" class="form-control" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Data de Nascimento</label>
                            <input type="text" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars(switchDate($candidato[0]->data_nascimento))?>" class="form-control data" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Sexo</label><br>
                            <input type="radio" name="sexo" id="sexo_masc" value="0" <?php echo ($candidato[0]->sexo=='0')?'checked':'' ?> /><label for="sexo_masc">Masculino</label>
                            <input type="radio" name="sexo" id="sexo_fem" value="1" <?php echo ($candidato[0]->sexo=='1')?'checked':'' ?> /><label for="sexo_fem">Feminino</label>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>CPF</label>
                            <input type="text" id="cpf" name="cpf" class="form-control cpf" value="<?php echo htmlspecialchars($candidato[0]->numero_documento)?>" >
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Telefone</label>
                            <input type="text" id="telefone" name="tel" class="form-control alter_mask"  value="<?php echo htmlspecialchars($candidato[0]->telefone)?>"  >
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label">CEP</label>
                            <input type="cep" id="cep" name="cep" value="<?= htmlspecialchars($candidato[0]->cep)?>"  placeholder="C.E.P" class="form-control cep" data-mask="00000-000" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="estado"><red>*</red>Estado</label>
                            <input type="text" name="estado" id="estado" class="form-control" value="<?php echo $candidato[0]->estado;?>">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="cidade"><red>*</red>Cidade</label>
                            <input type="text"name="cidade" id="cidade" class="form-control" value="<?php echo $candidato[0]->cidade;?>">

                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Bairro</label>
                            <input type="bairro" id="bairro" name="bairro" value="<?= htmlspecialchars($candidato[0]->bairro)?>"  placeholder="Bairro" class="form-control" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Endereço</label>
                            <input type="logradouro" id="logradouro" name="logradouro"  value="<?= htmlspecialchars($candidato[0]->logradouro)?>"  placeholder="Rua/Av./Praça/Alameda/Travessa" class="form-control" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Número</label>
                            <input type="numero" id="numero" name="numero" value="<?= htmlspecialchars($candidato[0]->numero_endereco)?>"  placeholder="Número da casa" class="form-control" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label">Complemento</label>
                            <input type="complemento" id="complemento" name="complemento" value="<?= htmlspecialchars($candidato[0]->complemento)?>" placeholder="Complemento" class="form-control" >
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>CEP</label>
                            <input type="cep" id="cep" name="cep" value="<?= htmlspecialchars($candidato[0]->cep)?>"  placeholder="C.E.P" class="form-control cep" data-mask="00000-000" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a title="Cancelar Edição" href="<?= site_url('candidato')?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <button title="Atualizar Candidato" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarCandidato">
                        <span class="fa fa-check"></span>
                        Atualizar
                    </button>
                </div>
                <div class="modal fade" id="editarCandidato" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Atualizar Candidato</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente editar esse candidato?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Confirmar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
