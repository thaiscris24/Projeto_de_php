<?php include("./template/cabeca.php"); ?>

<?php
$id = $_GET["id"];

$con = new mysqli("127.0.0.1", 
                        "root",
                        "",
                        "dados_pessoas");

$sql = "SELECT * FROM usuarios WHERE id=$id";
$rs = $con->query($sql);
$dados = $rs->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Alterar Dados</h2>
            <form method="POST" action="alterar_salvar.php">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $dados["id"]; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <!-- Corrigindo a variável $nome -->
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dados["nome"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $dados["email"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $dados["senha"]; ?>">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">SALVAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php include("./template/pe.php"); ?>
