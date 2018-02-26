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
                $totalCost += $items[$key]['price'];
                echo '<li><img src="'.$items[$key]["image"].'"><br /><p>'.$items[$key]["name"].'</p><br />';
                echo '<p>$'.money_format('%i', $items[$key]["price"]).'</p><br />';
                echo '<p>Quantity '.$quantity.'</p><br />';
                echo '<a href="cart.php?action=delete&id='.$key.'">Remove From Cart</a>';
            }
            echo '</ul>';
            echo '<p>Order Total: $'.money_format('%i', $totalCost).'</p>';
            echo '<a href="orders.php?action=order">Place Order</a>';
        }
        else
            echo "<h1>There is nothing in your cart\n</h1>";
    }
    else
        echo "<h1>There is nothing in your cart\n</h1>";

        include_once('footer.php');
?>