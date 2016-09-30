

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<?php if ($this->session->flashdata("danger")) :?>
		<p class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></p>
	<?php endif ?>

	<div class="col-md-12">
		<h1 class="page-header">Impressão - Funcionário</h1>
	</div>

	<div class="col-md-6" >
		<form   id="formImpressao" action="<?= base_url()?>dashboard/registrar_funcionario" method="post" onSubmit="return validar(this);" >
			<div class="form-group" >
				<label for="nome3">Nome</label>
				<input  class="form-control" id="pesquisar"  name="nome" autocomplete="off" placeholder="Pesquise o nome..."  	required autofocus >

				<ul class="dropdown-menu txtfunc" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownFuncionario">
				</ul>
			</div>
		</div>

		<div class="row" > 	
			<div class="col-md-2">
				<div class="form-group">
					<label >Copias</label>
					<input type="number" class="form-control" id="copias"  name="copias" onkeyup="checarEstoque2();"placeholder="" >

				</div>
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

	</div>
</div>




</div>

<script>

	function checarEstoque2() {
		var copias = parseInt(document.getElementById('copias').value, 10);
		var quantidade = "<?php echo $total->quantidade ?>";

		if (copias > quantidade) {

			document.getElementById("enviar").disabled = true;
		}  else {

			document.getElementById("enviar").disabled = false;
		}
	}



</script>