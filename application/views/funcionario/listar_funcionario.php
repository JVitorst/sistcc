
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <?php if ($this->session->flashdata('success')):?>
    <p class="alert alert-success"> <?= $this->session->flashdata('success');?></p>
  <?php endif ?>
  <?php if ($this->session->flashdata('danger')):?>
    <p class="alert alert-danger"> <?= $this->session->flashdata('danger');?></p>
  <?php endif ?>
  <div class="col-md-10">
    <h1 class="page-header">Funcionários</h1>
  </div>
  <div class="col-md-2">
    <a class="btn btn-primary btn-block" href="<?=base_url()?>funcionario/cadastro" >Novo Funcionario</a>
  </div>


  <div class="row" style="margin-bottom: 15px">
    <form  action="<?= base_url()?>funcionario/pesquisar" method="post" >
      <div class="col-md-10">
        <input type="text" class="form-control" name="pesquisar" placeholder="Pesquise o nome...">
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-success btn-block">Pesquisar</button>
      </div>
    </form>
  </div>
  



  <div  class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <th>Id</th>
          <th>Nome</th>
          <th>Email:</th>
          <th>Cargo:</th>
          <th>Local:</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>

          <?php foreach($funcionarios as $linha){?>
            <tr>
              <td><?=$linha->idFunc ?></td>
              <td><?=$linha->nome ?></td>
              <td><?=$linha->email ?></td>
              <td><?=$linha->cargo?></td>
              <td><?=$linha->local?></td>
              <td>
                <a href="<?= base_url('funcionario/atualizar/'.$linha->idFunc)?>" class="btn btn-primary">Alterar</a>
                <a href="<?= base_url('funcionario/excluir/'.$linha->idFunc)?>" class="btn btn-danger" onclick="return confirm ('Deseja relamente exluir o Aluno ?');">Excluir</a>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

<!-- -->