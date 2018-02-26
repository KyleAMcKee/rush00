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
}
//Item quantity modified and user IS logged in
else if (isset($_GET['action']) && isset($_SESSION['id']))
{
    if ($_GET['action'] == "add")
    {
        $_SESSION['cart'][$_GET['id']]++;
        header("Location: index.php?item_added");
        exit();
    }
    elseif ($_GET['action'] == "delete")
    {
        if ($_SESSION['cart'][$_GET['id']] > 0)
            $_SESSION['cart'][$_GET['id']]--;
        header("Location: index.php?item_removed");
        exit();
    }
}
?>

<?php
    $items = unserialize(file_get_contents('../data/products'));
    echo '<h1>Product List</h1>';
    $temp = array("All");
    echo '<div class="categories">';
    echo '<ul>'; //products class ->placeholder for temp style, remove later
    echo '<li><a href="index.php?category=All">All</a></li>';
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
    echo '</div>';
    $category = (!$_GET['category']) ? "All" : $_GET['category'];
    echo '<ul class="products">';
    foreach ($items as $key => $value)
    {
        if (array_search($category, $value['category']) !== false)
        {
            echo '<li><img src="'.$value["image"].'"><br /><p>'.$value["name"].'</p><br />';
            echo '<p>'.ucwords($value["desc"]).'</p><br />';
            echo '<p>$'.money_format('%i', $value["price"]).'</p><br />';
            echo '<a href="index.php?action=add&id='.$key.'">Add to Cart</a>';
        }
    }
    echo '</ul>'; 
?>
