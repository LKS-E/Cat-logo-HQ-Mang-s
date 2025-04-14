<?php
session_start();


if (isset($_SESSION['logado']) || isset($_COOKIE['logado'])) {
    $_SESSION['logado'] = true; 
    header("Location: protegido.php");
    exit;
}

$usuario_fixo = 'admin';
$senha_fixa = 'senha123';
$senha_hash = password_hash($senha_fixa, PASSWORD_DEFAULT); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario === $usuario_fixo && $senha === $senha_fixa) {
        $_SESSION['logado'] = true;
        setcookie('logado', '1', time() + (86400 * 30), "/"); 
        header("Location: protegido.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<link rel="stylesheet" href="css/estilo.css">

<header>
    <nav>
        <a href="index.php">Home</a> |
        <a href="filtrar.php">Pesquisar</a> |
        <a href="login.php">Login</a>
    </nav>
</header>

<h1>Login</h1>

<form method="post">
    <input type="text" name="usuario" placeholder="Usuário" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>

<p style="color:red"><?= $erro ?? '' ?></p>