<?php include("./template/cabeca.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada do ID do Curso</title>
    <link rel="stylesheet" href="./desing_css/buscarcurso.css">
</head>
<body>
    <div class="container">
        <h1>Entrada do ID do Curso</h1>
        <form method="GET" action="detalhescurso.php">
            <label for="id_curso">ID do Curso:</label>
            <input type="text" id="id_curso" name="id_curso">
            <button type="submit">Consulta</button>
        </form>
        <br>
        <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>

<?php include("./template/pe.php"); ?>