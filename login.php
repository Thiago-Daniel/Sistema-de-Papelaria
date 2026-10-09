<?php

include("conexao.php");

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario
        WHERE login='$login'
        AND senha='$senha'";

$resultado = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultado) > 0){

    header("Location: dashboard.php");
    exit();

}else{

    echo "Usuário ou senha inválidos!";
}

?>