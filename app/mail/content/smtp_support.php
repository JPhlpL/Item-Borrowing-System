<?php 

$mail->Subject = $fetch_row['INQUIRY_SUBJECT']; // Subject
$mail->addAddress("it.jphlpl@gmail.com"); // To send  //$requestDeptEmail
$mail->AddCC($fetch_row['INQUIRY_EMAIL'],"cc1");
$mail->Body = 
"<pre style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;\">".

"Hello Team,

Kindly see the information below for the concern of the said associate

Name: 

<strong>".$fetch_row['INQUIRY_NAME']."</strong>

Message: 

".$fetch_row['INQUIRY_MSG']."

Thank you!"

."</pre>";
$mail->send(); // send to one person

?>