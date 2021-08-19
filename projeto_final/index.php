<?php
include "professor/professores.php";
include "estudante_pos/estudantes.php";
include "departamento/departamentos.php";
include "projeto/projetos.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Gerenciador Universidade</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <br><label id="logo"><h2>Gerenciador Universidade</h2></label><br>
        </div>

        <hr>

        <table class="table">
            <label>Projetos&nbsp;</label>
            <a href="projeto/add_projeto.php"><button class="btn btn-success">Novo Projeto</button></a>
            <tr class="column-name">
                <td>Número</td>
                <td>Nome</td>
                <td>Data Inicio</td>
                <td>Data Fim</td>
                <td>Orçamento</td>
                <td>Gerente</td>
                <td></td>
                <td></td>
            </tr>
            <?php projetos(); ?>
        </table>

        <hr>

        <table class="table">
            <label>Professores&nbsp;</label>
            <a href="professor/add_professor.php"><button class="btn btn-success">Novo Professor</button></a>
            <tr class="column-name">
                <td>Matricula</td>
                <td>Nome</td>
                <td>Sala</td>
                <td>Especialidade</td>
                <td></td>
                <td></td>
            </tr>
            <?php professores(); ?>
        </table>

        <hr>

        <table class="table">
            <label>Estudantes&nbsp;</label>
            <a href="estudante_pos/add_estudante.php"><button class="btn btn-success">Novo Estudante</button></a>
            <tr class="column-name">
                <td>Matricula</td>
                <td>Nome</td>
                <td>Departamento</td>
                <td></td>
                <td></td>
            </tr>
            <?php estudantes(); ?>
        </table>

        <hr>

        <table class="table">
            <label>Departamento&nbsp;</label>
            <a href="departamento/add_departamento.php"><button class="btn btn-success">Novo Departamento</button></a>
            <tr class="column-name">
                <td>Número</td>
                <td>Nome</td>
                <td>Sala</td>
                <td>Chefe</td>
                <td></td>
                <td></td>
            </tr>
            <?php departamentos(); ?>
        </table>

        <hr>
    </div>


</body>

</html>