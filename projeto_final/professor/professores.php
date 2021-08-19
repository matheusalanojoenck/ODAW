<?php require_once "connection.php"; ?>
<?php

function professores()
{
    if (isset($_POST['delete_prof'])) {
        $sql = "DELETE FROM professor WHERE mat_prof=" . $_POST["mat_prof"];
        if ($GLOBALS["conexao"]->query($sql)) {
            echo 'Apagado com Sucesso!';
        } else {
            echo 'Não foi apagar! ' . mysqli_error($GLOBALS["conexao"]);
        }
    }
    $result_query_professor = $GLOBALS["conexao"]->query("SELECT * FROM professor");
    if ($result_query_professor->num_rows > 0) {
        while ($linha = $result_query_professor->fetch_assoc()) {
            echo
            "<form method='POST'>" .
                "<tr>" .
                "<td>" . $linha["mat_prof"] . "<input type='hidden' value='" . $linha["mat_prof"] . "' name='mat_prof'>" ."</td>" .
                "<td>" . $linha["nome"] . "</td>" .
                "<td>" . $linha["sala"] . "</td>" .
                "<td>" . $linha["especialidade"] . "</td>" .
                "<td>" . "<a href='professor/edit_professor.php?mat_prof=" . $linha["mat_prof"] . "'> <button type='button' class='btn btn-primary'>Editar</button>" . "</td>" .
                "<td>" . "<input type='submit' value='Deletar' name='delete_prof' class='btn btn-danger'>" . "</td>" .
                "</tr>" .
                "</form>";
        }
    } else {
        echo "Nenhum dado encontrado";
    }
}
?>