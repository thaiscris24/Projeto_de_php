<?php include("./template/cabeca.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./desing_css/login.css">

</head>
<body>
    <div class="container">    
        <div class="row">
        <h4>Administração JMTW, seu site de gerenciamento.</h4>
        <h5>Faça seu login, usando seu e-mail e senha.</h5>

            <form method="post" action="valida.php">
                <label class="form-label">Usuário</label>
                <input type="text" name="email" class="form-control"/>

                <br/>

                <label class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control"/>

                <input type="submit" value="ENTRAR"
                    class="btn btn-warning" />

                <a href="index.php" class="btn btn-warning">VOLTAR</a>

            </form>
        </div>
    </div>

    <?php include("./template/pe.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>