<?php
ob_start();
session_start();
if(isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	#session_destroy();
	header("Location: home.html");
} else {
	header("Location: home.html");
}
?>