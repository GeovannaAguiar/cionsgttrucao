<?php
require_once 'config.php';
require_once 'functions.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remover'])) {
        unset($_SESSION['carrinho'][$_POST['produto_id']]);
    } elseif (isset($_POST['atualizar'])) {
        foreach ($_POST['quantidade'] as $id => $quantidade) {
            if ($quantidade > 0) {
                $_SESSION['carrinho'][$id] = $quantidade;
            } else {
                unset($_SESSION['carrinho'][$id]);
            }
        }
    }
}
 
include 'header.php';
  class="container">
    <h1>Seu Carrinho</h1>
    
if (empty($_SESSION['carrinho'])): ?>
        <p>Seu carrinho está vazio.</p>
        <a href="index.php" class="btn">Continuar Comprando</a>
    <?php else: ?>
        <form method="POST" action="carrinho.php">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['carrinho'] as $id => $quantidade):
                        $produto = getProdutoPorId($id);
                        $subtotal = $produto['preco'] * $quantidade;
                        $total += $subtotal;
                         ?>