<?php

require __DIR__ . '/../bootstrap.php';

class ShoppingCartTest extends PHPUnit_Framework_TestCase {

    public function test_isShoppingCartEmpty()
    {
        $cart = new ShoppingCart();

        $this->assertTrue($cart->isEmpty(), 'Looks like the Cart is not empty!');
    }

    public function test_getPriceOfLemonWhenQuantityIsBetween1And9()
    {
        for ($i=1; $i<=9; $i++) {
            $lemon = new Product('lemon');
            $cart = new ShoppingCart();
            $cart->addItem($lemon, $i);

            $this->assertEquals(0.50, $cart->getPriceOf($lemon));
        }
    }

    public function test_getPriceOfLemonWhenQuantityIsGreaterThan10()
    {
            $lemon = new Product('lemon');
            $cart = new ShoppingCart();
            $cart->addItem($lemon, 10);

            $this->assertEquals(0.45, $cart->getPriceOf($lemon));

            $lemon = new Product('lemon');
            $cart = new ShoppingCart();
            $cart->addItem($lemon, 100);

            $this->assertEquals(0.45, $cart->getPriceOf($lemon));
    }

    public function test_getPriceOfTomatoWhenQuantityIsBetween1And19()
    {
        for ($i=1; $i<=19; $i++) {
            $tomato = new Product('tomato');
            $cart = new ShoppingCart();
            $cart->addItem($tomato, $i);

            $this->assertEquals(0.20, $cart->getPriceOf($tomato));
        }
    }

    public function test_getPriceOfTomatoWhenQuantityIsBetween20And100()
    {
        for ($i=20; $i<=99; $i++) {
            $tomato = new Product('tomato');
            $cart = new ShoppingCart();
            $cart->addItem($tomato, $i);

            $this->assertEquals(0.18, $cart->getPriceOf($tomato));
        }
    }

    public function test_getPriceOfTomatoWhenQuantityIs100()
    {
            $tomato = new Product('tomato');
            $cart = new ShoppingCart();
            $cart->addItem($tomato, 100);

            $this->assertEquals(0.14, $cart->getPriceOf($tomato));
    }

    public function test_getTotalSumWhenAre8LemonAddedToCart()
    {
        $lemon = new Product('lemon');
        $cart = new ShoppingCart();
        $cart->addItem($lemon, 8);

        $this->assertEquals(8 * 0.50, $cart->getTotalSum());
    }

    public function test_getTotalSumWhenAre12LemonAddedToCart()
    {
        $lemon = new Product('lemon');
        $cart = new ShoppingCart();
        $cart->addItem($lemon, 12);

        $this->assertEquals(12 * 0.45, $cart->getTotalSum());
    }

    public function test_getTotalSumWhenAre25TomatoesAddedToCart()
    {
        $tomato = new Product('tomato');
        $cart = new ShoppingCart();
        $cart->addItem($tomato, 25);

        $this->assertEquals(25 * 0.18, $cart->getTotalSum());
    }

    public function test_getTotalSumWhenAre155TomatoesAddedToCart()
    {
        $tomato = new Product('tomato');
        $cart = new ShoppingCart();
        $cart->addItem($tomato, 155);

        $this->assertEquals(155 * 0.14, $cart->getTotalSum());
    }

    public function test_getTotalSumWhenAre18LemonsAnd24TomatoesAddedToCart()
    {
        $lemon = new Product('lemon');
        $tomato = new Product('tomato');
        $cart = new ShoppingCart();
        $cart->addItem($lemon, 18);
        $cart->addItem($tomato, 24);

        $this->assertEquals(18 * 0.45 + 24 * 0.18, $cart->getTotalSum());
    }
}
