<?php
require_once "config.php";
$first_name = $last_name = $username = $password = $confirm_password = $email = $phone = "";
$first_name_err = $last_name_err = $username_err = $password_err = $confirm_password_err = $email_err = $phone_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["first_name"]))) {
        $first_name_err = "Por favor, insira o nome.";
    } else {
        $first_name = trim($_POST["first_name"]);
    }
    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = "Por favor, insira o sobrenome.";
    } else {
        $last_name = trim($_POST["last_name"]);
    }
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, coloque um nome de usuário.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
    } else {
        $sql = "SELECT id FROM users WHERE username = :username";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $username_err = "Este nome de usuário já está em uso.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
            
            unset($stmt);
        }
    }

    // Validar senha
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor insira uma senha.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validar e confirmar a senha
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor, confirme a senha.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "A senha não confere.";
        }
    }

    // Validar email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Por favor, insira o email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validar celular
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Por favor, insira o número de celular.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Verifique os erros de entrada antes de inserir no banco de dados
    if (empty($first_name_err) && empty($last_name_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($phone_err)) {

        // Prepare uma declaração de inserção
        $sql = "INSERT INTO users (first_name, last_name, username, password, email, phone) VALUES (:first_name, :last_name, :username, :password, :email, :phone)";

        if ($stmt = $pdo->prepare($sql)) {
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":first_name", $param_first_name, PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $param_last_name, PDO::PARAM_STR);
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);

            // Definir parâmetros
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_phone = $phone;

            // Tente executar a declaração preparada
            if ($stmt->execute()) {
                // Redirecionar para a página de login
                header("location: login.php");
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }

    // Fechar conexão
    unset($pdo);
}
?>


<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="cadastrar.css">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">


</head>

<body>

    <nav class=" navbar navbar-expand-lg " style="background-color: #836FFF; ">

        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="imagens/studies.png" alt="Bootstrap" width="150" height="54">
            </a>

        </div>


    </nav>
    <div class="content">
        <div class="sidebar">
            <img src="imagens/Faixagrande.png" alt="Descrição da Imagem" width="800" height="500">
        </div>



        <div class="main-content">
            <div class="main-content2">
                <h2>Cadastro</h2>
            </div>
            <div class="custom-cadastro2">
                <p>Por favor, preencha este formulário para criar uma conta.</p>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <div class="custom-cadastro">
                        <input type="text" name="first_name" class="custom-cadastro" id="exampleFormControlInput1"
                            placeholder="NOME:"
                            class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $first_name; ?>">

                        <span class="invalid-feedback">
                            <?php echo $first_name_err; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <div class="custom-cadastro">
                            <input type="text" name="last_name" class="custom-cadastro" id="exampleFormControlInput1"
                                placeholder="SOBRENOME:"
                                class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $last_name; ?>">
                            <span class="invalid-feedback">
                                <?php echo $last_name_err; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="custom-cadastro">
                                <input type="text" name="username" class="custom-cadastro" id="exampleFormControlInput1"
                                    placeholder="NOME DE USUÁRIO:"
                                    class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                    value="<?php echo $username; ?>">
                                <span class="invalid-feedback">
                                    <?php echo $username_err; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-cadastro">
                                    <input type="email" name="email" class="custom-cadastro"
                                        id="exampleFormControlInput1" placeholder="EMAIL:"
                                        class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                                        value="<?php echo $email; ?>">
                                    <span class="invalid-feedback">
                                        <?php echo $email_err; ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <div class="custom-cadastro">
                                        <input type="text" name="phone" class="custom-cadastro"
                                            id="exampleFormControlInput1" placeholder="CELULAR:"
                                            class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>"
                                            value="<?php echo $phone; ?>">
                                        <span class="invalid-feedback">
                                            <?php echo $phone_err; ?>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-cadastro">
                                            <input type="password" name="password" class="custom-cadastro"
                                                id="exampleFormControlInput1" placeholder="SENHA:"
                                                class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                                value="<?php echo $password; ?>">
                                            <span class="invalid-feedback">
                                                <?php echo $password_err; ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-cadastro">
                                                <input type="password" name="confirm_password" class="custom-cadastro"
                                                    id="exampleFormControlInput1" placeholder="CONFIRME A SENHA:"
                                                    class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                                                    value="<?php echo $confirm_password; ?>">
                                                <span class="invalid-feedback">
                                                    <?php echo $confirm_password_err; ?>
                                                </span>
                                            </div>
                                            <div class="botao-container">
                                                <div class="custom-cadastro">
                                                    <button class="botao botao-colorido"
                                                        onclick="window.location.href='http://localhost:8080/cadastrar.php'">CONFIRMAR!</button>
                                                </div>
                                            </div>
                                            <div class="custom-cadastro2">
                                                <p>Já tem uma conta? <a href="login.php">Entre aqui</a>.</p>
                                            </div>
            </form>


        </div>

    </div>



</body>

</html>