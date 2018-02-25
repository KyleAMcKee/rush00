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
    // if ($_GET['action'] == "delete")
    // {
    //     if ($_SESSION['cart'][$_GET['id']] > 0)
    //     {
    //         $_SESSION['cart'][$_GET['id']]--;
    //         header("Location: index.php?item_removed");
    //         exit();
    //     }
    // }
    // else
    // {
    //     header("Location: index.php?item_not_in_cart");
    //     exit();
    // }
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
    echo '<h1>Product List</h1>';
    $temp = array("all");
    echo '<ul class="categories products">'; //products class ->placeholder for temp style, remove later
    echo '<li><a href="index.php?category=all">all</a></li>';
    foreach ($items as $key => $value)
    {
    	foreach ($value['category'] as $category)
    	{
	    	if (array_search($category, $temp) === false)
	    	{
	    		$temp[] = $category;
	    		echo '<li><a href="index.php?category='.$category.'">'.$category.'</a></li>';
	    	}
    	}
	}
    echo '</ul>';
    echo '<ul class="products">';
    foreach ($items as $key => $value)
    {
        echo '<li><img src="'.$value["image"].'"><br /><p>'.$value["name"].'</p><br />';
        echo '<p>$'.$value["price"].'</p><br />';
        echo '<a href="index.php?action=add&id='.$key.'">Add to Cart</a>';
    }
    echo '</ul>'; 
?>
