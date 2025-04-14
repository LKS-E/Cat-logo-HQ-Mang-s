<link rel="stylesheet" href="css/estilo.css">

<?php
include 'dados.php';
include 'funcoes.php';

$id = $_GET['id'] ?? null;
$item = buscarPorId($itens, $id);

if (!$item) {
    echo "Item não encontrado.";
    exit;
}
?>

<h1><?= $item['titulo'] ?></h1>
<img src="<?= $item['imagem'] ?>" width="200">
<p><strong>Categoria:</strong> <?= $item['categoria'] ?></p>
<p><?= $item['descricao'] ?></p>
<a href="index.php">← Voltar ao catálogo</a>

<footer>
    <p>&copy; 2025 - Catálogo HQs & Mangás</p>
</footer>
