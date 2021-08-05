<?php
if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['username'])){
    session_destroy();

    header("Location: index.php");
}
?>
<?php
require_once "connection.php";

$sql = "SELECT * FROM hotel";

$result_query = $conexao->query($sql);

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
    <label>Hoteis Cadastrados!</label><br/>
    <table border="1px">
        <tr>
            <td>codh</td>
            <td>Nome</td>
            <td>Endereço</td>
            <td>Telefone</td>
        </tr>
        <?php
            if($result_query->num_rows > 0){
                while($row = $result_query->fetch_assoc()){
                    echo 
                    "<tr>" . 
                    "<td>" . $row['codh'] . "</td>" .
                    "<td>" . $row['nome'] . "</td>" .
                    "<td>" . $row['endereco'] . "</td>" .
                    "<td>" . $row['telefone'] . "</td>" .
                    "</tr>"
                    ;
                }
            }
        ?>
    </table>
    <a href="insert.php"><button type="button">Adicionar Hotel</button>
</body>
</html>