<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Controle de Estoque</title>
</head>
<body>
    <div class="container">
        
        <h1>Listagem de Produtos</h1>
        <table class="table table-striped">
            <?php foreach ($produtos as $p) : ?>
            <tr>
                <td><?= $p->nome; ?></td>
                <td><?= $p->valor; ?></td>
                <td><?= $p->quantidade; ?></td>
                <td><?= $p->descricao; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>
</html>