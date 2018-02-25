<?php
    include_once('header.php');
if (isset($_SESSION['cart']))
{
    print_r($_SESSION['cart']);
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
        $items = unserialize(file_get_contents('../data/products'));
        foreach ($_SESSION['cart'] as $key => $quantity)
        {
            echo("key: " .$key . '<br>');
            echo("key2: " . $items[$key]['name']);
            echo("quantity: " . $quantity . '<br><br>');
        }
    }
    else
        echo "<h1>There is nothing in your cart\n</h1>";
}
else
    echo "<h1>There is nothing in your cart\n</h1>";

    include_once('footer.php');
?>