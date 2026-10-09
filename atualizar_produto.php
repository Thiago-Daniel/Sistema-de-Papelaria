<?php

include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "UPDATE produto SET 
            nome = '$nome', 
            descricao = '$descricao', 
            preco = '$preco', 
            estoque = '$estoque' 
            WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erro ao atualizar produto: " . mysqli_error($conn);
    }
}
?>