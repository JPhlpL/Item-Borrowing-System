<?php
session_start();
$_SESSION["USER_ID"] = "";
session_destroy();
header("Location: login.php");
?>