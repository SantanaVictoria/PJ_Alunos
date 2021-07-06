<?php
require 'conexao.php';

$id = null;
//get é para receber
if(!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if(null == $id){
    //se estier vazio, ele volta para a pagina incial
    header("Location: index.php");
}else {
    $pdo = Conexao::Conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT nome,email FROM alunos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($id));
    $exibir = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Informações do Aluno</title>
        <link rel="icon" href="Imagens/consulta.png" type="image/png" />;
    </head>
    <body>
        
    <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark">
  
  <div class="container-fluid">
   <div class="collapse navbar-collapse" id="navbarNav">

   <img src="imagens/nav.png" width="30" height="30" alt="">

       <ul class="navbar-nav">
         <li class="nav- col-lg-4">
         <a class="nav-link active" aria-current="page" href="index.php">Início</a>
         </li>
    
         <li class="nav-item col-lg-5">
         <a class="nav-link" href="consultaAluno.php">Consulta</a>
         </li>
    
         <li class="nav-item col-lg-5">
         <a class="nav-link" href="cadastroAluno.php">Cadastrar</a>
         </li>
       </ul>
    </div>
  </div>
</nav>

        <div class="container">
            <h3><em><strong>Informações do Aluno</strong></em></h3>
                <div class="form-horizontal">
                    <div class="p-3 mb-2 bg-dark text-white">
                        <label class="control-label">Nome:</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $exibir['nome']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="p-3 mb-2 bg-dark text-white">
                        <label class="control-label">E-mail:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $exibir['email']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="consultaAluno.php" type="btn" class="btn btn-outline-secondary">Voltar</a>
                    </div>







        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
        </body>
        </html>