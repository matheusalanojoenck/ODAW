<?php require_once "../connection.php"; ?>
<?php

$data = "";
if ($_GET["num_dep"]) {
    $num_dep = $_GET["num_dep"];
    $result = $conexao->query("SELECT * FROM departamento WHERE num_dep = {$num_dep}");

    $data = $result->fetch_assoc();
}

if (isset($_POST["edit"])) {
    $nome = $_POST["input_nome"];
    $escritorio = $_POST["input_escritorio"];
    $gerente = $_POST["input_gerente"];
    $sql = "UPDATE departamento SET nome = '$nome', escritorio = '$escritorio', mat_prof = '$gerente' WHERE num_dep = {$num_dep}";
    if ($conexao->query($sql)) {
        echo "Atualização realizada com sucesso!";
    } else {
        echo "Falha na atualização! " . mysqli_error($conexao);
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
    <title>Editar Departamento</title>
</head>

<body>
    <div class="container">
        <a href="../index.php">Voltar</a>
        <form method="POST">
            <label>Editar Departamento</label>
            <hr>
            <label>Número</label><br>
            <input name="input_numero" value="<?php echo $data["num_dep"] ?>" disabled><br>
            <label>Nome</label><br>
            <input name="input_nome" value="<?php echo $data["nome"] ?>" require><br>
            <label>Escritório</label><br>
            <input name="input_escritorio" value="<?php echo $data["escritorio"] ?>"><br>
            <label>Gerente</label><br>
            <input name="input_gerente" value="<?php echo $data["mat_prof"] ?>"><br>
            <input type="submit" name="edit" value="Confirmar" class="btn btn-success">
        </form>
    </div>

</body>

</html>