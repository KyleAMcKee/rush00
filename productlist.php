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
    echo '<ul>';
    echo '<li><a href="index.php?category=All"><i class="fa fa-paw"></i> All</a></li>';
    foreach ($items as $key => $value)
    {
    	foreach ($value['category'] as $category)
    	{
	    	if (array_search($category, $temp) === false)
	    	{
	    		$temp[] = $category;
	    		echo '<li><a href="index.php?category='.$category.'"><i class="fa fa-paw"></i>' . ' ' .$category.'</a></li>';
	    	}
    	}
	}
    echo '</ul>';
    echo '</div>';
    if (isset($_GET['category']))
    {
    $category = (!$_GET['category']) ? "All" : $_GET['category'];
    }
    echo '<ul class="products">';
    foreach ($items as $key => $value)
    {
        if (array_search($category, $value['category']) !== false)
        {
            echo '<li><img src="'.$value["image"].'"><br /><p class="name">'.ucwords($value["name"]).'</p>';
            echo '<p class="desc">'.ucwords($value["desc"]).'</p>';
            echo '<p class="price">$'.money_format('%i', $value["price"]).'</p>';
            echo '<a class="addItem" href="index.php?action=add&id='.$key.'">Add to Cart</a></li>';
        }
    }
    echo '</ul>'; 
?>
