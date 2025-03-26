<?php

session_start();

    require_once '../../config.php';

$user_id = mysqli_real_escape_string($link,$_SESSION['user_id']);

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

mysqli_query($link, "UPDATE tbluser SET USER_PASS =  '$password' WHERE USER_ID = '$user_id'");

mysqli_close($link);
?>