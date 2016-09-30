
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<div class="col-md-12">
		<h1 class="page-header">Atualização de Usuários</h1>
	</div>
	<div class="col-md-12">
		<form   action="<?= base_url()?>usuario/salvar_atualizacao" method="post" >
			<input id="idUsuario" name="idUsuario" type="hidden" value="<?= $usuario[0]->idUsuario; ?>">
			<div class="form-group">
				<div class="col-md-12"></div>
				<label for="nome">Nome </label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome..." value="<?=  $usuario[0]->nome; ?>">
			</div>
		</div>
		<div class="row"> 	
			<div class="col-md-5">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email"  name="email" placeholder="Insira o email..." value="<?=  $usuario[0]->email; ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input type="button" class="btn btn-default form-control  "  data-toggle="modal" data-target="#myModal" value="Atualizar senha" d>
				</div>
			</div>
			<div class="col-md-2">
				<label for="nivel">Nivel</label>
				<select id="nivel" class="form-control" name="nivel" >
					<option value="0">---</option>
					<option value="1" <?=  $usuario[0]->nivel==1?'selected':''; ?> >Administrador</option>
					<option value="2" <?=  $usuario[0]->nivel==2?'selected':''; ?>>Usuario</option>
				</select>
			</div>
			<div class="col-md-2">
				<label for="status">Status:</label>
				<select id="status" class="form-control" name="status">
					<option value="0">---</option>
					<option value="1" <?=  $usuario[0]->status==1?'selected':''; ?>>Ativo</option>
					<option value="2" <?=  $usuario[0]->status==2?'selected':''; ?>>Inativo</option>
				</select>

			</div>

		</div>
		<div style="text-align: right;">
			<button class="btn btn-success" type="submit">Enviar</button>
			<button class="btn btn-default" type="reset">Cancelar</button>
		</div>
	</form>




	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Atualizar Senha</h4>
				</div>
				<div class="modal-body">
					<form action=" <?=base_url()?>usuario/salvar_senha"  method="post">
						<input id="idUsuario" name="idUsuario" type="hidden" value="<?= $usuario[0]->idUsuario; ?>">
						<div class="row">
							<div class="col-md-12">
								<label for="senha_antiga">Senha Antiga</label>
								<input type="password" name="senha_antiga" id="senha_antiga" class="form-control">
							</div>
							<div class="col-md-12">
								<label for="senha_nova">Nova Senha</label>
								<input type="password" name="senha_nova" id="senha_nova" class="form-control" onkeyup="checarSenha()" >
							</div>
							<div class="col-md-12">
								<label for="senha_confirmar">Confirmar Senha</label>
								<input type="password" name="senha_confirmar" id="senha_confirmar" class="form-control"  onkeyup="checarSenha()" >
							</div>
							<div class="col-md-12">
								<div id="divcheck"></div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary" id="enviarsenha">Salvar</button>
					</div>
				</form>	
			</div>
		</div>
	</div>


	<script>
		$(document).ready(function() {
			$("#senha_nova").keyup(checkPasswordMatch);
			$("#senha_confirmar").keyup(checkPasswordMatch);

		});
		function checarSenha() {
			var password = $("#senha_nova").val();
			var confirmPassword = $("#senha_confirmar").val();


			if (password == '' || '' == confirmPassword) {
				$("#divcheck").html("<span style='color: red'>Campo de senha vazio!</span>");
				document.getElementById("enviarsenha").disabled = true;
			} else if (password != confirmPassword) {
				$("#divcheck").html("<span style='color: red'>Senhas não conferem!</span>");
				document.getElementById("enviarsenha").disabled = true;
			} else {
				$("#divcheck").html("<span style='color: green'>Senha iguais!</span>");
				document.getElementById("enviarsenha").disabled = false;
			}
		}
	</script>





















