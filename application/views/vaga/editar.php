<div class="animated fadeIn">
	<div class="row justify-content-center align-items-center">
		<div class="col-lg-8">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title">Edição de Vaga</strong>
	            </div>
	            <form id="form-vaga" action="<?php echo base_url('editar/vaga/'.$vaga->id_vaga); ?>" method="POST" novalidate="novalidate">
	                <div class="card-body">
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="form-group col-8">
	                                <label for="id_cargo" class="control-label mb-1">Cargo</label>
	                                <select name="id_cargo" id="id_cargo" class="form-control <?php echo isset($errors['id_cargo']) ? 'is-invalid' : '' ?>">
		                                <option value="" <?php echo isset($errors['id_cargo']) ? 'selected' : '' ?>>Selecione</option>
		                                <?php foreach ($cargos as $cargo): ?>
		                                	<option value="<?php echo $cargo->id_cargo ?>" 
		                                		<?php 
		                                			echo (isset($old_data['id_cargo']) && 
		                                			($cargo->id_cargo == $old_data['id_cargo'])) || 
		                                			!isset($errors['id_cargo']) && 
		                                			($vaga->id_cargo == $cargo->id_cargo) ? 
		                                			'selected' : '' 
		                                		?>
		                                	>
		                                		<?php echo $cargo->nome ?>
		                                	</option>
		                                <?php endforeach; ?>
	                              	</select>
	                             	<span class="invalid-feedback">
	                             		<?php echo isset($errors['id_cargo']) ? $errors['id_cargo'] : '' ; ?>
	                             	</span>
	                            </div>
	                            <div class="form-group col-8">
	                                <label for="data_oferta" class="control-label mb-1">Data da Oferta</label>
	                                <input id="data_oferta" value="<?php echo isset($old_data['data_oferta']) ? $old_data['data_oferta'] : $vaga->data_oferta;?>" name="data_oferta" type="text" class="data form-control <?php echo isset($errors['data_oferta']) ? 'is-invalid' : '' ?>" required>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['data_oferta']) ? $errors['data_oferta'] : '' ; ?>
	                                </span>
	                            </div>
	                        </div>

	                        <div class="row">
	                            <div class="form-group col-8">
	                                <label for="quantidade" class="control-label mb-1">Quantidade</label>
	                                <input id="quantidade" value="<?php echo isset($old_data['quantidade']) ? $old_data['quantidade'] : $vaga->quantidade;?>" name="quantidade" type="text" class="form-control <?php echo isset($errors['quantidade']) ? 'is-invalid' : '' ?>" required>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['quantidade']) ? $errors['quantidade'] : '' ; ?>
	                                </span>
	                            </div>
	                        </div>

	                        <div class="row">
	                        	<div class="form-group col-8">
	                        	
	                                <label for="data_oferta" class="control-label mb-1">Requisitos</label>
	                                <textarea name="requisitos" id="requisitos" rows="6" class="form-control <?php echo isset($errors['requisitos']) ? 'is-invalid' : '' ?>"><?php echo isset($old_data['requisitos']) ? $old_data['requisitos'] : $vaga->requisitos;?></textarea>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['requisitos']) ? $errors['requisitos'] : '' ; ?>
	                                </span>
	                           
	                        	</div>
	                        </div>


	                    </div>
	                </div>
	                <div class="card-footer text-right">
	                    <button title="Cancelar edição Vaga" type="reset" class="bg bg-danger text-white">
	                        <i class="fa fa-times" aria-hidden="true"></i>
	                        Cancelar
	                    </button>
	                    <button title="Atualizar vaga" type="submit" class="bg bg-warning text-white">
	                        <i class="fa fa-plus" aria-hidden="true"></i>
	                        Atualizar
	                    </button>
	                </div>
	            </form>
	        </div>
    	</div>
	</div>
</div>