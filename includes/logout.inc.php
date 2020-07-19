<?php

session_start();
//Takes all created session and deletes values about them (id, username)
session_unset();
session_destroy();
header("Location: ../index.php");