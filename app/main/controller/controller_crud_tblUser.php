<?php

require_once '../../config.php';


if ($_POST['mode'] === 'add') {
     
     $user_id = $_POST['USER_ID'];
     $user_employee_id = $_POST['USER_EMPLOYEE_ID'];
     $user_pass = password_hash($_POST['USER_PASS'], PASSWORD_DEFAULT);
     $user_name = $_POST['USER_NAME'];
     $user_gender = $_POST['USER_GENDER'];
     $user_email = $_POST['USER_EMAIL'];
     $user_dept = $_POST['USER_DEPT'];
     $user_section = $_POST['USER_SECTION'];
     $user_position = $_POST['USER_POSITION'];
     $user_mobile = $_POST['USER_MOBILE'];
     $user_account_type = $_POST['USER_ACCOUNT_TYPE'];
     
          
     mysqli_query($link, "INSERT INTO tbluser (USER_ID, USER_PASS, USER_EMPLOYEE_ID, USER_NAME, USER_GENDER, USER_EMAIL, USER_DEPT, USER_SECTION, USER_POSITION, USER_MOBILE, USER_ACCOUNT_TYPE)
     VALUES ('$user_id','$user_pass','$user_employee_id','$user_name','$user_gender','$user_email','$user_dept','$user_section','$user_position','$user_mobile','$user_account_type')");

     echo json_encode(true);
}  

if ($_POST['mode'] === 'edit') {
    
    $result = mysqli_query($link,"SELECT id, USER_ID, USER_EMPLOYEE_ID, USER_NAME, USER_GENDER, USER_EMAIL, USER_DEPT, USER_SECTION, USER_POSITION, USER_MOBILE, USER_ACCOUNT_TYPE FROM tbluser WHERE id='" . $_POST['id'] . "'");
    $row= mysqli_fetch_array($result);

     echo json_encode($row);
}   

if ($_POST['mode'] === 'update') {

    $user_pass = password_hash($_POST['USER_PASS'], PASSWORD_DEFAULT);
    mysqli_query($link,"UPDATE tbluser set USER_ID='" . $_POST['USER_ID'] . "', USER_PASS='$user_pass', USER_EMPLOYEE_ID='" . $_POST['USER_EMPLOYEE_ID'] . "', USER_NAME='" . $_POST['USER_NAME'] . "', USER_GENDER = '" . $_POST['USER_GENDER'] . "', USER_EMAIL = '" . $_POST['USER_EMAIL'] . "', USER_DEPT = '" . $_POST['USER_DEPT'] . "', USER_SECTION = '" . $_POST['USER_SECTION'] . "', USER_POSITION = '" . $_POST['USER_POSITION'] . "', USER_MOBILE = '" . $_POST['USER_MOBILE'] . "', USER_ACCOUNT_TYPE = '" . $_POST['USER_ACCOUNT_TYPE'] . "' WHERE id='" . $_POST['id'] . "'");
    echo json_encode(true);
}  

if ($_POST['mode'] === 'delete') {

     mysqli_query($link, "DELETE FROM tbluser WHERE id='" . $_POST["id"] . "'");
     echo json_encode(true);
}  

?>