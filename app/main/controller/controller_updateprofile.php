<?php

session_start();
require_once '../../config.php';

$Employee_num = $_SESSION['USER_ID'];

$Name = mysqli_real_escape_string($link,$_POST['Name']);
$Employee_num = mysqli_real_escape_string($link,$_POST['Employee_num']);
$gender = mysqli_real_escape_string($link,$_POST['gender']);
$Email = mysqli_real_escape_string($link,$_POST['Email']);
$cpnum = mysqli_real_escape_string($link,$_POST['cpnum']);
$Dept = mysqli_real_escape_string($link,$_POST['Dept']);
$Section = mysqli_real_escape_string($link,$_POST['Section']);
$Position = mysqli_real_escape_string($link,$_POST['Position']);

mysqli_query($link, "UPDATE tbluser
SET USER_NAME =  '$Name', USER_EMPLOYEE_ID =  '$Employee_num', USER_GENDER =  '$gender', USER_EMAIL =  '$Email', USER_MOBILE =  '$cpnum', 
USER_DEPT =  '$Dept', USER_SECTION =  '$Section', USER_POSITION =  '$Position'
WHERE USER_EMPLOYEE_ID = '$Employee_num'");

mysqli_close($link);
?>