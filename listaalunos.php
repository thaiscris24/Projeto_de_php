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
    SELECT c.id_curso, c.nome_curso, p.nome_periodo
    FROM alunos a
    INNER JOIN matricula m ON a.id_aluno = m.id_aluno
    INNER JOIN cursos c ON m.id_curso = c.id_curso
    INNER JOIN periodo p ON c.id_curso = p.id_curso
";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista das Matérias</title>
    <link rel="stylesheet" href="./desing_css/detalhe2.css">
</head>
<body>
    <div class="container">
        <h1>Lista das Matérias</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID do Curso</th><th>Nome do Curso</th><th>Período</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['id_curso'] . "</td><td>" . $row['nome_curso'] . "</td><td>" . $row['nome_periodo'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum aluno encontrado.</p>";
        }
        ?>
        <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>

<?php
$conexao->close();
include("./template/pe.php");
?>