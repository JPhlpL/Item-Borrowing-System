<?php 

session_start();

require_once '../../config.php';



if ( ! isset($_SESSION["USER_ID"]) || empty($_SESSION["USER_ID"]) )
    {
    session_destroy();
    header("Location:../../../index.html");
    exit();
    }

// For Profile Info Capture
$profileSql = "SELECT * FROM tbluser
WHERE USER_ID = '".$_SESSION['USER_ID']."'";
$profileQuery = mysqli_query($link,$profileSql);
$profileData = mysqli_fetch_array($profileQuery);  
 
?>