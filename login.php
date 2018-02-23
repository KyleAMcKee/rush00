<?php

session_start();

    if (isset($_POST['submit']))
    {
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        //Check if inputs empty
        if (empty($uid) || empty($pwd))
        {
            header("Location: index.php?login=empty");
        }
        
        //Check if user exists
        $logins = unserialize(file_get_contents('../data/passwd'));
        $account;
        $account_exists = FALSE;
        if ($logins)
        {
            foreach($logins as $key => $value)
            {
                if ($value['uid'] === $uid || $value['email'] === $email)
                {
                    $account_exists = TRUE;
                    $account = $key;
                }
                    
            }
        }
        
        //Return to login if account doesn't exist
        if ($account_exists === FALSE)
        {
            header("Location: signup.php?login=error");
            exit();
        }

        //Check if password matches
        if (password_verify($pwd, $logins[$account]['pwd']))
        {   
            $_SESSION['id'] = $logins[$account];
            $_SESSION['first'] = $logins[$account]['first'];
            $_SESSION['last'] = $logins[$account]['last'];
            $_SESSION['email'] = $logins[$account]['email'];
            $_SESSION['uid'] = $logins[$account]['uid'];
            $_SESSION['priv'] = $logins[$account]['priv'];
            header("Location: index.php?login=success");
            exit();
        }
        else
            header("Location: index.php?login=error");

    }
?>