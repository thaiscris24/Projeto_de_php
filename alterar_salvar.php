<?php

$id = $_POST["id"];
$nome = $_POST["nome"]; 
$usuario = $_POST["email"]; 
$senha = $_POST["senha"];

$con = new mysqli("127.0.0.1", 
                        "root", 
                        "", 
                        "dados_pessoas");


if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}


$sql = "SELECT COUNT(1) as total FROM usuarios WHERE id=$id"; 
$rs = $con->query($sql);
$total = $rs->fetch_assoc();

if ($total["total"] == 0) {
    echo "ID não existe";
    exit;
}

// Atualiza os dados do usuário
$sql = "UPDATE usuarios SET nome = '$nome', email = '$usuario', senha = '$senha' WHERE id = $id"; 
if ($con->query($sql) === TRUE) {
    header("Location: buscar.php");
    exit;
} else {
    echo "Erro ao atualizar o registro: " . $con->error;
}

$con->close();
?>