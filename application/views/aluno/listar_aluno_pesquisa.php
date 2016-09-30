
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <?php if ($this->session->flashdata('success')):?>
    <p class="alert alert-success"> <?= $this->session->flashdata('success');?></p>
  <?php endif ?>
  <?php if ($this->session->flashdata('danger')):?>
    <p class="alert alert-danger"> <?= $this->session->flashdata('danger');?></p>
  <?php endif ?>
  <div class="col-md-10">
    <h1 class="page-header">Alunos</h1>
  </div>
  <div class="col-md-2">
    <a class="btn btn-primary btn-block" href="<?=base_url()?>aluno/cadastro" >Novo Aluno</a>
  </div>


  <div class="col-md-12">
    <form  action="<?= base_url()?>aluno/pesquisar" method="post" >
      <div class="col-md-10">
        <input type="text" class="form-control" id="pesquisar"  name="pesquisar" autocomplete="off" placeholder="Pesquise o nome...">

      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-success">Pesquisar</button>
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
          <th>Sala:</th>
          <th>Segmento:</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>

          <?php foreach($listagem as $alun){?>
          <tr>

            <td><?= $alun->idAluno ?></td>
            <td><?=$alun->nome ?></td>
            <td><?=$alun->email ?></td>
            <td><?=$alun->nome_sala?></td>
            <td><?=$alun->segmento?></td>
            <td>
              <a href="<?= base_url('aluno/atualizar/'.$alun->idAluno)?>" class="btn btn-primary">Alterar</a>
              <a href="<?= base_url('aluno/excluir/'.$alun->idAluno)?>" class="btn btn-danger" onclick="return confirm ('Deseja relamente exluir o Aluno ?');">Excluir</a>
            </td>
          </tr>
          <?php }?>
        </tbody>
        <tfoot>
          <th>Id</th>
          <th>Nome</th>
          <th>Email:</th>
          <th>Sala:</th>
          <th>Segmento:</th>
          <th></th>
          <th></th>
        </tfoot>
      </table>




    </div>
  </div>
</div>

<!-- -->