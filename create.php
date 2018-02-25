<?php
    if (isset($_POST['submit']))
    {
        //Check if private folder exists
        if (!file_exists('../data'))
            mkdir('../data');
        
        //Check if password file exists
        if (!file_exists('../data/passwd'))
            file_put_contents('../data/passwd', null);
        
        //Unserialize data into readable array
        $logins = unserialize(file_get_contents('../data/passwd'));

        //set vars from POST
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        //Check for empty input
        if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd))
        {
            header("Location: signup.php?signup=empty");
            exit();
        }
            
        //Check input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
        {
            header("Location: signup.php?signup=invalidname");
            exit();
        }

        //Check for valid email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: signup.php?signup=invalidemail");
            exit();
        }

        //Check if username exists
        $account_exists = FALSE;
        if ($logins)
        {
            foreach($logins as $key => $value)
            {
                if ($value['uid'] === $uid)
                    $account_exists = TRUE;
            }
        }
        if ($account_exists === TRUE)
        {
            header("Location: signup.php?signup=uidexists");
            exit();
        }

        //Hash password
        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

        //Add user to file
        $temp['first'] = $first; 
        $temp['last'] = $last;  
        $temp['email'] = $email;  
        $temp['uid'] = $uid;  
        $temp['pwd'] = $hashedpwd;
        if ($uid == 'admin')
            $temp['priv'] = true;
        else
            $temp['priv'] = false;
        $logins[] = $temp;

        session_start();
        $_SESSION['id'] = count($logins) - 1;
        $_SESSION['first'] = $first;
        $_SESSION['last'] = $last;
        $_SESSION['email'] = $email;
        $_SESSION['uid'] = $uid;
        $_SESSION['priv'] = $temp['priv'];
        header("Location: index.php?login=success");

        $logins = serialize($logins);
        file_put_contents('../data/passwd', $logins);
        exit();
    }
    else
    {
        header("Location: signup.php");
        exit();
    }
?>