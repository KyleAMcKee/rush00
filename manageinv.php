<?php
    include_once('header.php');
    if ($_SESSION['priv'] === 'no')
    {
        header("Location: index.php?access=denied");
        exit();
    }
?>

<section class"main-container">
    <div class="main-wrapper">
        <h2>Manage items</h2>
        <form class="signup-form" method="POST" action="addproduct.php"> 
            <input type="text" name="name" placeholder="Product Name">
            <input type="number" min='0' step='0.01' name="price" placeholder="Price">
            <input type="number" min='0' name="stock" placeholder="Quantity">
            <input type="text" name="desc" placeholder="Description">
            <input type="text" name="category" placeholder="Category1, Category2...">
            <input type="url" name="image" placeholder="Image URL">
            <button type="submit" name="submit" value="add">Add</button>
            <button type="submit" name="submit" value="delete">Delete</button>
            <button type="submit" name="submit" value="modify">Modify</button>
        </form>
        <br><br><br>
        <?php
        $items = unserialize(file_get_contents('../data/products'));
        if ($items)
        {
            echo '<h1>Inventory</h1>';
            $temp = array("All");
            echo '<div class="categories">';
            echo '<ul>';
            echo '<li><a href="manageinv.php?category=All"><i class="fa fa-paw"></i> All</a></li>';
            foreach ($items as $key => $value)
            {
                foreach ($value['category'] as $category)
                {
                    if (array_search($category, $temp) === false)
                    {
                        $temp[] = $category;
                        echo '<li><a href="manageinv.php?category='.$category.'"><i class="fa fa-paw"></i>' . ' ' .$category.'</a></li>';
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
                    echo '<li><img src="'.$value["image"].'"><br /><p class="name">'.$value["name"].'</p>';
                    echo '<p class="desc">'.ucwords($value["desc"]).'</p>';
                    echo '<p class="price">$'.money_format('%i', $value["price"]).'</p>';
                    echo '<form method="POST" action="addproduct.php">';
                    echo '<input type="hidden" name="name" value="'.$value["name"].'">';
                    echo '<button class= "addItem" type="submit" name="submit" value="delete">Delete</button></form></li>';
                }
            }
            echo '</ul>';
        } 
        ?>
    </div>
</section>

<?php
    include_once('footer.php');
?>