<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pet shop</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
    <nav>
        <div class="nav-wrapper">
                <div class="icon-bar">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <?php 
                        if (isset($_SESSION['priv'])) 
                        {
                            if ($_SESSION['priv'] === 'yes')
                            {
                                echo '<a href="manageinv.php"><i class="fa fa-archive"></i> Inventory</a>';
                                echo '<a href="manageusers.php"><i class="fa fa-user"></i> Users</a>';
                                echo '<a href="manageorders.php"><i class="fa fa-shopping-cart"></i> Orders</a>';
                            }
                            else
                                echo '<a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a>';
                        }
                        else
                            echo '<a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a>';
                    ?>
                <?php
                    if (isset($_SESSION['uid']))
                    {
                        echo '<form method="POST" action="logout.php">
                                <button class="fa fa-sign-out" type="submit" name="submit"> Logout</button>
                            </form>';
                    }
                    else
                    {
                        echo '<a href="signup.php"><i class="fa fa-user-plus"></i> Sign up</a>
                            <form method="POST" action="login.php">
                                <input type="text" name="uid" placeholder="Username/email">
                                <input type="password" name="pwd" placeholder="password">
                                <button class="fa fa-sign-in" type="submit" name="submit"> Login</button>
                            </form>';
                    }
                ?>
                </div>
        </div>
    </nav>
    <nav>
        <div class="status">
            <?php
            if(isset($_SESSION['uid']))
            {
                echo '<div class="status-space">Logged in as: ' . $_SESSION['first'] . '<div>';
            }
            else
                echo '<div class="status-space">Not logged in</div>';
            ?>
        </div>           
    </nav>
</header>