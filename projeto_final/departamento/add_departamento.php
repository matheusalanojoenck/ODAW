<?php require_once "../connection.php"; ?>
<?php
if (isset($_POST["add"])) {
    $nome = $_POST["input_nome"];
    $escritorio = $_POST["input_escritorio"];
    $gerente = $_POST["input_gerente"];
    $sql = "INSERT INTO departamento (nome, escritorio, mat_prof) VALUES('$nome', '$escritorio', '$gerente')";
    if ($conexao->query($sql)) {
        echo "Inserção realizada com sucesso!";
    } else {
        echo "Falha na inserção! " . mysqli_error($conexao);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <a href="../index.php">Voltar</a>
    <div class="container">

        <form method="POST">
            <label>Adicionar Novo Departamento</label><br>
            <hr>
            <label>Nome</label><br>
            <input name="input_nome" require><br>
            <label>Escritório</label><br>
            <input name="input_escritorio"><br>
            <label>Gerente</label><br>
            <input name="input_gerente"><br>
            <input type="submit" name="add" value="Adicionar" class="btn btn-success">
        </form>
    </div>
</body>

</html>