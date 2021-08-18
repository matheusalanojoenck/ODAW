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
    <title>Document</title>
</head>

<body>
    <br><label>Gerenciador Universidade</label><br>

    <hr>

    <table>
        <label>Projetos&nbsp;</label>
        <a href="projeto/add_projeto.php"><button>Novo Projeto</button></a>
        <tr>
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

    <table>
        <label>Professores&nbsp;</label>
        <a href="professor/add_professor.php"><button>Novo Professor</button></a>
        <tr>
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

    <table>
        <label>Estudantes&nbsp;</label>
        <a href="estudante_pos/add_estudante.php"><button>Novo Estudante</button></a>
        <tr>
            <td>Matricula</td>
            <td>Nome</td>
            <td>Departamento</td>
            <td></td>
            <td></td>
        </tr>
        <?php estudantes(); ?>
    </table>

    <hr>

    <table>
        <label>Departamento&nbsp;</label>
        <a href="departamento/add_departamento.php"><button>Novo Departamento</button></a>
        <tr>
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
</body>

</html>