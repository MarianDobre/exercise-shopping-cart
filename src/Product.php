<?php

class Product
{
    /**
     * @var array
     */
    static $types = ['lemon', 'tomato'];

    /**
     * @var string
     */
    protected $type;

    /**
     * @var float
     */
    protected $price;

    /**
     * @param $type
     */
    public function __construct($type)
    {
        if (in_array($type, self::$types)) {
            $this->type = $type;
        }
    }

    /**
     * @param $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return ucfirst($this->type);
    }

    /**
     * @return float
     */
    public  function getPrice()
    {
        if ('lemon' === $this->getType()) {
            return 0.50;
        } elseif ('tomato' === $this->getType()) {
            return 0.20;
        }
    }
}