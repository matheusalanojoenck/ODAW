<?php require_once "../connection.php"; ?>
<?php
if(isset($_POST["add"])){
    $nome = $_POST["input_nome"];
    $data_inicio = $_POST["input_inicio"];
    $data_fim = $_POST["input_fim"];
    $orcamento = $_POST["input_orcamento"];
    $gerente = $_POST["input_gerente"];
    $sql = "INSERT INTO projeto (nome, data_inicio, data_fim, orcamento, mat_prof) VALUES('$nome', '$data_inicio', '$data_fim', '$orcamento', '$gerente')";
    if($conexao->query($sql)){
        echo "Inserção realizada com sucesso!";
    }else{
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
    <title>Adicionar Projeto</title>
</head>

<body>
    <div class="container">
 <a href="../index.php">Voltar</a>
    <form method="POST">
        <label>Adicionar Projeto</label>
        <hr>
        <label>Nome</label><br>
        <input name="input_nome" required><br>

        <label>Data Inicio</label><br>
        <input type="date" name="input_inicio"><br>

        <label>Data Fim</label><br>
        <input type="date" name="input_fim"><br>

        <label>Orçamento</label><br>
        <input type="text" name="input_orcamento"><br>

        <label>Gerente</label><br>
        <input name="input_gerente"><br>

        <input type="submit" name="add" value="Adicionar" class="btn btn-success"> 
    </form>
    </div>
   
</body>

</html>