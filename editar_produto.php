<?php

include("conexao.php");

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: dashboard.php");
    exit();
}

$sql = "SELECT * FROM produto WHERE id = $id";
$resultado = mysqli_query($conn, $sql);
$produto = mysqli_fetch_assoc($resultado);

if (!$produto) {
    header("Location: dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
            margin:0;
        }

        .container{
            width:400px;
            margin:50px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        label{
            display:block;
            margin-top:10px;
            font-weight:bold;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button{
            width:100%;
            padding:10px;
            background:orange;
            border:none;
            color:white;
            border-radius:5px;
            cursor:pointer;
            margin-top:10px;
        }

        .voltar {
            text-align: center;
            margin-top: 15px;
        }

        .voltar a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

<h2>Editar Produto</h2>

<!-- Abertura correta da tag form -->
<form action="atualizar_produto.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

    <label>Nome</label>
    <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>

    <label>Descrição</label>
    <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>" required>

    <label>Preço</label>
    <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required>

    <label>Estoque</label>
    <input type="number" name="estoque" value="<?php echo $produto['estoque']; ?>" required>

    <button type="submit">
        Atualizar Produto
    </button>

</form>

<div class="voltar">
    <a href="dashboard.php">Cancelar</a>
</div>

</div>

</body>
</html>