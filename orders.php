<?php
	include_once('header.php');
	if (isset($_GET['action']) && $_GET['action'] == 'order')
	{
		//check if cart is empty
		if (empty($_SESSION['cart']))
		{
			header("Location: cart.php?emptycart");
			exit();
		}
		//check if user is logged in, if not set as guest
		$user = (!isset($_SESSION['id'])) ? "guest" : $_SESSION['id']['uid'];

		$orders = unserialize(file_get_contents('../data/orders'));
		$temp = array($user, $_SESSION['cart']);
		$orders[] = $temp;
		unset($_SESSION['cart']);
		$orders = serialize($orders);
		file_put_contents('../data/orders', $orders);
		header("Location: cart.php?cartorder=placed");
    	exit();
	}
?>