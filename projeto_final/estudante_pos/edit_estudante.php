<?php require_once "../connection.php"; ?>
<?php
$data = "";
if ($_GET["mat_est"]) {
    $mat_est = $_GET["mat_est"];
    $result = $conexao->query("SELECT * FROM estudante_pos WHERE mat_est = {$mat_est}");

    $data = $result->fetch_assoc();
}

if (isset($_POST["edit"])) {
    $nome = $_POST["input_nome"];
    $num_dep = $_POST["input_departamento"];
    $sql = "UPDATE estudante_pos SET nome = '$nome', num_dep = '$num_dep' WHERE mat_est = {$mat_est}";
    if ($conexao->query($sql)) {
        echo "Atualização realizada com sucesso!";
    } else {
        echo "Falha na Atualização! " . mysqli_error($conexao);
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
    <title>Editar Estudante</title>
</head>

<body>
    <div class="container">
        <a href="../index.php">Voltar</a>
        <form method="POST">
            <label>Editar Estudante</label>
            <hr>
            <label>Matricula</label><br>
            <input name="input_matricula" value="<?php echo $data["mat_est"] ?>" disabled><br>
            <label>Nome</label><br>
            <input name="input_nome" value="<?php echo $data["nome"] ?>" required><br>
            <label>Departamento</label><br>
            <input name="input_departamento" value="<?php echo $data["num_dep"] ?>"><br>
            <input type="submit" name="edit" value="Confirmar" class="btn btn-success">
        </form>
    </div>

</body>

</html>