<?php


//! Email Setup
require_once '../../mail/mailsys.php';

    require_once '../../config.php';

session_start();

$name = mysqli_real_escape_string($link,$_POST['name']);
$announcementContent = mysqli_real_escape_string($link,$_POST['announcementContent']);

$insert_sql = "INSERT INTO tblannouncement (ANNOUNCE_NAME, ANNOUNCE_CONTENT)
        VALUES ('" . $name . "', '" . $announcementContent . "')";

mysqli_query($link, $insert_sql); 

// $latest_msg_sql = "SELECT * FROM tblsupportmail WHERE INQUIRY_NAME = '".$_SESSION['USER_NAME']."' ORDER BY INQUIRY_ID DESC LIMIT 1";
// $fetch_last_msg = mysqli_query($link, $latest_msg_sql);
// $fetch_row = mysqli_fetch_array($fetch_last_msg);

// require_once '../../mail/content/smtp_support.php';

mysqli_close($link);
?>