<?php
// Inicialize a sessão
session_start();

// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

// Incluir arquivo de configuração
require_once "config.php";

// Defina variáveis e inicialize com valores vazios
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifique se o nome de usuário está vazio
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, insira o nome de usuário.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Verifique se a senha está vazia
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, insira sua senha.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validar credenciais
    if (empty($username_err) && empty($password_err)) {
        // Prepare uma declaração selecionada
        $sql = "SELECT id, username, password FROM users WHERE username = :username";

        if ($stmt = $pdo->prepare($sql)) {
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Definir parâmetros
            $param_username = trim($_POST["username"]);

            // Tente executar a declaração preparada
            if ($stmt->execute()) {
                // Verifique se o nome de usuário existe, se sim, verifique a senha
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if (password_verify($password, $hashed_password)) {
                            // A senha está correta, então inicie uma nova sessão
                            session_start();

                            // Armazene dados em variáveis de sessão
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirecionar o usuário para a página de boas-vindas
                            header("location: welcome.php");
                        } else {
                            // A senha não é válida, exibe uma mensagem de erro genérica
                            $login_err = "Nome de usuário ou senha inválidos.";
                        }
                    }
                } else {
                    // O nome de usuário não existe, exibe uma mensagem de erro genérica
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Quicksand:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }

        body {
            margin: 0;
            flex-direction: column;
            height: 100%;

        }

        .logo-container {
            text-align: center;
        }

        .wrapper {
            width: 20%;
            /* ou qualquer largura desejada para o seu conteúdo */
            margin: 0 auto;
            /* Isso centralizará a div horizontalmente na página */
            text-align: center;
            /* Isso centralizará o texto dentro da div */
        }

        img {
            display: block;
            /* Isso remove margens extras do elemento de imagem */
            margin: 0 auto;
            /* Isso centralizará a imagem horizontalmente na página */
        }

        .container {
            float: left;
            margin-right: 850px;
            /* Adicione um pequeno espaço à direita da imagem (opcional) */
        }

        .main-content {
            flex: 1;
            /* Faz com que o conteúdo principal ocupe todo o espaço restante */
            font-family: 'Anton', sans-serif;
            font-size: 30px;

        }

        .custom-cadastro2 {
            font-family: 'Quicksand', sans-serif;

            font-size: 20px;
            text-align: center;
            /* Centraliza o conteúdo dentro da div */
            margin: 0 auto;
            /* Centraliza a div horizontalmente na página */
            max-width: 300px;
            /* Define a largura máxima da div, ajuste conforme necessário */
        }

        .custom-cadastro3 {
            font-family: 'Quicksand', sans-serif;

            font-size: 15px;
            text-align: center;
            /* Centraliza o conteúdo dentro da div */
            margin: 0 auto;
            /* Centraliza a div horizontalmente na página */
            max-width: 300px;
            /* Define a largura máxima da div, ajuste conforme necessário */
        }

        .botao-colorido {
            background-color: #836FFF;
            /* Define a cor de fundo do botão */
            color: white;
            /* Define a cor do texto do botão */
            border-radius: 20px;
            /* Faz com que o botão seja arredondado */
            padding: 10px 20px;
            /* Adiciona um espaço interno ao botão para melhor aparência */
            border: none;
            /* Remove a borda do botão */
            cursor: pointer;
            /* Mostra o cursor como ponteiro quando passa sobre o botão */
            font-family: 'Quicksand', sans-serif;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            /* ou a altura desejada para o rodapé */
            background-color: #CBCBCB;
            color: white;
            text-align: center;
            line-height: 50px;
            /* Ajuste conforme necessário para centralizar verticalmente o conteúdo */
        }

        .custom-cadastro {
            font-family: 'Quicksand', sans-serif;
            /* Substitua 'SuaFonte' pela fonte desejada */
            text-align: center;
            /* Centraliza o conteúdo dentro da div */
            margin: 0 auto;
            /* Centraliza a div horizontalmente na página */
            max-width: 600px;
            /* Define a largura máxima da div, ajuste conforme necessário */

        }
    </style>
</head>

<body>
    <nav class=" navbar navbar-expand-lg " style="background-color: #836FFF; ">

        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="imagens/studies.png" alt="Bootstrap" width="150" height="54">
            </a>

        </div>


    </nav>
    <br>


    <div class="logo-container">
        <img src="imagens/logo.png" alt="Logo da Empresa">
    </div>
    <div class="wrapper">
        <div class="main-content">
            <h2>FAÇA SEU LOGIN</h2>
        </div>
        <div class="custom-cadastro2">
            <p>Por favor, preencha os campos para fazer o login.</p>
        </div>
        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <div class="custom-cadastro">

                    <input type="text" name="username" placeholder="NOME DE USUÁRIO:"
                        class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $username; ?>">
                    <span class="invalid-feedback">
                        <?php echo $username_err; ?>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-cadastro">
                    <input type="password" name="password" placeholder="SENHA:"
                        class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback">
                        <?php echo $password_err; ?>
                    </span>
                </div>
            </div>
            <div class="botao-container">
                <div class="custom-cadastro">
                    <button class="botao botao-colorido" input type="submit" class="btn btn-primary"
                        value="Entrar">CONFIRMAR!</button>
                </div>
                <br>
                <div class="custom-cadastro3">
                    <p>Não tem uma conta? <a href="cadastrar.php">Inscreva-se agora</a>.</p>
                </div>
            </div>
        </form>
    </div>
    <img src="imagens/informações.jpg" alt="Outra imagem">
    <footer class="bg-gray text-light">
        <div class="text-center" style="background-color: #CBCBCB ; padding: 10px;">
            <h3>&copy 2023 Help Studies</h3>
        </div>
    </footer>



</body>

</html>