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
        <h2>Manange Orders</h2>
        <br><br><br>
        <table class="orders">
        <?php

      if (!file_exists('../data/orders'))
          file_put_contents('../data/orders', null);

        $orders = unserialize(file_get_contents('../data/orders'));

        echo '<th>First Name</th><th>Last Name</th><th>Email</th><th>Username</th><th>Order Total</th>';
        if ($orders)
        {
            foreach($orders as $index => $row) {
                $totalCost = $row[2];
                echo('<tr>');
                echo('<td>');
                echo(implode('</td><td>', $row[0]));
                echo('</td><td>$'.money_format('%i', $totalCost));
                echo('</td>');
                echo('</tr>');
            }
        }
        ?>
    </table>
    </div>
</section>

<?php
    include_once('footer.php');
?>