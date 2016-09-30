
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">TCC - Sistema Web</a>
    <span style="color: red "></span>
</div>
<div id="navbar" class="navbar-collapse collapse">
  <ul class="nav navbar-nav navbar-right">
    <li><a href="<?= base_url()?>dashboard/logout">Deslogar</a></li>
</ul>

</div>
</div>
</nav>


<div class="side-menu">

    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="brand-wrapper">
                <!-- Hamburger -->
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Brand -->
                <div class="brand-name-wrapper">
                    <a class="navbar-brand " href="#">
                     Logado como:
                 </a>
             </div>

             <!-- Search -->
             <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                <span class="glyphicon glyphicon-arrow-down"></span>
            </a>

            <!-- Search body -->
            <div id="search" class="panel-collapse collapse" active>
                <div class="panel-body">
                    <form class="navbar-form" role="search">
                        <div class="form-group">
                            <h4 align="center">+<?php echo $this->session->userdata('nome') ?></h4>

                            <!-- Verifica a o nivel do usuario a partir da sessao-->
                            <h4 align="center">
                                <?php 
                                if ($this->session->userdata('nivel') == 1 ) {
                                  echo "Administrador";
                              }else{
                               echo "Usuário Comun";
                           }

                           ?>

                       </h4>

                   </div>
               </form>
           </div>
       </div>
   </div>

</div>
<script>
    $('#search').collapse({
      toggle: true
  })
</script>




<div class="side-menu-container">
    <ul class="nav navbar-nav">

        <li><a href="<?=base_url()?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
        <li ><a href="<?=base_url()?>usuario"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
        <li class="panel panel-default" id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">


                <?php  if ($this->session->userdata('nivel') == 1 ) {?>

                    <!-- Main Menu Admin -->
                    <span class="glyphicon glyphicon-plus"></span> Cadastros<span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="<?=base_url()?>aluno/pag">Alunos</a></li>
                            <li><a href="<?=base_url()?>funcionario">Funcionários</a></li>
                            <li><a href="<?=base_url()?>impressora">Impressoras</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <!-- Dropdown-->
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown2-lvl1">
                    <span class="glyphicon glyphicon-usd"></span> Financeiro<span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown2-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="<?=base_url()?>pagantes_devedores">Pagos e a Receber</a></li>
                            <li><a href="<?=base_url()?>relatorio_anual">Relatório Anual</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl3">
                    <span class="glyphicon glyphicon-print" id="popoverFinanceiro"  data-content="Popover with data-trigger" rel="popover" data-placement="bottom" data-original-title="Title" data-trigger="hover" ></span> Impressões<span class="caret"></span>
                </a>

                <div id="dropdown-lvl3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="<?=base_url()?>estoque_folha">Folhas</a></li>
                            <li><a href="<?=base_url()?>alunoImpressoes">Impressões Alunos</a></li>
                            <li><a href="<?=base_url()?>impressora/relatorio_impressoras">Impressoras</a></li>
                        </ul>
                    </div>
                </div>
            </li>



            <?php }else{ ?>

                <!-- Main Menu User -->
                <span class="glyphicon glyphicon-plus"></span> Cadastro<span class="caret"></span>
            </a>

            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl1" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="nav navbar-nav">
                        <li><a href="<?=base_url()?>aluno/pag">Alunos</a></li>
                        <li><a href="<?=base_url()?>funcionario">Funcionários</a></li>
                    </ul>
                </div>
            </div>
        </li>
        

        <li class="panel panel-default" id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl3">
                <span class="glyphicon glyphicon-print" id="popoverFinanceiro"  data-content="Popover with data-trigger" rel="popover" data-placement="bottom" data-original-title="Title" data-trigger="hover" ></span> Impressões<span class="caret"></span>
            </a>

            <div id="dropdown-lvl3" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="nav navbar-nav">
                        <li><a href="<?=base_url()?>estoque_folha">Folhas</a></li>
                        <li><a href="<?=base_url()?>alunoImpressoes">Impressões Alunos</a></li>
                        <li><a href="<?=base_url()?>impressora/relatorio_impressoras">Impressoras</a></li>
                    </ul>
                </div>
            </div>
        </li>


        <?php   }      ?>





    </ul>
</div><!-- /.navbar-collapse -->
</nav>

</div>
