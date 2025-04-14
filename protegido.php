<?php
session_start();


if (!isset($_SESSION['logado'])) {
    if (isset($_COOKIE['logado'])) {
        $_SESSION['logado'] = true; 
    } else {
        header("Location: login.php");
        exit;
    }
}

if (!isset($_SESSION['itens_adicionados'])) {
    $_SESSION['itens_adicionados'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novo_item = [
        "id" => time(),
        "titulo" => $_POST['titulo'],
        "categoria" => $_POST['categoria'],
        "imagem" => $_POST['imagem'],
        "descricao" => $_POST['descricao']
    ];
    $_SESSION['itens_adicionados'][] = $novo_item;
    header("Location: index.php");
    exit;
}
?>

<link rel="stylesheet" href="css/estilo.css">

<header>
    <nav>
        <a href="index.php">Home</a> |
        <a href="filtrar.php">Pesquisar</a> |
        <a href="login.php">Login</a> |
        <a href="protegido.php">Adicionar Título</a>
    </nav>
</header>

<h1>Cadastrar Novo Item</h1>

<form method="post">
    <input name="titulo" placeholder="Título" required>
    <input name="categoria" placeholder="Categoria" required>
    <input name="imagem" placeholder="URL da Imagem" required>
    <textarea name="descricao" placeholder="Descrição" required></textarea>
    <button type="submit">Cadastrar</button>
</form>

<footer>
    <p>&copy; 2025 - Catálogo HQs & Mangás</p>
</footer>