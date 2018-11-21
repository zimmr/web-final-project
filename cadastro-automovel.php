<?php
  session_start();
  ob_start();
  ?>

<!DOCTYPE html/>
<html lang="pt-br">
  <head>
    <title>Cadastro de Automoveis</title>
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
  	  <input type="text" name="txtmarca" placeholder="Marca" class="form-control" autofocus="autofocus">
  	</div>
  	<div class="form-group">
  	  <input type="text" name="txtmodelo" placeholder="Modelo" class="form-control">
  	</div>
  	<div class="form-group">
  	  <input type="text" name="txtcor" placeholder="Cor" class="form-control">
  	</div>
  	<div class="form-group">
  	  <input type="number" name="txtano" placeholder="Ano" class="form-control">
  	</div>
  	<div class="form-group">
  	  <input type="text" name="txtplaca" placeholder="Placa" class="form-control">
  	</div>
  	<div class="form-group">
  	  <input type="number" name="txtkm" placeholder="quilometragem" class="form-control">
  	</div>

  	<div class="form-group">
  	  <select name="selcomb" class="form-control">
  	    <option value="Gasolina">Gasolina</option>
  	    <option value="Alcool">Alcool</option>
  	    <option value="Flex">Flex</option>
  	    <option value="Diesel">Diesel</option>
  	  </select>
  	</div>
  	<div class="form-group">
  	  <select name="selportas" class="form-control">
              <option value="2">2 Portas</option>
              <option value="4">4 Portas</option>
  	  </select>
  	</div>
  	<div class="form-group">
  	  <select name="selcambio" class="form-control">
              <option value="Manual">Manual</option>
              <option value="Automatico">Automatico</option>
  	  </select>
  	</div>

  	<div class="form-group">
  	  <input type="text" name="txtpreco" placeholder="Preço" class="form-control">
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
      include_once "modelo/automovel.class.php";
      include_once "dao/automoveldao.class.php";
      include_once "util/padronizacao.class.php";

      $auto = new Automovel();
      $auto->marca = Padronizacao::padronizar($_POST["txtmarca"]);
      $auto->modelo = Padronizacao::padronizar($_POST["txtmodelo"]);
      $auto->cor = Padronizacao::padronizar($_POST["txtcor"]);
      $auto->ano = $_POST["txtano"];
      $auto->placa = Padronizacao::padronizar($_POST["txtplaca"]);
      $auto->km = $_POST["txtkm"];
      $auto->combustivel = $_POST["selcomb"];
      $auto->portas = $_POST["selportas"];
      $auto->cambio = $_POST["selcambio"];
      $auto->preco = $_POST["preco"];
      $auto->idFilial = $_POST["numfil"];

      $autoDAO = new AutomovelDAO();
      $autoDAO->cadastrarAutomovel($auto);

      $_SESSION['msg']= "Automovel cadastrado com sucesso!";
      header("location:cadastro-automovel.php");
      }
   ?>
</div>
</body>
</html>
