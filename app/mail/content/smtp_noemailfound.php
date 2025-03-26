<?php 
$mail->Subject = "Password Reset"; // Subject
$mail->addAddress($_POST['email']); // To send  //$requestDeptEmail
$mail->Body =
"<pre style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;\">".

"Sorry but no email found in system. Thank you!"

."</pre>";
$mail->send(); // send to one person

?>