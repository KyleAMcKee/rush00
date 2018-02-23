<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <nav>
        <div class="nav-wrapper">
            <ul>
                <li><a href="index.php">Home</a><li>
            </ul>
            <div class="nav-login">
                <?php
                    if (isset($_SESSION['uid']))
                    {
                        echo '<form method="POST" action="logout.php">
                                <button type="submit" name="submit">Logout</button>
                            </form>';
                    }
                    else
                    {
                        echo '<form method="POST" action="login.php">
                                <input type="text" name="uid" placeholder="Username/email">
                                <input type="password" name="pwd" placeholder="password">
                                <button type="submit" name="submit">Login</button>
                            </form>
                            <a href="signup.php">Sign up</a>';
                    }
                ?>
            </div>
        </div>
    </nav>
</header>