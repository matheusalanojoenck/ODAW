<?php require_once "connection.php"; ?>
<?php

function departamentos()
{
    if (isset($_POST['delete_dep'])) {
        $sql = "DELETE FROM departamento WHERE num_dep=" . $_POST["num_dep"];
        if ($GLOBALS["conexao"]->query($sql)) {
            echo 'Apagado com Sucesso!';
        } else {
            echo 'Não foi apagar! ' . mysqli_error($GLOBALS["conexao"]);
        }
    }
    $result_query_departamento = $GLOBALS["conexao"]->query("SELECT * FROM departamento");
    if ($result_query_departamento->num_rows > 0) {
        while ($linha = $result_query_departamento->fetch_assoc()) {
            echo
            "<form method='POST'>" .
                "<tr>" .
                "<td>" . $linha["num_dep"] . "<input type='hidden' value='" . $linha["num_dep"] . "' name='num_dep'>" ."</td>" .
                "<td>" . $linha["nome"] . "</td>" .
                "<td>" . $linha["escritorio"] . "</td>" .
                "<td>" . $linha["mat_prof"] . "</td>" .
                "<td>" . "<a href='departamento/edit_departamento.php?num_dep=" . $linha["num_dep"] . "'> <button type='button'>Editar</button>" . "</td>" .
                "<td>" . "<input type='submit' value='Deletar' name='delete_dep'>" . "</td>" .
                "</tr>" .
                "</form>";
        }
    } else {
        echo "Nenhum dado encontrado";
    }
}
?>