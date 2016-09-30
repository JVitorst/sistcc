
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<div class="col-md-12">
		<h1 class="page-header">Cadastro de Funcionários</h1>
	</div>

	<div class="col-md-12">
		<form   action="<?= base_url()?>funcionario/salvar_atualizacao" method="post" >
			<input id="alun_id" name="idFunc" type="hidden" value="<?= $funcionario[0]->idFunc; ?>">
			<div class="form-group">
				<div class="col-md-12"></div>
				<label for="nome">Nome </label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome..." value="<?=  $funcionario[0]->nome; ?>">
			</div>
		</div>
		<div class="row"> 	
			<div class="col-md-4">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email"  name="email"  value="<?=  $funcionario[0]->email; ?>" placeholder="Insira o email...">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="cargo">Cargo:</label>
					<input type="test" class="form-control" id="cargo"  name="cargo" placeholder="Insira o cargo..." value="<?=  $funcionario[0]->cargo; ?> ">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="local">Local:</label>
					<input type="test" class="form-control" id="local"  name="local" placeholder="Insira o local..." value="<?=  $funcionario[0]->local; ?>" >
				</div>
			</div>
		</div>
		<div style="text-align: right">
			<button type="submit" class="btn btn-success">Enviar</button>
			<button type="reset" class="btn btn-default">Cancelar</button>
		</div>
	</form>


</div>

</div>

