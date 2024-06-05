<?php

$conexao = new mysqli(
    "127.0.0.1",    
    "root",         
    "",             
    "dados_pessoas"        
);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}


$id_curso = isset($_GET['id_curso']) ? $_GET['id_curso'] : null;

if ($id_curso === null || $id_curso === '') {
    die("ID do curso não fornecido.");
}

$sqlCurso = "SELECT nome_curso FROM cursos WHERE id_curso = $id_curso";
$resultCurso = $conexao->query($sqlCurso);

$sqlProfessores = "SELECT p.nome_professor 
                   FROM professores p 
                   INNER JOIN curso_professor cp ON p.id_professor = cp.id_professor 
                   WHERE cp.id_curso = $id_curso";
$resultProfessores = $conexao->query($sqlProfessores);

$sqlAlunos = "SELECT a.nome_aluno 
              FROM alunos a 
              INNER JOIN matricula m ON a.id_aluno = m.id_aluno 
              WHERE m.id_curso = $id_curso";
$resultAlunos = $conexao->query($sqlAlunos);

include("./template/cabeca.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Curso</title>
    <link rel="stylesheet" href="./desing_css/detalhe.css">
</head>
<body>
    <div class="container">
        <h1>Detalhes do Curso</h1>
        <?php
        if ($resultCurso->num_rows > 0) {
            $rowCurso = $resultCurso->fetch_assoc();
            echo "<h3>" . $rowCurso["nome_curso"] . "</h3>";
        }
        ?>
        <h4>Professores</h4>
        <ul>
            <?php
            if ($resultProfessores->num_rows > 0) {
                while ($rowProfessor = $resultProfessores->fetch_assoc()) {
                    echo "<li>" . $rowProfessor["nome_professor"] . "</li>";
                }
            } else {
                echo "<li>Nenhum professor encontrado</li>";
            }
            ?>
        </ul>
        <h4>Alunos Matriculados</h4>
        <ul>
            <?php
            if ($resultAlunos->num_rows > 0) {
                while ($rowAluno = $resultAlunos->fetch_assoc()) {
                    echo "<li>" . $rowAluno["nome_aluno"] . "</li>";
                }
            } else {
                echo "<li>Nenhum aluno matriculado</li>";
            }
            ?>
        </ul>
        <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>

<?php
$conexao->close();
include("./template/pe.php");
?>
    