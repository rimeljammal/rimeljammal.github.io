<?php
session_start();
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] != null && $_SESSION["logged_in"]) {
	$id = $_SESSION["user_name"];
?>
<html>
<head>
<tile>Uni . Prof</title>
</head>
<body>
<p>Welcome <?php echo <?php echo "$name"; ?></p>
</body>
</html>
<?php

}else{
	header("Location:index.php");
}
?>