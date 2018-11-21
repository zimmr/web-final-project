<?php
  session_start();
  ob_start();
  ?>
<!DOCTYPE html/>
<html lang="pt-br">
  <head>
    <title>Cadastro de Filiais</title>
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

    <div class="container">
      <form action="cadastro-filial.php" method="post" action="">
	  <div class="form-group col-sm-12">
	    <input class="form-control" type="text" name="txtnome" placeholder="Nome" required="required" autofocus="autofocus">
	  </div>
	  <div class="form-group col-sm-12">
	    <input  class="form-control" type="text" name="txtcidade" placeholder="Cidade" required="required">
	  </div>

          <div class="form-group col-sm-8">
            <input class="form-control" type="text" name="txtendereco" placeholder="Endereço" required="required">
          </div>

	  <div class="form-group col-sm-2">
	    <input type="text" name="txtnumero" placeholder="Nº" class="form-control">
	  </div>

          <div class="form-group col-sm-12">
            <input class="form-control" type="text" name="txtfone" placeholder="Fone" required="required">
          </div>
          <div class="form-group col-sm-12">
            <input class="form-control" type="text" name="txtemail" placeholder="Email" required="required">
          </div>

          <div class="form-group col-sm-12">
            <input class="btn" type="submit" name="cadastrar" value="Cadastrar">
            <input class="btn btn-danger" type="reset" name="limpar" value="Limpar">
          </div>

      </form>
    </div>

    <?php
      if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
      }
    ?>

    <?php
      if(isset($_SESSION['cadastrar'])){
      include_once 'modelo/filial.class.php';
      include_once 'dao/filialdao.class.php';

      $f = new Filial();
      $f->nome = $_POST['txtnome'];
      $f->cidade = $_POST['txtcidade'];
      $f->endereco = $_POST['txtendereco'].", ".$_POST['txtnumero'];
      $f->fone = $_POST['txtfone'];
      $f->email = $_POST['txtemail'];

      $filDAO = new FilialDAO();
      $filDAO->cadastrarFilial($fil);

      //echo $f;
      $_SESSION['msg']="Cadastro realizado.";
      $f->__destruct();
      //header("location:cadastro-filial.php");
      }
    ?>

  </body>
</html>
