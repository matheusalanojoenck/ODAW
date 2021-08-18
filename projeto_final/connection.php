<?php
$localhost = "localhost"; //your host name
$username = "root"; // your database name
$password = ""; // your database password
$dbname = "universidade";
$conexao = new mysqli($localhost, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Falha de conexão: " . $conexao->connect_error);
} else {
    //echo 'Conexão bem sucedida! <br />';
}
?>