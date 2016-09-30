
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<?php if ($this->session->flashdata("danger")) :?>
		<p class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></p>
	<?php endif ?>

	<div class="col-md-12">
		<h1 class="page-header">Impressão - Aluno</h1>

	</div>
	<div class="row" > 	
		<div class="col-md-12" >
			<form   id="formImpressao" action="<?= base_url()?>dashboard/verificarAluno" method="post" onSubmit="return validar(this);" >

				<div class="form-group" >
					<label for="nome_aluno">Nome </label>
					<input  class="form-control" id="pesquisar"  name="nome_aluno" autocomplete="off" placeholder="Pesquise o nome..."  	required autofocus >

					<ul class=" dropdown-menu txtaluno"  role="menu" aria-labelledby="dropdownMenu"  id="DropdownAluno" style="margin-left: 15px">
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


			<div class="col-md-2">
				<label for="valor">Valor</label>
				<select id="valor" class="form-control" name="valor" onblur="calcular();">
					<option value="0.50">R$ 0.50</option>
					<option value="1">R$ 1.00</option>
					<option value="2">R$ 2.00</option>
				</select>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label for="result">Total</label>
					<input   class="form-control" id="result"  name="result"  />
				</div>
			</div>
			<div class="col-md-2">
				<label for="situacao">Situação</label>
				<select id="situacao" class="form-control" name="situacao">
					<option value="1">Pago</option>
					<option value="2">Não pago</option>
				</select>
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
		<form   id="formVerificacao" action="<?= base_url()?>dashboard/alunoDevedor" method="post"  >
			<table class="table table-condensed">
				<th width="10px">Estoque Folhas</th>
				
				<tr >
					<td class="danger">
						<?php       echo $totalFolha->quantidade?> - Folhas


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