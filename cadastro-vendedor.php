<?php
session_start();
ob_start();
?>
<!DOCTYPE html/>
<html lang="pt-br">
  <head>
    <title>Cadastro de Vendedores</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--CSS externo-->
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>

  <!--MENU-->
    <div class="cabecalho">
      <div class="titulo">
        <h1>QI AUTOMÓVEIS</h1>
      </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F9C038;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" style="color:black" href="index.html">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:black" href="cadastro-automovel.php">CADASTRO DE AUTOMÓVEIS <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:black" href="cadastro-vendedor.php">CADASTRO DE VENDEDORES <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:black" href="cadastro-filial.php">CADASTRO DE FILIAIS <span class="sr-only">(current)</span></a>
          </li>
	  <li class="nav-item">
            <a class="nav-link" style="color:black" href="consulta-automovel.php">CONSULTA<span class="sr-only">(current)</span></a>
          </li>
        </ul>
       </div>
      </nav>





      <!-- <div class="container">
        <h1 class="jumbotron bg-info">Cadastro de Automoveis</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Sistema</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastro-automovel.php">cad.automovel <span class="sr-only">(current)</span></a>
              </li> -->

              <!-- <li class="nav-item">
                <a class="nav-link" href="consulta-livro.php">cons.livros <span class="sr-only"></span></a>
              </li>
            </ul>
          </div>
        </nav> -->
      <div class="container">
        <form name="cadautomovel" method="post" action="">
          <div class="form-group">
            <input type="text" name="txtnome" placeholder="Nome" class="form-control" autofocus="autofocus">
          </div>
          <div class="form-group">
            <input type="text" name="txtsobrenome" placeholder="Sobrenome" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="txtfone" placeholder="Fone" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="txtemail" placeholder="Email" class="form-control">
          </div>
          <div class="form-group">
            <input type="number" name="numfil" placeholder="Filial" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="cadastrar" value="Cadastrar" class="btn">
            <input type="reset" name="limpar" value="Limpar" class="btn btn-danger">
          </div>
        </form>
      </div>

        <?php
        if(isset($_SESSION['msg'])){
          echo "<h2>".$_SESSION['msg']."</h2>";
          unset($_SESSION['msg']);
        }
        ?>

        <?php
        if(isset($_POST['cadastrar'])){
          include_once "modelo/vendedor.class.php";
          include_once "dao/vendedordao.class.php";
          include_once "util/padronizacao.class.php";

          $vend = new vendedor();
          $vend->nome = Padronizacao::padronizar($_POST['txtnome']);
          $vend->sobrenome = Padronizacao::padronizar($_POST['txtsobrenome']);
          $vend->fone = Padronizacao::padronizarBas($_POST['txtfone']);
          $vend->email = Padronizacao::padronizarBas($_POST['txtemail']);
          $vend->idFilial = Padronizacao::padronizarBas($_POST['numfil']);


          $vendDAO = new VendedorDAO();
          $vendDAO->cadastrarVendedor($vend);

          $_SESSION['msg']= "Vendedor cadastrado com sucesso!";
          header("location:cadastro-vendedor.php");
        }
        ?>

      </div>
  </body>
</html>
