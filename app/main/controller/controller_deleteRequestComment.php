<?php


//! Email Setup
require_once '../../mail/mailsys.php';

    require_once '../../config.php';

session_start();


$delete_sql = "DELETE FROM tblrequest_comment WHERE id = '" . $_POST["id"] . "'";



mysqli_query($link, $delete_sql); 

echo json_encode(true);

mysqli_close($link);
?>