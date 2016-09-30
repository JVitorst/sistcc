
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <?php if ($this->session->flashdata('success')):?>
    <p class="alert alert-success"> <?= $this->session->flashdata('success');?></p>
  <?php endif ?>
  <?php if ($this->session->flashdata('danger')):?>
    <p class="alert alert-danger"> <?= $this->session->flashdata('danger');?></p>
  <?php endif ?>

  
  <div class="col-md-10">
    <h1 class="page-header">Listagem de Usuários</h1>
  </div>
  <div class="col-md-2">
    <a class="btn btn-primary btn-block" href="<?=base_url()?>usuario/cadastro" >Novo Usuário</a>
  </div>

  <div  class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <th>Id</th>
          <th>Nome</th>
          <th>Email:</th>
          <th>Nivel:</th>
          <!--  <th>Cidade:</th>-->
          <th></th>
          <th></th>
        </thead>
        <tbody>

          <?php foreach($usuarios as $usu){?>
          <tr>
            <td><?= $usu->idUsuario ?></td>
            <td><?=$usu->nome ?></td>
            <td><?=$usu->email?></td>
            <td><?=$usu->nivel==1?'Administrador':'Usuario' ?></td>
            <!-- <td><?=$usu->nome_cid?></td>-->
            <td>
              <a href="<?= base_url('usuario/atualizar/'.$usu->idUsuario)?>" class="btn btn-primary">Alterar</a>
              <a href="<?= base_url('usuario/excluir/'.$usu->idUsuario)?>" class="btn btn-danger" onclick="return confirm ('Deseja relamente exluir o usuário ?');">Excluir</a>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>

    </div>
  </div>
</div>

<!-- -->