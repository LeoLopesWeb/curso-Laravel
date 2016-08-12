<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Controle de Estoque</title>
</head>
<body>
    <div class="container">
    
        <h1>Detalhes do produto: <?= $p->nome; ?></h1>

        <ul>
            <li><b>Valor:</b> R$ <?= $p->valor; ?></li>
            <li><b>Desoriçãp:</b> <?= $p->descricao; ?></li>
            <li><b>Quantidade em estoque:</b> R$ <?= $p->quantidade; ?></li>
        </ul>

    </div>
</body>
</html>