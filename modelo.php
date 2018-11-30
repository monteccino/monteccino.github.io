<?php
// definições de host, database, usuário e senha
$host = "localhost";
$db   = "tccstando";
$user = "root";
$pass = "digitesenha";
// conecta ao banco de dados
$con = mysqli_connect($host, $user, $pass) or trigger_error(mysqli_error(),E_USER_ERROR); 
// seleciona a base de dados em que vamos trabalhar
mysqli_select_db($con, $db);
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT categoria_modelo, arquivo_modelo FROM modelo");
// executa a query
$dados = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>
 
<html>
    <!-- Meta tags Obrigatórias -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
       <title>Modelos de TCC</title>
      <style>
      .btn{
        background-color: #52489c0;
        width: 100%;
      };
      .nav-link{
        font-color: black;
      }
      
    </style>
  </head>
<body>
    <header>
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #06d6a0">
        <a class="navbar-brand" href="index.html">
          <img src="img/logo.png" alt="logo" height="100px">
          TCCsTANDO
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="acervo.php">Acervo Digital</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dicas.html">Dicas & Infos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="areadepesquisa.php">Área de pesquisa</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Conteudo da página!-->
    <div class='container-fluid'>
    <main>
      <!-- Jumbotron!-->
        <div class="row mt-3"> 
          <div class="container-fluid">
            <div class="jumbotron" style="background-color: #f1c40f">
              <h1 class="display-3">Modelos de TCC</h1>
              <hr class="my-4">
              <p>Não faça com o modelo errado, deixe tudo mais easey fazendo download do modelo certo aqui.</p> 
            </div>
          </div>
        </div>
        <?php
             // se o número de resultados for maior que zero, mostra os dados
                if($total > 0) {
                // inicia o loop que vai mostrar todos os dados
                do {
        ?>
            <div class="container">
       <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title"><?=$linha['categoria_modelo']?></h5>
          <a href="modelo/ <?=$linha['arquivo_modelo']?>" class="btn btn-primary" download target="_blank">Baixar</a>
        </div>
       </div>
<?php
        // finaliza o loop que vai mostrar os dados
        }while($linha = mysqli_fetch_assoc($dados));
    // fim do if 
    }
?>
</main>
<footer>
   <div class="footer-copyright text-center py-3">Criado com muito amor por Camila Montecino</div>
</footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>