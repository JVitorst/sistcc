
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<div class="col-md-12">
		<h1 class="page-header">Cadastro de Usuários</h1>
	</div>

	<div class="col-md-12">
		<form   action="<?= base_url()?>usuario/cadastrar" method="post" >
			<div class="form-group">
				<div class="col-md-12"></div>
				<label for="nome">Nome </label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome...">
			</div>
		</div>
		<div class="row"> 	
			<div class="col-md-5">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email"  name="email" placeholder="Insira o email...">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Insira a senha...">
				</div>
			</div>
			<div class="col-md-2">
				<label for="nivel">Nivel</label>
				<select id="nivel" class="form-control" name="nivel">
					<option value="0">---</option>
					<option value="1">Administrador</option>
					<option value="2">Usuario</option>
				</select>
			</div>
			<div class="col-md-2">
				<label for="status">Status:</label>
				<select id="status" class="form-control" name="status">
					<option value="0">---</option>
					<option value="1">Ativo</option>
					<option value="2">Inativo</option>
				</select>
			</div>

		</div>
		<div class="row">




		</div>
		<div style="text-align: right">
			<button type="submit" class="btn btn-success">Enviar</button>
			<button type="reset" class="btn btn-default">Cancelar</button>
		</div>
	</form>


</div>

</div>

