<?php require_once "conexao.php" ?>
<a href="index.php">Voltar</a>
<?php
$name_erro = '';
$email_erro = '';
$sala_erro = '';
$msg = '';
$data = '';
if ($_GET['codp']) {
    $codp = $_GET['codp'];
    $sql = "SELECT * FROM professor WHERE codp = {$codp}";
    $result = $conexao->query($sql);

    $data = $result->fetch_assoc();
}

if (isset($_POST["edit"])) {
    if (empty($_POST["nome_input"]) || empty($_POST["email_input"]) || empty($_POST["sala_input"])) {
        if (empty($_POST["nome_input"])) $name_erro = '* Campo obrigatório';
        if (empty($_POST["email_input"])) $email_erro = '* Campo obrigatório';
        if (empty($_POST["sala_input"])) $sala_erro = '* Campo obrigatório';
    } else {
        $nome = $_POST["nome_input"];
        $email = $_POST["email_input"];
        $sala = $_POST["sala_input"];
        $sql_query = "UPDATE professor SET nome = '$nome', email = '$email', sala = '$sala' WHERE codp = {$codp}";
        echo $sql_query;
        if ($conexao->query($sql_query)) {
            $msg = 'Operação realizada com sucesso';
        } else {
            $msg = 'Erro ao tentar editar novo professor ' . mysqli_error($conexao);
        }
    }
}

?>
<form method="POST">
    <label id="add_prof_title">Editar Professor</label><br />
    <input type="text" name="nome_input" placeholder="Nome" value="<?php echo $data['nome'] ?>">
    <label class="erro"><?php echo $name_erro ?></label> <br />

    <input type="email" name="email_input" placeholder="Email" value="<?php echo $data['email'] ?>">
    <label class="erro"><?php echo $email_erro ?></label> <br />

    <input type="text" name="sala_input" placeholder="Sala" value="<?php echo $data['sala'] ?>">
    <label class="erro"><?php echo $sala_erro ?></label> <br />

    <input type="submit" value="Editar" name="edit"><br />
    <label class="erro"><?php echo $msg ?></label> <br />
</form>