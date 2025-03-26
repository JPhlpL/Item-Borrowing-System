<?php 
$mail->Subject = "Password Reset"; // Subject
$mail->addAddress($_POST['email']); // To send  //$requestDeptEmail
$mail->Body =
"<pre style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;\">".

"Please click this "."<a href=\"$ip_address/_itemBorrowingv0.1/app/public/view/recover-password.php?$recovery_code\">link</a>"." for the self-password reset. Thank you!"

."</pre>";
$mail->send(); // send to one person

?>