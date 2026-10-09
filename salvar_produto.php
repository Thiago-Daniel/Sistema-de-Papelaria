<?php

include("conexao.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

$sql = "INSERT INTO produto
(nome, descricao, preco, estoque)
VALUES
('$nome', '$descricao', '$preco', '$estoque')";

if(mysqli_query($conn, $sql)){
    echo "Produto cadastrado com sucesso!";
}else{
    echo "Erro: " . mysqli_error($conn);
}

?>