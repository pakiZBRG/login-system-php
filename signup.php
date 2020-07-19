<?php
    require "index.html";
?>

<main class='nav-signup'>
    <h1>Signup</h1>
    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] === "empty_fields"){
                echo "<p>Fill in all fields!</p>";
            }
            else if($_GET['error'] === 'invalid_mail_username'){
                echo "<p>Invalid username and e-mail!</p>";
            } 
            else if($_GET['error'] === 'invalid_username'){
                echo "<p>Invalid username!</p>";
            } 
            else if($_GET['error'] === 'invalid_mail'){
                echo "<p>Invalid e-mail!</p>";
            } 
            else if($_GET['error'] === 'password_Check'){
                echo "<p>Your passwords do not match!</p>";
            }
            else if($_GET['error'] === 'user_taken'){
                echo "<p>Username is already taken!</p>";
            }
        }
        if(isset($_GET['signup'])){
            if ($_GET['signup'] = 'success'){
                echo "<p>Signup successful!</p>";
            }
        }
    ?>
    <form class='nav-signup-form' action="includes/signup.inc.php" method="post">
        <input type="text" name='uid' placeholder="Username">
        <input type="text" name='mail' placeholder="Email">
        <input type="password" name='pwd' placeholder="Password">
        <input type="password" name='pwd-repeat' placeholder="Repeat password">
        <button class='btn' type="submit" name='signup-submit'>Signup</button>
    </form>

    <a href="reset-password.php">Forgot password?</a>
</main>