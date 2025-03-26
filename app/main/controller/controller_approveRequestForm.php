<?php

require_once '../../config.php';

//Update Record to Borrow
mysqli_query($link,"UPDATE tblrequest_form set IT_STATUS='BORROWED' WHERE IT_TRANSACTION_CODE_HASHED='" . $_POST['IT_TRANSACTION_CODE_HASHED'] . "'");

// Close connection
mysqli_close($link);
?>