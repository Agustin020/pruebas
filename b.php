<?php
session_start();
$_SESSION['tiempo'] = time();
header('Location: c.php');
?>
