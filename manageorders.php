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
        <h2>Manange Orders</h2>
        <br><br><br>
        <table class="orders">
        <?php
        $users = unserialize(file_get_contents('../data/passwd'));

        echo '<tr><td>First Name</td><td>Last Name</td><td>Email</td><td>Username</td><td>Order Total</td></tr>';
        foreach($users as $index => $row) {
        	if ($row['priv'] === false) //also only if user placed an order (save orders in a folder?)
	        {
			  	$temp = $row;
	            unset($temp['pwd']);
	            // $temp['priv'] = ($temp['priv'] === true) ? "yes": "no"
	            echo('<tr>');
	            echo('<td>');
	            echo(implode('</td><td>', $temp));
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