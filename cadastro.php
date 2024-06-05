<?php include("./template/cabeca.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./desing_css/cadastro.css">
</head>
<body>
    <div class="container mt-4">    
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Criar Login</h2>
                <h4 class="text-center">Insira um e-mail para ser seu usuário e crie uma senha</h4>
                <form method="post" action="cadastro_salvar.php">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label> 
                        <input type="text" name="nome" id="nome" class="form-control" required/> 
                    </div>

                    <div class="mb-3">
                        <label for="usuario" class="form-label">E-mail</label>
                        <input type="text" name="email" id="email" class="form-control" required/>
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" required/>
                    </div>

                    <div class="d-grid gap-2">
                        <input type="submit" value="SALVAR" class="btn btn-primary"/>
                    </div>
                    <div class="text-center">
                <a href="javascript:history.back()" class="btn btn-secondary rounded-pill btn-hover-gray">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include("./template/pe.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>