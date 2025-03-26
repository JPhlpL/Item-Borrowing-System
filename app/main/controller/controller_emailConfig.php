<?php

session_start();
require_once '../../config.php';

$id = mysqli_real_escape_string($link,$_POST['id']);
$host_address = mysqli_real_escape_string($link,$_POST['host_address']);
$host_charset = mysqli_real_escape_string($link,$_POST['host_charset']);
$host_smtp_secure = mysqli_real_escape_string($link,$_POST['host_smtp_secure']);
$host_port = mysqli_real_escape_string($link,$_POST['host_port']);
$host_smtpkeepalive = mysqli_real_escape_string($link,$_POST['host_smtpkeepalive']);
$host_ishtml = mysqli_real_escape_string($link,$_POST['host_ishtml']);
$host_setfrom = mysqli_real_escape_string($link,$_POST['host_setfrom']);

mysqli_query($link, 
"UPDATE tblconfigmail SET 
HOST_ADDRESS = '$host_address',
HOST_CHARSET = '$host_charset',
HOST_SMTP_SECURE = '$host_smtp_secure',
HOST_PORT = '$host_port',
HOST_SMTPKEEPALIVE = '$host_smtpkeepalive',
HOST_ISHTML = '$host_ishtml',
HOST_SETFROM = '$host_setfrom'
WHERE id = '$id'");

mysqli_close($link);
?>