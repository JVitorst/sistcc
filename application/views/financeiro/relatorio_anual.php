
<div id="print" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
	<nav class="navbar navbar-default" role="navigation" >

		<div class="collapse navbar-collapse" id="headder">
			<div class="col-md-12">
				<h1 class="page-header">Relatório Anual de Impressões</h1>
				
			</div>
			<ul class="nav navbar-nav">
				
				<div class="form-group">
					<label class="control-label ">Selecione o ano:</label>
					<div class="col-md-9">
						<select name="tinta" class="form-control">
							<option value="">2016</option>
							<option value="">2015</option>
						</select>
						<span class="help-block"></span>
					</div>
				</ul>
				

			</div>
		</nav>
		<script>
//Torna a div invisível
document.getElementById("#").style.visibility = "hidden";
</script>


<table class="table table-responsive " >
	<thead>
		<tr>
			<th>
				Mês
			</th>
			<th>
				Registro de Impressões-Alunos
			</th>
			<th>
				Registro de Impressões-Funcionários
			</th>
			<th>
				Cópias Pagas
			</th>
			<th>
				Receita
			</th>
		</tr>
	</thead>
	<tbody >
		<tr>
			<th>Janeiro</th>
			<td>
				<?php 	echo $janeiro->quantidade; ?>
			</td>
			<td>
				<?php 	echo $janeiroFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($janeiro->copias) ; ?>
			</td>
			<td>
				<?php 	echo  numeroEmReais($janeiro->total); ?>
			</td>
		</tr>
		<tr >
			<th>Fevereiro</th>
			<td>
				<?php 	echo $fevereiro->quantidade; ?>
			</td>
			<td>
				<?php 	echo $fevereiroFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($fevereiro->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($fevereiro->total); ?>
			</td>

		</tr>
		<tr >
			<th>Março</th>
			<td>
				<?php 	echo $marco->quantidade; ?>
			</td>
			<td>
				<?php 	echo $marcoFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($marco->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($marco->total); ?>
			</td>
		</tr>
		<tr >
			<th>Abril</th>

			<td>
				<?php 	echo $abril->quantidade; ?>
			</td>
			<td>
				<?php 	echo $abrilFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($abril->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($abril->total); ?>
			</td>
		</tr>
		<tr >
			<th>Maio</th>
			<td>
				<?php 	echo $maio->quantidade; ?>
			</td>
			<td>
				<?php 	echo $maioFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($maio->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($maio->total) ; ?>
			</td>
		</tr>
		<tr >
			<th>Junho</th>
			<td>
				<?php 	echo $junho->quantidade; ?>
			</td>
			<td>
				<?php 	echo $junhoFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($junho->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($junho->total); ?>
			</td>
		</tr>
		<tr >
			<th>Julho</th>
			<td>
				<?php 	echo $julho->quantidade; ?>
			</td>
			<td>
				<?php 	echo $julhoFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($julho->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($julho->total); ?>
			</td>
		</tr>
		<tr >
			<th>Agosto</th>
			<td>
				<?php 	echo $agosto->quantidade; ?>
			</td>
			<td>
				<?php 	echo $agostoFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($agosto->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($agosto->total); ?>
			</td>
		</tr>
		<tr >
			<th>Setembro</th>
			<td>
				<?php 	echo $setembro->quantidade; ?>
			</td>
			<td>
				<?php 	echo $setembroFunc->quantidade; ?> 
			</td>
			<td>
				<?php 	echo 0 + ($setembro->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($setembro->total); ?>
			</td>
		</tr>
		<tr >
			<th>Outubro</th>
			<td>
				<?php 	echo $outubro->quantidade; ?>
			</td>
			<td>
				<?php 	echo $outubroFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($outubro->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($outubro->total); ?>
			</td>
		</tr>
		<tr >
			<th>Novembro</th>
			<td>
				<?php 	echo $novembro->quantidade; ?>
			</td>
			<td>
				<?php 	echo $novembroFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($novembro->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($novembro->total); ?>
			</td>
		</tr>
		<tr >
			<th>Dezembro</th>
			<td>
				<?php 	echo $dezembro->quantidade; ?>
			</td>
			<td>
				<?php 	echo $dezembroFunc->quantidade; ?>
			</td>
			<td>
				<?php 	echo 0 + ($dezembro->copias) ; ?>
			</td>
			<td>
				<?php 	echo numeroEmReais($dezembro->total); ?>
			</td>
		</tr>

	</tbody>

</table>
<a   id="printp" class="btn btn-info "><span class="glyphicon glyphicon-print "> Imprimir</span>  </a>	



<h2>Gráfico de Impressões de Alunos</h2>
<div id="myfirstchart" style="width: 1000px;  height : 250px;"></div>
<h2>Gráfico de Ganhos(valores em R$)</h2>
<div id="chart2" style="width: 1000px;  height : 250px;"></div>

</div>


<script>
	var qntdJaneiro = "<?php echo $janeiro->quantidade;?>";
	var qntdFevereiro = "<?php echo $fevereiro->quantidade;?>";
	var qntdMarco = "<?php echo $marco->quantidade;?>";
	var qntdAbril = "<?php echo $abril->quantidade;?>";
	var qntdMaio = "<?php echo $maio->quantidade;?>";
	var qntdJunho = "<?php echo $junho->quantidade;?>";
	var qntdJulho = "<?php echo $julho->quantidade;?>";
	var qntdAgosto = "<?php echo $agosto->quantidade;?>";
	var qntdSetembro = "<?php echo $setembro->quantidade;?>";
	var qntdOutubro = "<?php echo $outubro->quantidade;?>";
	var qntdNovembro = "<?php echo $novembro->quantidade;?>";
	var qntdDezembro = "<?php echo $dezembro->quantidade;?>";
	new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',

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

<script>
// Varias recebem valores dos totais mensais, o " 0 +" serve para a váriável nao ficar nula.
var totalJaneiro = 0 + "<?php echo $janeiro->total;?>";
var totalFevereiro = 0 +"<?php echo $fevereiro->total;?>";
var totalMarco = 0 + "<?php echo $marco->total;?>";
var totalAbril = 0 + "<?php echo $abril->total;?>";
var totalMaio = 0 + "<?php echo $maio->total;?>";
var totalJunho = 0 + "<?php echo $junho->total;?>";
var totalJulho = 0 + "<?php echo $julho->total;?>";
var totalAgosto = 0 + "<?php echo $agosto->total;?>";
var totalSetembro = 0  +"<?php echo $setembro->total;?>";
var totalOutubro = 0 + "<?php echo $outubro->total;?>";
var totalNovembro = 0 + "<?php echo $novembro->total;?>";
var totalDezembro = 0 +"<?php echo $dezembro->total;?>";
new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'chart2',

  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  { mes: 'Jan', receita: totalJaneiro },
  { mes: 'Fev', receita: totalFevereiro },
  { mes: 'Mar', receita: totalMarco },
  { mes: 'Abril',receita: totalAbril },
  { mes: 'Mai', receita: totalMaio },
  { mes: 'Jun', receita: totalJunho },
  { mes: 'Jul', receita: totalJulho },
  { mes: 'Ago', receita: totalAgosto },
  { mes: 'Set', receita: totalSetembro },
  { mes: 'Out', receita: totalOutubro },
  { mes: 'Nov', receita: totalNovembro },
  { mes: 'Dez', receita: totalDezembro }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'mes',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['receita'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Impressões'],
  barColors: ["#006400"]
});

</script>

<script>	
	var pagas = "<?php echo $pagas;?>";
	var NaoPagas = "<?php echo $Naopagas;?>";
	var livres =  "<?php echo $livres;?>";
	var totais =  "<?php echo $pagas;?>" + "<?php echo $Naopagas;?>" + "<?php echo $livres;?>";

	Morris.Donut({
		element: 'donut',
		data: [
		{label: "Impressões Pagas", value: pagas},
		{label: "Impressões não Pagas", value: NaoPagas},
		{label: "Impressões Livres", value: livres}
		],
		backgroundColor: '#fff',
		labelColor: '#060',
		colors: [
		'#0BA462',
		'#39B580',
		'#67C69D',
		'#95D7BB'
		],
		formatter: function (x,totais) { 

			return  (x/totais * 100) + "%";}


		});

	</script>


	<script>

		$(document).ready(function() {
			$('#printp').printPage();
		});
	</script>

