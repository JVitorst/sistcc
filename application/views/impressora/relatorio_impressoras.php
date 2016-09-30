

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
	<?php if ($this->session->flashdata('success')):?>
		<p class="alert alert-success"> <?= $this->session->flashdata('success');?></p>
	<?php endif ?>
	<?php if ($this->session->flashdata('danger')):?>
		<p class="alert alert-danger"> <?= $this->session->flashdata('danger');?></p>
	<?php endif ?>
	<div class="col-md-12" id="print">
		<h1 class="page-header">Informações relacionadas as Impressoras</h1>
		<h3 class="text-warning text-left">Selecione o período e a impressora para a listagem</h3>
	</div>
	<div class="row">

		<form   action="<?= base_url()?>impressora/relatorio_impressoras" method="post" >
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
			<div class="col-md-3">
				<label for="impressora">Impressora</label>
				<select id="impressora" class="form-control" name="impressora">
					<?php foreach($impressoras as $linha): ?>
						<option value="<?= $linha->id?>"><?= $linha->marca. ' - '.$linha->modelo;?></option>
					<?php endforeach; ?>
				</select>


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
			Impressões Realizadas
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
						Marca
					</th>
					<th>
						Modelo
					</th>

					<th>
						Copias
					</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($listagem as $list){?>

					<tr>

						<td><?= dataMysqlPtBr($list->data_impressao_aluno) ?></td> 
						<td><?= $list->nome ?></td> 
						<td><?= $list->nome_sala ?></td> 
						<td><?= $list->marca ?></td> 
						<td><?= $list->modelo ?></td> 
						<td><?= $list->copias ?></td> 



					</tr>

					<?php }?>
					<th class="danger" >TOTAL: </th>

					<td colspan="5" class="danger" align="right" ><b><?php echo $total[0]->copias; ?> cópias</b></td>
					
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

		<script>
			var laserjet1005 = "<?php echo $janeiro->quantidade;?>";
			var aserjet1020 = "<?php echo $fevereiro->quantidade;?>";
			var photosmart1020 = "<?php echo $marco->quantidade;?>";
			var asprinter = "<?php echo $abril->quantidade;?>";
			

			new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'grafico_impressoras',

  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  { mes: 'Jan', Impressões_Alunos: qntdJaneiro },
  { mes: 'Fev', Impressões_Alunos: qntdFevereiro },
  { mes: 'Mar', Impressões_Alunos: qntdMarco },
  { mes: 'Abril',Impressões_Alunos: qntdAbril },
  { mes: 'Mai', Impressões_Alunos: qntdMaio },
  { mes: 'Jun', Impressões_Alunos: qntdJunho },
  { mes: 'Jul', Impressões_Alunos: qntdJulho },
  { mes: 'Ago', Impressões_Alunos: qntdAgosto },
  { mes: 'Set', Impressões_Alunos: qntdSetembro },
  { mes: 'Out', Impressões_Alunos: qntdOutubro },
  { mes: 'Nov', Impressões_Alunos: qntdNovembro },
  { mes: 'Dez', Impressões_Alunos: qntdDezembro }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'mes',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['Impressões_Alunos'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Impressões de Alunos'],
  barColors: ["#4169E1"]
});

</script>