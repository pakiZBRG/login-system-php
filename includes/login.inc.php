<?php

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    // if username and pwd fields are empty
    if(empty($mailuid) || empty($password)){
        header("Location: ../index.php?error=empty_fields&username=".$mailuid);
        exit(); 
    }
    else {
        $sql = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sql_error");
            exit(); 
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //checks if we got the result from db
            if($row = mysqli_fetch_assoc($result)) {
                //is the inputed pwd same as the one from db
                $pwdCheck = password_verify($password, $row['pwd']);
                if($pwdCheck === false){
                    header("Location: ../index.php?error=wrong_password");
                    exit(); 
                }
                //if the pwds matched
                else if($pwdCheck === true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userName'] = $row['username'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=wrong_password");
                    exit(); 
                }
            }
            else {
                header("Location: ../index.php?error=no_user");
                exit(); 
            }
        }
    }
}
else {
    header("Location: ../index.php");
    exit(); 
}