<?php

class ShoppingCart implements CartInterface
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @return float
     */
    public function getTotalSum()
    {
        $totalSum = 0;

        if (!$this->isEmpty()) {
            foreach ($this->items as $cartItem) {
                $totalSum += $cartItem['price'] * $cartItem['amount'];
            }
        }
        return $totalSum;
    }

    /**
     * @param Product $product
     * @param int $amount
     * @throws Exception
     */
    public function addItem(Product $product, $amount)
    {
        $type = $product->getType();

        if (!in_array($type, Product::$types)) {
            throw new Exception("Product doesn't have a valid type");
        }

        $this->items[$type]['item'] =  $product->getName();
        $this->items[$type]['type'] =  $product->getType();
        $this->items[$type]['amount'] =  $amount;
        $this->items[$type]['price'] =  $this->getPriceOf($product);
    }

    /**
     * @param Product $product
     * @return float|null
     */
    public function getPriceOf(Product $product)
    {
        if ('lemon' === $product->getType()) {
            if (!$this->items['lemon']['amount']) {
                return null;
            }

            if ($this->items['lemon']['amount'] >= 1 && $this->items['lemon']['amount'] <= 9) {
                return 0.50;
            } elseif ($this->items['lemon']['amount'] >= 10) {
                return 0.45;
            }

        } elseif ('tomato' === $product->getType()) {
            if (!$this->items['tomato']['amount']) {
                return null;
            }

            if ($this->items['tomato']['amount'] >= 1 && $this->items['tomato']['amount'] <= 19) {
                return 0.20;
            } elseif ($this->items['tomato']['amount'] >= 20 && $this->items['tomato']['amount'] <= 99) {
                return 0.18;
            } elseif ($this->items['tomato']['amount'] >= 100) {
                return 0.14;
            }
        }

        return null;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return (empty($this->items));
    }

} 