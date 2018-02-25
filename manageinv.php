<?php
    include_once('header.php');
    if ($_SESSION['priv'] === false)
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
            <input type="text" name="price" placeholder="Price">
            <input type="text" name="desc" placeholder="Description">
            <button type="submit" name="submit" value="add">Add</button>
            <button type="submit" name="submit" value="delete">Delete</button>
            <button type="submit" name="submit" value="modify">Modify</button>
        </form>
        <br><br><br>
        <?php
        $items = unserialize(file_get_contents('../data/products'));
        if ($items)
        {
            echo '<ul class="products">';
            foreach ($items as $key => $value)
            {
                echo '<li><img src="42.png"><br /><p>'.$value["name"].'</p><br />';
                echo '<form method="POST" action="addproduct.php">';
                echo '<input type="hidden" name="name" value="'.$value["name"].'">';
                echo '<button type="submit" name="submit" value="delete">Delete</button></form>';
            }
            echo '</ul>';
        } 
        ?>
    </div>
</section>

<?php
    include_once('footer.php');
?>