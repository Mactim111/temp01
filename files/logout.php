<?php
session_start();
unset($_SESSION['myrow']);
// unset($_SESSION);
header('Location: index.php');
?>
