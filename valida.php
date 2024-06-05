<?php
$email = @$_POST['email'];
$senha = @$_POST['senha'];

$conexao = new mysqli("127.0.0.1",
                            "root",
                            "",
                            "dados_pessoas");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$sql = "SELECT * FROM usuarios WHERE email=? AND senha=?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$resultado = $stmt->get_result();
$tabela = $resultado->fetch_assoc();

if ($tabela == null) {
    
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acesso Negado</title>
        <link rel="stylesheet" href="./desing_css/valida.css">
    
    </head>
    <body>
        <div class="error-container">
            <h2>Acesso Negado</h2>
            <p>Usuário e/ou senha inválidos<a href="./login.php"> <br> Voltar para a página de login</a></p>
            <p><a href="./cadastro.php">Não tem login? Clique aqui e crie!</a></p>
        </div>
    </body>
    </html>
    <?php
} else {
    $nome = $tabela['nome']; 
    header("Location: perfil.php?nome=".urlencode($nome));
    exit();
}

$conexao->close();
?>