<?php require_once "../connection.php"; ?>
<?php
if(isset($_POST["add"])){
    $num_proj = $_GET["num_proj"];
    $mat_est = $_POST["input_mat_est"];
    $sql = "INSERT INTO assistente_invetigacao VALUES ('$num_proj', '$mat_est')";
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
    <title>Document</title>
</head>
<body>
    <label><a href="info_projeto.php?num_proj=<?php echo $_GET["num_proj"]?>">Voltar</a></label>
    <form method="POST">
        <label>Número Projeto</label><br>
        <input value="<?php  echo $_GET["num_proj"] ?>" disabled><br>
        <label>Matricula Estudante</label><br>
        <input type="text" name="input_mat_est" require><br>
        <input type="submit" value="Adicionar" name="add">
    </form>
</body>
</html>