
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<div class="col-md-12">
		<h1 class="page-header">Cadastro de Aluno</h1>
	</div>

	<div class="col-md-12">
		<form   action="<?= base_url()?>aluno/cadastrar" method="post" >
			<div class="form-group">
				<div class="col-md-12"></div>
				<label for="nome">Nome </label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome...">
			</div>
		</div>
		<div class="row"> 	
			<div class="col-md-6">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email"  name="email" placeholder="Insira o email...">
				</div>
			</div>
			

			<div class="col-md-4">

				<label for="sala">Sala</label>
				<select id="sala" class="form-control" name="sala">
					<option value="0">---</option>
					<?php foreach($salas as $linha): ?>
						<option value="<?= $linha->idSala?>"><?= $linha->nome_sala. ' - '.$linha->segmento;?></option>
					<?php endforeach; ?>
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

