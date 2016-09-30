
<div class="col-md-10 col-md-offset-2 main" >
  <div>

    <?php if ($cheio == NULL) {?>
      <?php if (empty($vazio->ativo)  ) {?>
        <div class="alert alert-danger">
          <strong>Atenção!</strong> Sem folha <a class="btn btn-danger" href="<?=base_url()?>estoque_folha" >Verificar Estoque</a>
        </div>
        <?php } ?>
        <?php }elseif($cheio->ativo == "1" || $cheio->ativo == NULL ) {?>
          <?php if ( $cheio->quantidade <= $cheio->estoque_minimo ): ?>
          <div class="alert alert-danger">
            <strong>Atenção!</strong> O nível de folha esta baixo.
          </div>
        <?php endif ?>
        <?php } ?>

        

        <?php if ($this->session->flashdata("success")) :?>
          <p class="alert alert-success"><?= $this->session->flashdata("success"); ?></p>
        <?php endif ?>

        <?php if ($this->session->flashdata("danger")) :?>
          <p class="alert alert-danger"><?= $this->session->flashdata("danger"); ?></p>
        <?php endif ?>


      </div>


      <div class="tabbable" id="tabs-422148">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#panel-alunos" data-toggle="tab">Alunos</a>
          </li>
          <li>
            <a href="#panel-funcionarios" data-toggle="tab">Funcionários</a>
          </li>
        </ul>
        <div class="tab-content ">
          <div class="tab-pane active" id="panel-alunos">
            <div class="page-header">
              <h3><span class="glyphicon glyphicon-th-list"></span> Impressões do dia / Alunos</h3>
              <form   action="<?= base_url()?>dashboard/index" method="post" >
                <div class='col-sm-3'>
                  <div class="form-group">
                    <div class='input-group date'>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar" disabled></span>
                      </span>
                      <input type='date' class="form-control"  name="data_inicio" />

                    </div>
                  </div>
                </div>
                <div class="col-md-2">

                  <div class="form-group">
                    <button type="submit" class="btn btn-success">Enviar</button>
                  </div>
                </div>


              </form>
              <div class="row" ">
                <div class="col-md-3">
                  <a   <?php if ($total == NULL && empty($vazio->ativo) || $total->quantidade == 0 ) {?>
                    class="btn btn-primary btn-block disabled"
                    <?php } ?> class="btn btn-primary btn-block" href="<?=base_url()?>dashboard/impressao_aluno"  >Nova Impressão/Aluno</a>
                  </div>

                </div>
              </div>


              <div class="row" style="margin-left: -30px">

               <!-- Inicio da tabela com as impressões -->
               <div class="col-md-10 table-responsive">
                <table class="table table-hover" >
                  <thead>
                    <tr>
                      <th >
                       Data
                     </th>
                     <th>
                      Aluno
                    </th>
                    <th> 
                      Sala
                    </th>
                    <th>
                      Segmento
                    </th>
                    <th>
                      Copias
                    </th>
                    <th>
                      Total
                    </th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($listagem as $list){?>
                    <tr <?php if ($list->situacao == 1) {?>
                     class="success"
                     <?php } ?> class="danger" >


                     <td ><?= dataMysqlPtBr($list->data_impressao_aluno) ?></td>
                     <td ><?=$list->nome?></td>
                     <td><?=$list->nome_sala?></td>
                     <td><?=$list->segmento?></td>
                     <td><?=$list->copias?></td>
                     <td><?=$list->total?></td>

                     <td>
                      <a href="<?= base_url('dashboard/paga/'.$list->idImpressaoAluno)?>" class="btn btn-default">Pagar</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>

                <tfoot>

                  <th >
                   Data
                 </th>
                 <th>
                  Aluno
                </th>
                <th> 
                  Sala
                </th>
                <th>
                  Segmento
                </th>
                <th>
                  Copias
                </th>
                <th>
                  Total
                </th>
                <th></th>
              </tfoot>
            </table>

          </div>
          <!-- Fim da tabela -->


          <div class="col-md-2">
            <ul class="list-group">
              <li class="list-group-item list-group-item-success">
                <span class="badge" style="font-size: 18px;"><?php echo $pagas; ?></span>
                Impressões pagas        </li>
              </ul>

              <ul class="list-group">
                <li class="list-group-item list-group-item-danger">
                  <span class="badge" style="font-size: 18px;"><?php echo $Naopagas; ?></span>
                  Impressões a pagar        </li>
                </ul>

                <ul class="list-group">
                  <li class="list-group-item list-group-item-info">
                    <span class="badge" style="font-size: 18px;"><?php echo $livres; ?></span>
                    Impressões Livres        </li>
                  </ul>


                  <div class="panel-group" id="panel-146088">

                    <div class="panel panel-default">
                      <div class="panel-heading">
                       <a class="panel-title" data-toggle="collapse" data-parent="#panel-146088" href="#panel-element-483143">Estoque</a>


                     </div>
                     <div id="panel-element-483143" class="panel-collapse collapse in ">
                      <div class="panel-body" style="background-color: lightgray">

                        <?php if ($total == NULL || $total->quantidade == 0 ){
                          echo "Sem folha !";
                        } else{ 
                          echo $total->quantidade?> - Folhas; 
                          <?php } ?>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>

            </div>

            <div class="tab-pane" id="panel-funcionarios">
              <div class="page-header">
                <h3><span class="glyphicon glyphicon-th-list"></span> Impressões - Funcionário</h3>   <div class="col-md-3">
                <a   <?php if ($total == NULL) {?>
                  class="btn btn-primary btn-block disabled"
                  <?php } ?> class="btn btn-primary btn-block" href="<?=base_url()?>dashboard/impressao_funcionario"  >Nova Impressão/Funcionario</a>
                </div> </div>
                
                






                <!-- Inicio da tabela com as impressões -->
                <div class="row" style="margin-left: -30px">
                  <div class="col-md-10 table-responsive">
                    <table class="table table-hover" >
                      <thead>
                        <tr>
                          <th >
                           Data:
                         </th>
                         <th>
                          Funcionario:
                        </th>
                        <th>
                          Copias:
                        </th>
                        <th>
                          Impressora:
                        </th>

                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($listagemFunc as $list){?>



                        <tr >


                         <td ><?= dataMysqlPtBr($list->data_impressao_func) ?></td>
                         <td ><?=$list->nome?></td>
                         <td><?=$list->copias?></td>
                         <td><?=$list->modelo?></td>

                       </tr>
                       <?php } ?>




                     </tbody>
                   </table>

                 </div>
                 <!-- Fim da tabela -->




                 <div class="col-md-2">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-success">
                      <span class="badge" style="font-size: 18px;"><?php echo $pagas; ?></span>
                      Impressões pagas        </li>
                    </ul>

                    <ul class="list-group">
                      <li class="list-group-item list-group-item-danger">
                        <span class="badge" style="font-size: 18px;"><?php echo $Naopagas; ?></span>
                        Impressões a pagar        </li>
                      </ul>

                      <ul class="list-group">
                        <li class="list-group-item list-group-item-info">
                          <span class="badge" style="font-size: 18px;" ><?php echo $livres; ?></span>
                          Impressões Livres        </li>
                        </ul>


                        <div class="panel-group" id="panel-146088">

                          <div class="panel panel-default">
                            <div class="panel-heading">
                             <a class="panel-title" data-toggle="collapse" data-parent="#panel-146088" href="#panel-element-483143">Estoque</a>
                           </div>
                           <div id="panel-element-483143" class="panel-collapse collapse in ">
                            <div class="panel-body" style="background-color: lightgray">

                              <?php if ($total == NULL ){
                                echo "Sem folha !";
                              } else{ 
                                echo $total->quantidade?> - Folhas; 
                                <?php } ?>
                              </div>
                            </div>
                          </div>


                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>












            </div>


