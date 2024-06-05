<?php

    $nome_aluno = $_POST["nome_aluno"]; 

    $conexao = new mysqli(
        "127.0.0.1",    
        "root",         
        "",             
        "dados_pessoas"        
    );

    $sql = "
    INSERT INTO alunos (nome_aluno) 
    VALUES ('$nome_aluno')"; 

    $rs = $conexao->query($sql);

    header("location: buscar_aluno.php");

?>