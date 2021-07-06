<?php
    include 'conexao.php';
    $pdo = Conexao::Conectar();
    $sql =  'SELECT id, nome, email FROM alunos ORDER BY id ASC';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $exibir = $pdo->query($sql);
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Consultar Aluno</title>
        <link rel="sortcut icon" href="Imagens/consulta.png" type="image/png" />;
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

        <div class="card-header">
            <h3><em><strong>Consultar Alunos</strong></em></h3>
        </div>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nome Completo</th>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>
        
            <tbody>
                <?php 
                        while ($row = $exibir->fetch(PDO::FETCH_ASSOC)){
                            echo '<tr>';

			                echo '<th scope="row">'. $row['id']. '</th>';
                            echo '<td scope="row">'. $row['nome']. '</td>';
                            echo '<td scope="row">'. $row['email']. '</td>';
                           
                    
                            echo '<td width=250>';
                            echo '<a class="btn btn-outline-light" href="lerAluno.php?id='.$row['id'].'">Consultar</a>';
                            echo ' ';
                            echo '<a class="btn btn-outline-light" href="editarAluno.php?id='.$row['id'].'">Editar</a>';
                            echo ' ';
                            echo '<a class="btn btn-outline-light" href="excluirAluno.php?id='.$row['id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }    
                        
                    

                ?>            
                </tbody>
            </table>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    
</html>