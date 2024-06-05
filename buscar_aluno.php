<?php
$con = new mysqli("127.0.0.1",
                        "root",
                            "",
                            "dados_pessoas");

if ($con->connect_error) {
    die("Connection error: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_aluno"])) {
    $id_aluno = $_POST["id_aluno"];
    $sql_delete = "DELETE FROM alunos WHERE id_aluno = $id_aluno";

    if ($con->query($sql_delete) === TRUE) {
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting record: " . $con->error . "</div>";
    }
}

$where = "";

if (isset($_GET["localizar"])) {
    $localizar = $_GET["localizar"];

    if (!empty($localizar)) {
        $where = "WHERE nome_aluno LIKE '%$localizar%'";
    }
}

$sql = "SELECT * FROM alunos $where";
$rs = $con->query($sql);

include("./template/cabeca.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Consulta de Alunos</h2>
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-3 text-center">
                <div class="input-group mb-3" style="max-width: 300px; margin: 0 auto;">
                    <input type="text" class="form-control" name="localizar" placeholder="Digite até 3 letras para procurar" />
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mx-2">BUSCAR</button>
                    <a href="cadastro_aluno.php" class="btn btn-success mx-2">NOVO</a>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($rs !== false && $rs->num_rows > 0) {
                            while ($linha = $rs->fetch_assoc()) {
                                $id_aluno = isset($linha['id_aluno']) ? $linha['id_aluno'] : '';
                                $nome_aluno = isset($linha['nome_aluno']) ? $linha['nome_aluno'] : '';

                                echo "<tr>
                                        <td>{$id_aluno}</td>
                                        <td>{$nome_aluno}</td>
                                        <td>
                                            <a href='alterar_aluno.php?id_aluno={$id_aluno}' class='btn btn-warning btn-sm'>✏️</a>
                                            <form method='POST' style='display: inline;' onsubmit='return confirm(\"Tem certeza que deseja excluir esta pessoa?\")'>
                                            <input type='hidden' name='id_aluno' value='{$id_aluno}'>
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