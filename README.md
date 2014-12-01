Basic Shopping Cart
===================

Requirements
------------

- As a user, I want to be able to add to shopping cart two types of products: lemons and tomatoes
- Products will get price discounts depending on quantity. The following are unit prices. 
    - Lemons 
        - [1..9]    ==> 0.50 Eur
        - [10..]    ==> 0.45 Eur
    - Tomatoes
        - [1..19]    ==> 0.20 Eur
        - [20..99]   ==> 0.18 Eur
        - [100..]    ==> 0.14 Eur

The following interface was used:

    interface CartInterface
    {
        public function getTotalSum();
        public function addItem(Product $product, $amount);
        public function getPriceOf(Product $product);
    }


Resources
---------

In order to install phpunit you have to run command

    $ composer install

You can run the unit tests with the following command:

    $ phpunit tests/
