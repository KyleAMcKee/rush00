<?php
session_start();

//Check for admin privileges
if ($_SESSION['priv'] === 'no')
{
    header("Location: index.php?access=denied");
    exit();
}

//ADD
if (isset($_POST['submit']) && $_POST['submit'] == 'add')
{
    //Unserialize data into readable array
    $logins = unserialize(file_get_contents('../data/passwd'));

    //set vars from POST
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $priv = (strtolower($_POST['priv']) === "yes") ? "yes" : "no";

    //Check for empty input
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd))
    {
        header("Location: manageusers.php?manageusers=empty");
        exit();
    }
        
    //Check input characters are valid
    if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
    {
        header("Location: manageusers.php?manageusers=invalidname");
        exit();
    }

    //Check for valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: manageusers.php?manageusers=invalidemail");
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
        header("Location: manageusers.php?manageusers=uidexists");
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
    $temp['priv'] = $priv;
    $logins[] = $temp;  

    $logins = serialize($logins);
    file_put_contents('../data/passwd', $logins);
    header("Location: manageusers.php?create=success");
    exit();
}

//DELETE
else if (isset($_POST['submit']) && $_POST['submit'] == 'delete')
{   
    $users = unserialize(file_get_contents('../data/passwd'));
    $account_exists = FALSE;
    $k;
    foreach($users as $key => $value)
    {
        if ($value['uid'] === $_POST['uid'])
        {
            $account_exists = TRUE;
            $k = $key;
        }
    }
    if ($account_exists === FALSE)
    {
        header("Location: manageusers.php?manageusers=empty");
        exit();
    }
    else if ($users[$k]['priv'] === 'no')
        unset($users[$k]);
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

//MODIFY
else if (isset($_POST['submit']) && $_POST['submit'] == 'modify')
{
    $users = unserialize(file_get_contents('../data/passwd'));
    $account_exists = FALSE;
    $k;
    foreach($users as $key => $value)
    {
        if ($value['uid'] === $_POST['uid'])
        {
            $account_exists = TRUE;
            $k = $key;
        }
    }
    if ($account_exists === FALSE)
    {
        header("Location: manageusers.php?manageusers=empty");
        exit();
    }
    else
    {
        if (!empty($_POST['first']))
            $users[$k]['first'] = $_POST['first'];
        if (!empty($_POST['last']))
            $users[$k]['last'] = $_POST['last'];
        if (!empty($_POST['email']))
            $users[$k]['email'] = $_POST['email'];
        if (!empty($_POST['pwd']))
            $users[$k]['pwd'] = $_POST['pwd'];
        if (!empty($_POST['priv']))
        {
            if ($users[$k]['uid'] === 'admin')
            {
                header("Location: manageusers.php?manageusers=cannotchange");
                exit();
            }
            $users[$k]['priv'] = $_POST['priv'];
        }          
    }
    $users = serialize($users);
    file_put_contents('../data/passwd', $users);
    header("Location: manageusers.php?manageusers=usermodified");
    exit();
}

else
{
    header("Location: manageusers.php");
    exit();
}