<?php

require __DIR__ . '/../bootstrap.php';

class ProductTest extends PHPUnit_Framework_TestCase {

    public function test_ProductHasCorrectTypes()
    {
        $this->assertTrue(true);
    }

    public function test_ProductConstructor()
    {
        $lemon = new Product('lemon');
        $this->assertEquals('lemon', $lemon->getType());

        $tomato = new Product('tomato');
        $this->assertEquals('tomato', $tomato->getType());

        $orange = new Product('orange');
        $this->assertEquals(null, $orange->getType());
    }

    public function test_getUnitPriceOfALemon()
    {
        $lemon = new Product('lemon');

        $this->assertEquals(0.50, $lemon->getPrice());
    }

    public function test_getUnitPriceOfATomato()
    {
        $tomato = new Product('tomato');

        $this->assertEquals(0.20, $tomato->getPrice());
    }

}
 