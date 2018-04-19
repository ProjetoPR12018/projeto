
<div class="animated fadeIn">
	<div class="row justify-content-center align-items-center">
<div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Nova Vaga</strong>
            </div>
            <form action="<?php echo base_url('cadastrar/produto'); ?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="id_cargo" class="control-label mb-1">Cargo</label>
                                <select name="cargo_id" id="cargo_id" class="form-control">
	                                <option value="">Selecione</option>
	                                <?php foreach ($cargos as $cargo): ?>
	                                	<option value="<?php echo $cargo->id_cargo ?>" <?php echo (isset($old_data['id_cargo']) && $cargo->id_cargo == $old_data['id_cargo']) || ($vaga->id_cargo == $cargo->id_cargo) ? 'selected' : '' ?>>
	                                		<?php echo $cargo->nome ?>
	                                	</option>
	                                <?php endforeach; ?>
                              	</select>
                             	<span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-6">
                                <label for="data_oferta" class="control-label mb-1">Data da Oferta</label>
                                <input id="data_oferta" value="<?php echo isset($old_data['data_oferta']) ? $old_data['data_oferta'] : $vaga->data_oferta;?>" name="data_oferta" type="text" class="data form-control <?php echo isset($errors['data_oferta']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback"></span>
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
    </div>

</div>
</div>