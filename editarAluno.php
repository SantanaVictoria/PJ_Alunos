<?php
require 'conexao.php';

$id = null;

if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}

if(null == $id){
    header("Location: index.php");
}

if(!empty($_POST)){
    //se for vazio
    $nomeError = null;
    $emailError = null;
    //se for certo
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    //validacao
    $validacao = true;

    if(empty($nome)) {
        $nomeError = 'Por favor digite um nome';
        $validacao = false;
    }

    if(empty($email)){
        $emailError = 'Por favor digite um e-mail';
        $validacao = false;
    }

    if($validacao) {
        $pdo = Conexao::Conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE alunos SET nome = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($nome, $email, $id));
        header ("Location: consultaAluno.php");
    }
}else {
    $pdo = Conexao::Conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT nome, email FROM alunos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $email = $data['email'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Editar Informações</title>
        <link rel="sortcut icon" href="Imagens/editar.png" type="image/png" />;
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
            
                <h3><em><strong>Editar Informação de Aluno</strong></em></h3>
        
            <form class="form-horizontal" action="editarAluno.php?id=<?php echo $id ?>" method="post">

                    <div class="p-3 mb-2 bg-dark text-white" <?php echo !empty($nomeError) ? 'erro' : ''; ?>">
                        <label class="control-label">Nome:</label>
                        <div class="controls">
                            <input name="nome" class="form-control" size="50" type="text" placeholder="Nome Completo"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeError)): ?>
                                <span class="text-danger"><?php echo $nomeError; ?></span>
                            <?php
                                endif; 
                            ?>
                        </div>
                    </div>

                    <div class="p-3 mb-2 bg-dark text-white" <?php echo !empty($emailError) ? 'erro' : ''; ?>">
                        <label class="control-label">E-mail:</label>
                        <div class="controls">
                            <input name="email" class="form-control" size="80" type="text" placeholder="nome@exemplo.com"
                                   value="<?php echo !empty($email) ? $email : ''; ?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="text-danger"><?php echo $emailError; ?></span>
                            <?php
                                endif;
                            ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-outline-success" href="consultaAluno.php">Atualizar</button>
                        <a href="index.php" type="btn" class="btn btn-outline-danger"">Voltar</a>
                    </div>
                </form>



        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
        </html>