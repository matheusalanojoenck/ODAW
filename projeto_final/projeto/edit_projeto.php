<?php require_once "../connection.php"; ?>
<?php
$data = "";
if ($_GET["num_proj"]) {
    $num_proj = $_GET["num_proj"];
    $result = $conexao->query("SELECT * FROM projeto WHERE num_proj = {$num_proj}");

    $data = $result->fetch_assoc();
}
if (isset($_POST["edit"])) {
    $nome = $_POST["input_nome"];
    $data_inicio = $_POST["input_inicio"];
    $data_fim = $_POST["input_fim"];
    $orcamento = $_POST["input_orcamento"];
    $gerente = $_POST["input_gerente"];
    $sql = "UPDATE projeto SET nome = '$nome', data_inicio = '$data_inicio', data_fim = '$data_fim', orcamento ='$orcamento', mat_prof ='$gerente' WHERE num_proj = {$num_proj}";
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
    <title>Editar Projeto</title>
</head>

<body>
    <div class="container">
        <a href="../index.php">Voltar</a>
        <form method="POST">
            <label>Editar Projeto</label>
            <hr>
            <label>Número</label><br>
            <input name="input_numero" value="<?php echo $data["num_proj"] ?>" disabled><br>

            <label>Nome</label><br>
            <input name="input_nome" value="<?php echo $data["nome"] ?>" required><br>

            <label>Data Inicio</label><br>
            <input type="date" name="input_inicio" value="<?php echo $data["data_inicio"] ?>"><br>

            <label>Data Fim</label><br>
            <input type="date" name="input_fim" value="<?php echo $data["data_fim"] ?>"><br>

            <label>Orçamento</label><br>
            <input type="text" name="input_orcamento" value="<?php echo $data["orcamento"] ?>"><br>

            <label>Gerente</label><br>
            <input name="input_gerente" value="<?php echo $data["mat_prof"] ?>"><br>

            <input type="submit" name="edit" value="Confirmar" class="btn btn-success">
        </form>
    </div>

</body>

</html>