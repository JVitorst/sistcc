<?php $this->load->view('includes/html_header'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<?php if ($this->session->flashdata('success')):?>
		<p class="alert alert-success"> <?= $this->session->flashdata('success');?></p>
	<?php endif ?>
	<?php if ($this->session->flashdata('danger')):?>
		<p class="alert alert-danger"> <?= $this->session->flashdata('danger');?></p>
	<?php endif ?>
	<div class="col-md-10">
		<h3 class="page-header">O aluno <b><?php echo $check[0]->nome  ?></b> possui <u><?php echo count($check)  ?></u> impressão(ões) a pagar</h1>
		</div>




		<div class="col-md-12">
			<h3 class="text-info text-left">
				Informações referentes à impressão:
			</h3>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>
							Data
						</th>
						<th>
							Sala
						</th>
						<th>
							Copias
						</th>
						<th>
							Total a pagar
						</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($check as $list){?>

						<tr>
							<td><?= dataMysqlPtBr2($list->data_impressao_aluno) ?></td>
							<td><?=$list->nome_sala ?></td>
							<td><?=$list->copias ?></td>
							<td><?=$list->total ?></td>


						</tr>


						<?php }?>

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

			<?php $check = '1'; ?>
			<div class="col-md-12">		
				<form   id="formImpressao" action="<?= base_url()?>dashboard/registrar_aluno" method="post" " >
					<div>

						<button type="submit" class="btn btn-success" id="enviar">Confirmar Impressão</button>
						<a class="btn btn-danger" href="<?=base_url()?>dashboard/impressao_aluno" >Voltar a Impressão</a>
					</div>
				</form>

			</div>

		</div>
	</div>
	<?php $this->load->view('includes/html_footer'); ?>