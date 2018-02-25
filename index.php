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
                if ($_SESSION['priv'] === true)
                {
                    echo '<a class="admin" href=manageinv.php>Manage Inventory</a>';
                    echo '<a class="admin" href=manageusers.php>Manage Users</a>';
                    echo '<a class="admin" href=manageorders.php>Manage Orders</a>';
                    // print_r($_SESSION);
                }
                else
                {
                    include_once('productlist.php');
                }
            }
            else
            {
                include_once('productlist.php');
            }
        ?>
    </div>
</section>

<?php
    include_once('footer.php');
?>