<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Novo Produto</strong>
            </div>
            <form action="<?php echo base_url('cadastrar/produto'); ?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nome" class="control-label mb-1">Nome do Produto</label>
                                <input id="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" name="nome" type="text" class="form-control  <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido.</span>
                            </div>
                            <div class="form-group col-6">
                                <label for="lote" class="control-label mb-1">Lote</label>
                                <input id="lote" value="<?php echo isset($old_data['lote']) ? $old_data['lote'] : null;?>" name="lote" type="text" class="form-control  <?php echo isset($errors['lote']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Lote inválido.</span>
                            </div>
                            <div class="form-group col-6">
                                <label for="codigo" class="control-label mb-1">Código</label>
                                <input id="codigo" value="<?php echo isset($old_data['codigo']) ? $old_data['codigo'] : null;?>" name="codigo" type="text" class="form-control  <?php echo isset($errors['codigo']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Código inválido.</span>
                            </div>
                            <div class="form-group col-6">
                                <label for="recebimento" class="control-label mb-1">Data de Recebimento</label>
                                <input id="recebimento" value="<?php echo isset($old_data['recebimento']) ? $old_data['recebimento'] : null;?>" name="recebimento" type="text" class="form-control data  <?php echo isset($errors['recebimento']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de Recebimento inválida.</span>
                            </div>
                            <div class="form-group col-6">
                                <label for="fabricacao" class="control-label mb-1">Data de Fabricação</label>
                                <input id="fabricacao" value="<?php echo isset($old_data['fabricacao']) ?  $old_data['fabricacao'] : null;?>" name="fabricacao" type="text" class="form-control data  <?php echo isset($errors['fabricacao']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de Fabricação inválida.</span>
                            </div>
                            <div class="form-group col-6">
                                <label for="validade" class="control-label mb-1">Data de Validade</label>
                                <input id="validade" value="<?php echo isset($old_data['validade']) ? $old_data['validade']: null;?>" name="validade" type="text" class="form-control data <?php echo isset($errors['validade']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de Validade inválida.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i>
                        Apagar
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-check"></i>
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
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
    </div>
</div>