<?php
    include_once('header.php');
    if ($_SESSION['priv'] === 'no')
    {
        header("Location: index.php?access=denied");
        exit();
    }
?>

<section class"main-container">
    <div class="main-wrapper">
        <h2>Manange Users</h2>
        <form class="signup-form" method="POST" action="modifyusers.php">
            <input type="text" name="first" placeholder="First Name">
            <input type="text" name="last" placeholder="Last Name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="uid" placeholder="User ID">
            <input type="text" name="pwd" placeholder="Password">
            <input type="text" name="priv" placeholder="Admin Privileges (yes or no)">
            <button type="submit" name="submit" value="add">Add</button>
            <button type="submit" name="submit" value="delete">Delete</button>
            <button type="submit" name="submit" value="modify">Modify</button>
        </form>
        <br><br><br>
        <table class="users">
        <?php
        $users = unserialize(file_get_contents('../data/passwd'));

        echo '<th>First Name</th><th>Last Name</th><th>Email</th><th>Username</th><th>Administrator?</th><th>Action</th>';
        foreach($users as $index => $row) {
            $temp = $row;
            unset($temp['pwd']);
            echo('<tr>');
            echo('<td>');
            echo(implode('</td><td>', $temp));
            echo('<td><form method="POST" action="deleteusers.php">');
            echo('<input type="hidden" name="uid" value="'.$index.'">');
            echo('<button type="submit" name="submit" value="delete">Delete</button></form></td>');
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