<?php
//Item quantity modified and user not logged in
if (isset($_GET['action']) && !isset($_SESSION['id']))
{
    if($_GET['action'] == "add")
    {
        $_SESSION['cart'][$_GET['id']]++;
        header("Location: index.php?item_added");
        exit();
    }
    if ($_GET['action'] == "delete")
    {
        if ($_SESSION['cart'][$_GET['id']] > 0)
        {
            $_SESSION['cart'][$_GET['id']]--;
            header("Location: index.php?item_removed");
            exit();
        }
    }
    else
    {
        header("Location: index.php?item_not_in_cart");
        exit();
    }
}
//Item quantity modified and user IS logged in
else if (isset($_GET['action']) && isset($_SESSION['id']))
{
    // //Check if data folder exists
    // if (!file_exists('../data'))
    //     mkdir('../data');
     
    // //Check if cart file exists
    // $file = "../data/" . $_SESSION['uid'];

    // if (!file_exists($file))
    //     file_put_contents($file, null);

    // //Unserialize data into readable array
    // $cart = unserialize(file_get_contents($file));

    //Check if user has items in their cart
    // if ($cart)
    // {
    //    $_SESSION['cart'] = $cart;
    // }
    // else
    // {
    //     if (isset($_SESSION['cart']))
    //         $cart[]= $_SESSION['cart'];
    // }

    if ($_GET['action'] == "add")
    {
        $_SESSION['cart'][$_GET['id']]++;
       // $cart = serialize($_SESSION['cart']);
       // file_put_contents($file, $cart);
        header("Location: index.php?item_added");
        exit();
    }
    elseif ($_GET['action'] == "delete")
    {
        if ($_SESSION['cart'][$_GET['id']] > 0)
            $_SESSION['cart'][$_GET['id']]--;
       // $cart = serialize($_SESSION['cart']);
       // file_put_contents($file, $cart);
        header("Location: index.php?item_removed");
        exit();
    }
}
?>


<?php
    $items = unserialize(file_get_contents('../data/products'));
    echo '<h1>Product List</h1> 
    <table> 
        <tr> 
            <th>Name</th> 
            <th>Description</th> 
            <th>Price</th> 
            <th>Action</th> 
        </tr>';
    foreach($items as $row) {
        echo('<tr>');
        echo('<td>');
        echo($row['name']);
        echo('</td>');
        echo('<td>');
        echo($row['desc']);
        echo('</td>');
        echo('<td>');
        echo($row['price']);
        echo('</td>');
        echo('<td>');
        echo('<a href="index.php?action=add&id=0">Add to cart</a>');
        echo('</td>');
        echo('<td>');
        echo('<a href="index.php?action=delete&id=0">Remove from cart</a>');
        echo('</td>');
        echo('</tr>'); 
    }
    echo '</table>'
?>
