

<?php  
//! Email Setup
require_once '../../mail/mailsys.php';

    require_once '../../config.php';

session_start();

$transaction_code = $_POST['IT_TRANSACTION_CODE_HASHED'];

//Select The REquest Items
$selectReqDB = mysqli_query($link,"SELECT * FROM tblrequest_form WHERE IT_TRANSACTION_CODE_HASHED = '$transaction_code'");
$selectReqRow = mysqli_fetch_array($selectReqDB);


mysqli_query($link,"DELETE FROM tblrequest_item WHERE IT_REQUEST_TRANSACTION_ID = '".$selectReqRow['IT_TRANSACTION_ID']."'");

// Delete Query
mysqli_query($link,"DELETE FROM tblrequest_form WHERE IT_TRANSACTION_CODE_HASHED = '$transaction_code'");

echo json_encode(true);

mysqli_close($link);
?>

  