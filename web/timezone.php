<?php
    session_set_cookie_params(0,dirname($_SERVER['SCRIPT_NAME']));
    session_start();
    $time = $_GET['time'];
    $_SESSION['time'] = $time;
    echo date('Y-m-d H:i:s', $time);
?>
