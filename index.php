<?php
    require "index.html";
?>

<main>
    <?php
        if(isset($_SESSION['userId'])){
            echo '<p class="log-in">Welcome! You are logged in!</p>';
        } else {
            echo '<p class="log-out">You are logged out! See you soon!</p>';
        }
    ?>
    
</main>