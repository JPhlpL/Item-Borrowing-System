<?php

session_start();
require_once '../../config.php';

$id = mysqli_real_escape_string($link,$_POST['id']);
$system_name = mysqli_real_escape_string($link,$_POST['system_name']);
$system_title_header = mysqli_real_escape_string($link,$_POST['system_title_header']);
$system_author = mysqli_real_escape_string($link,$_POST['system_author']);
$system_dept = mysqli_real_escape_string($link,$_POST['system_dept']);
$system_status = mysqli_real_escape_string($link,$_POST['system_status']);
$system_description = mysqli_real_escape_string($link,$_POST['system_description']);
$system_logo = mysqli_real_escape_string($link,$_POST['system_logo']);
$system_datetime_published = mysqli_real_escape_string($link,$_POST['system_datetime_published']);

mysqli_query($link, 
"UPDATE tblsysteminfo SET 
SYSTEM_NAME = '$system_name',
SYSTEM_TITLE_HEADER = '$system_title_header',
SYSTEM_AUTHOR = '$system_author',
SYSTEM_DEPT = '$system_dept',
SYSTEM_STATUS = '$system_status',
SYSTEM_DESCRIPTION = '$system_description',
SYSTEM_LOGO = '$system_logo',
SYSTEM_DATETIME_PUBLISHED = '$system_datetime_published'
WHERE id = '$id'");

mysqli_close($link);
?>