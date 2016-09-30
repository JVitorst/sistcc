<?php $this->load->view('includes/html_header'); ?>




<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<?php if ($this->session->flashdata('success')):?>
		<p class="alert alert-success"> <?= $this->session->flashdata('success');?></p>
	<?php endif ?>
	<?php if ($this->session->flashdata('danger')):?>
		<p class="alert alert-danger"> <?= $this->session->flashdata('danger');?></p>
	<?php endif ?>
	<div class="col-md-10">
		<h1 class="page-header">Estoque de folhas</h1>
	</div>
	<div class="col-md-2">
		<button type="button"   class="btn btn-primary " role="button" data-target="#myModal" data-toggle="modal"><i class="glyphicon glyphicon-download-alt"  ></i> Novo Estoque</button>
	</div>



	<div class="col-md-12">
		<h3 class="text-info text-left">
			Estoque na impressora
		</h3>
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>
						ID
					</th>
					<th>
						Data Entrada
					</th>
					<th>
						Data Inicio
					</th>
					<th>
						Estoque Minimo
					</th>
					<th>
						Estoque Atual
					</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($folhas as $folha){?>
					<?php if ($folha->ativo == '1'  ): ?>
					<tr>
						<td><?=$folha->idEstoque ?></td>
						<td><?= dataMysqlPtBr2($folha->data_entrada) ?></td>
						<td><?= dataMysqlPtBr2($folha->data_inicio )?></td>
						<td><?=$folha->estoque_minimo ?></td>
						<td><?=$folha->quantidade?></td>

						
					</tr>
				<?php endif ?>

				<?php }?>

			</tbody>
		</table> 

		<h3 class="text-left">
			Folhas no almoxarifado.
		</h3>
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>
						ID
					</th>
					<th>
						Data Entrada
					</th>
					<th>
						Estoque Minimo
					</th>
					<th>
						Estoque Atual
					</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($folhas as $folha){?>
					<?php if ($folha->espera == '1' ): ?>
					<tr>
						<td><?=$folha->idEstoque ?></td>
						<td><?= dataMysqlPtBr2($folha->data_entrada) ?></td>
						<td><?=$folha->estoque_minimo ?></td>
						<td><?=$folha->quantidade?></td>
						<td>
							<a href="<?= base_url('estoque_folha/ativarEstoque/'.$folha->idEstoque)?>" class="btn btn-primary">Ativar</a>
							
						</td>
						
					</tr>
				<?php endif ?>

				<?php }?>

			</tbody>
		</table>



		<h3 class="text-danger text-left">
			Histórico de estoques.
		</h3>
		<table class="table">
			<thead>
				<tr>
					<th>
						ID
					</th>
					<th>
						Data Entrada
					</th>
					
					<th>
						Quantidade carregada
					</th>
					<th>
						Data Baixa
					</th>
					<th>
						Duração
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($folhas as $folha){?>
					<?php if ($folha->ativo == '0' && $folha->espera == '0'): ?>
					<tr>
						<td><?=$folha->idEstoque ?></td>
						<td><?= dataMysqlPtBr2($folha->data_entrada) ?></td>
						<td><?=$folha->quantidade_entrada ?> folhas</td>
						<td><?= dataMysqlPtBr2($folha->data_baixa) ?></td>
						<td> <?php 
							$diferenca = strtotime($folha->data_baixa) - strtotime($folha->data_entrada);
							$dias = floor($diferenca / (60 * 60 * 24));
							echo $dias;
							?> dias</td>
							
						</tr>
					<?php endif ?>
					<?php }?>



				</tbody>
			</table>

			<div class="panel panel-info">
				<div class="panel-heading">Gerenciamento do Estoque</div>
				<div class="panel-body">
					
					<button class="btn btn-primary" id="adicionar" >Adicionar folhas ao estoque <span class="glyphicon glyphicon-arrow-down"></span></button>

					<button class="btn btn-primary" id="retirar">Retirar folhas ao estoque   <span class="glyphicon glyphicon-arrow-down"></span></button>

					<button class="btn btn-primary" id="estoque_minimo" >Editar Estoque Minimo   <span class="glyphicon glyphicon-arrow-down"></span></button>


					<div id="adiciona" style="margin-top: 0.6cm;">
						<form action="<?= base_url()?>estoque_folha/adicionaFolha" id="form" class="form-horizontal" method="post" >
							<div class="form-body">
								<div class="form-group" >

									<div class="col-md-4">
										<input  id="adicionadas" name="adicionadas" placeholder="Deseja adicionar quantas folhas?" class="form-control" type="number">

									</div>
									<button type="submit" class="btn btn-success">Adicionar</button>
								</div>
							</div>
						</form>
					</div>



					<div id="retira" style="margin-top: 0.6cm;">
						<form action="<?= base_url()?>estoque_folha/retiraFolha" id="form" class="form-horizontal" method="post" >
							<div class="form-body">
								<div class="form-group" >

									<div class="col-md-4">
										<input  onkeyup="checarEstoque();" id="retiradas" name="retiradas" placeholder="Deseja retirar quantas folhas?" class="form-control" type="number">

									</div>
									<button type="submit" class="btn btn-success" id="retirar">Retirar</button>
								</div>
							</div>
						</form>
					</div>

					<div   id="estoque" style="margin-top: 0.6cm;">
						<form action="<?= base_url()?>estoque_folha/editaEstoque" id="form" class="form-horizontal" method="post" >
							<div class="form-body">
								<div class="form-group" >
									<div class="col-md-4">
										<input  id="estoque" name="estoque" placeholder="Novo Estoque Minimo" class="form-control" type="number">

									</div>
									<button type="submit" class="btn btn-success">Atualizar</button>
								</div>
							</div>
						</form>
					</div>



				</div>

			</div>


		</div>
	</div>





</div>



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cadastro Folhas</h4>
			</div>
			<div class="modal-body form">
				<form action="<?= base_url()?>estoque_folha/inserir" id="form" class="form-horizontal" method="post" >

					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Data Entrada</label>
							<div class="col-md-9">
								<input name="data_entrada" placeholder="yyyy-mm-dd" class="form-control " type="date" >

							</div>

						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Quantidade</label>
							<div class="col-md-9">
								<input name="quantidade_entrada" placeholder="Quantidade de folhas" class="form-control" type="number">
								<span class="help-block"></span>
							</div>
						</div>



					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Enviar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</form>
	</div>

</div>
</div>
<?php $this->load->view('includes/html_footer'); ?>

<script>
	$(document).ready(function(){
		$("#retira").hide();
		$("#retirar").click(function(){
			$("#estoque").hide();
			$("#adiciona").hide();
			$("#retira").toggle();
		});
	});

	$(document).ready(function(){
		$("#adiciona").hide();
		$("#adicionar").click(function(){
			$("#estoque").hide();
			$("#retira").hide();
			$("#adiciona").toggle();
		});
	});

	$(document).ready(function(){
		$("#estoque").hide();
		$("#estoque_minimo").click(function(){
			$("#retira").hide();
			$("#adiciona").hide();
			$("#estoque").toggle();
		});
	});
</script>

<script>

	function checarEstoque() {
		var retiradas = parseInt(document.getElementById('retiradas').value, 10);
		var quantidade = "<?php echo $folha->quantidade ?>";

		if (retiradas > quantidade) {

			document.getElementById("#retirar").disabled = true;
		}  else {

			document.getElementById("#retirar").disabled = false;
		}
	}



</script>