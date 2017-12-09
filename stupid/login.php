<?php
require ("db_info_1705.inc.php");
session_start();

if (isset($_POST['id'])) {
    $id = $mysqli->real_escape_string($_POST['id']);
}else{
	die("error2");
}

if (isset($_POST['pass'])) {
    $pass = $mysqli->real_escape_string($_POST['pass']);
	$pass = hash('sha256', $pass);
}else{
	die("error5");
}

$stmt = $mysqli->prepare("Select id, password from prof where id = ? AND password = ?");
$stmt->bind_param("ss", $id, $pass);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($email, $pass);
$count = $stmt->num_rows;

if($count != 0) {
	$_SESSION["logged_in"] = false;
	header("Location:index.php#portfolio");
}else{
    $_SESSION["logged_in"] = true;
    $_SESSION["user_name"] = $id;
	header("Location:index.php");
}
?>