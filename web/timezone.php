<?php
    session_set_cookie_params(0,dirname($_SERVER['SCRIPT_NAME']));
    session_start();
    $time = $_GET['time'];
    $_SESSION['time'] = $_GET['time'];
	echo $_SESSION['time'];
?>
