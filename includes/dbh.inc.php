<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "login_system";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connect failed: ".mysqli_connect_error());
}