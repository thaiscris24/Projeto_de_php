<?php
$conexao = new mysqli("127.0.0.1",
                            "root",
                             "",
                    "dados_pessoas");

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

include("./template/cabeca.php");

$sql = "
    SELECT c.nome_curso, p.nome_professor
    FROM cursos c
    INNER JOIN curso_professor cp ON c.id_curso = cp.id_curso
    INNER JOIN professores p ON cp.id_professor = p.id_professor
";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="./desing_css/painel.css">
</head>
<body>
    <div class="container">
        <h1>Cursos Disponíveis e Professores</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["nome_curso"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["nome_professor"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Nenhum curso encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="javascript:history.back()" class="btn btn-secondary rounded-pill btn-hover-gray">Voltar</a>
        </div>
    </div>
</body>
</html>

<?php
$conexao->close();
include("./template/pe.php");
?>