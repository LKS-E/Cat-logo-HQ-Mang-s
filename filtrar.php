<link rel="stylesheet" href="css/estilo.css">

<header>
    <nav>
        <a href="index.php">Home</a> |
        <a href="filtrar.php">Pesquisar</a> |
        <a href="login.php">Login</a>
    </nav>
</header>

<?php
include 'dados.php';
include 'funcoes.php';

$categoria = $_GET['categoria'] ?? '';
$busca = strtolower($_GET['busca'] ?? '');
$ordem = $_GET['ordem'] ?? '';

$resultados = array_filter($itens, function ($item) use ($categoria, $busca) {
    $categoriaOk = !$categoria || $item['categoria'] === $categoria;
    $buscaOk = !$busca || strpos(strtolower($item['titulo']), $busca) !== false;
    return $categoriaOk && $buscaOk;
});

if ($ordem === 'az') {
    usort($resultados, function($a, $b) {
        return strcmp($a['titulo'], $b['titulo']);
    });
} elseif ($ordem === 'za') {
    usort($resultados, function($a, $b) {
        return strcmp($b['titulo'], $a['titulo']);
    });
}
?>


<h1>Filtrar por Categoria</h1>

<form method="get">
    <label>Filtrar por categoria:</label>
    <select name="categoria">
        <option value="">-- Todas --</option>
        <option value="Mangá" <?= ($_GET['categoria'] ?? '') === 'Mangá' ? 'selected' : '' ?>>Mangá</option>
        <option value="HQ" <?= ($_GET['categoria'] ?? '') === 'HQ' ? 'selected' : '' ?>>HQ</option>
    </select>

    <label>Buscar título:</label>
    <input type="text" name="busca" value="<?= htmlspecialchars($_GET['busca'] ?? '') ?>">

    <label>Ordenar:</label>
    <select name="ordem">
        <option value="">Padrão</option>
        <option value="az" <?= ($_GET['ordem'] ?? '') === 'az' ? 'selected' : '' ?>>A - Z</option>
        <option value="za" <?= ($_GET['ordem'] ?? '') === 'za' ? 'selected' : '' ?>>Z - A</option>
    </select>

    <button type="submit">Filtrar</button>
</form>


<div class="catalogo">
    <?php foreach ($resultados as $item): ?>
    <div class="produto">
        <h3><?= $item['titulo'] ?></h3>
        <img src="<?= $item['imagem'] ?>" alt="<?= $item['titulo'] ?>" width="200"><br>
        <a href="detalhes.php?id=<?= $item['id'] ?>">Ver mais</a>
        <hr>
    </div>
    <?php endforeach; ?>
</div>

<footer>
    <p>&copy; 2025 - Catálogo HQs & Mangás</p>
</footer>