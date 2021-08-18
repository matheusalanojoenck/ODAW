<?php require_once "../connection.php"; ?>
<?php
$data = "";
if($_GET["mat_est"]){
    $mat_est = $_GET["mat_est"];
    $result = $conexao->query("SELECT * FROM estudante_pos WHERE mat_est = {$mat_est}");

    $data = $result->fetch_assoc();
}

if(isset($_POST["edit"])){
    $nome = $_POST["input_nome"];
    $num_dep = $_POST["input_departamento"];
    $sql = "UPDATE estudante_pos SET nome = '$nome', num_dep = '$num_dep' WHERE mat_est = {$mat_est}";
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
        <input name="input_matricula" value="<?php echo $data["mat_est"]?>" disabled><br>
        <label>Nome</label><br>
        <input name="input_nome" value="<?php echo $data["nome"]?>" required><br>
        <label>Departamento</label><br>
        <input name="input_departamento" value="<?php echo $data["num_dep"]?>"><br>
        <input type="submit" name="edit" value="Confirmar"> 
    </form>
</body>

</html>