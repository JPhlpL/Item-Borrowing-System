<?php 

//! Email Setup (NO NEED CONFIG)
require_once '../../mail/mailsys.php';

session_start();

$email = mysqli_real_escape_string($link, $_POST['email']);
$recovery_code = strtolower(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10)).strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10))."&==".strtolower(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10)).strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10)); 
$otp = strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6)); 
$otp_hashed = password_hash($otp, PASSWORD_DEFAULT);

$forgotpassQuery = "INSERT INTO tblforgotpass ( RECOVER_EMAIL , RECOVER_CODE , RECOVER_OTP , RECOVER_OTP_HASHED )
VALUES( '". $email ."' , '". $recovery_code ."' , '". $otp ."' , '". $otp_hashed ."' )";

mysqli_query($link, $forgotpassQuery);

//! Create Query find an email to the tbluser

$findEmail = "SELECT * FROM tbluser WHERE USER_EMAIL = '$email'";
$findEmailQuery = mysqli_query($link, $findEmail);
$emailData = mysqli_fetch_array($findEmailQuery);

if($emailData == '' || $emailData == NULL || !isset($emailData)){
    require_once '../../mail/content/smtp_noemailfound.php';
}
else{
    require_once '../../mail/content/smtp_emailfound.php';
}

mysqli_close($link);

?>