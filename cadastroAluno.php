<?php
require 'conexao.php';
    //processo da chamada post
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nomeError = null;
        $emailError = null;

        if(!empty($_POST)){
            $validacao = true;
            $novoAluno = false;

            if(!empty($_POST['nome'])){
                $nome = $_POST['nome'];
            }else {
                $nomeError = 'Por favor digite um nome';
                $validacao = false;
            }

            if(!empty($_POST['email'])){
                $email = $_POST['email'];
            }else {
                $emailError = 'Por favor digite um e-mail';
                $validacao = false;
            }
        }
        //validar informacoes no banco de dados
        if($validacao){
            $pdo = Conexao::Conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO alunos (nome, email) VALUES (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($nome, $email));
            header("Location: consultaAluno.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Cadastro de Aluno</title>
        <link rel="sortcut icon" href="Imagens/cadastrar.png" type="image/png" />;
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
   
         <form id="cadAluno" method="POST" name="cadAluno" >
         <div class="container">
          <h1><em><strong>Cadastro de Aluno</strong></em></h1>
            <hr>
            <div class="p-3 mb-2 bg-dark text-white   <?php echo !empty($nomeError) ? 'erro ' : ''; ?>">
                <input type="hidden" name="id" />
                <label class="control-label">Nome:</label>
                    <div class="controls">
                        <input type="text" name="nome" class="rounded" placeholder="Nome Completo" value="<?php echo !empty($nome) ? $nome : ''; ?>"/>
                        <?php 
                        if (!empty($nomeError)): 
                        ?>
                        <span class="text-danger"><?php echo $nomeError; ?></span>
                        <?php
                        endif; 
                        ?>
                    </div>
            </div>

            <div class="p-3 mb-2 bg-dark text-white <?php echo !empty($emailError) ? 'erro ' : ''; ?>">
                <label class="control-label">E-mai:</label>
                    <div class="controls">
                        <input type="text" class="rounded" name="email" placeholder="nome@exemplo.com" value="<?php echo !empty($email) ? $email : ''; ?>" />
                        <?php 
                        if (!empty($emailError)): 
                        ?>
                        <span class="text-danger"><?php echo $emailError; ?></span>
                        <?php
                        endif; 
                        ?>
                        <input class="btn btn-outline-success" type="submit" value="Cadastrar" name="btCad" id="btCad" />
                    </div>
            </div>
            </div>
            <hr>
         </form>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    
</html>