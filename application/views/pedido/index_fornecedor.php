<div class="row justify-content-center align-items-center">
    <div class="col-lg-12">

			<?php if(isset($success_message)): ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
                    <?php echo $success_message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
			<?php if(isset($error_message)): ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                    <?php echo $error_message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      		<?php endif; ?>
        	<div class="card">
        	    <div class="card-header">
        	        <strong class="card-title">Pedidos</strong>
        	    </div>
        	    <div class="card-body">



        	    	<!-- COMPRAS -->
        	    	<table class="datatable table">
        	    	    <thead class="d-none">
        	    	        <tr>
        	    	            <th></th>
        	    	        </tr>
        	    	    </thead>

        	    	    <tbody>
        	    	        <?php
        	    	            if(isset($pedidos)):

        	    	        ?>
        	    	            <?php foreach($pedidos as $pedido): ?>
        	    	                <tr class="col-6">

        	    	                    <td class="border-0">
        	    	                        <div class="card card-body">
        	    	                            <div class="row">
        	    	                                <div class="col-6">
        	    	                                    <strong>Pedido Nº </strong><?php echo $pedido->id; ?>
        	    	                                </div>
        	    	                                <div class="col-6 text-right">
        	    	                                    <a href="<?php echo base_url('pedido/fornecedor/editar/'.$pedido->id); ?>"
        	    	                                        class="btn bg-success btn-sm text-white">
        	    	                                        <i class="fa fa-check"></i>
        	    	                                    </a>

        	    	                                    <a href="<?php echo base_url('pedido/fornecedor/pdf/'.$pedido->id) ?>"
        	    	                                        target="_blank"
        	    	                                        class="btn bg-secondary btn-sm text-white">
        	    	                                        <i class="fa fa-print"></i>
        	    	                                    </a>

        	    	                                    <br>
        	    	                                    <small><?php echo swicthTimestamp($pedido->data) ?></small>
        	    	                                    <br>
        	    	                                    <span class="badge badge-<?php echo getSituationClass($pedido->situacao) ?>"><?php echo getSituationName($pedido->situacao); ?></span>

        	    	                                </div>
        	    	                            </div>
        	    	                            <div class="row">
        	    	                                <div class="col-12">
        	    	                                    <strong>Cliente: </strong><?php echo $pedido->cliente; ?>
        	    	                                </div>
        	    	                            </div>
        	    	                            <div class="row">
        	    	                                <div class="col-12">
        	    	                                    <strong>Tipo: </strong>
        	    	                                    <?php
        	    	                                        switch($pedido->tipo)
        	    	                                        {
        	    	                                            case 'p':
        	    	                                                echo 'Produtos';
        	    	                                                break;
        	    	                                            case 's':
        	    	                                                echo 'Serviços';
        	    	                                                break;
        	    	                                            default:
        	    	                                                echo 'Produtos e Serviços';
        	    	                                                break;
        	    	                                        }
        	    	                                    ?>
        	    	                                </div>
        	    	                            </div>
        	    	                            <div class="row">
        	    	                                <div class="col-12 text-justify">
        	    	                                    <strong>Descrição: </strong><?php echo $pedido->descricao; ?>
        	    	                                </div>
        	    	                            </div>
        	    	                             <br>
        	    	                            <div class="row" style="font-weight: bold;">
        	    	                                <div class="col-1">Cod</div>
        	    	                                <div class="col-5">Produto</div>
        	    	                                <div class="col-2 text-right">Qtd</div>
        	    	                            </div>
        	    	                            <?php foreach ($pedido->produtos as $produto): ?>
        	    	                                <div class="row">
        	    	                                    <div class="col-1"><?php echo $produto->id_produto ?></div>
        	    	                                    <div class="col-5"><?php echo $produto->nome ?></div>
        	    	                                    <div class="col-2 text-right"><?php echo $produto->quantidade ?></div>
        	    	                                </div>
        	    	                            <?php endforeach ?>


        	    	                        </div>
        	    	                    </td>

        	    	                </tr>
        	    	            <?php endforeach; ?>
        	    	        <?php endif; ?>
        	    	    </tbody>

        	    	</table>

        	    	<!-- / COMPRAS -->



       	 		</div>
    		</div>
</div>


 <!-- Modal remover -->

<div class="modal fade" id="modalRemover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        Deseja realmente excluir esse pedido?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <a href="#" class="btn btn-primary btn-remove-ok">Confirmar</a>
      </div>
    </div>
  </div>
</div>
