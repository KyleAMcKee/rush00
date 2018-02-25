<?php
    if (isset($_POST['submit']))
    {
        session_start();
        $cart = serialize($_SESSION['cart']);
        $file = $_SESSION['file'];
        file_put_contents($file, $cart);
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
?>