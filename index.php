<?php
    include_once('header.php');
?>

<section class"main-container">
    <div class="main-wrapper">
        <?php
            if (isset($_SESSION['uid']))
            {
                echo ('<br><br>');
                //Display different pages based on user privileges
                if ($_SESSION['priv'] === 'yes')
                {
                    echo '<a class="admin" href=manageinv.php>Manage Inventory</a>';
                    echo '<a class="admin" href=manageusers.php>Manage Users</a>';
                    echo '<a class="admin" href=manageorders.php>Manage Orders</a>';
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