<?php

session_start();
require_once '../../config.php';


if($_POST['mode'] !== 'edit')
{
$it_item_name = $_POST['IT_ITEM_NAME'];
$it_item_control_number = $_POST['IT_ITEM_CONTROL_NUMBER'];
$it_item_quantity = $_POST['IT_ITEM_QUANTITY'];
$it_item_description = $_POST['IT_ITEM_DESCRIPTION'];
$it_item_remarks = $_POST['IT_ITEM_REMARKS'];
$it_item_status = $_POST['IT_ITEM_STATUS'];
$it_item_firstclaim_datetime = $_POST['IT_ITEM_FIRSTCLAIM_DATETIME'];
$it_item_encoder = $_POST['IT_ITEM_ENCODER'];
$it_item_pic = $_POST['IT_ITEM_PIC'];
$it_form_num = $_POST['IT_FORM_NUM'];
}



if ($_POST['mode'] === 'add') {

    
    $it_item_photo = $_FILES['IT_ITEM_PHOTO']['name']; 
    $uploadFilePath = $folder_dir.$it_item_photo; 

        // Upload file to server 
        move_uploaded_file($_FILES['IT_ITEM_PHOTO']['tmp_name'], $uploadFilePath);
         // Insert file information in the database 
        mysqli_query($link, "INSERT INTO tblinventory (IT_ITEM_NAME, IT_ITEM_CONTROL_NUMBER, IT_ITEM_PHOTO, IT_ITEM_QUANTITY, IT_ITEM_DESCRIPTION, IT_ITEM_REMARKS, IT_ITEM_STATUS, IT_ITEM_FIRSTCLAIM_DATETIME, IT_ITEM_ENCODER, IT_ITEM_PIC, IT_FORM_NUM)
        VALUES ( '$it_item_name', '$it_item_control_number', '$it_item_photo', '$it_item_quantity', '$it_item_description', '$it_item_remarks', '$it_item_status', '$it_item_firstclaim_datetime', '$it_item_encoder', '$it_item_pic', '$it_form_num')");

        echo json_encode(true);
 
}  

if ($_POST['mode'] === 'edit') {
    
        $result = mysqli_query($link,"SELECT id, IT_ITEM_NAME, IT_ITEM_CONTROL_NUMBER, IT_ITEM_PHOTO, IT_ITEM_QUANTITY, IT_ITEM_DESCRIPTION, IT_ITEM_REMARKS, IT_ITEM_STATUS, IT_ITEM_FIRSTCLAIM_DATETIME, IT_ITEM_ENCODER, IT_ITEM_PIC, IT_FORM_NUM FROM tblinventory WHERE id='" . $_POST['id'] . "'");

        $row= mysqli_fetch_array($result);

        echo json_encode($row);
}   

if ($_POST['mode'] === 'update') {

    //! Unlink
    if(!empty($_FILES['IT_ITEM_PHOTO']['name'])){
            //Select the file for delete
            $file_sql = "SELECT IT_ITEM_PHOTO FROM tblinventory WHERE id = '".$_POST["id"]."'";
            $file_query = mysqli_query($link, $file_sql);
            $fileData = mysqli_fetch_array($file_query);
            $fileName = $fileData['IT_ITEM_PHOTO'];

            $file = $folder_dir.$fileName;
            unlink($file);

            $it_item_photo = $_FILES['IT_ITEM_PHOTO']['name']; 
            $uploadFilePath = $folder_dir.$it_item_photo; 

        // Upload file to server 
    
        // Insert file information in the database 
            move_uploaded_file($_FILES['IT_ITEM_PHOTO']['tmp_name'], $uploadFilePath);
            mysqli_query($link,"UPDATE tblinventory set  IT_ITEM_NAME = '$it_item_name', IT_ITEM_CONTROL_NUMBER = '$it_item_control_number', IT_ITEM_PHOTO = '$it_item_photo', IT_ITEM_QUANTITY = '$it_item_quantity', IT_ITEM_DESCRIPTION = '$it_item_description', IT_ITEM_REMARKS = '$it_item_remarks', IT_ITEM_STATUS = '$it_item_status', IT_ITEM_FIRSTCLAIM_DATETIME = '$it_item_firstclaim_datetime', IT_ITEM_ENCODER = '$it_item_encoder', IT_ITEM_PIC = '$it_item_pic', IT_FORM_NUM = '$it_form_num' WHERE id='" . $_POST['id'] . "'");
        }
    else
    {
        mysqli_query($link,"UPDATE tblinventory set  IT_ITEM_NAME = '$it_item_name', IT_ITEM_CONTROL_NUMBER = '$it_item_control_number', IT_ITEM_QUANTITY = '$it_item_quantity', IT_ITEM_DESCRIPTION = '$it_item_description', IT_ITEM_REMARKS = '$it_item_remarks', IT_ITEM_STATUS = '$it_item_status', IT_ITEM_FIRSTCLAIM_DATETIME = '$it_item_firstclaim_datetime', IT_ITEM_ENCODER = '$it_item_encoder', IT_ITEM_PIC = '$it_item_pic', IT_FORM_NUM = '$it_form_num' WHERE id='" . $_POST['id'] . "'");
    }
       echo json_encode(true);
     
}  


if ($_POST['mode'] === 'delete') {

    //! Unlink
        //Select the file for delete
        $file_sql = "SELECT IT_ITEM_PHOTO FROM tblinventory WHERE id = '".$_POST["id"]."'";
        $file_query = mysqli_query($link, $file_sql);
        $fileData = mysqli_fetch_array($file_query);
        $fileName = $fileData['IT_ITEM_PHOTO'];

        $file = $folder_dir.$fileName;
        unlink($file);

     mysqli_query($link, "DELETE FROM tblinventory WHERE id='" . $_POST["id"] . "'");
     echo json_encode(true);
}  

?>