<?php 
session_start();
unset($_SESSION['userLogged']);
header("Location: {$_SERVER['HTTP_REFERER']}");
?>