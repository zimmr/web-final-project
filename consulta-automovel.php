<?php
  session_start();
  ob_start();
  
  include_once "dao/automoveldao.class.php";
  include_once "modelo/automovel.class.php";
  
  $autoDAO = new AutomovelDAO();
  $array = $autoDAO->buscarAutomoveis();
  ?>
<!DOCTYPE html/>
<html lang="pt-br">
  <head>
    <title>Consulta de Automoveis</title>
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
            <a class="nav-link" style="color:black" href="cadastro-filial.php">CONSULTA<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
    <?php
      if(isset($array)){
      if(count($array)==0){
      echo "<h3>Não há automóveis cadastrados!</h3>";
      return;
      }
      ?>
    
   <div class="container">
      <form name="pesquisa" method="post">
	<div class="row">

	  <div class="form-group cold-md-6">
	    <input type="text" name="txtfiltro" class="form-control" placeholder="digite sua pesquisa">
	  </div>

	  <div class="form-group col-md-6">
	    <select name="selfiltro" class="form-control">
	      <option value="todos">Todos</option>
	      <option value="codigo">Código</option>
	      <option value="marca">Marca</option>
	      <option value="modelo">Modelo</option>
	      <option value="ano">Ano</option>
	      <option value="cor">Cor</option>
	      <option value="cambio">Câmbio</option>
	      <option value="combustivel">Combustível</option>		  
	    </select>
	  </div>

	<div class="form-group">
	  <input type="submit" name="filtrar" value="Filtrar" class="btn btn-primary btn-block">
	</div>	
	</div>
      </form>
      
    <?php
      if(isset($_POST['filtrar'])){
         $pesquisa = $_POST['txtfiltro'];
         $filtro = $_POST['selfiltro'];
         $autoDAO = new AutomovelDAO();
         $array = $autoDAO->filtrar($filtro, $pesquisa);
         if(count($array) == 0){
            echo "<h2>Sua pesquisa não retornou resultados!</h2>";
            return;
         }//fecha if
      }//fecha if
    ?>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed">
         <thead>
           <tr>
             <th>Alterar</th>
             <th>Excluir</th>
	     <th>Código</th>
	     <th>Marca</th>
             <th>Modelo</th>
             <th>Ano</th>
             <th>Cor</th>
             <th>Combustível</th>
             <th>Câmbio</th>
         </thead>
	 <tfoot>
	   <tr>
	     <th>Alterar</th>
	     <th>Excluir</th>
	     <th>Código</th>
	     <th>Marca</th>
	     <th>Modelo</th>
	     <th>Ano</th>
	     <th>Cor</th>
	     <th>Combustível</th>
	     <th>Câmbio</th>
	 </tfoot>
	 <tbody>
	  <?php
            foreach ($array as $auto) {
                echo "<tr>";
                echo "<td><a href='alterar-automovel.php?id=$auto->idCarro 'class='btn btn-warning'>Alterar</a></td>";
                echo "<td><a href='consulta-automovel.php?id=$auto->idCarro 'class='btn btn-danger'>Excluir</a></td>";
                echo "<td>$auto->idCarro</td>";
                echo "<td>$auto->marca</td>";
                echo "<td>$auto->modelo</td>";
                echo "<td>$auto->ano</td>";
                echo "<td>$auto->cor</td>";
                echo "<td>$auto->combustivel</td>";
                echo "<td>$auto->cambio</td>";
                echo "</tr>";
            }//fecha foreach
         }//fecha if
          ?>
	 </tbody>
      </table>
    </div>
    </div>
<?php
if(isset($_GET['id'])){
    $autoDAO = new AutomovelDAO();
    $autoDAO->deletarAutomovel($_GET['id']);
    header("location:consulta-automovel.php");
}
?>
  </body>
</html>
