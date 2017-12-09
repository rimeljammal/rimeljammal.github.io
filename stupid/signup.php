<?php
require ("db_info_1705.inc.php");
session_start();

if (isset($_POST['name'])) {
    $name = $mysqli->real_escape_string($_POST['name']);
}else{
	die("error1");
}	
	
if (isset($_POST['id'])) {
    $id = $mysqli->real_escape_string($_POST['id']);
}else{
	die("error2");
}	

if (isset($_POST['email'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
}else{
	die("error3");
}

if (isset($_POST['section_id'])) {
    $secid = $mysqli->real_escape_string($_POST['section_id']);
}else{
	die("error4");
}

$stmt = $mysqli->prepare("Select name, id, email, section_id From students WHERE id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $id, $email, $section_id);
$count = $stmt->num_rows;

if($count != 0){
	$_SESSION["credentials1"] = false;
	header("Location:index.php#portfolio");
}else{
	$stmt = $mysqli->prepare("Insert INTO students(id, section_id, name, email) VALUES(?,?,?,?) ");
	$stmt->bind_param("ssss", $id, $secid, $name, $email);
	$stmt->execute();
	$_SESSION["credentials1"] = true;
	header("Location:index.php");
}
?>