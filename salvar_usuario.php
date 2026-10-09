<?php

// Conecta ao banco de dados
include("conexao.php");

// Verifica se o formulário foi enviado pelo método POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acesso inválido.");
}

// Recebe os dados enviados pelo formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$confirmarSenha = $_POST['confirmarSenha'];

// Verifica se as senhas são iguais
if ($senha != $confirmarSenha) {

    echo "As senhas não coincidem!";
    exit();

}

// Verifica se já existe um usuário com o mesmo login
$verificaLogin = "SELECT * FROM usuario WHERE login = '$login'";
$resultadoLogin = mysqli_query($conn, $verificaLogin);

if (mysqli_num_rows($resultadoLogin) > 0) {

    echo "Este usuário já está cadastrado!";
    exit();

}

// Verifica se já existe um usuário com o mesmo e-mail
$verificaEmail = "SELECT * FROM usuario WHERE email = '$email'";
$resultadoEmail = mysqli_query($conn, $verificaEmail);

if (mysqli_num_rows($resultadoEmail) > 0) {

    echo "Este e-mail já está cadastrado!";
    exit();

}

// Comando SQL para inserir o novo usuário
$sql = "INSERT INTO usuario
(nome, email, login, senha, perfil)
VALUES
('$nome', '$email', '$login', '$senha', 'usuario')";

// Executa o INSERT
if (mysqli_query($conn, $sql)) {

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">

    <title>Cadastro Realizado</title>

    <!-- Redireciona automaticamente para o login após 2 segundos -->
    <meta http-equiv="refresh" content="2;url=login.html">

    <style>

        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .mensagem{
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
            text-align:center;
            max-width:400px;
        }

        h2{
            color:green;
            margin-bottom:15px;
        }

        p{
            color:#333;
        }

    </style>

</head>

<body>

    <div class="mensagem">

        <h2>✅ Cadastro realizado com sucesso!</h2>

        <p>
            Você será redirecionado para a tela de login...
        </p>

    </div>

</body>
</html>

<?php

} else {

    // Mostra erro retornado pelo MySQL
    echo "Erro ao cadastrar usuário: " . mysqli_error($conn);

}

?>