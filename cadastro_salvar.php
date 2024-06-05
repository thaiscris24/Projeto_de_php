<?php

    $usuario = $_POST["email"];
    $senha = $_POST["senha"];
    $nome = $_POST["nome"]; 

    $conexao = new mysqli(
        "127.0.0.1",    
        "root",         
        "",             
        "dados_pessoas"        
    );

    $sql = "
    INSERT INTO usuarios (nome, email, senha) 
    VALUES ('$nome', '$usuario','$senha')"; 

    $rs = $conexao->query($sql);

    header("location: login.php");

?>
