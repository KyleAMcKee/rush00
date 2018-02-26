<?php
	//DELETE
	if (isset($_POST['submit']) && $_POST['submit'] == 'delete')
	{
		$users = unserialize(file_get_contents('../data/passwd'));
		if (empty($users[$_POST['uid']]))
		{
			header("Location: manageusers.php?manageusers=empty");
			exit();

		}
		else if ($users[$_POST['uid']]['priv'] === 'no')
			unset($users[$_POST['uid']]);
		else
		{
			header("Location: manageusers.php?manageusers=adminnotdeleted");
			exit();
		}
        $users = serialize($users);
        file_put_contents('../data/passwd', $users);
        header("Location: manageusers.php?manageusers=userdeleted");
        exit();
	}
    else
    {
    	header("Location: manageusers.php");
    	exit();
    }
?>