<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastrar Produto</title>

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
}

.container{
    width:450px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

h1{
    text-align:center;
}

label{
    display:block;
    margin-top:15px;
    font-weight:bold;
}

input{
    width:100%;
    padding:12px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:5px;
    box-sizing:border-box;
}

.botao{
    width:100%;
    background:green;
    color:white;
    border:none;
    padding:12px;
    margin-top:20px;
    border-radius:5px;
    cursor:pointer;
}

.voltar{
    text-align:center;
    margin-top:20px;
}

</style>

</head>
<body>

<div class="topo">
    <h2>Sistema de Gestão de Papelaria</h2>
</div>

<div class="container">

    <h1>Cadastrar Produto</h1>

    <!-- Abertura correta da tag form -->
    <form action="salvar_produto.php" method="POST">

        <label>Nome do Produto</label>
        <input type="text" name="nome" required>

        <label>Descrição</label>
        <input type="text" name="descricao" required>

        <label>Preço</label>
        <input type="number" step="0.01" name="preco" required>

        <label>Estoque</label>
        <input type="number" name="estoque" required>

        <button type="submit" class="botao">
            Salvar Produto
        </button>

    </form>

    <div class="voltar">
        <a href="dashboard.php">Voltar</a>
    </div>

</div>

</body>
</html>