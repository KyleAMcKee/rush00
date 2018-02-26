<?php
	include_once('header.php');
	if (isset($_GET['action']) && $_GET['action'] == 'order')
	{
		//Check if cart is empty
		if (empty($_SESSION['cart']))
		{
			header("Location: cart.php?emptycart");
			exit();
		}
		//Check if user is logged in, if not set as guest
		if (!isset($_SESSION['id']))
			$user = array("first" => "guest", "last" => "guest", "email" => "none", "uid" => "guest");
		else
			$user = array_slice($_SESSION['id'], 0, 4);
		$items = unserialize(file_get_contents('../data/products'));
		//Calculate total cost
		$totalCost = 0;
		foreach($_SESSION['cart'] as $id => $quantity)
			$totalCost += $items[$id]['price'] * $quantity;

		$orders = unserialize(file_get_contents('../data/orders'));
		$temp = array($user, $_SESSION['cart'], $totalCost);
		$orders[] = $temp;
		unset($_SESSION['cart']);
		$orders = serialize($orders);
		file_put_contents('../data/orders', $orders);
		header("Location: cart.php?cartorder=placed");
    	exit();
	}
?>