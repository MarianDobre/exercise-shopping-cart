<?php

interface CartInterface
{
    public function getTotalSum();
    public function addItem(Product $product, $amount);
    public function getPriceOf(Product $product);
}