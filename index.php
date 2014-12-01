<?php
require_once 'bootstrap.php';

$cart = new ShoppingCart();

if (isset($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $type => $quantity) {
        if ((int) $quantity < 0) {
            $quantity = 0;
        }
        $product = new Product($type);
        $cart->addItem($product, (int) $quantity);
    }
}

include_once 'src/views/homepage.php';
