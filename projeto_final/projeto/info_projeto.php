<?php require_once "../connection.php"; ?>
<?php
$data = "";
$data_est = "";
if($_GET["num_proj"]){
    $num_proj = $_GET["num_proj"];
    $result = $conexao->query("SELECT * FROM projeto WHERE num_proj = {$num_proj}");

    $data = $result->fetch_assoc();
}

function estudantes()
{
    $sql_est = "SELECT estudante_pos.mat_est, estudante_pos.nome 
    FROM estudante_pos INNER JOIN assistente_invetigacao ON estudante_pos.mat_est = assistente_invetigacao.mat_est 
    WHERE assistente_invetigacao.num_proj = {$GLOBALS["data"]['num_proj']}";

    #$sql_est = "SELECT mat_est FROM assistente_invetigacao WHERE num_proj = {$GLOBALS["data"]['num_proj']}";
    $result_est = $GLOBALS["conexao"]->query($sql_est);
    
    while($data_est = $result_est->fetch_assoc()){
        echo 
            "<tr>" .
            "<td>". $data_est["mat_est"] ."</td>" .
            "<td>". $data_est["nome"] ."</td>" .
            "</tr>";
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
    <label><a href="../index.php">Voltar</a></label><br>
    <label>Nome Projeto</label><br>
    <label>Data Inicio</label><br>
    <label>Data Fim</label><br>
    <label>Orçamento</label><br>
    <label>Gerente</label><br>
    <hr>
    <table>
        Estudantes
        <a href=<?php echo "add_est_projeto.php?num_proj={$data['num_proj']}"?>><button>Adicionar Estudante</button></a>
        <tr>
            <td>Matricula</td>
            <td>Nome</td>
        </tr>
        <?php
           estudantes();
        ?>
        
    </table>
</body>
</html>