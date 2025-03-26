<?php


//! Email Setup
require_once '../../mail/mailsys.php';

    require_once '../../config.php';

session_start();


$delete_sql = "DELETE FROM tblannouncement WHERE id = '" . $_POST["id"] . "'";



mysqli_query($link, $delete_sql); 

echo json_encode(true);

// $latest_msg_sql = "SELECT * FROM tblsupportmail WHERE INQUIRY_NAME = '".$_SESSION['USER_NAME']."' ORDER BY INQUIRY_ID DESC LIMIT 1";
// $fetch_last_msg = mysqli_query($link, $latest_msg_sql);
// $fetch_row = mysqli_fetch_array($fetch_last_msg);

// require_once '../../mail/content/smtp_support.php';

mysqli_close($link);
?>