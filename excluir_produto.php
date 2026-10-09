<?php

include("conexao.php");

// Verifica se o ID foi informado na URL
$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM produto WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erro ao excluir o produto: " . mysqli_error($conn);
    }
} else {
    // Se não houver ID, apenas volta para o dashboard
    header("Location: dashboard.php");
    exit();
}

?>