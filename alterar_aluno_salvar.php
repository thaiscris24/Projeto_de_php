<?php

$id_aluno = $_POST["id_aluno"];
$nome_aluno = $_POST["nome_aluno"]; 

$con = new mysqli("127.0.0.1", 
                        "root", 
                        "", 
                        "dados_pessoas");


if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}


$sql = "SELECT COUNT(1) as total FROM alunos WHERE id_aluno=$id_aluno"; 
$rs = $con->query($sql);
$total = $rs->fetch_assoc();

if ($total["total"] == 0) {
    echo "ID não existe";
    exit;
}

// Atualiza os dados do usuário
$sql = "UPDATE alunos SET nome_aluno = '$nome_aluno' WHERE id_aluno = $id_aluno"; 
if ($con->query($sql) === TRUE) {
    header("Location: buscar_aluno.php");
    exit;
} else {
    echo "Erro ao atualizar o registro: " . $con->error;
}

$con->close();
?>