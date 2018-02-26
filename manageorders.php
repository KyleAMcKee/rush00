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
      
      //Check if orderfile exists
      if (!file_exists('../data/orders'))
          file_put_contents('../data/orders', null);
        $users = unserialize(file_get_contents('../data/passwd'));
        $items= unserialize(file_get_contents('../data/products'));
        $orders = unserialize(file_get_contents('../data/orders'));

        $guest = array("first" => "guest", "last" => "guest", "email" => "none", "uid" => "guest");
  
        echo '<th>First Name</th><th>Last Name</th><th>Email</th><th>Username</th><th>Order Total</th>';
        if ($orders)
        {
            foreach($orders as $index => $row) {
                $totalCost = 0;
                if ($row[0] == "guest")
                    $temp = $guest;
                else
                {
                    foreach ($users as $i => $account)
                    {
                        if ($account['uid'] == $row[0])
                            $temp = $account;
                    }
                    $temp = array_slice($temp, 0, 4);
                }
                //calculate total cost
                foreach ($row[1] as $id => $quantity)
                    $totalCost += $items[$id]['price'];
                echo('<tr>');
                echo('<td>');
                echo(implode('</td><td>', $temp));
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