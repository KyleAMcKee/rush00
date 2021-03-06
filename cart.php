<?php
    include_once('header.php');

    if (isset($_SESSION['cart']))
    {
        $in_cart = FALSE;
        foreach ($_SESSION['cart'] as $quantity)
        {
            if ($quantity > 0)
            {
                $in_cart = TRUE;
                break;
            }
        }
        if ($in_cart == TRUE)
        {
            if (isset($_GET['action']) && isset($_GET['id']) && isset($_SESSION['cart'][$_GET['id']]))
            {
                if ($_GET['action'] == "delete")
                    unset($_SESSION['cart'][$_GET['id']]);
            }

            $orders = unserialize(file_get_contents('../data/orders'));
            $items = unserialize(file_get_contents('../data/products'));
            $totalCost = 0;
            echo '<h1>My Cart</h1>';
            echo '<ul class="products">';
            foreach ($_SESSION['cart'] as $key => $quantity)
            {
                $totalCost += $items[$key]['price'] * $quantity;
                echo '<li><img src="'.$items[$key]["image"].'"><br /><p class="name">'.$items[$key]["name"].'</p>';
                echo '<p class="desc">'.ucwords($items[$key]["desc"]).'</p>';
                echo '<p class="price">$'.money_format('%i', $items[$key]["price"]).'</p>';
                echo '<p class="quantity">Quantity: '.$quantity.'</p>';
                echo '<a class="removeItem" href="cart.php?action=delete&id='.$key.'">Remove From Cart</a>';
            }
            echo '</ul>';
            echo '<div class="cart">';
            echo '<p class="orderTotal">Order Total: $'.money_format('%i', $totalCost).'</p>';
            echo '<a class="placeOrder" href="orders.php?action=order">Place Order</a>';
            echo '</div>';
        }
        else
            echo "<h1>There is nothing in your cart</h1>";
    }
    else if (isset($_GET['cartorder']) && $_GET['cartorder'])
        echo "<h1>Your order has been placed!</h1>";
    else
        echo "<h1>There is nothing in your cart</h1>";

        include_once('footer.php');
?>