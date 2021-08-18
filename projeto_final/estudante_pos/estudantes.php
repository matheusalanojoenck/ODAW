<?php require_once "connection.php"; ?>
<?php

function estudantes()
{
    if (isset($_POST['delete_est'])) {
        $sql = "DELETE FROM estudante_pos WHERE mat_est=" . $_POST["mat_est"];
        if ($GLOBALS["conexao"]->query($sql)) {
            echo 'Apagado com Sucesso!';
        } else {
            echo 'Não foi apagar! ' . mysqli_error($GLOBALS["conexao"]);
        }
    }
    $result_query_estudante = $GLOBALS["conexao"]->query("SELECT * FROM estudante_pos");
    if ($result_query_estudante->num_rows > 0) {
        while ($linha = $result_query_estudante->fetch_assoc()) {
            echo
            "<form method='POST'>" .
                "<tr>" .
                "<td>" . $linha["mat_est"] . "<input type='hidden' value='" . $linha["mat_est"] . "' name='mat_est'>" ."</td>" .
                "<td>" . $linha["nome"] . "</td>" .
                "<td>" . $linha["num_dep"] . "</td>" .
                "<td>" . "<a href='estudante_pos/edit_estudante.php?mat_est=" . $linha["mat_est"] . "'> <button type='button'>Editar</button>" . "</td>" .
                "<td>" . "<input type='submit' value='Deletar' name='delete_est'>" . "</td>" .
                "</tr>" .
                "</form>";
        }
    } else {
        echo "Nenhum dado encontrado";
    }
}
?>