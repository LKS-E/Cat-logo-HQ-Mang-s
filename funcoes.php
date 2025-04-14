
<?php
function filtrarPorCategoria($itens, $categoria) {
    return array_filter($itens, fn($item) => $item['categoria'] === $categoria);
}

function buscarPorId($itens, $id) {
    foreach ($itens as $item) {
        if ($item['id'] == $id) return $item;
    }
    return null;
}
?>
