<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "uni";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>