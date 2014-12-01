<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Shopping Cart</title>
        <style type="text/css">
            #container { border: 1px solid #cccccc }
            #sidebar_left { float: left; padding: 10px}
            #sidebar_rigth {  float: right; border-left: 1px solid #cccccc; padding: 10px }
            .row { clear: both; border-bottom: 1px solid #cccccc  }
            .row.header, .row.footer {color: #666666; font-weight: bold }
            .cell { padding: 5px; float: left }
            .cell.name { width: 80px; }
            .cell.quantity { width: 80px; }
            .cell.price { width: 80px; }
            .cell.price_discounted { width: 130px; }
            .cell.price_total { width: 130px; }
        </style>
    </head>
    <body>
        <div id="container">
            <div id="sidebar_left">
                <h2>Shopping Cart</h2>
                <?php if($cart->isEmpty()) : ?>
                    <div>The cart is empty. Please add an item from the sidebar.</div>
                <?php else : ?>
                    <div class="row header">
                        <div class="cell name">Item</div>
                        <div class="cell quantity">Quantity </div>
                        <div class="cell price">Unit price</div>
                        <div class="cell price">Total</div>
                        <div class="cell price_discounted">Discounted price</div>
                        <div class="cell price">Discount</div>
                        <div class="cell price_total">Total discounted</div>
                    </div>
                    <?php
                        foreach ($cart->getItems() as $item) :
                            if (0 === $item['amount']) {
                                continue;
                            }
                            $product = new Product($item['type']);
                    ?>
                    <div class="row">
                        <div class="cell name"><?php echo $item['item'] ?></div>
                        <div class="cell quantity"><?php echo $item['amount'] ?></div>
                        <div class="cell price"><?php echo $product->getPrice(); ?> EUR </div>
                        <div class="cell price"><?php echo $item['amount'] * $product->getPrice(); ?> EUR </div>
                        <div class="cell price_discounted"><?php echo $item['price'] ?> EUR </div>
                        <div class="cell price"><?php echo $item['amount'] * $product->getPrice() - $item['amount'] * $item['price']; ?> EUR </div>
                        <div class="cell price_total"><?php echo $item['amount'] * $item['price']; ?> EUR </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="row footer">
                        <div class="cell name"></div>
                        <div class="cell quantity"> </div>
                        <div class="cell price"> </div>
                        <div class="cell price"></div>
                        <div class="cell price_discounted"></div>
                        <div class="cell price">Total</div>
                        <div class="cell price_total"><?php echo $cart->getTotalSum(); ?> EUR </div>
                    </div>
                <?php endif; ?>
            </div>
            <div id="sidebar_rigth">
                <h2>Add to cart</h2>
                <form action="" method="post">
                <?php foreach (Product::$types as $productType) : ?>
                    <input type="hidden" name="type" value="<?php echo $productType; ?>" />
                    <div>
                        <input type="number" name="quantity[<?php echo $productType; ?>]"> x
                        <?php echo ucfirst($productType) ?>
                    </div>
                <?php endforeach; ?>
                    <div>
                        <input type="submit" name="submit" value="Add to cart">
                    </div>
                </form>
            </div>

            <br style="clear: both"

        </div>

    </body>
</html>