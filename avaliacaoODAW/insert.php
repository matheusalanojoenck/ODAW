<?php
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['username'])) {
    session_destroy();

    header("Location: index.php");
}
?>
<?php require_once "connection.php" ?>
<?php
$codhError = "";
$nomeError = "";
$msg = "";
if (isset($_POST["insert"])) {
    if (empty($_POST["codh"]) || empty($_POST["nome"])) {
        if (empty($_POST["codh"])) $codhError = "* Campo Obrigatório!";
        if (empty($_POST["nome"])) $codhError = "* Campo Obrigatório!";
    } else {
        $codh = $_POST["codh"];
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];

        $sql = "INSERT INTO hotel VALUES ('$codh', '$nome', '$endereco', '$telefone')";
        if ($conexao->query($sql)) {
            $msg = 'Operação realizada com sucesso';
        } else {
            $msg = 'Erro ao tentar adicionar novo professor' . mysqli_error($conexao);
        }
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
    <script>
        function onlyNumber(){
            //console.log("teste");
            //document.getElementById("insert").disable = false;
            var numberPattern =  /^\d+$/;
            text = document.getElementById("codh").value;
            if(numberPattern.test(text)){
                document.getElementById("insert").disabled = false;
                document.getElementById("codhError").innerHTML = "";
            }else{
                document.getElementById("insert").disabled = true;
                document.getElementById("codhError").innerHTML = "Somente números";
            }
        }
    </script>
    <a href="registros.php">Voltar</a><br/>
    <label>Cadastro de Hotel</label>
    <hr>
    <form method="POST">
        <label>Código do Hotel</label><br />
        <input type="text" id="codh" name="codh" placeholder="Código do Hotel" onblur="onlyNumber()">
        <label id="codhError"></label>
        <label><?php echo $codhError ?></label> <br />

        <label>Nome</label><br />
        <input type="text" name="nome" placeholder="Nome do Hotel">
        <label><?php echo $nomeError ?></label> <br />

        <label>Endereço</label><br />
        <input type="text" name="endereco" placeholder="Endereço"><br />

        <label>Telefone</label><br />
        <input type="text" name="telefone" placeholder="Telefone"><br />

        <input type="submit" id="insert" name="insert" value="Cadastrar" disabled="disable">
        <label><?php echo $msg ?></label> <br />
    </form>
</body>

</html>