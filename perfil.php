<?php

// Verifica se o parâmetro 'nome' está definido na URL
if (isset($_GET['nome'])) {
    // Recupera o nome do usuário da URL
    $nome_usuario = htmlspecialchars($_GET['nome']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./desing_css/perfil.css">
   
</head>
<body>
    <div class="profile-container">
        <img src="./desing_css/perfil.png" alt="Imagem de Perfil">
        <h2><?php echo $nome_usuario; ?></h2>
        <p>Bem-vindo ao seu perfil! <br> Acesse suas funcionalidades de administrador.</p>
        <div>
            <h3>Acessos:</h3>
            <a href="buscar.php" class="btn btn-primary">CONSULTA DE ACESSOS</a>
            <a href="buscar_aluno.php" class="btn btn-info">CONSULTA DE ALUNOS</a>
            <a href="painel.php" class="btn btn-primary">PAINEL DE AULAS</a>
            <a href="buscardetalhecurso.php" class="btn btn-info">DETALHAMENTO CURSO</a>
            <a href="listaalunos.php" class="btn btn-primary">ESCALA DE PERÍODOS</a>
            <a href="login.php" class="btn btn-danger">SAIR</a>

        </div>    
    </div>
</body>
</html>
<?php
} else {
    // Se o parâmetro 'nome' não estiver definido na URL, redireciona para a página de login
    header("Location: login.php");
    exit();
}
?>