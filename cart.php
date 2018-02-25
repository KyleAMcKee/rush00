<?php
    include_once('header.php');

    // if ($_GET['action'] == "delete")
    // {
    //     if ($_SESSION['cart'][$_GET['id']] > 0)
    //     {
    //         $_SESSION['cart'][$_GET['id']]--;
    //         header("Location: cart.php?item_removed");
    //         // exit();
    //     }
    // }
    // else
    // {
    //     header("Location: cart.php?item_not_in_cart");
    //     // exit();
    // }

    if (isset($_SESSION['cart']))
    {
        // print_r($_SESSION['cart']);
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

            $items = unserialize(file_get_contents('../data/products'));
            echo '<h1>My Cart</h1>';
            echo '<ul class="products">';
            foreach ($_SESSION['cart'] as $key => $quantity)
            {
                echo '<li><img src="'.$items[$key]["image"].'"><br /><p>'.$items[$key]["name"].'</p><br />';
                echo '<p>$'.$items[$key]["price"].'</p><br />';
                echo '<p>Quantity '.$quantity.'</p><br />';
                // echo '<form method="POST" action="modifycart.php">';
                // echo '<input type="hidden" name="id" value="'.$key.'">';
                // echo '<button type="submit" name="submit" value="delete">Remove From Cart</button></form>';
                echo '<a href="cart.php?action=delete&id='.$key.'">Remove From Cart</a>';
            }
            echo '</ul>';
        }
        else
            echo "<h1>There is nothing in your cart\n</h1>";
    }
    else
        echo "<h1>There is nothing in your cart\n</h1>";

        include_once('footer.php');
?>