

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
	<?php if ($this->session->flashdata('success')):?>
		<p class="alert alert-success"> <?= $this->session->flashdata('success');?></p>
	<?php endif ?>
	<?php if ($this->session->flashdata('danger')):?>
		<p class="alert alert-danger"> <?= $this->session->flashdata('danger');?></p>
	<?php endif ?>
	<div class="col-md-12" id="print">
		<h1 class="page-header">Total recebido e a receber</h1>
		<h3 class="text-warning text-left">Selecione o periodo para a listagem</h3>
	</div>
	<div class="row">

		<form   action="<?= base_url()?>pagantes_devedores/index" method="post" >
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">De: </label>
					<input name="data_inicio" placeholder="yyyy-mm-dd" class="form-control " type="date">

				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Até: </label>
					<input name="data_fim" placeholder="yyyy-mm-dd" class="form-control" type="date">
					
				</div>

			</div>

		</div>
		<div class="container">
			<button type="submit" class="btn btn-success">Enviar</button>
			<button type="reset" class="btn btn-default">Limpar</button>
			<input type="button" id="printp" value="Imprimir" class="btn btn-info">
		</div>
	</form>


	<div class="col-md-12" id="print2">

		<h3 class="text-info text-left">
			Pagos
		</h3>
		<table class="table table-bordered table-striped" border="0.5">
			<thead>
				<tr>
					<th>
						Data da Impressao
					</th>
					<th>
						Aluno
					</th>
					<th>
						Sala
					</th>
					<th>
						Segmento
					</th>
					<th>
						Copias
					</th>

					<th>
						Total
					</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($pagas as $paga){?>

					<tr>

						<td><?= dataMysqlPtBr($paga->data_impressao_aluno) ?></td>
						<td><?=$paga->nome ?></td>
						<td><?=$paga->nome_sala ?></td>
						<td><?=$paga->segmento ?></td>
						<td><?=$paga->copias ?></td>
						<td><?=$paga->total?></td>
					</tr>

					<?php }?>
					<th class="danger" >TOTAL: </th>

					<td colspan="3" class="danger" align="right" style="padding-right: -30px"><b><?php echo $totalcop[0]->copias; ?> cópias</b></td>
					<td colspan="5" class="danger" align="right" style="padding-right: 42px"><b> R$ <?php echo $totalpg[0]->total; ?></b></td>
				</tbody>
			</table> 
			<h3 class="text-danger text-left">
				A receber
			</h3>
			<table class="table table-condensed table-striped">
				<thead>
					<tr>
						<th>
							Data da Impressao
						</th>
						<th>
							Aluno
						</th>
						<th>
							Sala
						</th>
						<th>
							Segmento
						</th>
						<th>
							Copias
						</th>

						<th>
							Total
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($naopagas as $paga){?>


						<tr>

							<td><?= dataMysqlPtBr($paga->data_impressao_aluno) ?></td>

							<td><?=$paga->nome ?></td>
							<td><?=$paga->nome_sala ?></td>
							<td><?=$paga->segmento ?></td>
							<td><?=$paga->copias ?></td>
							<td><?=$paga->total?></td>
						</tr>

						<?php }?>
						<th class="danger" >TOTAL:</th>
						<td colspan="3" class="danger" align="right" style="padding-right: -30px"><b><?php echo $totalcoprec[0]->copias; ?> cópias</b></td>
						<td colspan="5" class="danger" align="right" style="padding-right: 52px"><b> R$ <?php echo $totalrc[0]->total; ?></b></td>


					</tbody>
				</table>

			</div>

			<script type="text/javascript"> 

				$(document).ready(function() {


					$('.datepicker').datepicker({
						autoclose: true,
						format: "yyyy-mm-dd",
						todayHighlight: true,
						orientation: "top auto",
						todayBtn: true,
						todayHighlight: true,  
					});

				});

			</script>

			<script>

				$(document).ready(function() {
					$('#printp').printPage();
				});
			</script>