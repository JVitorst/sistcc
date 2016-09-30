    <div class="container" style="margin-top:40px">
    	<div class="row">

    		<div class="col-sm-6 col-md-4 col-md-offset-4">

    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<?php if ($this->session->flashdata("danger")) :?>
    						<p class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></p>
    					<?php endif ?>
    					<strong>Área Restrita</strong>
    				</div>
    				<div class="panel-body">
    					<form class="form" method="post" action="<?= base_url()?>verificacao/logar">
    						<fieldset>
    							<legend>Entre com email e senha</legend>
    							<div class="row">
    								<div class="center-block">
    									<img class="profile-img"
    									src="<?=base_url()?>assets/img/login.png" alt="">
    								</div>
    							</div>
    							<div class="row">
    								<div class="col-sm-12 col-md-10  col-md-offset-1 ">
    									<div class="form-group">
    										<div class="input-group">
    											<span class="input-group-addon">
    												<i class="glyphicon glyphicon-user"></i>
    											</span> 
    											<input type="email"   class="form-control" placeholder="Email" name="email" required autofocus>
    										</div>
    									</div>
    									<div class="form-group">
    										<div class="input-group">
    											<span class="input-group-addon">
    												<i class="glyphicon glyphicon-lock"></i>
    											</span>
    											<input class="form-control" placeholder="Senha" name="senha" type="password" value=""  required>
    										</div>
    									</div>
    									<div class="form-group">
    										<input type="submit" class="btn btn-lg btn-primary btn-block" value="Entrar">
    									</div>
    								</div>
    							</div>
    						</fieldset>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>





 <!--  
<div class="container">

	<form class="form-signin" method="post" action="<?= base_url()?>verificacao/logar">
		<h2 class="form-signin-heading">Acesso Restrito</h2>
		<label for="inputEmail" class="sr-only">Email:</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Email"  name="email"  required autofocus>
		<label for="inputPassword" class="sr-only">Senha:</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="senha" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Loar</button>
	</form>

</div> <!--  -->
