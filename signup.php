<?php
    include_once('header.php');
?>

<section class"main-container">
    <div class="main-wrapper">
        <form class="signup-form" method="POST" action="create.php"> 
            <input type="text" name="first" placeholder="First name">
            <input type="text" name="last" placeholder="Last name">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>
</section>

<?php
    include_once('footer.php');
?>