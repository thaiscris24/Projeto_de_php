<?php
$con = new mysqli("127.0.0.1",
                        "root",
                        "",
                        "dados_pessoas");
                        
if ($con->connect_error) {
    die("Erro de conexão: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql_delete = "DELETE FROM usuarios WHERE id = $id";
    if ($con->query($sql_delete) === TRUE) {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Erro ao excluir login: " . $con->error . "</div>";
    }
}

$where = "";

if (isset($_GET["localizar"])) 
    $localizar = $_GET["localizar"];
    if (!empty($localizar)) {
        $where = "WHERE nome LIKE '%$localizar%'"; 
}

$sql = "SELECT * FROM usuarios $where";
$rs = $con->query($sql);

include("./template/cabeca.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Pessoas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Consulta de Acessos</h2>
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-3 text-center">
                <div class="input-group mb-3" style="max-width: 300px; margin: 0 auto;">
                    <input type="text" class="form-control" name="localizar" placeholder="Digite até 3 letras para procurar" />
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mx-2">BUSCAR</button>
                    <a href="cadastro.php" class="btn btn-success mx-2">NOVO</a>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Usuário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($rs !== false && $rs->num_rows > 0) {
                            while ($linha = $rs->fetch_assoc()) {
                                $id = isset($linha['id']) ? $linha['id'] : '';
                                $nome = isset($linha['nome']) ? $linha['nome'] : '';
                                $usuario = isset($linha['usuario']) ? $linha['usuario'] : '';
                                
                                echo "<tr>
                                        <td>{$id}</td>
                                        <td>{$nome}</td>
                                        <td>{$usuario}</td>
                                        <td>
                                            <a href='alterar.php?id={$id}' class='btn btn-warning btn-sm'>✏️</a>
                                            <form method='POST' style='display: inline;' onsubmit='return confirm(\"Tem certeza que deseja excluir esta pessoa?\")'>
                                                <input type='hidden' name='id' value='{$id}'>
                                                <button type='submit' class='btn btn-danger btn-sm'>🗑️</button>
                                            </form>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>Nenhum resultado encontrado.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
$con->close();
include("./template/pe.php");
?>