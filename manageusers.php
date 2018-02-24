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
        <form class="signup-form" method="POST" action="create.php"> 
            <input type="text" name="first" placeholder="First Name">
            <input type="text" name="last" placeholder="Last Name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="uid" placeholder="User ID">
            <input type="text" name="pwd" placeholder="Password">
            <input type="text" name="priv" placeholder="Admin Privileges (1 or 0)">
            <button type="submit" name="submit" value="add">Add</button>
            <button type="submit" name="submit" value="delete">Delete</button>
            <button type="submit" name="submit" value="modify">Modify</button>
        </form>
        <br><br><br>
        <table>
        <?php
        $users = unserialize(file_get_contents('../data/passwd'));
        foreach($users as $row) {
            echo('<tr>');
            echo('<td>');
            echo(implode('</td><td>', $row));
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