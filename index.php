<?php
session_start();
include 'dados.php';

$itens_adicionados = $_SESSION['itens_adicionados'] ?? [];
$todos_itens = array_merge($itens, $itens_adicionados);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de HQs e Mangás</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

    <header>
        <nav>
            <a href="index.php">Home</a> |
            <a href="filtrar.php">Pesquisar</a> |
            <?php if (isset($_SESSION['logado']) || isset($_COOKIE['logado'])): ?>
            <a href="protegido.php">Adicionar Título</a> |
            <a href="logout.php">Sair</a>
            <?php else: ?>
            <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </header>

    <h1>Catálogo de HQs e Mangás <br> 'Se quiser adicionar titulos deve se logar'</h1>

    <div class="catalogo">
        <?php foreach ($todos_itens as $item): ?>
        <div class="produto">
            <h3><?= $item['titulo'] ?></h3>
            <p>Categoria: <?= $item['categoria'] ?></p>
            <img src="<?= $item['imagem'] ?>" alt="<?= $item['titulo'] ?>" width="200"><br>
            <a href="detalhes.php?id=<?= $item['id'] ?>">Ver mais</a>
            <hr>
        </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; 2025 - Catálogo HQs & Mangás</p>
    </footer>

</body>

</html>