<?php
date_default_timezone_set('America/Sao_Paulo');
echo "Hoje é " . date('d/m/y') . " e agora são " . date('H:i') . "h <br />";

echo "<hr />";


function addArray(string $str, array &$array){
    if (strlen($str) < 5) {
        echo 'String ´'. $str . '´ tem menos de 5 caracteres <br />';
        return $array;
    } else{
        array_push($array, $str);
        return $array;
    }
}
$array = array();
echo implode(',',$array);
addArray('teste', $array);
addArray('tet', $array);
addArray('teste1', $array);
addArray('teste2', $array);
addArray('t', $array);
echo implode(',',$array);

echo "<hr />";

$file_path = "contador.txt";
$arquivo = fopen($file_path, "r") or die("falha ao abrir o arquivo<br />");
if(filesize($file_path) == 0){
    fclose($arquivo);
    $arquivo = fopen($file_path, "w") or die("falha ao abrir o arquivo<br />");
    fwrite($arquivo,0);
    fclose($arquivo);
}else{
    $count = fread($arquivo, filesize($file_path));
    $count++;
    echo 'Você é o visitante número: ' . $count . '<br />';
    fclose($arquivo);
    $arquivo = fopen($file_path, "w") or die("falha ao abrir o arquivo<br />");
    fwrite($arquivo, $count);
    fclose($arquivo);
}

session_start();
echo '<hr />';
?>

<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "Data ultima sessão: " . $_SESSION["last_session"] . ".<br>";
echo "Usuário: " . $_SESSION["usr"] . ".";
?>

</body>
</html>