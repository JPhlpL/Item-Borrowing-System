<?php

session_start();
require_once '../../config.php';

$Employee_num = $_SESSION['USER_EMPLOYEE_ID'];

$empnum = mysqli_real_escape_string($link,$Employee_num);
$username = mysqli_real_escape_string($link,$_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

mysqli_query($link, "UPDATE tbluser SET USER_ID =  '$username', USER_PASS =  '$password' WHERE USER_EMPLOYEE_ID = '$empnum'");

mysqli_close($link);
?>