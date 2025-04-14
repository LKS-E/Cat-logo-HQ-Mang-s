<?php
session_start();

// Remove todos os dados da sessão
session_unset();
session_destroy();

// Remove o cookie, se existir
setcookie('logado', '', time() - 3600, "/");

// Redireciona de volta para a home
header("Location: index.php");
exit;