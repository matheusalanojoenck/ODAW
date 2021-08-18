<?php require_once "../connection.php"; ?>
<?php
$data = "";
if($_GET["mat_prof"]){
    $mat_prof = $_GET["mat_prof"];
    $result = $conexao->query("SELECT * FROM professor WHERE mat_prof = {$mat_prof}");

    $data = $result->fetch_assoc();
}

if(isset($_POST["edit"])){
    $nome = $_POST["input_nome"];
    $sala = $_POST["input_sala"];
    $especialidade = $_POST["input_especialidade"];
    $sql = "UPDATE professor SET nome = '$nome', sala = '$sala', especialidade = '$especialidade' WHERE mat_prof = {$mat_prof}";
    if($conexao->query($sql)){
        echo "Atualização realizada com sucesso!";
    }else{
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
    <title>Document</title>
</head>

<body>
    <a href="../index.php">Voltar</a>
    <form method="POST">
        <label>Matricula</label><br>
        <input name="input_matricula" value="<?php echo $data["mat_prof"]?>" disabled><br>
        <label>Nome</label><br>
        <input name="input_nome" value="<?php echo $data["nome"]?>"><br>
        <label>Sala</label><br>
        <input name="input_sala" value="<?php echo $data["sala"]?>"><br>
        <label>Especialidade</label><br>
        <input name="input_especialidade" value="<?php echo $data["especialidade"]?>"><br>
        <input type="submit" name="edit" value="Confirma"> 
    </form>
</body>

</html>