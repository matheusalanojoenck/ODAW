<?php require_once "connection.php"; ?>
<?php

function projetos()
{
    if (isset($_POST["delete"])) {
        $sql = "DELETE FROM projeto WHERE num_proj=" . $_POST["num_proj"];
        if ($GLOBALS["conexao"]->query($sql)) {
            echo 'Apagado com Sucesso!';
        } else {
            echo 'Não foi apagar! ' . mysqli_error($GLOBALS["conexao"]);
        }
    }
    $result_query_projeto = $GLOBALS["conexao"]->query("SELECT * FROM projeto");
    if ($result_query_projeto->num_rows > 0) {
        while ($linha = $result_query_projeto->fetch_assoc()) {
            echo
            "<form method='POST'>" .
                "<tr>" .
                "<td>" .
                    "<a href='projeto/info_projeto.php?num_proj=" . $linha["num_proj"] . "'>".
                    $linha["num_proj"] .
                    "</a>".
                    "<input type='hidden' value='" . $linha["num_proj"] . 
                    "' name='num_proj'>" .
                 "</td>" .
                "<td>" . $linha["nome"] . "</td>" .
                "<td>" . $linha["data_inicio"] . "</td>" .
                "<td>" . $linha["data_fim"] . "</td>" .
                "<td>" . $linha["orcamento"] . "</td>" .
                "<td>" . $linha["mat_prof"] . "</td>" .
                "<td>" . "<a href='projeto/edit_projeto.php?num_proj=" . $linha["num_proj"] . "'> <button type='button'>Editar</button>" . "</td>" .
                "<td>" . "<input type='submit' value='Deletar' name='delete'>" . "</td>" .
                "</tr>" .
                "</form>";
        }
    } else {
        echo "Nenhum dado encontrado";
    }
}
?>