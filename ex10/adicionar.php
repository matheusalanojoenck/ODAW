<?php require_once "conexao.php" ?>
<a href="index.php">Voltar</a>
<?php
$name_erro = '';
$email_erro = '';
$sala_erro = '';
$msg = '';

if (isset($_POST["add_novo"])) {
    if (empty($_POST["nome_input"]) || empty($_POST["email_input"]) || empty($_POST["sala_input"])) {
        if (empty($_POST["nome_input"])) $name_erro = '* Campo obrigatório';
        if (empty($_POST["email_input"])) $email_erro = '* Campo obrigatório';
        if (empty($_POST["sala_input"])) $sala_erro = '* Campo obrigatório';
    }else {
        $nome = $_POST["nome_input"];
        $email = $_POST["email_input"];
        $sala = $_POST["sala_input"];
        $sql_query = 
        "INSERT INTO professor(nome, email, sala) 
        VALUES ('$nome', '$email','$sala')";
        if ($conexao->query($sql_query)) {
            $msg = 'Operação realizada com sucesso';
        } else {
            $msg = 'Erro ao tentar adicionar novo professor' . mysqli_error($conexao);
        }
    }
} 
?>
<form method="POST">
    <label id="add_prof_title">Adicionar Professor</label><br /> 
    <input type="text" name="nome_input" placeholder="Nome">
    <label class="erro"><?php echo $name_erro ?></label> <br />

    <input type="email" name="email_input" placeholder="Email">
    <label class="erro"><?php echo $email_erro ?></label> <br />

    <input type="text" name="sala_input" placeholder="Sala">
    <label class="erro"><?php echo $sala_erro ?></label> <br />

    <input type="submit" value="Adicionar" name="add_novo"><br />
    <label class="erro"><?php echo $msg ?></label> <br />
</form>
