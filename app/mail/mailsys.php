<?php 
// Include required phpmailer files
require_once '../../../plugins/PHPMailer/PHPMailer.php';
require_once '../../../plugins/PHPMailer/SMTP.php';
require_once '../../../plugins/PHPMailer/Exception.php';
require_once '../../config.php';

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\STMP;
use PHPMailer\PHPMailer\Exception;

//Retrieve SMTP Data
$email_sql = "SELECT * FROM tblconfigmail WHERE id = 1";
$email_query = mysqli_query($link,$email_sql);
$smtpData = mysqli_fetch_array($email_query); 

//Create instance of phpmailer
$mail = new PHPMailer();

//! Main File
$mail->isSMTP(); // setting up SMTP
$mail->Host = $smtpData['HOST_ADDRESS']; // Host IP Address (DENSO)
$mail->CharSet = $smtpData['HOST_CHARSET']; // Charset Email
$mail ->SMTPSecure = $smtpData['HOST_SMTP_SECURE']; // Secure = None
$mail ->Port =  $smtpData['HOST_PORT']; // Port number (DENSO = 25)
$mail->SMTPKeepAlive =  $smtpData['HOST_SMTPKEEPALIVE']; // SMTP Keep Alive
$mail->isHTML($smtpData['HOST_ISHTML']); // For Body Sending
$mail->setFrom($smtpData['HOST_SETFROM']); // From Email Generated
?>