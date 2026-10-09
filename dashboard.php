<?php

include("conexao.php");

$sql = "SELECT * FROM produto";
$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Papelaria</title>

<style>

body{
    font-family: Arial, sans-serif;
    background:#f4f4f4;
    margin:0;
}

.topo{
    background:#007bff;
    color:white;
    padding:20px;
    display:flex;
    justify-content:space-between;
}

.topo a{
    color:white;
    text-decoration:none;
}

h1{
    text-align:center;
}

.novo{
    text-align:center;
    margin:20px;
}

.novo button{
    background:green;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:5px;
    cursor:pointer;
}

.produtos{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:20px;
}

.card{
    width:250px;
    background:white;
    padding:15px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

.preco{
    color:green;
    font-size:22px;
    font-weight:bold;
}

/* Novos estilos para as ações de Editar e Excluir */
.acoes {
    margin-top: 15px;
    padding-top: 10px;
    border-top: 1px solid #eee;
    display: flex;
    justify-content: space-between;
}

.btn-editar {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

.btn-excluir {
    color: red;
    text-decoration: none;
    font-weight: bold;
}

</style>

</head>
<body>

<div class="topo">
    <h2>Sistema de Gestão de Papelaria</h2>
    <a href="login.html">Sair</a>
</div>

<h1>Produtos da Papelaria</h1>

<div class="novo">

    <button onclick="window.location='cadastrar_produto.php'">
        Novo Produto
    </button>

</div>

<div class="produtos">

<?php while($produto = mysqli_fetch_assoc($resultado)) { ?>

<div class="card">

    <p><strong>Código:</strong> <?php echo $produto['id']; ?></p>

    <h3><?php echo $produto['nome']; ?></h3>

    <p><?php echo $produto['descricao']; ?></p>

    <p class="preco">
        R$ <?php echo number_format($produto['preco'],2,',','.'); ?>
    </p>

    <p>Estoque: <?php echo $produto['estoque']; ?></p>

    <!-- Botões de Editar e Excluir adicionados aqui -->
    <div class="acoes">
        <a href="editar_produto.php?id=<?php echo $produto['id']; ?>" class="btn-editar">Editar</a>
        <a href="excluir_produto.php?id=<?php echo $produto['id']; ?>" class="btn-excluir" onclick="return confirm('Deseja realmente excluir este produto?');">Excluir</a>
    </div>

</div>

<?php } ?>

</div>

</body>
</html>