
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<?php if ($this->session->flashdata("danger")) :?>
		<p class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></p>
	<?php endif ?>

	<div class="col-md-12">
		<h1 class="page-header">Impressão - Funcionário</h1>

	</div>
	<div class="row" > 	
		<div class="col-md-12" >
			<form   id="formImpressao" action="<?= base_url()?>dashboard/registrar_funcionario" method="post" onSubmit="return validar(this);" >

				<div class="form-group" >
					<label for="nome_aluno">Nome </label>
					<input  class="form-control" id="pesquisar"  name="nome" autocomplete="off" placeholder="Pesquise o nome..."  	required autofocus >

					<ul class=" dropdown-menu txtfunc"  role="menu" aria-labelledby="dropdownMenu"  id="DropdownFuncionario" style="margin-left: 15px">
					</ul>

				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label >Copias</label>
					<input type="number" class="form-control" id="copias"  name="copias" onblur="calcular();" onkeyup="checarEstoque();" placeholder="" >

				</div>
				<div id="divcheck"></div>
			</div>
			<div class="col-md-4">

				<label for="impressora">Impressora</label>
				<select id="impressora" class="form-control" name="impressora">
					<?php foreach($impressoras as $linha): ?>
						<option value="<?= $linha->id?>"><?= $linha->marca. ' - '.$linha->modelo;?></option>
					<?php endforeach; ?>
				</select>


			</div>

		</div>



		<div style="text-align: right">
			<button type="submit" class="btn btn-success" id="enviar">Enviar</button>
			<button type="reset" class="btn btn-default">Cancelar</button>
		</div>
	</form>

	<div class="col-md-3">
		<table class="table table-condensed">
			<th>Estoque Folhas</th>
			<tr class="danger">
				<td>
					<?php       echo $total->quantidade?> - Folhas

				</td>
			</tr>
		</table>

			<script type="text/javascript">
				function calcular(){
					var valor1 = parseInt(document.getElementById('copias').value, 10);
					var valor2 = parseFloat(document.getElementById('valor').value);
					parseFloat(document.getElementById('result').value = valor1 * valor2);
				}
			</script>

			<script>

				function checarEstoque() {
					var copias = parseInt(document.getElementById('copias').value, 10);
					var quantidade = "<?php echo $totalFolha->quantidade ?>";

					if (copias > quantidade) {

						document.getElementById("enviar").disabled = true;
					}  else {

						document.getElementById("enviar").disabled = false;
					}
				}



			</script>
			<script>
//Torna a div invisível
//document.getElementById("#").style.visibility = "hidden";
</script>