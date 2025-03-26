<?php


//! Email Setup
require_once '../../mail/mailsys.php';

    require_once '../../config.php';

session_start();

$comment_announce_id = mysqli_real_escape_string($link,$_POST['comment_announce_id']);
$comment_id = preg_replace('/\s+/', '', $comment_announce_id);

$comment_name = mysqli_real_escape_string($link,$_POST['comment_name']);
$commentContent = mysqli_real_escape_string($link,$_POST['commentContent']);

$insert_sql = "INSERT INTO tblrequest_comment (COMMENT_REQUEST_ID_HASHED, COMMENT_NAME, COMMENT_CONTENT)
        VALUES ('$comment_id', '$comment_name' , '$commentContent')";

mysqli_query($link, $insert_sql); 

mysqli_close($link);
?>