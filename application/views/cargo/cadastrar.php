<div class="card">
  <div class="card-header"><strong>Cadastro</strong><small> Cargo</small></div>
  <form action="<?php echo base_url() ?>cargo/cadastrar" method="post">
    <div class="card-body card-block">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="form-group">
              <input type="text" placeholder="Nome do Cargo" name="nome" class="form-control" required>
              <span class="invalid-feedback" id="invalid-nome">
                Campo obrigatório
              </span>
            </div>
            <div class="form-group">
              <textarea placeholder="Descrição do cargo" name="descricao" class="form-control" required></textarea>
              <span class="invalid-feedback" id="invalid-descricao">
                Campo obrigatório
              </span>
            </div>
            <div class="form-group">
              <select class="form-control" name="id_setor">
                <?php foreach ($setores as $setor): ?>
                  <option value="<?php echo $setor->id_setor ?>"><?php echo $setor->nome; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa fa-dot-circle-o"></i> Cadastrar
      </button>
      <button type="reset" class="btn btn-danger btn-sm">
        <i class="fa fa-ban"></i> Limpar Campos
      </button>
    </div>
  </form>
</div>