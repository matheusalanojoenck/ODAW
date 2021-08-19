<?php require_once "../connection.php"; ?>
<?php
if (isset($_POST["add"])) {
    $nome = $_POST["input_nome"];
    $departamento = $_POST["input_departamento"];
    $sql = "INSERT INTO estudante_pos (nome, num_dep) VALUES('$nome', '$departamento')";
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
    <title>Adicionar Estudante</title>
</head>

<body>
    <div class="container">
        <a href="../index.php">Voltar</a>
        <form method="POST">
            <label>Adicionar Estudante</label>
            <hr>
            <label>Nome</label><br>
            <input name="input_nome" required><br>
            <label>Departamento</label><br>
            <input name="input_departamento"><br>
            <input type="submit" name="add" value="Adicionar" class="btn btn-success">
        </form>
    </div>

</body>

</html>