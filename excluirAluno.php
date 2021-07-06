<?php
require 'conexao.php';

$id = 0;

if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}

if(!empty($_POST)){
    $id = $_POST['id'];

    //deletar no banco
    $pdo = Conexao::Conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM alunos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($id));
    header("Location: consultaAluno.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Excluir Informações</title>
        <link rel="sortcut icon" href="Imagens/excluir.png" type="image/png" />;
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
            <div class="span10 offset1">
                <div class="row">
                    <h3><em><strong>Excluir Informações de Aluno</strong></em></h3>
                </div>
                
                <form class="form-horizontal" action="excluirAluno.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja excluir aluno?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-outline-success">Sim</button>
                        <a href="index.php" type="btn" class="btn btn-outline-danger">Não</a>
                    </div>
                </form>
            </div>



            </div>