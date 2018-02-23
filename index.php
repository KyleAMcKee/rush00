<?php
    include_once('header.php');
?>

<section class"main-container">
    <div class="main-wrapper">
        <h2>Home</h2>
        <?php
            if (isset($_SESSION['uid']))
            {
                echo "Hello " . $_SESSION['first'] . ", you are logged in!\n";
                echo ('<br><br>');
                //Display different pages based on user privileges
                if ($_SESSION['priv'] == 1)
                {
                    echo '<a href=manageinv.php>Manage Inventory</a>';
                    echo '<a href=manageusers.php>Manage Users</a>';
                }
                else
                {
                    $items = unserialize(file_get_contents('../data/products'));
                    foreach($items as $row) {
                        echo('<tr>');
                        echo('<td>');
                        echo(implode('</td><td>', $row));
                        echo('<br>');
                        echo('</td>');
                        echo('</tr>');
                    }
                }
            }
        
        ?>
    </div>
</section>

<?php
    include_once('footer.php');
?>