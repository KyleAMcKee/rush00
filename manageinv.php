<?php
    include_once('header.php');
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
        <table>
        <?php
        $items = unserialize(file_get_contents('../data/products'));
        foreach($items as $row) {
            echo('<tr>');
            echo('<td>');
            echo(implode('</td><td>', $row));
            echo('</td>');
            echo('</tr>');
        } 
        ?>
    </table>
    </div>
</section>

<?php
    include_once('footer.php');
?>