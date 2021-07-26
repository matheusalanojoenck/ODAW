<?php
require_once 'conexao.php';

$msg_del = '';
if (isset($_POST['deletar'])) {
    // $msg_del = 'Entrou deletar';
    $sql = "DELETE FROM professor WHERE codp=" . $_POST['codp'];
    if ($conexao->query($sql)) {
        $msg_del = 'Apagado com Sucesso!';
    } else {
        $msg_del = 'Não foi apagar! ' . mysqli_error($conexao);
    }
}

$select_query = "SELECT * FROM professor";
$result_select_query = $conexao->query($select_query);
if ($result_select_query->num_rows > 0) {
    echo 'Dados encontrados <br />';
?>
    <table id="tabela_professor">
        <tr>
            <td>codp</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Sala</td>
            <td></td>
            <td></td>
        </tr>
        <?php
        while ($linha = $result_select_query->fetch_assoc()) {
            echo "<form method='POST'>";
            echo "<input type='hidden' value='" . $linha['codp'] . "' name='codp' />";
            echo '<tr>';
            echo '<td>' . $linha['codp'] . '</td>';
            echo '<td>' . $linha['nome'] . '</td>';
            echo '<td>' . $linha['email'] . '</td>';
            echo '<td>' . $linha['sala'] . '</td>';
            echo '<td>' . "<a href='editar.php?codp=" . $linha['codp'] . "'> <button type='button'>Editar</button>" . '</td>';
            echo '<td>' . "<input type='submit' value='Deletar' name='deletar'>" . '</td>';
            echo '</tr>';
            echo "</form>";
        }
        ?>
    </table>
<?php
} else {
    echo 'Nenhum dado encontrado! <br />';
}
?>
<a href="adicionar.php"> Adicionar </a><br />
<label><?php echo $msg_del ?></label>