<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    // define variables and set to empty values
    $userNameErr = $emailErr = $genderErr = $passwordErr = NULL;
    $userName = $email = $gender = $password = NULL;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["userName"])) {
            $userNameErr = "Usuário é obrigatório";
        } else {
            // 
            if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', test_input($_POST["userName"]))) {
                $userNameErr = "Deve conter entre 6 e 32 caracteres e somente letras e números";
                $userName = NULL;
            } else {
                $userName = $_POST["userName"];
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email é obrigatório";
        } else {
            // check if e-mail address is well-formed
            if (!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Formato do e-mail invalido";
                $email = NULL;
            }else {
                $email = $_POST["email"];
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Senha é obrigatória";
        } else {
            
            // 
            if (!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', test_input($_POST["password"]))) {
                $passwordErr = "Senha deve conter no minimo 8 caracteres, um numero, uma letra maiúscula e uma letra minúscula";
                $password = NULL;
            }else{
                $password = $_POST["password"];
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gênero é obrigatório";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function save_data($userName, $email, $password, $gender){
        $fileName = $userName.".txt";
        $handle = fopen($fileName, "w") or die("falhar ao abrir o arquivo para salvar informações!");
        $data = $userName . "\r\n" . $email . "\r\n" . md5($password) . "\r\n" . $gender . "\r\n";
        fwrite($handle, $data);
        fclose($handle);
    }

    function check_data($userName, $email, $password, $gender, &$userNameErr){
        if(file_exists($userName . ".txt")){
            //echo "Usuário já cadastrado";
            $userNameErr = "Usuário já cadastrado";
            return false;
        }else {
            if($userName != NULL && $email != NULL && $password != NULL && $gender != NULL){
                save_data($userName, $email, $password, $gender);
                return true;
            }else {
                return false;
            }   
        }
       
    }

    ?>

    <h2>Cadastro</h2>
    <p><span class="error">* Campo obrigatório</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Usuário: <input type="text" name="userName">
        <span class="error">* <?php echo $userNameErr; ?></span>
        <br><br>
        E-mail: <input type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Senha: <input type="password" name="password">
        <span class="error">* <?php echo $passwordErr; ?></span>
        <br><br>
        Gênero:
        <input type="radio" name="gender" value="Feminino">Feminino
        <input type="radio" name="gender" value="Masculino">Masculino
        <input type="radio" name="gender" value="Outro">Outro
        <input type="radio" name="gender" value="Prefiro não informar">Prefiro não informar
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        if(check_data($userName, $email, $password, $gender, $userNameErr)){
            echo "<br /> Cadastro realizado com sucesso! <br />";
            echo "Dados cadastrados! <br />";
            echo "Usuário : " . $userName . "<br />";
            echo "Email: " . $email . "<br />";
            echo "Senha: " . $password . "<br />";
            echo "Gênero: " . $gender . "<br />";
        }
    ?>

</body>

</html>