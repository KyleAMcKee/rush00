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
        <h2>Manange Users</h2>
        <form class="signup-form" method="POST" action="create.php"> <!-- need to return to manageusers after adding new user or modifying -->
            <input type="text" name="first" placeholder="First Name">
            <input type="text" name="last" placeholder="Last Name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="uid" placeholder="User ID">
            <input type="text" name="pwd" placeholder="Password">
            <input type="text" name="priv" placeholder="Admin Privileges (1 or 0)"> <!-- does not work? -->
            <button type="submit" name="submit" value="add">Add</button>
            <button type="submit" name="submit" value="delete">Delete</button>
            <button type="submit" name="submit" value="modify">Modify</button> <!-- does not work? -->
        </form>
        <br><br><br>
        <table class="users">
        <?php
        $users = unserialize(file_get_contents('../data/passwd'));

        // if (isset($_GET['action']) && isset($_GET['uid']) && isset($users[$_GET['uid']]))
        // {
        //     // if ($users[$userIndex]['uid'] == $_GET['uid'])
        //     //     unset($users[$_GET['uid']]);
        //     if ($_GET['action'] == "delete" && $users[$_GET['uid']]['priv'] === false)
        //         unset($users[$_GET['uid']]);
        //     // header('Location: manageusers.php?manageusers=removeduser');
        //     // $users = serialize($users);
        //     // file_put_contents('../data/passwd', $users);
        // }

        echo '<tr><td>First Name</td><td>Last Name</td><td>Email</td><td>Username</td><td>Administrator?</td></tr>';
        foreach($users as $index => $row) {
            $temp = $row;
            unset($temp['pwd']);
            $temp['priv'] = ($temp['priv'] === true) ? "yes": "no";
            echo('<tr>');
            echo('<td>');
            echo(implode('</td><td>', $temp));
            echo('<form method="POST" action="deleteusers.php">');
            echo('<input type="hidden" name="uid" value="'.$index.'">');
            echo('<button type="submit" name="submit" value="delete">Delete</button></form>');
            // echo('</td><td><a href="deleteusers.php?action=delete&uid='.$index.'">Delete</a>');
            // // echo('<td><a href="manageusers.php?action=delete&uid='.$row['uid'].'">Delete</a></td>');
            echo('</td>');
            echo('</tr>');
        }
        ?>
    </table>
    </div>
</section>

<?php
    include_once('footer.php');
?>