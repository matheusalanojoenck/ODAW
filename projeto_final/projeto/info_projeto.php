<?php require_once "../connection.php"; ?>
<?php

$data = "";
$nome = "";
$data_inicio = "";
$data_fim = "";
$orcamento = "";
$gerente = "";

if($_GET["num_proj"]){
    $num_proj = $_GET["num_proj"];
    $result = $conexao->query("SELECT * FROM projeto WHERE num_proj = {$num_proj}");
    $data = $result->fetch_assoc();

    $result_gerente = $conexao->query("SELECT mat_prof, nome FROM professor WHERE mat_prof={$data['mat_prof']}");
    $data_gerente = $result_gerente->fetch_assoc();

    $nome = $data["nome"];
    $data_inicio = $data["data_inicio"];
    $data_fim = $data["data_fim"];
    $orcamento = $data["orcamento"];
    $gerente = $data_gerente["mat_prof"] . " - " . $data_gerente["nome"];
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
    <label>Nome Projeto: <?php echo $nome?></label><br>
    <label>Data Inicio: <?php echo $data_inicio?></label><br>
    <label>Data Fim: <?php echo $data_fim?></label><br>
    <label>Orçamento: <?php echo $orcamento?></label><br>
    <label>Gerente: <?php echo $gerente?></label><br>
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