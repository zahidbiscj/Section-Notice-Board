

<?php
session_start();
session_destroy();
unset($_SESSION["user_id"]);
unset($_SESSION["id"]);
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location: index.php");
?>