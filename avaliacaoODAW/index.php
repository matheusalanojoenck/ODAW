<?php require_once "connection.php"?>
<?php
$loginError = "";
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT user_name, password FROM users WHERE user_name = '$username'";

    $result_query = $conexao->query($query);
    if($result_query->num_rows != 1){
        $loginError = "Username e Password não combinam";
    }else{
            $result_user = $result_query->fetch_row();

            if(!isset($_SESSION)) session_start();

            $_SESSION['username'] = $result_user[0];

            header("Location: registros.php"); exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Avaliação ODAW</title>
</head>
<body>
    <form method="POST" action="">
        <label>Login Cadastro de Hotel</label> <br />
        <label><?php echo $loginError?></label> <br />
        <input type="text" name="username" placeholder="Username"> <br />
        <input type="password" name="password" placeholder="Password"> <br />
        <input type="submit" name="login"value="Login"> <br />
    </form>
    
</body>
</html>

